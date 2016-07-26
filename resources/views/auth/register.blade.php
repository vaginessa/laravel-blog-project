@extends('layouts.main')

@section('title', '| Register')

@section('header-image', '/img/home-bg.jpg')
@section('header-title', 'Register')
@section('header-subtitle', 'Don\'t have an account? Register now.')

@section('content')

    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-3">

            {!! Form::open(['class'=>'data-form', 'method'=>'POST']) !!}
            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                {!! Form::text('name', null, ['class'=>'form-control input-lg', 'placeholder'=>'Name', 'value'=> old('name')]) !!}

                @if ($errors->has('name'))
                    <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                {!! Form::email('email', null, ['class'=>'form-control input-lg', 'placeholder'=>'Enter email', 'value'=>old('email')]) !!}

                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                {!! Form::password('password', ['class'=>'form-control input-lg', 'placeholder'=>'Password']) !!}

                @if ($errors->has('password'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                {!! Form::password('password_confirmation', ['class'=>'form-control input-lg', 'placeholder'=>'Confirm Password']) !!}

                @if ($errors->has('password_confirmation'))
                    <span class="help-block">
                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                    </span>
                @endif
            </div>

            <div class="text-right">
                <p>Already have account ? <a href="/login">Sign
                        in here.</a></p>
                {!! Form::submit('Sign up', ['class'=>'btn btn-warning btn-block btn-lg']) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@stop