<?php

namespace App\Repository;

use App\Models\Directorates;
use App\Models\Manager;
use Exception;
use Illuminate\Support\Facades\Hash;

class ManagerRepository implements ManagerRepositoryInterface{

public function getAllManager(){
    return Manager::all();
}

    public function GetDirectorates(){
        return Directorates::all();
    }

    public function StoreManager($request){

    try {
            $Manager = new Manager();
            $Manager->ssn = $request->ssn;
            $Manager->password =  Hash::make($request->password);
            $Manager->name = $request->name;
            $Manager->directorate_id = $request->directorate_id;
            $Manager->phone_number = $request->phone_number;
            $Manager->save();
            // toastr()->success(trans('messages.success'));
            return redirect()->route('Manager.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }

    }


    public function editManager($id)
    {
        return Manager::findOrFail($id);
    }


    public function UpdateManager($request)
    {
        try {
            $Manager = Manager::findOrFail($request->id);
            $Manager->ssn = $request->ssn;
            $Manager->password =  Hash::make($request->password);
            $Manager->name = $request->name;
            $Manager->directorate_id = $request->directorate_id;
            $Manager->phone_number = $request->phone_number;
            $Manager->save();
            // toastr()->success(trans('messages.Update'));
            return redirect()->route('Manager.index');
        }
        catch (Exception $e) {
            return redirect()->back()->with(['error' => $e->getMessage()]);
        }
    }


    public function DeleteManager($request)
    {
        Manager::findOrFail($request->id)->delete();
        // toastr()->error(trans('messages.Delete'));
        return redirect()->route('Manager.index');
    }



}
