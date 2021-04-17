<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function __invoke()
    {
        $user = Auth::user();
        if ($user->hasRole('admin')) {
            return redirect('/admin');
        } else if ($user->hasRole('juri')) {
            return redirect('/juri');
        } else if ($user->hasRole('operator sekolah')) {
            return redirect('/sekolah');
        }
        // $user = User::role('juri')->get();
        // dd($user);
        // return view('home');
    }
}
