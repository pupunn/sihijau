@extends('layouts.juri')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Peserta GSR</strong>
                {{-- <button type="button" data-toggle="modal" data-target="#modal_add_aspek"
                    class="btn btn-success pull-right btn-sm"><i class="fa fa-plus"></i> Tambah Aspek </button> --}}
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table " id="tbl-sekolah">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Peserta</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sekolah as $no => $skl)
                        <tr>
                            <td class="serial">{{ $no+1 }}.</td>
                            <td>{{ $skl->nama_sekolah }} </td>
                            <td>
                                {{-- <a href="#" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i> Isi Penjurian
                                </a> --}}
                                {{-- <a href="#" class="btn btn-success btn-sm"><i class="fa fa-download"></i> Unduh Rekap
                                </a> --}}
                                {{-- <a href="#" class="btn btn-info btn-sm"><i class="fa fa-download"></i> Unduh Bukti </a> --}}
                                <a href="{{ route('juri.detail', $skl->id) }}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-pencil"></i> Isi Penjurian </a>
                                <a href="{{ route('juri.download.rekap', $skl->id) }}" class="btn btn-success
                                btn-sm"><i class="fa fa-download"></i> Unduh Rekap </a>
                                {{-- <a href="{{ route('juri.download.buktiZip', $skl->id) }}" class="btn btn-info
                                btn-sm"><i class="fa fa-download"></i> Unduh Bukti </a> --}}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div>
</div>


@endsection
