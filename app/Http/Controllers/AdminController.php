<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\{Aspek, Satuan, Periode, Indikator, Kriteria_penilaian, User};

class AdminController extends Controller
{
    public function aspek()
    {
        $aspek = Aspek::all();
        return view('admin.aspek.index', compact('aspek'));
    }

    public function destroy($id)
    {
        $aspek = Aspek::findOrFail($id);
        $aspek->delete();
    }

    public function store()
    {
        Aspek::create([
            'nama_aspek' => request('nama_aspek'),
            'tahun' => request('tahun')
        ]);

        return response()->json(['success' => 'Data berhasil tersimpan', 'nama' => request('nama_aspek'), 'tahun' => request('tahun')]);
    }

    public function indikator($id)
    {
        $aspek = Aspek::findOrFail($id);
        $satuan = Satuan::all();
        $periode = Periode::all();
        $indikator = Indikator::where('id_aspek', $id)->get();
        // $kriteria = Kriteria_penilaian::where('id_indikator', $id)->orderBy('bobot', 'asc')->get();
        // dd($indikator);
        return view('admin.aspek.indikator', compact('aspek', 'satuan', 'periode', 'indikator'));
    }

    public function storeIndikator(Request $request)
    {
        Indikator::create([
            'nama_indikator' => request('nama_indikator'),
            'id_aspek' => request('id_aspek'),
            'id_satuan' => request('satuan'),
            'id_periode' => request('periode'),
            'urutan' => request('urutan'),
            'tahun' => request('tahun'),
            'is_visible' => request('is_visible'),
        ]);

        $periode = Periode::findOrFail(request('periode'));
        $aspek = Aspek::findOrFail(request('id_aspek'));

        return response()->json(['success' => 'Data berhasil tersimpan', 'nama' => request('nama_indikator'), 'urutan' => request('urutan'), 'periode' => $periode->nama, 'aspek' => $aspek->nama_aspek]);
    }

    public function editIndikator($id)
    {
        $indikator = Indikator::findOrFail($id);
        $indikator->update([
            'nama_indikator' => request('nama_indikator'),
            'id_aspek' => request('id_aspek'),
            'id_satuan' => request('satuan'),
            'id_periode' => request('periode'),
            'urutan' => request('urutan'),
            'tahun' => request('tahun'),
            'is_visible' => request('is_visible'),
        ]);

        $periode = Periode::findOrFail(request('periode'));
        $aspek = Aspek::findOrFail(request('id_aspek'));

        return response()->json(['success' => 'Data berhasil tersimpan', 'nama' => request('nama_indikator'), 'urutan' => request('urutan'), 'periode' => $periode->nama, 'aspek' => $aspek->nama_aspek]);
    }

    public function destroyIndikator($id)
    {
        $indikator = Indikator::findOrFail($id);
        $indikator->delete();
    }

    public function storeTemplate(Request $request)
    {
        $ind = Indikator::findOrFail($request->id);
        $namaind = $ind->nama_indikator;
        $i = 0;
        // $destinationPath = public_path() . '/template/';
        $ext = request()->file('template' . request('id'))->getClientOriginalExtension();
        $templatefile = "GSR_" . $ind->urutan . "_ " . $ind->id_indikator . "_ " . $namaind . "_ " . time() . "." . $ext;
        $template = request()->file('template' . request('id'))->storeAs('admin/template', $templatefile);
        // $template->move($destinationPath, $templatefile);

        $ind->template = $templatefile;
        $ind->save();

        return response()->json(['success' => 'Data berhasil tersimpan', 'nama' => $templatefile]);
    }

    public function ubahPeriode(Request $request)
    {
        User::where('id', Auth::user()->id)
            ->where('email', Auth::user()->email)
            ->update(['id_periode' => $request->periode]);

        session(["periode" => $request->periode]);

        return back();
    }

    public function storeKriteria(Request $request)
    {
        Kriteria_penilaian::create([
            'id_indikator' => $request->id,
            'kriteria' => request('kriteria'),
            'bobot' => request('bobot'),
        ]);

        return response()->json(['success' => 'Data berhasil tersimpan', 'kriteria' => request('kriteria'), 'bobot' => request('bobot')]);
    }

    public function destroyKriteria($idi, $id)
    {
        $kriteria = Kriteria_penilaian::where('id_indikator', $idi)->findOrFail($id);
        // dd($kriteria);
        $kriteria->delete();

        return back();
    }

    public function storeSatuan(Request $request)
    {
        Satuan::create([
            'nama_satuan' => request('nama_satuan'),
            'simbol' => request('simbol'),
        ]);

        return response()->json(['success' => 'Data berhasil tersimpan', 'satuan' => request('nama_satuan'), 'simbol' => request('simbol')]);
    }

    public function destroySatuan($id)
    {
        $satuan = Satuan::findOrFail($id);
        $satuan->delete();

        return back();
    }
}
