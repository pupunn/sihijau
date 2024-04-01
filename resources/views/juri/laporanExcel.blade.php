@php
use App\Models\Nilai;
@endphp

<table>
    <thead>
        <tr>
            <th>Nomor</th>
            <th>ID Sekolah</th>
            <th>Nama Sekolah</th>
            @for ($i = 1; $i <= $jml_aspek; $i++)
                @foreach (${'aspek'.$i} as $aspek)
                <th> {{ $aspek->nama_aspek }} </th>
                <th> NJ{{ $aspek->nama_aspek }} </th>
                @endforeach
            @endfor
                {{-- <th>{{ $aspek1->nama_aspek }}</th> --}}
            <th>Total</th>
            <th>NJTotal</th>
            <th>Nilai Maksimal</th>
            <th>Persen</th>
            <th>NJPersen</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($sekolah as $no => $skl)
        @for ($k = 1; $k <= $jml_aspek; $k++) @php ${'nil_'.$k}=0; ${'njnil_'.$k}=0; @endphp @endfor @php $nil_total=0; $nil_max=240; $njnil_total=0; $njnil_max=240;
            @endphp <tr>
            <td>{{ $no+1 }}</td>
            <td>{{ $skl->id }}</td>
            <td>{{ $skl->nama_sekolah }}</td>
            @php

            for ($j=1; $j <= $jml_aspek; $j++) { foreach (${'indikator'.$j} as $ind) { foreach
                (Nilai::where('id_sekolah', $skl->id)->where('tahun', date("Y"))->where('id_indikator', $ind->id_indikator)->get() as ${'nilai'.$j})
                    {
                        ${'nil_'.$j} +=${'nilai'.$j}->nilai;
                        ${'njnil_'.$j} +=${'nilai'.$j}->nilai_juri;
                    }
                }
            }
            @endphp
                @for ($j = 1; $j <= $jml_aspek; $j++)
                <?php if($j==2){
                    // continue;
                } ?>
                    <td>{{ ${'nil_'.$j} }}</td>
                    <td>{{ ${'njnil_'.$j} }}</td>
                    @php
                    $nil_total += ${'nil_'.$j};
                    $njnil_total += ${'njnil_'.$j};
                    @endphp
                @endfor
                    <td>{{ $nil_total }}</td>
                    <td>{{ $njnil_total }}</td>
                    <td>{{ $nil_max }}</td>
                    @php
                    $persen = round(($nil_total/$nil_max)*100,2);
                    $per = round(($njnil_total/$njnil_max)*100,2);
                    @endphp
                    <td>{{ $persen }}%</td>
                    <td>{{ $per }}%</td>
                    </tr>
                @endforeach
    </tbody>
</table>
