@foreach ($sekolah as $i => $skl)
<div class="modal bs-example-modal-lg fade" id="modal_lihat_sekolah{{ $skl->id }}" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Lihat Sekolah : {{ $skl->nama_sekolah }}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>NPSN</th>
                        <td>{{ $skl->npsn }}</td>
                    </tr>
                    <tr>
                        <th>Nama Sekolah</th>
                        <td>{{ $skl->nama_sekolah }}</td>
                    </tr>
                    <tr>
                        <th>Alamat Sekolah</th>
                        <td>{{ $skl->alamat_sekolah }}</td>
                    </tr>
                    <tr>
                        <th>Nama Operator Sekolah</th>
                        <td>{{ $skl->nama_operator }}</td>
                    </tr>
                    <tr>
                        <th>Telp Operator Sekolah</th>
                        <td>{{ $skl->telepon_operator }}</td>
                    </tr>
                    <tr>
                        <th>Email Operator Sekolah</th>
                        <td>{{ $skl->email_operator }}</td>
                    </tr>
                    <tr>
                        <th>Letak Sekolah</th>
                        <td>{{ $skl->letak_sekolah == 1 ? 'Pusat Kota' : ($skl->letak_sekolah == 2 ? 'Tepi Kota' : 'Pedesaan')  }}
                        </td>
                    </tr>
                    <tr>
                        <th>Luas Total</th>
                        <td>{{ $skl->luas_total }} m<sup>2</sup></td>
                    </tr>
                    <tr>
                        <th>Luas Area</th>
                        <td>{{ $skl->luas_area }} m<sup>2</sup></td>
                    </tr>
                    <tr>
                        <th>Luas Area Hijau</th>
                        <td>{{ $skl->luas_area_hijau }} m<sup>2</sup></td>
                    </tr>
                    <tr>
                        <th>Jumlah Guru dan Karyawan</th>
                        <td>{{ $skl->jumlah_guru }} orang</td>
                    </tr>
                    <tr>
                        <th>Jumlah Siswa</th>
                        <td>{{ $skl->jumlah_siswa }} orang</td>
                    </tr>
                    <tr>
                        <th>Keterangan Pendukung</th>
                        <td>
                            <table class="table table-bordered">
                                <tr>
                                    <td>Sertifikat NPSN</td>
                                    <td>
                                        <a href="{{ route('download.lampiran',[$skl->id, 'file_npsn']) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-download"></i> Unduh
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Peta Lokasi</td>
                                    <td>
                                        <a href="{{ route('download.lampiran',[$skl->id, 'file_peta_lokasi']) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-download"></i> Unduh
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Foto Sekolah</td>
                                    <td>
                                        <a href="{{ route('download.lampiran',[$skl->id, 'file_foto_sekolah']) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-download"></i> Unduh
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Masterplan Sekolah</td>
                                    <td>
                                        <a href="{{ route('download.lampiran',[$skl->id, 'file_masterplan']) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-download"></i> Unduh
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Daftar Tabel Luas Bangunan</td>
                                    <td>
                                        <a href="{{ route('download.lampiran',[$skl->id, 'file_luas_area']) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-download"></i> Unduh
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Daftar Tabel Luas Area Terbuka</td>
                                    <td>
                                        <a href="{{ route('download.lampiran',[$skl->id, 'file_luas_area_hijau']) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-download"></i> Unduh
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Daftar Guru dan Karyawan</td>
                                    <td>
                                        <a href="{{ route('download.lampiran',[$skl->id, 'file_guru_karyawan']) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-download"></i> Unduh
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Daftar Siswa</td>
                                    <td>
                                        <a href="{{ route('download.lampiran',[$skl->id, 'file_jumlah_siswa']) }}"
                                            class="btn btn-info btn-sm">
                                            <i class="fa fa-download"></i> Unduh
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer modal-footer-uniform">
                <button type="button" class="btn btn-bold btn-pure btn-secondary" data-dismiss="modal">Kembali</button>
                @if ($skl->is_confirmed == 0)
                <a href="{{ route('sekolah.setStatus', $skl->id) }}"
                    class="btn btn-bold btn-pure btn-primary float-right"><i class="fa fa-check"></i> Verifikasi</a>
                @else
                <a href="{{ route('sekolah.sendEmail', $skl->id) }}"
                    class="btn btn-bold btn-pure btn-primary float-right"><i class="fa fa-mail"></i> Kirim
                    Ulang Email </a>
                @endif
            </div>
            </form>
        </div>
    </div>
</div>

@endforeach
