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
        <form action="{{route('office.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container p-4">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Name_Office</label>
                    <input type="text" name="name_office" class="form-control" id="exampleFormControlInput1">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput2" class="form-label">Address</label>
                    <input type="text" name="address" class="form-control" id="exampleFormControlInput2">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">Country</label>
                    <input type="text" name="country" class="form-control" id="exampleFormControlInput3">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label">Amount</label>
                    <input type="text" name="amount" class="form-control" id="exampleFormControlInput4">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">office leader</label>
                    <select class="form-select" aria-label="Small select example" name="leader_office" id="exampleInputEmail3"
                        style="max-width:200px; display:inline-block;">
                        <option selected>select leader</option>
                        @forelse ($users as $user)
                        @if (!$user->hasRole('admin'))
                            <option>
                                {{$user->name}}
                            </option>
                        @endif
                       
                        @empty
                        <h4>there are no user to select</h4>
                    @endforelse
                      </select>
                </div>

                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
        <div class="container" style="margin: -61px 85px;">
            <a href="{{route('office.index')}}"><button type="submit" class="btn btn-info" name="cancel" >Cancel</button></a>
        </div>
    </div>

    

    
@endsection
    
@section('title' , 'Create Office')
