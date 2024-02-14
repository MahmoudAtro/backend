@extends('main')

@section('content')
<div class="container-fluid">
    <h2 style="text-align: center; color:blue;">User Information</h2>
        <div class="border border-primary"  style="justify-content: center; max-width:800px; margin:auto auto;">
            <h5 style="text-align:center;">your id: <span style="color: green;">{{$user->id}}</span></h5>
        <br>
        <div style="margin:auto auto; max-width: 700px; height:500px; border-width:750px;">
            <br>
        <div class="mb-3">
            <label for="yourtoken" class="form-label">Your Token</label>
            <input type="text" class="form-control" id="yourtoken" disabled value="{{$user->api_token}}">
          </div>
          <div class="mb-3">
            <label for="yourname" class="form-label">Your Name</label>
            <input type="text" class="form-control" id="yourname" disabled  value="{{$user->name}}">
          </div>
          <div class="mb-3">
            <label for="youremail" class="form-label">Your Email</label>
            <input type="text" class="form-control" id="youremail" disabled  value="{{$user->email}}">
          </div>
          <div class="mb-3">
            <label for="yourROle" class="form-label">Your Role</label>
            <input type="text" class="form-control" id="yourRole" disabled
              value="{{$user->hasRole('admin')? 'admin' : 'leader'}}">
          </div>
          <div class="mb-3">
            <label for="your_office" class="form-label">Your Office</label>
                @foreach ($office as $office) 
                <input type="text" class="form-control" id="your_office" disabled  value="{{$office->name_office}}">
               @endforeach
           
  
        
            </div>
 
           
    
        </div>
        <a href="/dashboard" style="text-align:center; margin-left:350px; "><button type="submit" class="btn btn-success" name="cancel" >Cancel</button></a>
        </div>
@endsection