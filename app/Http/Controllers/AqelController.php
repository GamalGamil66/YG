<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAqel;
use App\Repository\AqelRepositoryInterface;
use Illuminate\Http\Request;

class AqelController extends Controller
{
    protected $Aqel;

    public function __construct(AqelRepositoryInterface $Aqel)
    {
        $this->Aqel = $Aqel;
    }

    public function index()
    {
        $Aqels = $this->Aqel->getAllAqel();
        //$Aqel = Aqel::all();
        return view('pages.Aqel.Aqel',compact('Aqels'));
    }

    public function create()
    {
        $Neighborhoods = $this->Aqel->GetNeighborhoods();
        return view('pages.Aqel.create',compact('Neighborhoods'));
    }


    public function store(StoreAqel $request)
    {
        return $this->Aqel->StoreAqel($request);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $Aqels = $this->Aqel->editAqel($id);
        $Neighborhoods = $this->Aqel->GetNeighborhoods();
        return view('pages.Aqel.Edit',compact('Aqels','Neighborhoods'));
    }


    public function update(Request $request)
    {
        return $this->Aqel->UpdateAqel($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Aqel->DeleteAqel($request);
    }
}
