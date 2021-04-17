<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Aspek;
use App\Models\Sekolah;
use App\Models\Indikator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function admin()
    {
        $sekolah = Sekolah::count();
        $aspek = Aspek::count();
        $indikator = Indikator::count();
        $user = Auth::user();
        $sekolahs = Sekolah::orderBy('id', 'DESC')->take(5)->get();
        return view('admin.dashboard', compact('sekolah', 'aspek', 'indikator', 'user', 'sekolahs'));
    }

    public function juri()
    {
        $sekolah = Sekolah::count();
        $aspek = Aspek::count();
        $indikator = Indikator::count();
        $user = Auth::user();
        return view('juri.dashboard', compact('sekolah', 'aspek', 'indikator', 'user'));
    }

    public function sekolah()
    {
        $sekolah = Sekolah::count();
        $aspek = Aspek::count();
        $aspeks = Aspek::all();
        $indikator = Indikator::count();
        $user = Auth::user();
        return view('sekolah.dashboard', compact('sekolah', 'aspek', 'aspeks', 'indikator', 'user'));
    }
}
