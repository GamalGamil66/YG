<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManager;
use App\Repository\ManagerRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    protected $Manager;

    public function __construct(ManagerRepositoryInterface $Manager)
    {
        $this->Manager = $Manager;
    }

    public function index()
    {
        $Managers = $this->Manager->getAllManager();
        //$Manager = Manager::all();
        return view('pages.Manager.Manager',compact('Managers'));
    }

    public function create()
    {
        $Directorates = $this->Manager->GetDirectorates();
        return view('pages.Manager.create',compact('Directorates'));
    }


    public function store(StoreManager $request)
    {
        return $this->Manager->StoreManager($request);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $Managers = $this->Manager->editManager($id);
        $Directorates = $this->Manager->GetDirectorates();
        return view('pages.Manager.Edit',compact('Managers','Directorates'));
    }


    public function update(Request $request)
    {
        return $this->Manager->UpdateManager($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Manager->DeleteManager($request);
    }

    public function authenticate(Request $request) {

        $this->validate($request,[
            'ssn' => 'required',
            'password' => 'required'
        ]);

        if (Auth::guard('manager')->attempt(['ssn' => $request->ssn, 'password' => $request->password],$request->get('remember'))) {

            return redirect()->route('manager.dashboard');

        } else {
            session()->flash('error','Either SSN/Password is incorrect');
            return back()->withInput($request->only('ssn'));
        }

    }

    public function logout() {
        Auth::guard('manager')->logout();
        return redirect()->route('manager.login');
    }
}
