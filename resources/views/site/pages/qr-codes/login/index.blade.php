@extends('site.layouts.app')

@section('content')
<div id="login">
    <h3 class="text-center text-white pt-5">Login form</h3>
    <div class="container">
        <div id="login-row" class="row justify-content-center align-items-center">
            <div id="login-column" class="col-md-6">
                <div id="login-box" class="col-md-12">
                    <form id="login-form" class="form" action="" method="post">
                        <h3 class="text-center text-info">Member Login</h3>
                        <div class="form-group">
                            <label for="email" class="text-info">Email:</label><br>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="password" class="text-info">Password:</label><br>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="remember-me" class="text-info"><span><input id="remember-me" name="remember-me" type="checkbox"></span> <span>Keep me signed in</span></label><br>
                            <input type="submit" name="submit" class="btn btn-info loginBtn" value="Login">
                        </div>
                        <div id="register-link" class="text-right">
                            <a href="#" class="text-info"> Forgot password? </a>
                        </div>
                        <div class="form-group text-center">
                           <strong>OR</strong><br>
                           <span>No account yet? </span><a href="{{ route('member.signup') }}" class="text-info"> Sign Up</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection