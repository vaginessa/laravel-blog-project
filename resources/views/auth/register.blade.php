@extends('main')

@section('title', '| Register')

@section('header-image', '/img/home-bg.jpg')
@section('header-title', 'Register')
@section('header-subtitle', 'Don\'t have an account? Register now.')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-3">

            {!! Form::open(['class'=>'data-form']) !!}
            <div class="form-group">
                {!! Form::text('name', null, ['class'=>'form-control input-lg', 'placeholder'=>'Name']) !!}
            </div>
            <div class="form-group">
                {!! Form::email('email', null, ['class'=>'form-control input-lg', 'placeholder'=>'Enter email']) !!}
            </div>
            <div class="form-group">
                {!! Form::password('password', ['class'=>'form-control input-lg', 'placeholder'=>'Password']) !!}
            </div>
            <div class="form-group">
                {!! Form::password('password_confirmation', ['class'=>'form-control input-lg', 'placeholder'=>'Confirm Password']) !!}
            </div>

            <div class="text-right">
                <p>Already have account ? <a href="/auth/login">Sign
                        in here.</a></p>
                {!! Form::submit('Sign up', ['class'=>'btn btn-warning btn-block btn-lg']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop