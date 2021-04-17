<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\SekolahRequest;

class UserController extends Controller
{
    public function index()
    {
        $sekolah = Sekolah::all();
        $users = User::role('juri')->get();
        return view('admin.user.index', compact('sekolah', 'users'));
    }

    public function store()
    {
        Sekolah::create([
            "npsn" => request('npsn'),
            "file_npsn" => request('file_npsn') ? request()->file('file_npsn')->store('daftar/sekolah') : null,
            "nama_sekolah" => request('nama_sekolah'),
            "alamat_sekolah" => request('alamat_sekolah'),
            "nama_operator" => request('nama_operator'),
            "telepon_operator" => request('telepon_operator'),
            "email_operator" => request('email_operator'),
            "letak_sekolah" => request('letak_sekolah'),
            "file_peta_lokasi" => request('file_peta_lokasi') ? request()->file('file_peta_lokasi')->store('daftar/sekolah') : null,
            "file_foto_sekolah" => request('file_foto_sekolah') ? request()->file('file_foto_sekolah')->store('daftar/sekolah') : null,
            "luas_total" => request('luas_total'),
            "file_masterplan" => request('file_masterplan') ? request()->file('file_masterplan')->store('daftar/sekolah') : null,
            "luas_area" => request('luas_area'),
            "file_luas_area" => request('file_luas_area') ? request()->file('file_luas_area')->store('daftar/sekolah') : null,
            "luas_area_hijau" => request('luas_area_hijau'),
            "file_luas_area_hijau" => request('file_luas_area_hijau') ? request()->file('file_luas_area_hijau')->store('daftar/sekolah') : null,
            "jumlah_guru" => request('jumlah_guru'),
            "file_guru_karyawan" => request('file_guru_karyawan') ? request()->file('file_guru_karyawan')->store('daftar/sekolah') : null,
            "jumlah_siswa" => request('jumlah_siswa'),
            "file_jumlah_siswa" => request('file_jumlah_siswa') ? request()->file('file_jumlah_siswa')->store('daftar/sekolah') : null,
        ]);

        return response()->json(['success' => 'Data berhasil tersimpan.']);
    }
    public function edit(Sekolah $sekolah)
    {
        //
    }

    public function update(Sekolah $sekolah, SekolahRequest $request)
    {
        // if (request('file_npsn')) {
        //     Storage::delete($sekolah->file_npsn);
        //     $file_npsn = request()->file('file_npsn')->store('images/band');
        // } elseif ($sekolah->file_npsn) {
        // $file_npsn = $sekolah->file_npsn;
        // } else {
        //     $file_npsn = null;
        // }

        $sekolah->update([
            "npsn" => $request['npsn'],
            "file_npsn" => $sekolah->file_npsn,
            "nama_sekolah" => $request['nama_sekolah'],
            "alamat_sekolah" => $request['alamat_sekolah'],
            "nama_operator" => $request['nama_operator'],
            "telepon_operator" => $request['telepon_operator'],
            "email_operator" => $request['email_operator'],
            "letak_sekolah" => $request['letak_sekolah'],
            "file_peta_lokasi" => $sekolah->file_peta_lokasi,
            "file_foto_sekolah" => $sekolah->file_foto_sekolah,
            "luas_total" => $request['luas_total'],
            "file_masterplan" => $sekolah->file_masterplan,
            "luas_area" => $request['luas_area'],
            "file_luas_area" => $sekolah->file_luas_area,
            "luas_area_hijau" => $request['luas_area_hijau'],
            "file_luas_area_hijau" => $sekolah->file_luas_area_hijau,
            "jumlah_guru" => $request['jumlah_guru'],
            "file_guru_karyawan" => $sekolah->file_guru_karyawan,
            "jumlah_siswa" => $request['jumlah_siswa'],
            "file_jumlah_siswa" => $sekolah->file_jumlah_siswa,
        ]);

        return redirect()->route('user');
    }

    public function destroy($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $user = User::where('id_sekolah', $id)->firstOrFail();
        $user->delete();
        $sekolah->delete();
    }

    public function storeJuri()
    {
        $user = User::create([
            'name' => request('name'),
            'email' => request('email'),
            'id_periode' => Auth::user()->id_periode,
            'password' => bcrypt('gsrunnes'),
        ]);

        $user->assignRole('juri');


        return response()->json(['success' => 'Data berhasil tersimpan.']);
    }

    public function destroyJuri($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }
}
