<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showReg1(){
        return view('reg1');
    }

    public function showReg2(){
        return view('reg2');
    }

    public function showReg3(){
        return view('reg3');
    }
}
