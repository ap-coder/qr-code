
<div class="featured-box featured-box-secondary text-left">
    <div class="box-content">

    <form action="{{ route('member.register') }}" id="frmSignUp" method="post" class="needs-validation1">
    @csrf

    <h3 class="color-primary font-weight-semibold text-4 text-uppercase mb-3">Member Sign Up</h3>
        <div class="form-row">
            <div class="form-group col">
                <label class="font-weight-bold text-dark text-2">Select your industry</label>

                <select name="industry" id="industry" class="form-control select2 {{ $errors->has('industry') ? ' is-invalid' : '' }}" required>
                    <option value="">Select</option>
                    @foreach ($QrIndustries as $QrIndustry)
                        <option value="{{ $QrIndustry->id }}">{{ $QrIndustry->name }}</option>
                    @endforeach
                </select>

                @if($errors->has('industry'))
                    <div class="invalid-feedback">
                        {{ $errors->first('industry') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label class="font-weight-bold text-dark text-2">Name</label>

                <input id="name" type="text" class="form-control form-control-lg {{ $errors->has('name') ? ' is-invalid' : '' }} form-control-lg text-4"  autocomplete="name" autofocus placeholder="Name" name="name" value="{{ old('name', null) }}" required>

                @if($errors->has('name'))
                    <div class="invalid-feedback">
                        {{ $errors->first('name') }}
                    </div>
                @endif
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col">
                <label class="font-weight-bold text-dark text-2">E-mail Address</label>

                <input id="email" type="email" class="form-control form-control-lg {{ $errors->has('email') ? ' is-invalid' : '' }} form-control-lg text-4"  autocomplete="email" autofocus placeholder="{{ trans('global.login_email') }}" name="email" value="{{ old('email', null) }}" required>

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
                <input id="password" type="password" class="form-control form-control-lg {{ $errors->has('password') ? ' is-invalid' : '' }} form-control-lg text-4" name="password"  placeholder="{{ trans('global.login_password') }}" required>

                    @if($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
            </div>
        </div>
        <div class="form-row">
            
            <div class="form-group col-lg-12">
                <button type="submit" class="btn btn-primary btn-modern btn-block text-uppercase rounded-0 font-weight-bold text-3 py-3" data-loading-text="Loading...">Register</button>
            </div>
        </div>
    </form>
</div>
</div>