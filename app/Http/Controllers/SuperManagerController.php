<?php

namespace App\Http\Controllers;

use App\Models\SuperManager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuperManagerController extends Controller
{
    public function authenticate(Request $request) {

        $this->validate($request,[
            'ssn' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('super_manager')->attempt(['ssn' => $request->ssn, 'password' => $request->password],$request->get('remember'))) {

            return redirect()->route('super_manager.dashboard');

        } else {
            session()->flash('error','Either SSN or Password is incorrect');
            return back()->withInput($request->only('ssn'));
        }

    }

    public function logout() {
        Auth::guard('super_manager')->logout();
        return redirect()->route('super_manager.login');
    }
}
