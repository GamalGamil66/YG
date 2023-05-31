<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCitizen;
use App\Models\Citizen;
use App\Repository\CitizenRepositoryInterface;
use Illuminate\Http\Request;

class CitizenController extends Controller
{
    protected $Citizen;

    public function __construct(CitizenRepositoryInterface $Citizen)
    {
        $this->Citizen = $Citizen;
    }

    public function index()
    {
        $Citizens = $this->Citizen->getAllCitizen();
        //$Citizen = Citizen::all();
        return view('pages.Citizen.Citizen',compact('Citizens'));
    }

    public function create()
    {
        $Delegates = $this->Citizen->GetDelegates();
        return view('pages.Citizen.create',compact('Delegates'));
    }


    public function store(StoreCitizen $request)
    {
        return $this->Citizen->StoreCitizen($request);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $Citizens = $this->Citizen->editCitizen($id);
        $Delegates = $this->Citizen->GetDelegates();
        return view('pages.Citizen.Edit',compact('Citizens','Delegates'));
    }


    public function update(Request $request)
    {
        return $this->Citizen->UpdateCitizen($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Citizen->DeleteCitizen($request);
    }
}
