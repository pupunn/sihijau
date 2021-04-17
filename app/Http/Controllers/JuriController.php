<?php

namespace App\Http\Controllers;

use PDF;
use Excel;
use App\Models\Aspek;
use App\Models\Bukti;
use App\Models\Nilai;
use App\Models\Sekolah;
use App\Models\Indikator;
use App\Models\Nilai_juri;
use Illuminate\Http\Request;
use App\Models\Kriteria_penilaian;
use App\Exports\ReportExport;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class JuriController extends Controller
{
    public function sekolah()
    {
        $sekolah = Sekolah::orderBy('id', 'asc')->get();
        $nilai = Nilai::orderBy('nilai', 'asc')->get();
        return view('juri.listsekolah', compact('sekolah', 'nilai'));
    }

    public function isian($id)
    {
        $jml_aspek = Aspek::count();
        $sekolah = Sekolah::where('id', $id)->first();
        for ($i = 1; $i <= 6; $i++) {
            ${'aspek' . $i} = Aspek::where('id_aspek', $i)->get();
            ${'indikator' . $i} = Indikator::where('id_aspek', $i)->where('id_periode', Auth::user()->id_periode)->orderByRaw('CHAR_LENGTH(urutan)')->orderBy('urutan', 'asc')->get();
        }
        $nilai = Nilai::where('id_sekolah', $id)->get();
        $bukti = Bukti::where('id_sekolah', $id)->get();
        $nilai_juri = Nilai_juri::where('id_juri', Auth::user()->id)->get();
        $kriteria_penilaian = Kriteria_penilaian::get();
        return view('juri.isipenilaian', compact('jml_aspek', 'aspek1', 'aspek2', 'aspek3', 'aspek4', 'aspek5', 'aspek6', 'sekolah', 'indikator1', 'indikator2', 'indikator3', 'indikator4', 'indikator5', 'indikator6', 'kriteria_penilaian', 'nilai', 'bukti', 'nilai_juri'));
    }

    public function store(Request $request)
    {
        $id = $request->id;
        if ($request->nilai != null) {
            Nilai::updateOrCreate(
                [
                    'id_indikator' => request('id'),
                    'id_sekolah' => request('id_sekolah'),
                    'tahun' => date('Y')
                ],
                [
                    'nilai_juri' => request('nilai'),
                ]
            );
        }

        return response()->json(['success' => 'Data berhasil tersimpan', 'nilai_juri' => $request->nilai]);
    }

    public function downloadLampiran($id)
    {
        $bukti = Bukti::findOrFail($id);
        $filename = $bukti->value('path');
        $path = '/bukti/' . $bukti->value('path');
        return Storage::download($path, $filename);
    }

    public function cetakPdf($id)
    {
        $jml_aspek = Aspek::count();
        $sekolah = Sekolah::where('id', $id)->first();
        for ($i = 1; $i <= 6; $i++) {
            ${'aspek' . $i} = Aspek::where('id_aspek', $i)->get();
            ${'indikator' . $i} = Indikator::where('id_aspek', $i)->where('id_periode', Auth::user()->id_periode)->orderByRaw('CHAR_LENGTH(urutan)')->orderBy('urutan', 'asc')->get();
        }
        $nilai = Nilai::where('id_sekolah', $id)->get();
        $bukti = Bukti::where('id_sekolah', $id)->get();
        $nilai_juri = Nilai_juri::where('id_juri', Auth::user()->id)->get();
        $kriteria_penilaian = Kriteria_penilaian::get();
        // dd($kriteria_penilaian);
        $pdf = PDF::loadview('juri.rekap', compact('jml_aspek', 'sekolah', 'aspek1', 'aspek2', 'aspek3', 'aspek4', 'aspek5', 'aspek6', 'indikator1', 'indikator2', 'indikator3', 'indikator4', 'indikator5', 'indikator6', 'nilai', 'nilai_juri', 'bukti', 'kriteria_penilaian'));
        return $pdf->stream($sekolah->id . '_ ' . $sekolah->nama_sekolah . '_ ' . Auth::user()->periode->nama . '.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new ReportExport, 'Rekap Hasil Penilaian GSR.xlsx');
    }

    public function downloadZipBukti($id)
    {
        $sekolah_nama = Sekolah::where('id', $id)->value('nama_sekolah');
        $bukti = Bukti::join('indikator', 'bukti.id_indikator', '=', 'indikator.id_indikator')->where('id_periode', Auth::user()->id_periode)->orderBy('id_aspek')->orderByRaw('CHAR_LENGTH(indikator.urutan)')->orderBy('indikator.urutan', 'asc')->get();

        return view('juri.zipBukti', compact('bukti', 'sekolah_nama'));
    }
}
