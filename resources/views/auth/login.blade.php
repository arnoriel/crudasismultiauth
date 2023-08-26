@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br>
            <br>
            <center>
            <div class="card border-primary mb-3 text-primary" style="width: 25rem;">
            <div class="card-body">
                <form method="POST" action="{{ route('login') }}">
                @csrf
                <center>
                    <img src="{{asset('img/smkpi.png')}}" style="width: 100px;">
                    <br>
                <h4>Login Aplikasi</h4>
                <br>
                <h5>Email:</h5>
                 <input id="email" type="email" style="width: 18rem;" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                 @error('email')
                 <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
                 </span>
                 @enderror
                <br>
                <h5>Password:</h5>
                <input id="password" type="password" style="width: 18rem;" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
                @enderror
                <br>
                <div class="row mb-3">
                    <div class="col-md-4 offset-md-4">
                        <div class="form-check">
                           <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                          <label class="form-check-label" for="remember">
                           {{ __('Ingat Saya') }}
                          </label>
                        </div>
                     </div>
               </div>
                  <button type="submit" class="btn btn-primary" style="width: 18rem;">
                    {{ __('Login') }}
                     </button>
                    @if (Route::has('password.request'))
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            {{ __('Lupa Password?') }}
                        </a>
                    @endif
                </center>
                </form>
            </div>
            </div>
            </center>
        </div>
    </div>
</div>
@endsection
