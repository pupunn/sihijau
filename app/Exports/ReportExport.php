<?php

namespace App\Exports;

use App\Models\Aspek;
use App\Models\Sekolah;
use App\Models\Indikator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        $sekolah = Sekolah::orderBy('id', 'asc')->get();
        $jml_aspek = Aspek::count();
        for ($i = 1; $i <= 6; $i++) {
            ${'aspek' . $i} = Aspek::where('id_aspek', $i)->get();
            ${'indikator' . $i} = Indikator::where('id_aspek', $i)->where('id_periode', Auth::user()->id_periode)->where('is_visible', 1)->get();
        }

        return view('juri.laporanExcel', compact('sekolah', 'indikator1', 'indikator2', 'indikator3', 'indikator4', 'indikator5', 'indikator6', 'jml_aspek', 'aspek1', 'aspek2', 'aspek3', 'aspek4', 'aspek5', 'aspek6'));
    }
}
