<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Office;
use App\Models\Money;
use Illuminate\Http\Request;
use App\Http\Resources\OfficeResource;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return OfficeController::collection(Office::paginate());
        return  response()->json(Office::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_office' => 'required|max:80|unique:offices',
            'address' => 'required|bail|max:200',
            'country' => 'required|bail|max:80',
            'amount' => 'required|max:20|',
        ]);
        $user = User::firstwhere('name' , 'like' , Auth::user()->name);
        $office = new Office;
        $office->name_office = $request->name_office;
        $office->country = $request->country;
        $office->address = $request->address;
        $office->amount = $request->amount;
        $office->user_id = Auth::user()->id;
        return new OfficeResource($office);
    }

    /**
     * Display the specified resource.
     */
    public function show(Office $office , Money $money)
    {
        return  response()->json($office);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Office $office)
    {
        $office->update($request->only([
            'name' , 'country' , 'address' , 'amount'
        ]));
        return new OfficeResource($office);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Office $office)
    {
        $office->delete();
        return response()->json(null, 204);
    }
}
