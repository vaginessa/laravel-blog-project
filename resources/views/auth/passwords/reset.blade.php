@extends('layouts.main')

@section('title', '| Reset your password')

@section('header-image', '/img/home-bg.jpg')
@section('header-title', 'Password forgot?')
@section('header-subtitle', 'Reset your password.')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-3">
                <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/reset') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="token" value="{{ $token }}">

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email">E-Mail Address</label>


                        <input id="email" type="email" class="form-control input-lg" name="email"
                               value="{{ $email or old('email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password">Password</label>

                        <input id="password" type="password" class="form-control input-lg" name="password">

                        @if ($errors->has('password'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                        <label for="password-confirm">Confirm Password</label>

                        <input id="password-confirm" type="password" class="form-control input-lg"
                               name="password_confirmation">

                        @if ($errors->has('password_confirmation'))
                            <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-warning btn-block btn-lg">
                            <i class="fa fa-btn fa-refresh"></i> Reset Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
