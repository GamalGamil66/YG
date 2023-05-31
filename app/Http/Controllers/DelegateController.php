<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDelegate;
use App\Models\Delegate;
use App\Repository\DelegateRepositoryInterface;
use Illuminate\Http\Request;

class DelegateController extends Controller
{
    protected $Delegate;

    public function __construct(DelegateRepositoryInterface $Delegate)
    {
        $this->Delegate = $Delegate;
    }

    public function index()
    {
        $Delegates = $this->Delegate->getAllDelegate();
        //$Delegate = Delegate::all();
        return view('pages.Delegate.Delegate',compact('Delegates'));
    }

    public function create()
    {
        $Aqels = $this->Delegate->GetAqels();
        return view('pages.Delegate.create',compact('Aqels'));
    }


    public function store(StoreDelegate $request)
    {
        return $this->Delegate->StoreDelegate($request);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $Delegates = $this->Delegate->editDelegate($id);
        $Aqels = $this->Delegate->GetAqels();
        return view('pages.Delegate.Edit',compact('Delegates','Aqels'));
    }


    public function update(Request $request)
    {
        return $this->Delegate->UpdateDelegate($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Delegate->DeleteDelegate($request);
    }
}
