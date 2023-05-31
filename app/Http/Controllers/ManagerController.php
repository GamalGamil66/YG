<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreManager;
use App\Repository\ManagerRepositoryInterface;
use Illuminate\Http\Request;

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
}
