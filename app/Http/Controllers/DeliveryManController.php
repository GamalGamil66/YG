<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDeliveryMan;
use App\Models\DeliveryMan;
use App\Repository\DeliveryRepositoryInterface;
use Illuminate\Http\Request;

class DeliveryManController extends Controller
{
    protected $DeliveryMan;

    public function __construct(DeliveryRepositoryInterface $DeliveryMan)
    {
        $this->DeliveryMan = $DeliveryMan;
    }

    public function index()
    {
        $DeliveryMen = DeliveryMan::all();
        //$DeliveryMan = DeliveryMan::all(); 
        return view('pages.Delivery_man.Delivery_man',compact('DeliveryMen'));
    }

    public function create()
    {
        return view('pages.Delivery_man.create');
    }


    public function store(StoreDeliveryMan $request)
    {
        return $this->DeliveryMan->StoreDeliveryMan($request);
    }


    public function show($id)
    {

    }


    public function edit($id)
    {
        $DeliveryMen = $this->DeliveryMan->editDeliveryMan($id);
        return view('pages.Delivery_man.Edit',compact('DeliveryMen'));
    }


    public function update(Request $request)
    {
        return $this->DeliveryMan->UpdateDeliveryMan($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->DeliveryMan->DeleteDeliveryMan($request);
    }
}
