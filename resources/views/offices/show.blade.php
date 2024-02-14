@extends('main')
@section('content')

<div class="container" style="margin-left: 200px; width:100%;">
    <a href="/dashboard"><button class="btn btn-success">Dashboard</button></a>
</div>
<br>
<br>
<div class="card text-center" style="max-width: 80%; margin:auto auto;">
  <div class="card-header">
    Office id: {{$office->id}}
  </div>
  <div class="card-body">
    <h5 class="card-title">{{$office->name_office}}</h5>
    <p class="card-text">Country: {{$office->country}}</p>
    <p class="card-text">Address: {{$office->address}}</p>
  </div>
  <div class="card-footer text-body">
   Amount: {{$office->amount}}
  </div>
</div>

<br>
<br>
<table class="table table-striped table-hover" style="max-width: 80%; margin:auto auto;">
    <thead class="table-success">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Office_Send</th>
        <th scope="col">Office_Recive</th>
        <th scope="col">Money_Trans</th>
        <th scope="col">Date_Trans</th>
      </tr>

      <tbody>
        @forelse ($moneys as $money)
        <tr>
          <th scope="row">{{$money->id}}</th>
          <td>{{$money->office_send}}</td>
          <td>{{$money->office_receive}}</td>
          <td>{{$money->money_trans}}</td>
          <td>{{$money->data_trans}}</td>     
          </td> 
        </tr>
        @empty

        <tr>
          <th>No Money Transfer in this office</th>

        </tr>
            
        @endforelse
       
    </tbody>
  </table>


  <div class="container" style="justify-content:start-between; display:flex;  margin-top:20px">
    <a href="/office"><button class="btn btn-primary">Cancel</button></a>
  </div>

@endsection

@section('title' , 'Show Trans')

