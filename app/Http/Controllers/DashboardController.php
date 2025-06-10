<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
Use Auth;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
    {
        if(Auth::user() ->role ==0)
            {  // $data['getRecoard'] = User::find(Auth::user()->id);
            return view ('user.dashboard');
            }
        else if(Auth::user() ->role ==1)
            {  // $data['getRecoard'] = User::find(Auth::user()->id);
            return view ('admin.dashboard');
            }
        else if(Auth::user() ->role ==2)
            {  // $data['getRecoard'] = User::find(Auth::user()->id);
            return view ('unitclerk.dashboard');
            }
        else if(Auth::user() ->role ==3)
            {  // $data['getRecoard'] = User::find(Auth::user()->id);
            return view ('unitoc.dashboard');
            }
        else if(Auth::user() ->role ==4)
            {  // $data['getRecoard'] = User::find(Auth::user()->id);
            return view ('shopcoordclerk.dashboard');
            }
        else if(Auth::user() ->role ==5)
            {  // $data['getRecoard'] = User::find(Auth::user()->id);
            return view ('shopcoordoc.dashboard');
            }
        else if(Auth::user() ->role ==6)
            {  // $data['getRecoard'] = User::find(Auth::user()->id);
            return view ('welfareshopclerk.dashboard');
            }
        else if(Auth::user() ->role ==7)
            {  // $data['getRecoard'] = User::find(Auth::user()->id);
            return view ('welfareshopoc.dashboard');
            }
        else if(Auth::user() ->role ==8)
            {  // $data['getRecoard'] = User::find(Auth::user()->id);
            return view ('ledgerclerk.dashboard');
            }
        else if(Auth::user() ->role ==9)
            {  // $data['getRecoard'] = User::find(Auth::user()->id);
            return view ('ledgeroc.dashboard');
            }
    }

}
