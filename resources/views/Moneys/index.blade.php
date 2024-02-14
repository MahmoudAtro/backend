@extends('main')
@section('content')
<br>
<br>
@if (session('success'))
<div class="container alert alert-success">
  {{ session('success') }}
</div>
@endif
<table class="table table-striped table-hover" style="max-width: 80%; margin:auto;">
    <thead class="table-dark">
      <tr>
        <th scope="col">id</th>
        <th scope="col">office_send</th>
        <th scope="col">office_recive</th>
        <th scope="col">money_trans</th>
        <th scope="col">date_trans</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>
      @if (Auth::user()->hasRole('admin'))
      @foreach($moneys as $money)
      <tr>
        <th scope="row">{{$money->id}}</th>
        <td>{{$money->office_send}}</td>
        <td>{{$money->office_receive}}</td>
        <td>{{$money->money_trans}}</td>
        <td>{{$money->data_trans}}</td>
        <td><a href="{{route('money.show' , $money->id)}}" class="btn btn-small btn-outline-primary">show</a>
            <form action="{{route('money.destroy' , $money->id)}}" method="post" style="display:inline-block;">
                @csrf
                @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
              </form>      
            </td>
      </tr>
    @endforeach
      @else
                      @foreach ($moneys as $money)
                      @if ($money->office_id == $office->id)
                      <tr>
                        <th scope="row">{{$money->id}}</th>
                        <td>{{$money->office_send}}</td>
                        <td>{{$money->office_receive}}</td>
                        <td>{{$money->money_trans}}</td>
                        <td>{{$money->data_trans}}</td>
                        <td><p>you can not select this option!</p></td>
                        
                      </tr>
                      @endif
                @endforeach
                @endif

   
   
    </tbody>
  </table>

  <div class="container" style="justify-content:space-around; display:flex;  margin-top:20px">
    <a href="/dashboard"><button class="btn btn-primary">Dashboard</button></a>
    @can('create' , Auth::user())
    <a href="{{route('money.create')}}"><button class="btn btn-success">Create Trans</button></a>
    @endcan
  </div>
@endsection

@section('title' , 'Money')
    
