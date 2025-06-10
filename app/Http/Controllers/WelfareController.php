<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelfareController extends Controller
{
     public function show(){
        return view('admin.welfare.welfare_show');
    }
}
