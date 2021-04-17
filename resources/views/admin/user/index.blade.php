@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Kelola User Operator Sekolah</strong>
                <button type="button" name="add_indikator" data-toggle="modal" data-target="#modal_add_sekolah"
                    class="btn btn-success pull-right btn-sm"><i class="fa fa-plus"></i> Tambah</button>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table " id="tbl-sekolah">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Role</th>
                            <th>Instansi</th>
                            <th>Nama Operator</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sekolah as $no => $skl)
                        <tr>
                            <td class="serial">{{ $no+1 }}.</td>
                            <td>Sekolah </td>
                            <td>{{ $skl->nama_sekolah }}</td>
                            <td>{{ $skl->nama_operator }}</td>
                            <td class="text-lowercase">{{ $skl->email_operator }}</td>
                            <td>
                                @if ($skl->is_confirmed == 1)
                                <span class="badge badge-complete">Terverifikasi</span>
                                @else
                                <span class="badge badge-danger">Belum Tervirifikasi</span>
                                @endif
                            </td>
                            <td>
                                <button type="button" data-toggle="modal" data-target="#modal_lihat_sekolah{{$skl->id}}"
                                    class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> Lihat </button>
                                {{-- <button type="button" data-toggle="modal" data-target="#modal_edit_sekolah{{$skl->id}}"
                                class="btn btn-info btn-sm"><i class="fa fa-pencil"></i> Ubah </button> --}}
                                <div endpoint="{{ route('user.delete', $skl->id) }}" class="delete d-inline"></div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Kelola User Juri</strong>
                <button type="button" name="add_juri" data-toggle="modal" data-target="#modal_add_juri"
                    class="btn btn-success pull-right btn-sm"><i class="fa fa-plus"></i> Tambah </button>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table" id="tbl-juri">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Role</th>
                            <th>Nama Juri</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $no => $user)
                        <tr>
                            <td class="serial">{{ $no+1 }}.</td>
                            <td> Juri </td>
                            <td>{{ $user->name }}</td>
                            <td class="text-lowercase">{{ $user->email }}</td>
                            <td>
                                <div endpoint="{{ route('user.delete.juri', $user->id) }}" class="delete d-inline">
                                </div>
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

@push('local-script')
@include('admin.user.modal_sekolah')
@include('admin.user.modal_lihat_sekolah')
@include('admin.user.modal_juri')
{{-- @include('admin.user.modal_edit_sekolah') --}}
@endpush
