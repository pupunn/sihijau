<?php
namespace App;

use Auth;
use App\Unit;
use App\Nilai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ReportExport implements FromView
{
    public function view(): View
    {
        return view('juri.laporanExcel', [
			'units' => Unit::orderBy('urutan' ,'Asc')->get(),
			'indikator' => Indikator::where('id_aspek' , 1)->where('id_periode', Auth::user()->id_periode)->get(),
			'indikator2' => Indikator::where('id_aspek' , 2)->where('id_periode', Auth::user()->id_periode)->get(),
			'indikator3' => Indikator::where('id_aspek' , 3)->where('id_periode', Auth::user()->id_periode)->get(),
			'indikator4' => Indikator::where('id_aspek' , 4)->where('id_periode', Auth::user()->id_periode)->get()
        ]);
    }
}