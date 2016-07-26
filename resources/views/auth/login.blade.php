@extends('layouts.main')

@section('title', '| Login')

@section('header-image', '/img/home-bg.jpg')
@section('header-title', 'Login')
@section('header-subtitle', 'Have an account? Login here and you can start posting free.')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-3">

            {!! Form::open(['class'=>'data-form']) !!}
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::label('email', 'Email address') !!}
                {!! Form::email('email', null, ['class'=>'form-control input-lg', 'placeholder'=>'Enter email', 'value'=>old('email')]) !!}

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class'=>'form-control input-lg', 'placeholder'=>'Password']) !!}

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Remember Me
                </label>
            </div>
            <div class="text-right">
                <p>Don't have account ? <a href="/register">Sign up here.</a></p>
                {!! Form::submit('Sign in', ['class'=>'btn btn-warning btn-block btn-lg']) !!}
            </div>
            <div class="text-left">
                <a class="btn btn-link" href="{{ url('/password/reset') }}" style="padding-left: 0px;">Forgot Your
                    Password?</a>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop