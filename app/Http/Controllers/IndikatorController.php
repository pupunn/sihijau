<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use App\Models\{Aspek, Bukti, Nilai, Indikator, Sub_indikator, Isian, Kriteria_penilaian};

class IndikatorController extends Controller
{
    public function indikator($id)
    {
        $indikator = Indikator::where('id_aspek', $id)->where('id_periode', Auth::user()->id_periode)->orderByRaw('CHAR_LENGTH(urutan)')->orderBy('urutan', 'asc')->get();
        $aspek = Aspek::where('id_aspek', $id)->first();
        $kriteria = Kriteria_penilaian::orderBy('bobot', 'asc')->get();
        $sub_indikator = Sub_indikator::get();
        $isian = Isian::where('id_sekolah', Auth::user()->id_sekolah)->get();
        $nilai = Nilai::where('id_sekolah', Auth::user()->id_sekolah)->get();
        $bukti = Bukti::where('id_sekolah', Auth::user()->id_sekolah)->get();
        $aspeks = Aspek::all();
        // dd(Auth::user()->name);
        return view('sekolah.indikator', compact('indikator', 'aspek', 'aspeks', 'kriteria', 'sub_indikator', 'isian', 'nilai', 'bukti'));
    }

    public function downloadTemplate($id)
    {
        $lampiran = Indikator::where('id_indikator', $id)->first();
        $filename = $lampiran->template;
        $path = '/admin/template/' . $filename;
        return Storage::download($path, $filename);
    }

    public function store(Request $request)
    {
        $id = $request->id;
        if ($request->nilai !== null && $request->file('bukti_' . $id) == null) {
            Nilai::updateOrCreate(
                ['id_indikator' => $request->id, 'id_sekolah' => Auth::user()->id_sekolah, 'tahun' => date('Y')],
                ['nilai' => $request->nilai]
            );

            return response()->json(['success' => 'Data berhasil tersimpan.', 'isian' => $request->isian, 'id_modal' => $request->id]);
        }

        if (empty($request->nilai) && $request->file('bukti_' . $id) !== null) {
            $ind = Indikator::findOrFail($id);
            $namaind = $ind->nama_indikator;
            $urutan = $ind->urutan;
            $i = 0;
            //$bukti = $request->file('bukti_'.$id);
            $ext = request()->file('bukti_' . request('id'))->getClientOriginalExtension();
            $buktifile = Auth::user()->periode->kode . "_ " . Auth::user()->sekolah->nama_sekolah . "_ " . $urutan . "_ " . time() . "." . $ext;
            $bukti = request()->file('bukti' . request('id'))->storeAs('bukti', $buktifile);

            Bukti::updateOrCreate(
                ['id_indikator' => $id, 'id_sekolah' => Auth::user()->id_sekolah],
                ['path' => $buktifile, 'filetype' => $ext]
            );

            $bkt = Bukti::where('id_indikator', $id)->where('id_sekolah', Auth::user()->id_sekolah)->where('path', $buktifile)->first();
            $idbkt = $bkt->id_bukti;
            $updt = $bkt->updated_at;
            return response()->json(['success' => 'Data berhasil tersimpan', 'nama' => $namaind, 'id' => $idbkt, 'updt' => $updt, 'id_modal' => $request->id]);
        }

        if (isset($request->nilai) && $request->file('bukti_' . $id) != null) {
            $ind = Indikator::findOrFail($id);
            $urutan = $ind->urutan;
            $namaind = $ind->nama_indikator;
            Nilai::updateOrCreate(
                ['id_indikator' => $request->id, 'id_sekolah' => Auth::user()->id_sekolah, 'tahun' => date('Y')],
                ['nilai' => $request->nilai]
            );

            $i = 0;
            $ext = request()->file('bukti_' . request('id'))->getClientOriginalExtension();
            $buktifile = Auth::user()->periode->kode . "_ " . Auth::user()->name . "_ " . $urutan . "_ " . time() . "." . $ext;
            // $s = Auth::user->sekolah;
            $bukti = request()->file('bukti_' . request('id'))->storeAs('bukti', $buktifile);

            Bukti::updateOrCreate(
                ['id_indikator' => $id, 'id_sekolah' => Auth::user()->id_sekolah],
                ['path' => $buktifile, 'filetype' => $ext]
            );

            $bkt = Bukti::where('id_indikator', $id)->where('id_sekolah', Auth::user()->id_sekolah)->where('path', $buktifile)->first();
            $idbkt = $bkt->id_bukti;
            $updt = $bkt->updated_at;

            return response()->json(['success' => 'Data berhasil tersimpan', 'nama' => $namaind, 'id' => $idbkt, 'updt' => $updt, 'id_modal' => $request->id]);
        }

        if (empty($request->nilai) && empty($request->file('bukti_' . $id))) {
            return response()->json(['success' => 'Pilih Nilai Yang Sesuai atau Upload File Template']);
        }
    }

    public function downloadLampiran($id)
    {
        $bukti = Bukti::findOrFail($id);
        $filename = $bukti->value('path');
        $path = '/bukti/' . $bukti->value('path');
        return Storage::download($path, $filename);
    }
}
