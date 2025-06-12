<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use Auth;
use App\Models\User;
use App\Models\Rank;
use App\Models\Welfare;
use App\Models\Regement;
use App\Models\Unit;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if (Auth::user()->role == 0) {
        return view('user.dashboard');
    } else if (Auth::user()->role == 1) {
        $userCount = User::count();
        $rankCount = Rank::count();
        $welfareCount =Welfare::count();
        $regementCount = Regement::count();
        $unitCount = Unit::count();
        return view('admin.dashboard', compact('userCount', 'rankCount', 'welfareCount', 'regementCount', 'unitCount'));			
    } else if (Auth::user()->role == 2) {
        return view('unitclerk.dashboard');
    } else if (Auth::user()->role == 3) {
        return view('unitoc.dashboard');
    } else if (Auth::user()->role == 4) {
        return view('shopcoordclerk.dashboard');
    } else if (Auth::user()->role == 5) {
        return view('shopcoordoc.dashboard');
    } else if (Auth::user()->role == 6) {
        return view('welfareshopclerk.dashboard');
    } else if (Auth::user()->role == 7) {
        return view('welfareshopoc.dashboard');
    } else if (Auth::user()->role == 8) {
        return view('ledgerclerk.dashboard');
    } else if (Auth::user()->role == 9) {
        return view('ledgeroc.dashboard');
    }
    }

}
