@extends('layouts.app')

@section('content')
<!-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  	<title>Login Si-Sapras</title>
	<style>
.bg {
	background-image: url("image/dok2.jpg");
}
	</style>
	</head>
	<body> -->
<!-- Section: Design Block -->
<section class="">
  <!-- Jumbotron -->
  <div class="px-4 py-5 px-md-5 text-center text-lg-start" style="background-color: hsl(0, 0%, 96%) ">
  <!-- style="background-color:hsl(0, 0%, 96%) "-->
    <div class="container">
      <div class="row gx-lg-5 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="my-4  fw-bold ls-tight">
            SI-SAPRAS <br />
            <span class="text-success ">Yayasan Pendidikan An-Nadhir</span>
          </h1>
          <p style="color: hsl(217, 10%, 50.8%)">
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Eveniet, itaque accusantium odio, soluta, corrupti aliquam
            quibusdam tempora at cupiditate quis eum maiores libero
            veritatis? Dicta facilis sint aliquid ipsum atque?
          </p>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card">
            <div class="card-body py-5 px-md-5">
              <form action="{{ route('login') }}" method="POST" class="signin-form">
                            @csrf
                <!-- 2 column grid layout with text inputs for the first and last names -->

                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="email" class="form-control" />
                  <label class="form-control @error('email') is-invalid @enderror" for="email" value="{{ old('email') }}" required autocomplete="email" autofocus>Email address</label>
				  		@error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="password" class="form-control" />
                  <label for="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">Password</label>
				  		@error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                         @enderror
                </div>

                <!-- Checkbox -->

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                   {{ __('Login') }}
                </button>

				@if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif

                <!-- Register buttons -->
                
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Jumbotron -->
</section>
<!-- Section: Design Block -->
<!-- </body>
</html> -->
@endsection