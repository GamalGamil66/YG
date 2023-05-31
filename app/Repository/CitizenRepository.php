<?php

namespace App\Repository;

use App\Models\Citizen;
use App\Models\Delegate;
use Exception;
use Illuminate\Support\Facades\Hash;

class CitizenRepository implements CitizenRepositoryInterface{

public function getAllCitizen(){
    return Citizen::all();
}

    public function GetDelegates(){
        return Delegate::all();
    }

    public function StoreCitizen($request){

    try {
            $Citizen = new Citizen();
            $Citizen->ssn = $request->ssn;
            $Citizen->password =  Hash::make($request->password);
            $Citizen->name = $request->name;
            $Citizen->delegate_id = $request->delegate_id;
            $Citizen->phone_number = $request->phone_number;
            $Citizen->no_of_males = $request->no_of_males;
            $Citizen->no_of_females = $request->no_of_females;
            $Citizen->state_of_house = $request->state_of_house;
            $Citizen->card_no = '1';           
            $Citizen->save();
            // toastr()->success(trans('messages.success'));
            return redirect()->route('Citizen.create');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    public function editCitizen($id)
    {
        return Citizen::findOrFail($id);
    }


    public function UpdateCitizen($request)
    {
        try {
            $Citizen = Citizen::findOrFail($request->id);
            $Citizen->ssn = $request->ssn;
            $Citizen->password =  Hash::make($request->password);
            $Citizen->name = $request->name;
            $Citizen->delegate_id = $request->delegate_id;
            $Citizen->phone_number = $request->phone_number;
            $Citizen->no_of_males = $request->no_of_males;
            $Citizen->no_of_females = $request->no_of_females;
            $Citizen->state_of_house = $request->state_of_house;
            $Citizen->card_no = '1';    
            $Citizen->save();
            // toastr()->success(trans('messages.Update'));
            return redirect()->route('Citizen.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function DeleteCitizen($request)
    {
        Citizen::findOrFail($request->id)->delete();
        // toastr()->error(trans('messages.Delete'));
        return redirect()->route('Citizen.index');
    }



}
