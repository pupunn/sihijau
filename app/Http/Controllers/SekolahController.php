<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\PostMail;
use App\Models\Sekolah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\SekolahRequest;
use Illuminate\Support\Facades\Storage;

class SekolahController extends Controller
{
    public function create()
    {
        return view('auth.daftar');
    }

    public function store(SekolahRequest $request)
    {
        $ext = request()->file('file_peta_lokasi' . request('id'))->getClientOriginalExtension();

        Sekolah::create([
            "npsn" => $request['npsn'],
            "file_npsn" => $request['file_npsn'] ? request()->file('file_npsn')->store('daftar/sekolah') : null,
            "nama_sekolah" => $request['nama_sekolah'],
            "alamat_sekolah" => $request['alamat_sekolah'],
            "nama_operator" => $request['nama_operator'],
            "telepon_operator" => $request['telepon_operator'],
            "email_operator" => $request['email_operator'],
            "letak_sekolah" => $request['letak_sekolah'],
            "file_peta_lokasi" => $request['file_peta_lokasi'] ? request()->file('file_peta_lokasi')->store('daftar/sekolah') : null,
            "file_foto_sekolah" => $request['file_foto_sekolah'] ? request()->file('file_foto_sekolah')->store('daftar/sekolah') : null,
            "luas_total" => $request['luas_total'],
            "file_masterplan" => $request['file_masterplan'] ? request()->file('file_masterplan')->store('daftar/sekolah') : null,
            "luas_area" => $request['luas_area'],
            "file_luas_area" => $request['file_luas_area'] ? request()->file('file_luas_area')->store('daftar/sekolah') : null,
            "luas_area_hijau" => $request['luas_area_hijau'],
            "file_luas_area_hijau" => $request['file_luas_area_hijau'] ? request()->file('file_luas_area_hijau')->store('daftar/sekolah') : null,
            "jumlah_guru" => $request['jumlah_guru'],
            "file_guru_karyawan" => $request['file_guru_karyawan'] ? request()->file('file_guru_karyawan')->store('daftar/sekolah') : null,
            "jumlah_siswa" => $request['jumlah_siswa'],
            "file_jumlah_siswa" => $request['file_jumlah_siswa'] ? request()->file('file_jumlah_siswa')->store('daftar/sekolah') : null,
        ]);

        return view('auth.success')->with('success', 'Pendaftaran berhasil dilakukan, silahkan tunggu email kami setelah diverifikasi untuk melakukan login');
    }

    public function downloadLampiran($id, $i)
    {
        $lampiran = Sekolah::where('id', $id)->first();
        $path = $lampiran->$i;
        $ext = File::extension($path);
        $filename = $i . ' ' . $lampiran->nama_sekolah.'.'.$ext;
        return Storage::download($path, $filename);
    }

    public function setStatus($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->is_confirmed = 1;
        $sekolah->save();

        // dd($sekolah);

        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 6);

        $user = User::create([
            'id_sekolah' => $sekolah->id,
            'id_periode' => Auth::user()->id_periode,
            'name' => $sekolah->nama_sekolah,
            'email' => $sekolah->email_operator,
            'password' => Hash::make($password),
        ]);

        $user->assignRole('operator sekolah');

        // Mail::to($sekolah->email_operator)->send(new PostMail($sekolah->nama_sekolah, $sekolah->npsn, $sekolah->email_operator, $password));
        $response = Http::withBasicAuth('webmipa', 'k4cangg0r3ngr3ny4h')
                    ->withHeaders([
                        'Content-Type' => 'application/json',
                    ])
                    ->post('https://services.unnes.ac.id/api/sendemail', [
                        'recipient_name' => $sekolah->nama_sekolah,
                        'subject' => 'Verifikasi Berkas Pendaftaran GSR UNNES',
                        'title' => 'Verifikasi Berkas Pendaftaran GSR UNNES',
                        'content' => "<h2>Selamat, akun anda telah berhasil diverifikasi</h2>
                        <h4>Berikut ini adalah data akun anda</h4>
                        <table>
                            <tr>
                                <td >Nama Sekolah</td>
                                <td>{$sekolah->nama_sekolah}</td>
                            </tr>
                            <tr>
                                <td>NPSN</td>
                                <td>{$sekolah->npsn}</td>
                            </tr>
                            <tr>
                                <td><p>Email Operator                       </p></td>
                                <td>{$sekolah->email_operator}</td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>{$password}</td>
                            </tr>
                        </table>
                        <p>Anda dapat login ke Sistem GSR dengan menggunakan email dan password diatas</p>",
                        'email' => $sekolah->email_operator
                    ]);

        return redirect()->route('user');
    }

    public function sendEmail($id)
    {
        $sekolah = Sekolah::findOrFail($id);

        $random = str_shuffle('abcdefghjklmnopqrstuvwxyzABCDEFGHJKLMNOPQRSTUVWXYZ234567890!$%^&!$%^&');
        $password = substr($random, 0, 6);

        $user = User::where('id_sekolah', $id)->first();
        // dd($user);
        $user->update([
            'password' => Hash::make($password)
        ]);

        // Mail::to($sekolah->email_operator)->send(new PostMail($sekolah->nama_sekolah, $sekolah->npsn, $sekolah->email_operator, $password));
        $response = Http::withBasicAuth('webmipa', 'k4cangg0r3ngr3ny4h')
                    ->withHeaders([
                        'Content-Type' => 'application/json',
                    ])
                    ->post('https://services.unnes.ac.id/api/sendemail', [
                        'recipient_name' => $sekolah->nama_sekolah,
                        'subject' => 'Verifikasi Berkas Pendaftaran GSR UNNES',
                        'title' => 'Verifikasi Berkas Pendaftaran GSR UNNES',
                        'content' => "<h2>Selamat, akun anda telah berhasil diverifikasi</h2>
                        <h4>Berikut ini adalah data akun anda</h4>
                        <table>
                            <tr>
                                <td >Nama Sekolah</td>
                                <td>{$sekolah->nama_sekolah}</td>
                            </tr>
                            <tr>
                                <td>NPSN</td>
                                <td>{$sekolah->npsn}</td>
                            </tr>
                            <tr>
                                <td><p>Email Operator                       </p></td>
                                <td>{$sekolah->email_operator}</td>
                            </tr>
                            <tr>
                                <td>Password</td>
                                <td>{$password}</td>
                            </tr>
                        </table>
                        <p>Anda dapat login ke Sistem GSR dengan menggunakan email dan password diatas</p>",
                        'email' => $sekolah->email_operator
                    ]);



        return redirect()->route('user');
    }

    public function destroy($id)
    {
        $sekolah = Sekolah::findOrFail($id);
        $sekolah->delete();
    }
}
