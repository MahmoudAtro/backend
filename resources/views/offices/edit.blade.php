@extends('main')

@section('content')
    <br>
    <br>
    <div class="container p-4">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
                </ul>
        </div>     
        @endif

    </div>
    <div class="container">
        <form action="{{route('office.update' , $office->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <div class="container p-4">
                <div class="mb-3">
                    <label for="input1" class="form-label">Name_Office</label>
                    <input type="text" name="name_office" class="form-control" id="input1" value="{{$office->name_office}}">
                </div>
                <div class="mb-3">
                    <label for="input2" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="input2" value="{{$office->address}}">
                </div>
                <div class="mb-3">
                    <label for="input3" class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" id="input3" value="{{$office->country}}">
                </div>
                <div class="mb-3">
                    <label for="input4" class="form-label">Amount</label>
                    <input type="text" name="amount" class="form-control" id="input4" value="{{$office->amount}}">
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
        <div class="container" style="margin: -61px 85px;">
            <a href="{{route('office.index')}}"><button type="submit" class="btn btn-info" name="cancel" >Cancel</button></a>
        </div>
    </div>

    

    
@endsection
    
@section('title' , 'Edit Office')
