<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SekolahRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "npsn" => ['required', 'integer'],
            "file_npsn" => ['required', 'mimes:doc,pdf,docx', 'file', 'max:2048'],
            "nama_sekolah" => ['required', 'string', 'max:255'],
            "alamat_sekolah" => ['required', 'string', 'max:255'],
            "nama_operator" => ['required', 'string', 'max:255'],
            "telepon_operator" => ['required', 'string'],
            "email_operator" => ['required', 'string', 'email', 'max:255', 'unique:sekolah'],
            "letak_sekolah" => ['required'],
            "file_peta_lokasi" => ['required', 'mimes:doc,pdf,docx', 'file', 'max:2048'],
            "file_foto_sekolah" => ['required', 'mimes:doc,pdf,docx', 'file', 'max:2048'],
            "luas_total"  => ['required', 'integer'],
            "file_masterplan" => ['required', 'mimes:doc,pdf,docx', 'file', 'max:2048'],
            "luas_area"  => ['required', 'integer'],
            "file_luas_area" => ['required', 'mimes:doc,pdf,docx', 'file', 'max:2048'],
            "luas_area_hijau"  => ['required', 'integer'],
            "file_luas_area_hijau" => ['required', 'mimes:doc,pdf,docx', 'file', 'max:2048'],
            "jumlah_guru"  => ['required', 'integer'],
            "file_guru_karyawan" => ['required', 'mimes:doc,pdf,docx', 'file', 'max:2048'],
            "jumlah_siswa"  => ['required', 'integer'],
            "file_jumlah_siswa" => ['required', 'mimes:doc,pdf,docx', 'file', 'max:2048'],
        ];
    }
}
