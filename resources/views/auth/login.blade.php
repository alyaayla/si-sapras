@extends('layouts.app')

@section('content')
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
  	<title>Login 05</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="{{ asset('assetslogin/css/style.css')}}">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				
			</div>
			<div class="row justify-content-center">
				<div class="col-md-7 col-lg-5">
					<div class="wrap">
						<div class="img" style="background-image: url(assetslogin/images/dok2.jpg);"></div>
						<div class="login-wrap p-4 p-md-5">
			      	<div class="d-flex">
			      		<div class="w-100 text-center">
			      			<h3 class="mb-4">Login Si-Sapras</h3>
							  <h4 class="mb-4">Yayasan Pendidikan An-Nadhir</h4>
			      		</div>
								{{-- <div class="w-100">
									<p class="social-media d-flex justify-content-end">
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-facebook"></span></a>
										<a href="#" class="social-icon d-flex align-items-center justify-content-center"><span class="fa fa-twitter"></span></a>
									</p>
								</div> --}}
			      	</div>
							<form action="{{ route('login') }}" method="POST" class="signin-form">
								@csrf
			      		<div class="form-group mt-3">
			      			<input type="email" id="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
			      			<label class="form-control-placeholder" for="email">Email</label>

							  @error('email')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
						 	 @enderror
			      		</div>
		            <div class="form-group">
		              <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
		              <label class="form-control-placeholder" for="password">Password</label>
		              
						@error('password')
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
		            </div>
		            <div class="form-group">
		            	<button type="submit" class="form-control btn btn-primary rounded submit px-3"> 
							{{ __('Login') }}
						</button>
		            </div>
		            
		          </form>
		          {{-- <p class="text-center">Not a member? <a data-toggle="tab" href="#signup">Sign Up</a></p> --}}
		        </div>
		      </div>
				</div>
			</div>
		</div>
	</section>

	<script src="{{ asset('assetslogin/js/jquery.min.js')}}"></script>
  <script src="{{ asset('assetslogin/js/popper.js')}}"></script>
  <script src="{{ asset('assetslogin/js/bootstrap.min.js')}}"></script>
  <script src="{{ asset('assetslogin/js/main.js')}}"></script>

	</body>
</html>



@endsection