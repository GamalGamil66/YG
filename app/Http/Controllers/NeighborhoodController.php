<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNeighborhood;
use App\Models\Neighborhood;
use Illuminate\Http\Request;

class NeighborhoodController extends Controller
{
    public function index()
    {
        $Neighborhoods = Neighborhood::all();
    return view('pages.Neighborhood.Neighborhood',compact('Neighborhoods'));
    }



    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(StoreNeighborhood $request)
    {
        try {
            // $validated = $request->validated();
            $Neighborhood = new Neighborhood();
            $Neighborhood->name =  $request->name;
            $Neighborhood->note = $request->note;
            $Neighborhood->save();
  //          toastr()->success(trans('messages.success'));
            return redirect()->route('Neighborhood.index');
        }

        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update(StoreNeighborhood $request)
{
    try {
        // $validated = $request->validated();
        $Neighborhood = Neighborhood::findOrFail($request->id);

        $Neighborhood->name =  $request->name;
        $Neighborhood->note = $request->note;
        $Neighborhood->save();
  //       toastr()->success(trans('messages.Update'));
        return redirect()->route('Neighborhood.index');
    }
    catch
    (\Exception $e) {
        return redirect()->back()->withErrors(['error' => $e->getMessage()]);
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Request $request)
    {

    $Neighborhood = Neighborhood::findOrFail($request->id)->delete();
  //    toastr()->error(trans('messages.Delete'));
    return redirect()->route('Neighborhood.index');

    }
}
