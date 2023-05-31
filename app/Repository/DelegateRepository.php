<?php

namespace App\Repository;

use App\Models\Aqel;
use App\Models\Delegate;
use Exception;
use Illuminate\Support\Facades\Hash;

class DelegateRepository implements DelegateRepositoryInterface{

public function getAllDelegate(){
    return Delegate::all();
}

    public function GetAqels()
    {
        return Aqel::all(); 
    }

    public function StoreDelegate($request){

    try {
            $Delegate = new Delegate();
            $Delegate->ssn = $request->ssn;
            $Delegate->password =  Hash::make($request->password);
            $Delegate->name = $request->name;
            $Delegate->Aqel_id = $request->Aqel_id;
            $Delegate->phone_number = $request->phone_number;
            $Delegate->save();
            // toastr()->success(trans('messages.success'));
            return redirect()->route('Delegate.create');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    public function editDelegate($id)
    {
        return Delegate::findOrFail($id);
    }


    public function UpdateDelegate($request)
    {
        try {
            $Delegate = Delegate::findOrFail($request->id);
            $Delegate->ssn = $request->ssn;
            $Delegate->password =  Hash::make($request->password);
            $Delegate->name = $request->name;
            $Delegate->Aqel_id = $request->Aqel_id;
            $Delegate->phone_number = $request->phone_number;
            $Delegate->save();
            // toastr()->success(trans('messages.Update'));
            return redirect()->route('Delegate.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function DeleteDelegate($request)
    {
        Delegate::findOrFail($request->id)->delete();
        // toastr()->error(trans('messages.Delete'));
        return redirect()->route('Delegate.index');
    }



}
