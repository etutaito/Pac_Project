@extends('layouts.layout')

@section('content')


<section class="vh-100" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col col-xl-10">
        <div class="card" style="border-radius: 1rem;">
          <div class="row g-0">
            <div class="col-md-6 col-lg-5 d-none d-md-block">
              <img src="{{ asset('/images/lognmain.jpg') }}"
                alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
            </div>
            <div class="col-md-6 col-lg-7 d-flex align-items-center">
              <div class="card-body p-4 p-lg-5 text-black">

                <form method="POST" action="/users/authenticate">
                  @csrf
                  <div class="d-flex align-items-center mb-3 pb-1">
                    <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                  </div>

                  <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Sign into your account</h5>

                  <div class="form-outline mb-4">
                    <input type="email" name="email" class="form-control" value="{{old("email")}}"/>
                        <label class="form-label" for="email">Your Email</label>
                        @error('email')
                        <p class="text-danger text-xs mt-1"><small>{{$message}}</small></p>
                        @enderror
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="password" class="form-control" value="{{old("password")}}"/>
                    <label class="form-label" for="password">Password</label>
                    @error('password')
                    <p class="text-danger text-xs mt-1"><small>{{$message}}</small></p>
                    @enderror
                  </div>

                  <div class="pt-1 mb-4">
                    <button class="btn btn-dark btn-lg btn-block" type="submit">Login</button>
                  </div>

                  <a class="small text-muted" href="#!">Forgot password?</a>
                  <p class="mb-5 pb-lg-2" style="color: #393f81;">Don't have an account? <a href="/regst"
                      style="color: #393f81;">Register here</a></p>
                  <a href="{{ url('/terms') }}" class="small text-muted">Terms of Use</a>
                  <a href="{{ url('/privacy') }}" class="small text-muted">Privacy policy</a>
                </form>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection