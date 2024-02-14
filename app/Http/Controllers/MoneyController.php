<?php

namespace App\Http\Controllers;

use App\Models\Money;
use App\Models\Office;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MoneyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Office $office)
    {
        $money = Money::all();
        $office = Office::where('user_id' , 'like',Auth::user()->id)->first();
        // ddd($office);

        if ($office == null) {
           return redirect()->back()->with('error' , 'you are donnot have office');
        } else {
            return view('Moneys.index' , [
                'moneys' => $money,
                'office' => $office
            ]);
        }
        
      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        Gate::authorize("create",$user);
        $office = Office::all();
        return view('Moneys.create' , [
            'offices' => $office
        ]);
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
            return to_route('money.show' , $money);
        }
   
    }

    /**
     * Display the specified resource.
     */
    public function show(Money $money , Office $office)
    {
        Gate::authorize("view",Auth::user());
        return view('Moneys.show' , [
            'money' => $money
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Money $money)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Money $money)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Money $money)
    {
        Gate::authorize('delete' , Auth::user());
        $money->delete();
        return to_route('money.index')->with('success' , 'Money_Trans has been deleted');
    }
}
