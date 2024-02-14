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
            <h2 class="text-uppercase text-center mb-5">{{__('convert.create account')}}</h2>


              @if ($errors->any())
                  <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <ul>
                          <li>{{$error}}</li>
                        </ul>
                    @endforeach
                  </div>
              @endif

            <form action="{{route('RegisterUser')}}" method="POST">
              @csrf
              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example1cg">{{__('convert.your name')}}</label>
                <input name="name" type="name" id="form3Example1cg" class="form-control form-control-lg" />
              </div>

              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example3cg">{{__('convert.your email')}}</label>
                <input name="email" type="email" id="form3Example3cg" class="form-control form-control-lg" />
              </div>

              <div class="form-outline mb-4">
                <label class="form-label" for="form3Example4cg">{{__('convert.password')}}</label>
                <input name="password" type="password" id="form3Example4cg" class="form-control form-control-lg" />
              </div>

              <div class="form-outline mb-4">
                <label class="form-label" for="password_confirmation" >{{__('convert.repeat')}}</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control form-control-lg" />
              </div>

              <div class="form-check d-flex justify-content-center mb-5">
                <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3cg" />
                <label class="form-check-label" for="form2Example3g">
                  I agree all statements in <a href="#!" class="text-body"><u>Terms of service</u></a>
                </label>
              </div>

              <div class="d-flex justify-content-center">
                <button type="submit"
                  type="submit" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">{{__('convert.register')}}</button>
              </div>

              <p class="text-center text-muted mt-5 mb-0">{{__('convert.have account already')}} <a href="{{route('login')}}"
                  class="fw-bold text-body"><u>{{__('convert.login here')}}</u></a></p>

            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
@endsection

@section('title' , 'Register')