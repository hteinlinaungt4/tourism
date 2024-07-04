@extends('master.layout')
@section('title',"Register")
@section('content')
{{--
    <div class="limiter">
		<div class="container-login100" style=" background-image: url('{{asset('user/img/bg-img/1.jpg')}}');">
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
					Account Register
				</span>

                <form action="{{route('register')}}" class="login100-form validate-form p-b-33 p-t-5" method="post">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div class="text-danger">{{$error}}</div>
                        @endforeach
                    @endif
                    @csrf

                    <div class="wrap-input100 validate-input" data-validate = "Enter Name">
						<input  class="input100  @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name">
						<span class="focus-input100" data-placeholder="&#xe82a;"></span>
                        @error ('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Enter Email">
						<input type="email" class="input100  @error('email') is-invalid @enderror" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe822;"></span>
                        @error ('email')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>


                    <div class="wrap-input100 validate-input" data-validate = "Enter Address">
                        <textarea  class="input100  @error('address') is-invalid @enderror" name="address"  placeholder="Address"></textarea>
						<span class="focus-input100" data-placeholder="&#xe800;"></span>
                        @error ('address')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter Phone">
						<input type="text" class="input100  @error('phone') is-invalid @enderror"  name="phone" placeholder="Phone">
						<span class="focus-input100" data-placeholder="&#xe822;"></span>
                        @error ('phone')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>


                    <div class="wrap-input100 validate-input" data-validate = "Enter Password">
						<input type="password" class="input100  @error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        @error ('password')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>

                    <div class="wrap-input100 validate-input" data-validate = "Enter Comfrim Password">
						<input type="password" class="input100  @error('cm_password') is-invalid @enderror" type="password" name="cm_password" placeholder="Comfirm Password">
						<span class="focus-input100" data-placeholder="&#xe80f;"></span>
                        @error ('cm_password')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
					</div>

					<div class="container-login100-form-btn m-t-32">
						<button type="submit" class="login100-form-btn">
							Login
						</button>
					</div>

				</form>
			</div>
		</div>
	</div> --}}
    <div class="main-wthree">
        <div class="container">
            <div class="sin-w3-agile">
                <h2>Sign Up</h2>
                <form action="{{route('register')}}" method="post">
                    @csrf

                    <div class="username">
                        <span class="username">Name:</span>
                        <input type="text" name="name" class="name" placeholder="" required="">
                        @error('name')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <div class="clearfix"></div>
                    </div>

                    <div class="username">
                        <span class="username">Email:</span>
                        <input type="email" name="email" class="name" placeholder="" required="">
                        @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <div class="clearfix"></div>
                    </div>

                    <div class="username">
                        <span class="username">Address:</span>
                        <input type="text" name="address" class="name" placeholder="" required="">
                        @error('address')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <div class="clearfix"></div>
                    </div>
                    <div class="username">
                        <span class="username">Phone:</span>
                        <input type="number" name="phone" class="name" placeholder="" required="">
                        @error('phone')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <div class="clearfix"></div>
                    </div>

                    <div class="password-agileits">
                        <span class="username">Password:</span>
                        <input type="password" name="password" class="password" placeholder="" required="">
                        @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <div class="clearfix"></div>
                    </div>

                    <div class="password-agileits">
                        <span class="username">Cm Password:</span>
                        <input type="password" name="cm_password" class="password" placeholder="" required="">
                        @error('cm_password')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <div class="clearfix"></div>
                    </div>

                    <div class="login-w3">
                        <input type="submit" class="login" name="login" value="Sign In">
                    </div>
                    <div>
                        <a href="{{route('login')}}" style="color: #fff;">If you want to Sign In?</a>
                    </div>
                    <div class="clearfix"></div>
                </form>
                <div class="back">
                    <a href="{{route('user.dashboard')}}" style="color: #fff;">Back to home</a>
                </div>

            </div>
        </div>
    </div>


@endsection
