@extends('layouts.juri')

@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <strong class="card-title">Isi Penilaian : {{ $sekolah->nama_sekolah }}</strong>
                {{-- <button type="button" data-toggle="modal" data-target="#modal_add_aspek"
                    class="btn btn-success pull-right btn-sm"><i class="fa fa-plus"></i> Tambah Aspek </button> --}}
            </div>
            <div class="table-stats order-table ov-h">
                <table class="table " id="tbl-sekolah">
                    <thead>
                        <tr>
                            <th class="serial">#</th>
                            <th>Indikator</th>
                            <th colspan="4">Kriteria Penilaian <br>(Bobot)</th>
                            <th class="table-success">Nilai Awal</th>
                            <th class="table-success">Nilai Juri</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @for ($i = 1; $i <= $jml_aspek; $i++) <tr class="table-info">
                            <td></td>
                            <td>
                                @foreach (${'aspek'.$i} as $aspek)
                                {{ $aspek->nama_aspek }}
                                @endforeach
                            </td>
                            <td>1</td>
                            <td>2</td>
                            <td>3</td>
                            <td>4</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            </tr>
                            @foreach (${'indikator'. $i} as $indikator)
                            <tr>
                                <td class="serial">{{ $indikator->urutan }}</td>
                                <td>{{ $indikator->nama_indikator }} </td>
                                @php $data_a = $kriteria_penilaian->where('id_indikator', $indikator->id_indikator);
                                @endphp
                                @foreach ($data_a as $kr)
                                @php $n = $nilai->where('id_indikator', $indikator->id_indikator)->first(); @endphp
                                @if (isset($n))
                                @if ($n->nilai == $kr->bobot)
                                <td class="table-primary">{{ $kr->kriteria }}</td>
                                @else
                                <td>{{ $kr->kriteria }}</td>
                                @endif
                                @else
                                <td>{{ $kr->kriteria }}</td>
                                @endif
                                @endforeach
                                @if ($data_a->count()<4) @php $span=4 - $data_a->count(); @endphp <td
                                        colspan="{{ $span }}">
                                    </td>
                                    @endif
                                    @php $nil = $nilai->where('id_indikator', $indikator->id_indikator)->first();
                                    @endphp
                                    @if (isset($nil))
                                    <td class="table-success">{{ $nil->nilai }}</td>
                                    @if ($nil->nilai != $nil->nilai_juri)
                                    <td class="table-warning" id="nilaijuri_{{ $indikator->id_indikator }}">
                                        {{ $nil->nilai_juri }}</td>
                                    @else
                                    <td id="nilaijuri_{{ $indikator->id_indikator }}">{{ $nil->nilai_juri }}</td>
                                    @endif
                                    @else
                                    <td class="table-success"> -</td>
                                    <td id="nilaijuri_{{ $indikator->id_indikator }}"> -</td>
                                    @endif
                                    <td>
                                        @php $bkti = $bukti->where('id_indikator', $indikator->id_indikator)->first();
                                        @endphp
                                        @if (isset($bkti->id_bukti))
                                        <a href="{{ route('juri.download.lampiran', $bkti->id_bukti) }}"
                                            class="btn btn-success btn-sm"><i class="fa fa-download"></i>
                                            Bukti</a>
                                        @endif
                                        @if (isset($nil->nilai_juri))
                                        <button class="btn btn-success btn-sm" type="button" data-toggle="modal"
                                            id="btn_nilai{{ $indikator->id_indikator }}"
                                            data-target="#modal-nilai{{ $indikator->id_indikator }}"><i
                                                class="fa fa-pencil"></i> Nilai</button>
                                        @else
                                        <button class="btn btn-info btn-sm" type="button" data-toggle="modal"
                                            id="btn_nilai{{ $indikator->id_indikator }}"
                                            data-target="#modal-nilai{{ $indikator->id_indikator }}"><i
                                                class="fa fa-pencil"></i> Nilai </button>
                                        @endif
                                    </td>
                            </tr>
                            @endforeach
                            @endfor
                    </tbody>
                </table>
            </div> <!-- /.table-stats -->
        </div>
    </div>
</div>


@endsection

@push('local-script')
@include('juri.modal_nilai')
@endpush
