@extends('main')

@section('content')
    <br>
    <br>
    <div class="container">
        @if (session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
        @endif
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
        <form action="{{route('money.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="container p-4">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Office_send</label>
                    <select class="form-select" aria-label="Default select example" name="office_send" id="exampleInputEmail1">
                        <option selected>Open this select menu</option>
                        @forelse ($offices as $office)
                        <option>
                                {{$office->name_office}}
                        </option>
                        @empty
                        <h4>there are no office to select</h4>
                    @endforelse
                    </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">Office_Receive</label>
                    <select class="form-select" aria-label="Small select example" name="office_recieve" id="exampleInputEmail3">
                        <option selected>Open this select menu</option>
                        @forelse ($offices as $office)
                        <option>
                                {{$office->name_office}}
                        </option>
                        @empty
                        <h4>there are no office to select</h4>
                    @endforelse
                      </select>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput3" class="form-label">Amount_To_Send</label>
                    <input type="text" name="money_trans" class="form-control" id="exampleFormControlInput3">
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput4" class="form-label">Date_Trans</label>
                    <input type="date" name="date_trans" class="form-control" id="exampleFormControlInput4">
                </div>
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </form>
        <div class="container" style="margin: -61px 85px;">
            <a href="{{route('money.index')}}"><button type="submit" class="btn btn-info" name="cancel" >Cancel</button></a>
        </div>
    </div>
    
@endsection
@section('title' , 'Create Trans')
