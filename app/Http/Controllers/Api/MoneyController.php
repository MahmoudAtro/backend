<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Money;
use Illuminate\Http\Request;
use App\Http\Resources\MoneyResource;


class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return  response()->json(Money::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'office_send' => 'required',
            'office_recieve' => 'required',
            'money_trans' => 'required|max:12|min:3',
            'date_trans' => 'required|max:20|date'
        ]);
        $office = Office::firstwhere('name_office' , 'like' , $request->office_send);
        if($request->money_trans > $office->amount){
            return to_route('money.create')->with('error' , 'Error , Moneytrans must be smaller than amount of send office');
        }else{
            $money = Money::create([
                'office_send' => $request->office_send,
                'office_receive' => $request->office_recieve,
                'money_trans' => $request->money_trans,
                'data_trans' => $request->date_trans,
                'office_id' => $office->id,
            ]);
            $officerec = office::firstwhere('name_office' , 'like' , $request->office_recieve);
            $office->amount -= $request->money_trans;
            $officerec->amount+=$request->money_trans;
            $money->save();
            $office->save();
            $officerec->save();
            return new MoneyResource($money);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Money $money)
    {
        return  response()->json($money);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Money $money)
    {
        $money->update($request->only([
            'office_send', 'office_receive', 'money_trans' , 'date_trans'
        ]));
        return new MoneyResource($money);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Money $money)
    {
        $money->delete();
        return response()->json(null, 204);
    }
}
