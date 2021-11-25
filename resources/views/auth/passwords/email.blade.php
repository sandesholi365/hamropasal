<!doctype html>
<html lang="en">
    <head>
        @include('admin.layouts.head')
         <title>Hamropasal | Forget Password </title>
     </head>
<body class="bg-login">
	<!--wrapper-->
    <div class="wrapper">
        <div class="section-authentication-signin d-flex align-items-center justify-content-center my-5 my-lg-0">
            <div class="container-fluid">
                <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                    <div class="col mx-auto">
                        <div class="card">
                            <div class="card-body">
								<div class="border p-4 rounded">
									<div class="text-center">
										<h3><b>Forgot Password?</b></h3>
                                        <p class="text-muted">Enter your registered email ID to reset the password</p>
									</div>
									<div class="form-body">
										<form class="row g-3" method="POST" action="{{ route('password.email') }}">
                                            @csrf
											<div class="col-12">
												<label for="email" class="form-label">Email Address</label>
                                                <input id="email" placeholder="Enter email address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                            </div>
											<div class="col-12">
												<div class="d-grid">
													<button type="submit" class="btn btn-primary"><i class="bx bxs-lock-open"></i>Sign in</button>
												</div>
											</div>
                                            <div class="d-grid gap-2">
                                            <a href="{{route('login')}}" class="btn btn-light btn-lg"><i class='bx bx-arrow-back me-1'></i>Back to Login</a>
                                            </div>
										</form>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end row-->
            </div>
        </div>
    </div>
	<!--end wrapper-->
    @yield('script')
	<script src="/backend/assets/js/jquery.min.js"></script>
	<!--plugins-->
</body>

</html>

