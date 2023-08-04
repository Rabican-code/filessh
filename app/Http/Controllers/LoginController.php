<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function _invoke(Request $request) {
    if(!auth()->attempt(['email'=>$request->email, 'password'=>$request-›password])){
    return response()->json(['error'=>'try again'],401);
    }
}
}
