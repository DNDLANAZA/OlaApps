@extends('connexion.applogin')

@section('content')

<div class="card card-plain mt-8">
    <div class="card-header pb-0 text-left bg-transparent">
    <h3 class="font-weight-bolder text-info text-gradient">Welcome back to {{ __('Login') }}</h3>
    <p class="mb-0">Enter your email and password to sign in</p>
    </div>
    <div class="card-body">
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <label for="email">{{ __('Email Address') }}</label>
            <div class="mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus aria-label="Email" aria-describedby="email-addon">

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <label for="password">{{ __('Password') }}</label>
            <div class="mb-3">
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" aria-label="Password" aria-describedby="password-addon">
            </div>
            <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                <label class="form-check-label" for="remember">
                    {{ __('Remember Me') }}
                </label>
            </div>

            <div class="text-center">
                <button type="submit" class="btn bg-gradient-info w-100 mt-4 mb-0">
                    {{ __('Login') }}
                </button>

                @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
            </div>
        </form>
    </div>
</div>
@endsection

@section('background')
    <div class="col-md-6">
    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
      <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('{{ asset('assets/img/curved-images/curved6.jpg') }}')"></div>
    </div>
  </div>
@endsection

