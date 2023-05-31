<?php

namespace App\Repository;

use App\Models\DeliveryMan;
use Exception;
use Illuminate\Support\Facades\Hash;

class DeliveryRepository implements DeliveryRepositoryInterface{

public function getAllDeliveryMan(){
    return DeliveryMan::all();
}

    public function StoreDeliveryMan($request){

    try {
            $DeliveryMan = new DeliveryMan();
            $DeliveryMan->ssn = $request->ssn;
            $DeliveryMan->password =  Hash::make($request->password);
            $DeliveryMan->name = $request->name;
            $DeliveryMan->phone_number = $request->phone_number;
            $DeliveryMan->manager_id = '1';//يتم اضافته من خلال ال اي دي تبع المدير
            $DeliveryMan->save();
            // toastr()->success(trans('messages.success'));
            return redirect()->route('DeliveryMan.create');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    public function editDeliveryMan($id)
    {
        return DeliveryMan::findOrFail($id);
    }


    public function UpdateDeliveryMan($request)
    {
        try {
            $DeliveryMan = DeliveryMan::findOrFail($request->id);
            $DeliveryMan->ssn = $request->ssn;
            $DeliveryMan->password =  Hash::make($request->password);
            $DeliveryMan->name = $request->name;
            $DeliveryMan->phone_number = $request->phone_number;
            $DeliveryMan->save();
            // toastr()->success(trans('messages.Update'));
            return redirect()->route('DeliveryMan.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function DeleteDeliveryMan($request)
    {
        DeliveryMan::findOrFail($request->id)->delete();
        // toastr()->error(trans('messages.Delete'));
        return redirect()->route('DeliveryMan.index');
    }



}
