@extends('main')

@section('title', '| Login')

@section('header-image', '/img/home-bg.jpg')
@section('header-title', 'Login')
@section('header-subtitle', 'Have an account? Login here and you can start posting free.')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-3">

            {!! Form::open(['class'=>'data-form']) !!}
            <div class="form-group">
                {!! Form::label('email', 'Email address') !!}
                {!! Form::email('email', null, ['class'=>'form-control input-lg', 'placeholder'=>'Enter email']) !!}
            </div>
            <div class="form-group">
                {!! Form::label('password', 'Password') !!}
                {!! Form::password('password', ['class'=>'form-control input-lg', 'placeholder'=>'Password']) !!}
            </div>
            <div class="checkbox">
                <label>
                    <input type="checkbox" name="remember"> Keep me logged in
                </label>
            </div>

            <div class="text-right">
                <p>Don't have account ? <a href="/auth/register">Sign up here.</a></p>
                {!! Form::submit('Sign in', ['class'=>'btn btn-warning btn-block btn-lg']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop