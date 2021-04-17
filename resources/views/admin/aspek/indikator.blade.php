@extends('layouts.admin')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Indikator</strong>
                <button type="button" name="add_indikator" data-toggle="modal" data-target="#modal_add_indikator"
                    class="btn btn-success pull-right btn-sm"><i class="fa fa-plus"></i> Tambah Indikator </button>
                <button type="button" id="btn_satuan" data-toggle="modal" data-target="#modal_satuan"
                    class="btn btn-info btn-sm pull-right mx-2"><i class="fa fa-info"></i> Kelola Satuan </button>
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table" id="tbl-indikator">
                    <thead>
                        <tr>
                            <th style="width: 10px" class="serial">#</th>
                            <th>Indikator</th>
                            <th>Aspek</th>
                            <th>Periode</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indikator as $i)
                        <tr>
                            <td class="serial">{{ $i->urutan }}.</td>
                            <td>{{ $i->nama_indikator }} </td>
                            <td>{{ $i->aspek->nama_aspek }}</td>
                            <td>{{ $i->periode->nama }}</td>
                            <td>
                                @if ($i->template == null)
                                <button type="button" data-toggle="modal" data-target="#modal_edit{{$i->id_indikator}}"
                                    class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</button>
                                <button type="button" id="btn_template{{$i->id_indikator}}" data-toggle="modal"
                                    data-target="#modal_template{{$i->id_indikator}}" class="btn btn-info btn-sm"><i
                                        class="fa fa-upload"></i> Unggah
                                    Template</button>
                                @else
                                <button type="button" name="edit" data-toggle="modal"
                                    data-target="#modal_edit{{$i->id_indikator}}" class="btn btn-primary btn-sm"><i
                                        class="fa fa-edit"></i> Edit</button>
                                <button type="button" id="btn_template{{$i->id_indikator}}" data-toggle="modal"
                                    data-target="#modal_template{{$i->id_indikator}}" class="btn btn-info btn-sm"><i
                                        class="fa fa-edit"></i> Edit
                                    Template</button>
                                @endif
                                <button type="button" id="btn_kriteria{{$i->id_indikator}}" data-toggle="modal"
                                    data-target="#modal_kriteria{{$i->id_indikator}}" class="btn btn-success btn-sm"><i
                                        class="fa fa-pencil"></i> Edit Kriteria </button>
                                <div endpoint="{{ route('admin.delete.indikator', $i->id_indikator) }}"
                                    class="delete d-inline"></div>

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
@include('admin.aspek.modal_indikator')
@include('admin.aspek.modal_edit')
@include('admin.aspek.modal_template')
@include('admin.aspek.modal_kriteria')
@include('admin.aspek.modal_satuan')
@endpush
