<?php

namespace App\Repository;

use App\Models\Aqel;
use App\Models\Neighborhood;
use Exception;
use Illuminate\Support\Facades\Hash;

class AqelRepository implements AqelRepositoryInterface{

public function getAllAqel(){
    return Aqel::all();
}

    public function GetNeighborhoods(){
        return Neighborhood::all();
    }

    public function StoreAqel($request){

    try {
            $Aqel = new Aqel();
            $Aqel->ssn = $request->ssn;
            $Aqel->password =  Hash::make($request->password);
            $Aqel->name = $request->name;
            $Aqel->neighborhood_id = $request->neighborhood_id;
            $Aqel->phone_number = $request->phone_number;
            $Aqel->manager_id = '1';//يتم اضافته من خلال ال اي دي تبع المدير
            $Aqel->save();
            // toastr()->success(trans('messages.success'));
            return redirect()->route('Aqel.create');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    public function editAqel($id)
    {
        return Aqel::findOrFail($id);
    }


    public function UpdateAqel($request)
    {
        try {
            $Aqel = Aqel::findOrFail($request->id);
            $Aqel->ssn = $request->ssn;
            $Aqel->password =  Hash::make($request->password);
            $Aqel->name = $request->name;
            $Aqel->neighborhood_id = $request->neighborhood_id;
            $Aqel->phone_number = $request->phone_number;
            $Aqel->save();
            // toastr()->success(trans('messages.Update'));
            return redirect()->route('Aqel.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function DeleteAqel($request)
    {
        Aqel::findOrFail($request->id)->delete();
        // toastr()->error(trans('messages.Delete'));
        return redirect()->route('Aqel.index');
    }



}
