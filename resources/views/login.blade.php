@extends('master.layout')
@section('title', 'Register')
@section('content')
    <div class="main-wthree">
        <div class="container">
            <div class="sin-w3-agile">
                <h2>Sign In</h2>
                <form action="{{route('login')}}" method="post">
                    @csrf
                    <div class="username">
                        <span class="username">Email:</span>
                        <input type="email" name="email" class="name" placeholder="" required="">
                        @error('email')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <div class="clearfix"></div>
                    </div>

                    <br>
                    <div class="password-agileits">
                        <span class="username">Password:</span>
                        <input type="password" name="password" class="password" placeholder="" required="">
                        @error('password')
                            <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                        <div class="clearfix"></div>
                    </div>

                    <div class="login-w3">
                        <input type="submit" class="login" name="login" value="Sign In">
                    </div>
                    <div>
                        <a href="{{route('register')}}" style="color: #fff;">If you want to Sign Up?</a>
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
