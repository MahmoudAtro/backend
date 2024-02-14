@extends('main')
@section('content')

<div class="container" style="margin-left: 200px; width:100%;">
    <a href="/dashboard"><button class="btn btn-success">Dashboard</button></a>
</div>
<br>
<br>
<table class="table table-striped table-hover" style="max-width: 80%; margin:auto auto;">
    <thead class="table-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">Office_Send</th>
        <th scope="col">Office_Recive</th>
        <th scope="col">Amount_Trans</th>
        <th scope="col">Date_Trans</th>
      </tr>

      <tbody>
      <tr>
        <th scope="row">{{$money->id}}</th>
        <td>{{$money->office_send}}</td>
        <td>{{$money->office_receive}}</td>
        <td>{{$money->money_trans}}</td>
        <td>{{$money->data_trans}}</td>     
        </td> 
      </tr>
    </tbody>
  </table>


  <div class="container" style="justify-content:start-between; display:flex;  margin-top:20px">
    <a href="/money"><button class="btn btn-primary">Cancel</button></a>
  </div>

@endsection


@section('title' , 'Show Money')
    
