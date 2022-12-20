@extends('auth.layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-md-6 offset-md-6 pr-15 pr-md-0 bg-gray">
            <div class="card-login">
                <div class="card-header-login">Set password</div>

                <div class="card-body-login">
                    <form method="POST" action="{{ route('update-password') }}">
                        @csrf

                        <input type="hidden" name="active_token" value="{{ $token }}">

                        <div class="row mb-3">
                            <div class="col-12 col-md-8 offset-md-2">
                               <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required  placeholder="Password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mt-4 mb-3">
                            <div class="col-12 col-md-8 offset-md-2">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Confirm password">
                            </div>
                        </div>

                       
                        <div class="row mb-0">
                            <div class="col-12 col-md-8 offset-md-2">
                                <button type="submit" class="btn">
                                    Save password
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
