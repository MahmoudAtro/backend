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
        <th scope="col">name_office</th>
        <th scope="col">Country</th>
        <th scope="col">Address</th>
        <th scope="col">Amount</th>
        <th scope="col">Option</th>
      </tr>
    </thead>
    <tbody>
       
        @if (Auth::user()->hasRole('admin'))
        @foreach($offices as $office)
        <tr>
          <th scope="row">{{$office->id}}</th>
          <td>{{$office->name_office}}</td>
          <td>{{$office->country}}</td>
          <td>{{$office->address}}</td>
          <td>{{$office->amount}}</td>
          <td><a href="{{route('office.show' , $office->id)}}" class="btn btn-small btn-outline-primary">show</a>
              <a href="{{route('office.edit' ,  $office->id)}}" class="btn btn-small btn-outline-info">update</a>
              <form action="{{route('office.destroy' , $office->id)}}" method="post" style="display:inline-block;">
                  @csrf
                  @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                </form>      
              </td>
          
        </tr>
        @endforeach
        @else 
              @foreach ($offices as $office)
                @if (Auth::user()->id == $office->user_id)
                <tr>
                  <th scope="row">{{$office->id}}</th>
                  <td>{{$office->name_office}}</td>
                  <td>{{$office->country}}</td>
                  <td>{{$office->address}}</td>
                  <td>{{$office->amount}}</td>
                  <td><a href="{{route('office.show' , $office->id)}}" class="btn btn-small btn-outline-primary">show Trans</a></td>
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

@section('title' , 'Office')
    
