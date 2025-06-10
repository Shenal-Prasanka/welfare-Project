<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;
use Str;


class AuthController extends Controller
{
    
    public function login()
    {
        return view('auth.login');
    }

    public function login_post(Request $request)
    {
       //dd($request->all());
       if(Auth::attempt(['email' => $request->email,'password'=>$request->password],true))
            {
                if(Auth::User()->role =='0')
                    {
                     return redirect()->intended('user/dashboard');
                    }
                else if(Auth::User()->role =='1')
                    {
                    return redirect()->intended('admin/dashboard');
                    }
                else if(Auth::User()->role =='2')
                    {
                     return redirect()->intended('unitclerk/dashboard');
                    }
                else if(Auth::User()->role =='3')
                    {
                     return redirect()->intended('unitoc/dashboard');
                    }
                else if(Auth::User()->role =='4')
                    {
                     return redirect()->intended('shopcoordclerk/dashboard');
                    }
                else if(Auth::User()->role =='5')
                    {
                     return redirect()->intended('shopcoordoc/dashboard');
                    }
                else if(Auth::User()->role =='6')
                    {
                     return redirect()->intended('welfareshopclerk/dashboard');
                    }
                else if(Auth::User()->role =='7')
                    {
                     return redirect()->intended('welfareshopoc/dashboard');
                    }
                else if(Auth::User()->role =='8')
                    {
                     return redirect()->intended('ledgerclerk/dashboard');
                    }
                else if(Auth::User()->role =='9')
                    {
                     return redirect()->intended('ledgeroc/dashboard');
                    }
                else
                    {
                    return redirect('login')->with('error','No Available Email ...Please check');
                    }
            }
       else
            {
                return redirect()->back()->with('error','Please enter the correct credentials');
            }
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Log out the user
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate the CSRF token

        return redirect('/login'); // Redirect to the login page
    }
}