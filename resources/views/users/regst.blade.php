@extends('layouts.layout')

@section('content')


<section class="vh-100" style="background-color: #eee;">
    <div class="container h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-lg-12 col-xl-11">
          <div class="card text-black" style="border-radius: 25px;">
            <div class="card-body p-md-5">
              <div class="row justify-content-center">
                <div class="col-md-10 col-lg-6 col-xl-5 order-2 order-lg-1">
  
                  <p class="text-center h1 fw-bold mb-5 mx-1 mx-md-4 mt-4">Sign up</p>
  
                  <form method="POST" action="/users" class="mx-1 mx-md-4">
                    @csrf
                    <div class="d-flex flex-row align-items-center mb-4">
                      <i class="fas fa-user fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="text" class="form-control" name="name" value="{{old("name")}}"/>
                        <label class="form-label" for="name">Your Name</label>
                        @error('name')
                            <p class="text-danger text-xs mt-1"><small>{{$message}}</small></p>
                        @enderror
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4 ">
                      <i class="fas fa-envelope fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="email" name="email" class="form-control" value="{{old("email")}}"/>
                        <label class="form-label" for="email">Your Email</label>
                        @error('email')
                        <p class="text-danger text-xs mt-1"><small>{{$message}}</small></p>
                        @enderror
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4 ">
                      <i class="fas fa-lock fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="password" class="form-control" value="{{old("password")}}"/>
                        <label class="form-label" for="password">Password</label>
                        @error('password')
                        <p class="text-danger text-xs mt-1"><small>{{$message}}</small></p>
                    @enderror
                      </div>
                    </div>
  
                    <div class="d-flex flex-row align-items-center mb-4 ">
                      <i class="fas fa-key fa-lg me-3 fa-fw"></i>
                      <div class="form-outline flex-fill mb-0">
                        <input type="password" name="password_confirmation" class="form-control"request value="{{old("password_confirmation")}}"/>
                        <label class="form-label" for="password_confirmation">Repeat your password</label>
                        @error('password_confirmation')
                        <p class="text-danger text-xs mt-1"><small>{{$message}}</small></p>
                    @enderror
                      </div>
                    </div>
  
                    <div class="form-check d-flex justify-content-center mb-5">
                      <input class="form-check-input me-2" type="checkbox" value="" name="terms_conditions" required/>
                      <label class="form-check-label" for="terms_conditions">
                        I agree all statements in <a href="/terms">Terms of service</a>
                      </label>
                      <div class="invalid-feedback">You must agree before submitting</div>
                    </div>
  
                    <div class="d-flex justify-content-center mx-4 mb-3 mb-lg-4">
                      <button type="submit" class="btn btn-primary btn-lg">Register</button>
                    </div>
                    <div class="mt-8 justify-content-center">
                      <p>
                        Already have an account?
                        <a href="/logn" class="text-laravel">Login</a>
                      </p>
                    </div>
                    
  
                  </form>
  
                </div>
                <div class="col-md-10 col-lg-6 col-xl-7 d-flex align-items-center order-1 order-lg-2">
  
                  <img src="{{ asset('/images/regst_main.jpg') }}"
                    class="img-fluid" alt="Sample image">
                  
                   
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection