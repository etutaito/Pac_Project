@extends('layouts.layout')

@section('content')

<main>         <!-- Page content-->
<section class="py-5">
    <div class="container px-5">
        <!-- Contact form-->
        <div class="bg-light rounded-3 py-5 px-4 px-md-5 mb-5">
            <div class="text-center mb-5">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-3"><i class="bi bi-envelope"></i></div>
                <h1 class="fw-bolder">Get in touch</h1>
                <p class="lead fw-normal text-muted mb-0">We'd love to hear from you</p>
                @if (Session::has('success'))
                <p class="alert alert-success">
                    {{Session::get('success')}}
                </p>
                @endif
               
            </div>
            <div class="row gx-5 justify-content-center">
                <div class="col-lg-8 col-xl-6">

                    <form name="contact_form" method="POST" action="/post-message">
                        @csrf
                        <!-- Name input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="name" type="text" placeholder="Enter your name..." />
                            <label for="name">Full name</label>
                    
                        </div>
                        <!-- Email address input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="email" type="email" placeholder="name@example.com" value="{{old("email")}}"/>
                            <label for="email">Email address</label>
                            @error('email')
                            <p class="text-danger text-xs mt-1"><small>{{$message}}</small></p>
                            @enderror
                           
                        </div>
                        <!-- Phone number input-->
                        <div class="form-floating mb-3">
                            <input class="form-control" name="phone" type="tel" placeholder="(123) 456-7890"  />
                            <label for="phone">Phone number</label>
                        
                        </div>
                        <!-- Message input-->
                        <div class="form-floating mb-3">
                            <textarea class="form-control" name="message" type="text" placeholder="Enter your message here..." style="height: 10rem"></textarea>
                            <label for="message">Message</label>
                           
                        </div>
                        <!-- Submit Button-->
                        <div class="d-grid"><button class="btn btn-primary btn-lg" type="submit">Submit</button></div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>
</main>

  @endsection