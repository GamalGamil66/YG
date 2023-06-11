@extends('Pages.MyController.my-controller-app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if(Session::get('error'))
        <div class="col-md-8">
            <div class="alert alert-danger">{{ Session::get('error') }}</div>    
        </div>        
        @endif

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Manager {{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('my_controller.auth') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="ssn" class="col-md-4 col-form-label text-md-right">SSN</label>

                            <div class="col-md-6">
                                <input id="ssn" type="ssn" class="form-control @error('ssn') is-invalid @enderror" name="ssn" value="{{ old('ssn') }}" required autocomplete="" autofocus>

                                @error('ssn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
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
@endsection
