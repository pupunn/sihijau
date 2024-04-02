<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <title></title>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td,
        th {
            border: 1px solid #455a64;
            text-align: left;
            padding: 3px;
            font-size: 14px
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }

        .aspek {
            background: #ffab00;
            font-size: 18px;
            font-weight: bold;
        }

        .center {
            text-align: center;
        }
    </style>

</head>

<body>
    @php
    $nilai_total = 0;
    $nilai_total_juri = 0;
    @endphp
    <section class="content">
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="box">
                    <div class="box-header">
                        <center>
                            <h2>Rekap GSR</h2>
                        </center>
                        <h3 class="box-title">Periode: {{ Auth::user()->periode->nama }} <br> Sekolah :
                            {{ $sekolah->nama_sekolah }}</h3>
                    </div>
                    <table>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Indikator</th>
                            <th colspan="4">Kriteria Penilaian</th>
                            <th style="background: #26c6da">Nilai Awal</th>
                            <th>Juri</th>
                            <th>Ket</th>
                        </tr>
                        @for ($j = 1; $j <= $jml_aspek; $j++) <tr class="table-info">
                            @if ($j == 1)
                            <td class="aspek">{{ $j }}.</td>
                            <td class="aspek">
                                @foreach (${'aspek'.$j} as $aspek)
                                {{ $aspek->nama_aspek }}
                                @endforeach
                            </td>
                            <td class="aspek center">1</td>
                            <td class="aspek center">2</td>
                            <td class="aspek center">3</td>
                            <td class="aspek center">4</td>
                            <td class="aspek" colspan="3"></td>
                            @else
                            <td class="aspek">{{ $j}}.</td>
                            <td class="aspek" colspan="9">
                                @foreach (${'aspek'.$j} as $aspek)
                                {{ $aspek->nama_aspek }}
                                @endforeach
                            </td>
                            @endif
                            </tr>
                            @foreach (${'indikator'.$j} as $i)
                            <tr>
                                <td>{{ $i->urutan }}</td>
                                <td>{{ $i->nama_indikator }}</td>
                                @php
                                $data_a = $kriteria_penilaian->where('id_indikator', $i->id_indikator);
                                @endphp
                                @foreach ($data_a as $kr)
                                @php
                                $n = $nilai->where('id_indikator', $i->id_indikator)->first();
                                @endphp
                                @if (isset($n))
                                @if ($n->nilai == $kr->bobot)
                                <td style="background: #64dd17"><strong>{{ $kr->kriteria }}</strong></td>
                                @else
                                <td style="font-size: small">{{ $kr->kriteria }}</td>
                                @endif
                                @else
                                <td style="font-size: small">{{ $kr->kriteria }}</td>
                                @endif
                                @endforeach
                                @if ($data_a->count()<4) {{ $span=4 - $data_a->count() }} <td colspan="{{ $span }}">
                                    </td>
                                    @endif
                                    @php
                                    $nil = $nilai->where('id_indikator', $i->id_indikator)->first();
                                    @endphp
                                    @if (isset($nil))
                                    {{ $nilai_total = $nilai_total + $nil->nilai }}
                                    <td style="background: #26c6da">
                                        <center><strong>{{ $nil->nilai }}</strong></center>
                                    </td>
                                    @else
                                    <td style="background: #26c6da">-</td>
                                    @endif
                                    @php
                                    $nil_juri = $nilai->where('id_indikator', $i->id_indikator)->first();
                                    @endphp
                                    @if (isset($nil_juri))
                                    {{ $nilai_total_juri = $nilai_total_juri + $nil_juri->nilai_juri }}
                                    @if ($nil->nilai == $nil_juri->nilai_juri)
                                    <td>
                                        <center><strong>{{ $nil_juri->nilai_juri }}</strong></center>
                                    </td>
                                    @else
                                    <td style="background: #ffab00">
                                        <center><strong>{{ $nil_juri->nilai_juri }}</strong></center>
                                    </td>
                                    @endif
                                    @else
                                    <td style="background: #26c6da">-</td>
                                    @endif
                                    <td></td>
                            </tr>
                            @endforeach
                            @endfor
                            <tr>
                                <td>#</td>
                                <td colspan="5">
                                    <h3>Total Nilai</h3>
                                </td>
                                <td style="background: #26c6da">
                                    <center><b>{{ $nilai_total }}</b></center>
                                </td>
                                <td style="background: #ffab00">
                                    <center><b>{{ $nilai_total_juri }}</b></center>
                                </td>
                                <td></td>
                            </tr>
                    </table>
                    <div class="box-body">
                        <p>&nbsp;</p>
                        <table>
                            <tr>
                                <td colspan="2">Semarang, .................................., 20...........</td>
                            </tr>
                            <tr>
                                <td>Mengetahui, <br>
                                    Juri 1
                                    <h1>&nbsp;</h1>
                                    <p>&nbsp;</p>
                                    (..................................)
                                </td>
                                <td>
                                    Juri 2
                                    <h1>&nbsp;</h1>
                                    <p>&nbsp;</p>
                                    (..................................)
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
