@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  	<title>Login Si-Sapras</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('asset3/css/style.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
			</div>
			<div class="row justify-content-center">
				<div class="col-md-12 col-lg-10">
					<div class="wrap d-md-flex">
						<div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
							<div class="text w-100">
								<h2>Welcome to login</h2>
								<p>Sistem Peminjaman Sarana dan Prasarana</p>
								<p>Yayasan Pendidikan</p>
								<!-- <a href="#" class="btn btn-white btn-outline-white">Sign Up</a> -->
							</div>
			      		</div>
						<div class="login-wrap p-4 p-lg-5">
			      	<div class="d-flex">
			      		<div class="w-100">
			      			<h3 class="mb-4">Sign In</h3>
			      		</div>
								<!-- <div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div> -->
			      	</div>
						<form action="{{ route('login') }}" method="POST" class="signin-form">
                            @csrf
			      		<div class="form-group mb-3">
			      			<label class="label" for="email">Email</label>
                              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
			      		</div>
		            <div class="form-group mb-3">
		            	<label class="label" for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
		            </div>
		            <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
		          </form>
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('asset3/js/jquery.min.js')}}"></script>
  <script src="{{ asset('asset3/js/popper.js')}}"></script>
  <script src="{{ asset('asset3/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('asset3/js/main.js')}}"></script>

	</body>
</html>

{{-- <section class="vh-100">
	<div class="container-fluid h-custom">
	  <div class="row d-flex justify-content-center align-items-center h-100">
		<div class="col-md-9 col-lg-6 col-xl-5">
		  <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-login-form/draw2.webp"
			class="img-fluid" alt="Sample image">
		</div>
		<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
		  <form action="{{ route('login') }}" method="POST">
			<div class="d-flex flex-row align-items-center justify-content-center justify-content-lg-start">
			  <p class="lead fw-normal mb-0 me-3">Sign in with</p>
			  <button type="button" class="btn btn-primary btn-floating mx-1">
				<i class="fab fa-facebook-f"></i>
			  </button>
  
			  <button type="button" class="btn btn-primary btn-floating mx-1">
				<i class="fab fa-twitter"></i>
			  </button>
  
			  <button type="button" class="btn btn-primary btn-floating mx-1">
				<i class="fab fa-linkedin-in"></i>
			  </button>
			</div>
  
			<div class="divider d-flex align-items-center my-4">
			  <p class="text-center fw-bold mx-3 mb-0">Or</p>
			</div>
  
			<!-- Email input -->
			<div class="form-outline mb-4">
			  <input type="email" id="email" name="email"  value="{{ old('email') }}" required autocomplete="email" autofocus class="form-control form-control-lg @error('email') is-invalid @enderror"
				placeholder="Masukan Email" />
			  <label class="label" for="email">Email address</label>

			  @error('email')
                     <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    	</span>
                @enderror
			</div>
  
			<!-- Password input -->
			<div class="form-outline mb-3">
			  <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" class="form-control form-control-lg"
				placeholder="Enter password" />
			  <label class="label" for="password">Password</label>

			  @error('password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
		  		@enderror
			</div>
  
			<div class="d-flex justify-content-between align-items-center">
			  <!-- Checkbox -->
			  <div class="form-check mb-0">
				<input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
				<label class="form-check-label" for="form2Example3">
				  Remember me
				</label>
			  </div>
			  <a href="#!" class="text-body">Forgot password?</a>
			</div>
  
			<div class="text-center text-lg-start mt-4 pt-2">
			  <button type="button" class="btn btn-primary btn-lg"
				style="padding-left: 2.5rem; padding-right: 2.5rem;">Login</button>
			</div>
  
		  </form>
		</div>
	  </div>
	</div>
	<div
	  class="d-flex flex-column flex-md-row text-center text-md-start justify-content-between py-4 px-4 px-xl-5 bg-primary">
	  <!-- Copyright -->
	  <div class="text-white mb-3 mb-md-0">
		Copyright © 2020. All rights reserved.
	  </div>
	  <!-- Copyright -->
  
	  <!-- Right -->
	  
	  <!-- Right -->
	</div>
  </section> --}}

@endsection