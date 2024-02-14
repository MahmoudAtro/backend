@extends('main')
@section('content')
    
<section class="vh-100 bg-image"
style="background-color:bisque ">
<div class="mask d-flex align-items-center h-100 gradient-custom-3">
  <div class="container h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-9 col-lg-7 col-xl-6">
        <div class="card" style="border-radius: 15px;">
          <div class="card-body p-5">
            <h2 class="text-uppercase text-center mb-5">{{__('convert.login')}}</h2>


              @if ($errors->any())
                  <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <ul>
                          <li>{{$error}}</li>
                        </ul>
                    @endforeach
                  </div>
              @endif

            <form action="{{route('LoginUser')}}" method="POST">
              @csrf
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1cg">{{__('convert.your email')}}</label>
                <input name="email" type="name" id="form3Example1cg" class="form-control form-control-lg" />
              </div>

              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4cg">{{__('convert.password')}}</label>
                <input name="password" type="password" id="form3Example4cg" class="form-control form-control-lg" />
              </div>

              <div class="d-flex justify-content-center">
                <button type="submit"
                  type="submit" class="btn btn-outline-success btn-lg px-5">{{__('convert.enter login')}}</button>
              </div>

                <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
                </div>

                
              <p class="text-center text-muted mt-5 mb-0">{{__('convert.dont have email')}}<a href="{{route('register')}}"
                class="fw-bold text-body"><u></u>  {{__('convert.sign up')}}</a></p>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection

@section('title' , 'login')