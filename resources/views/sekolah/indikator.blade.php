@extends('layouts.sekolah')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">{{ $aspek->nama_aspek }}</strong>
                {{-- <button type="button" name="add_indikator" data-toggle="modal" data-target="#modal_add_indikator"
                    class="btn btn-success pull-right btn-sm"><i class="fa fa-plus"></i> Tambah Indikator </button> --}}
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table" id="tbl-indikator">
                    <thead>
                        <tr>
                            <th style="width: 10px" class="serial">#</th>
                            <th>Indikator</th>
                            <th>Isian</th>
                            <th>Action</th>
                            <th>Bukti</th>
                            <th>Template</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indikator as $i)
                        <tr>
                            <td class="serial">{{ $i->urutan }}.</td>
                            <td>{{ $i->nama_indikator }} ({{ $i->satuan->simbol }})</td>
                            <td>
                                @foreach ($kriteria->where('id_indikator', $i->id_indikator) as $kr)
                                @php
                                $n = $nilai->where('id_indikator', $i->id_indikator)->first();
                                @endphp
                                @if (isset($n))
                                @if ($n->nilai == $kr->bobot)
                                <label id="isi_{{ $i->id_indikator }}"> {{ $kr->kriteria }} </label>
                                @endif
                                @else
                                <label id="isi_{{ $i->id_indikator }}"> </label>
                                @endif
                                @endforeach
                            </td>
                            <td>
                                @php
                                $bkt = $bukti->where('id_indikator', $i->id_indikator)->first();
                                @endphp
                                @if (date('Ymd') > Auth::user()->periode->date_close OR $i->is_pilihan == '0')
                                @php
                                $nil = $nilai->where('id_indikator', $i->id_indikator)->first();
                                @endphp
                                @if (isset($nil))
                                <button class="btn btn-success btn-sm" type="button" data-toggle="modal"
                                    data-target="#modal-indikator{{ $i->id_indikator }}"
                                    id="btn_{{ $i->id_indikator }}"><i class="fa fa-edit"></i> Lihat </button>
                                @else
                                <button class="btn btn-danger btn-sm" type="button" data-toggle="modal"
                                    data-target="#modal-indikator{{ $i->id_indikator }}"
                                    id="btn_{{ $i->id_indikator }}"><i class="fa fa-pencil"></i> Belum Isi </button>
                                @endif
                                @else
                                @php
                                $nil = $nilai->where('id_indikator', $i->id_indikator)->first();
                                @endphp
                                @if (isset($nil))
                                <button class="btn btn-success btn-sm" type="button" data-toggle="modal"
                                    data-target="#modal-indikator{{ $i->id_indikator }}"
                                    id="btn_{{ $i->id_indikator }}"><i class="fa fa-edit"></i> Edit </button>
                                @else
                                <button class="btn btn-danger btn-sm" type="button" data-toggle="modal"
                                    data-target="#modal-indikator{{ $i->id_indikator }}"
                                    id="btn_{{ $i->id_indikator }}"><i class="fa fa-pencil"></i> Belum Isi </button>
                                @endif
                                @endif
                            </td>
                            <td id="tbl-check-{{ $i->id_indikator }}">
                                @if (isset($bkt))
                                <a href="{{ route('download.lampiran', $bkt->id_bukti) }}" class="btn btn-sm
                                btn-info">
                                    <i class="fa fa-check"></i>
                                </a>
                                @else
                                <center><span class="badge badge-danger"> - </span></center>
                                @endif
                            </td>
                            @if ($i->is_pilihan != '0')
                            <td>
                                <a href="{{ route('download.template', $i->id_indikator) }}"
                                    class="btn btn-sm btn-info">
                                    <i class="fa fa-download"></i> Unduh Template
                                </a>
                            </td>
                            @else
                            <td>Pending</td>
                            @endif
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
@if (date('Ymd') > Auth::user()->periode->date_close)
@include('sekolah.modal_indikator')
@else
@include('sekolah.modal_indikator')
@endif
@endpush
