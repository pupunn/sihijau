@php
use App\Models\Bukti;
@endphp

@php $number = 0; @endphp
@foreach ($bukti as $isiBukti)
@php $number++ @endphp
{{ $number }} {{ $isiBukti->path }} <br>

@endforeach
