@extends('main')
@section('content')



<div class="container-fluid">
    <div style="justify-content: center;">
        @if (Auth::check())
               <h2 style="text-align:center;">{{__('convert.welcome')}}: <span style="color: blue;">{{ Auth::user()->name }}</span></h2>
               <h6 style="text-align:center;">{{__('convert.same')}} <span style="color: red">{{Auth::user()->hasRole('admin')  ? 'Admin' : 'Leader' }}</span></h6><br/>
        @endif
    
    
    
        @if (!Auth::check())
        <h5 style="text-align: center; margin-top:50px; color:red;">
          {{__('convert.dont sign up')}}
        </h5>
    @endif
      </div>
      </div>

      <div class="container">
        @if (session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
        @endif
      </div>



<div class="container-fluid" style="justify-content: center; text-align:center; margin-top:150px;">
    <p class="text-decoration-underline decoration-none">{{__('convert.select option')}}</p>
</div>



<br>
    <div class="container p-10"  style="justify-content:space-between; max-width:1000px; display:flex">
        @can('create' , Auth::user())
        <a href="{{route('office.create')}}"><button class="btn btn-outline-success" type="submit">{{__('convert.create office')}}</button></a>
        <a href="{{route('money.create')}}"><button class="btn btn-outline-dark" type="submit">{{__('convert.create money')}}</button></a>
        @endcan
            <a href="{{route('office.index')}}"><button class="btn btn-outline-primary" type="submit">{{__('convert.view office')}}</button></a>
            <a href="{{route('money.index')}}"><button class="btn btn-outline-info" type="submit">{{__('convert.view money')}}</button></a>
            <a href="{{route('convert')}}"><button class="btn btn-outline-primary" type="submit">{{__('convert.convert money')}}</button></a>

           

    </div>



@endsection
@section('title','Dashboard')
