<?php

namespace App\Http\Controllers;
use Illuminate\Routing\ResourceRegistrar;

use App\Models\Office;
use App\Models\User;
use App\Models\Money;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(User $user)
    {
       
        $office = Office::all();
        return view('offices.index', [
                    'offices' => $office,
                    'user' => $user
                ]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(User $user)
    {
        Gate::authorize("create",$user);
        $user = User::all();
        return view('offices.create' , [
            'users' => $user
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , Office $office)
    {
        $request->validate([
            'name_office' => 'required|max:80|unique:offices',
            'address' => 'required|bail|max:200',
            'country' => 'required|bail|max:80',
            'amount' => 'required|max:20|',
        ]);
        $user = User::firstwhere('name' , 'like' , $request->leader_office);
        $office = new Office;
        $office->name_office = $request->name_office;
        $office->country = $request->country;
        $office->address = $request->address;
        $office->amount = $request->amount;
        $office->user_id = $user->id;
        $office->save();

        return redirect('/office');
    }

    public function show(Office $office , Money $money)
    {
        // Gate::authorize("view",$user);
        $money = Money::where('office_send' , 'like' , $office->name_office)->get();
        return view('offices.show' , [
            'office'=>$office,
            'moneys' => $money
        ]);
    }

    public function edit(Office $office , User $user)
    {
        Gate::authorize("update",$user);
        return view('offices.edit' , [
            'office'=>$office,
        ]);
    }


    public function update(Request $request, Office $office)
    {
        $request->validate([
            'name_office' => 'required|max:80',
            'address' => 'required|bail|max:200',
            'country' => 'required|bail|max:80',
            'amount' => 'required|max:20|',
        ]);

        $office->name_office = $request->name_office;
        $office->country = $request->country;
        $office->address = $request->address;
        $office->amount = $request->amount;
        $office->save();

        return redirect('/office');

    }

    public function destroy(Office $office , User $user)
    {
        Gate::authorize("delete",$user);
        $office->delete();
        return to_route('office.index' , $office)->with("success" , "the office was deleted");
    }


    
}
