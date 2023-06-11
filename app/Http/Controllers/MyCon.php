<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyCon extends Controller
{
    public function authenticate(Request $request) {

        $this->validate($request,[
            'ssn' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('my_controller')->attempt(['ssn' => $request->ssn, 'password' => $request->password],$request->get('remember'))) {

            return redirect()->route('my_controller.dashboard');

        } else {
            session()->flash('error','Either SSN/Password is incorrect');
            return back()->withInput($request->only('ssn'));
        }

    }

    public function logout() {
        Auth::guard('my_controller')->logout();
        return redirect()->route('my_controller.login');
    }
}
