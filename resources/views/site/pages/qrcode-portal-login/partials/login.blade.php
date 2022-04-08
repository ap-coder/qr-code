
<div class="featured-box featured-box-secondary text-left">
    <div class="box-content">

    <form action="{{ route('member.login') }}" id="frmSignIn" method="post" class="needs-validation1">
    @csrf

    <h3 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Member Login</h3>
        <div class="form-row">
            <div class="form-group col">
                <label class="font-weight-bold text-dark text-2">E-mail Address</label>

                <input id="email" type="email" class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg text-4" required autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" name="email" value="{{ old('email', null) }}">

                @if($errors->has('email'))
                    <div class="invalid-feedback">
                        {{ $errors->first('email') }}
                    </div>
                @endif
                
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                {{-- <a class="float-right" href="#">(Lost Password?)</a> --}}
                <label class="font-weight-bold text-dark text-2">Password</label>
                <input id="password" type="password" class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg text-4" name="password" required placeholder="{{ trans('global.login_password') }}">

                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-lg-6">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="rememberme" name="remember">

                    <label class="custom-control-label text-2" for="rememberme">{{ trans('global.remember_me') }}</label>
                </div>
            </div>
            <div class="form-group col-lg-6">
                <input type="submit" value="Login" class="btn btn-modern btn-primary mr-1 float-right" data-loading-text="Loading...">
            </div>
        </div>
    </form>
</div>
</div>
