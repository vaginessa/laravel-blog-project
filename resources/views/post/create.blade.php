@extends('layouts.main')

@section('title', '| Create New Post')

@section('header-image', '/img/home-bg.jpg')
@section('header-title', 'Create Your Post')
@section('header-subtitle', 'You just have to write.')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h1>Create New Post</h1>
            <hr>

            {!! Form::open(array('route' => 'post.store', 'data-parsley-validate'=>'')) !!}

            {{ Form::label('title', 'Title :', ['class'=>'form-label']) }}
            {{ Form::text('title', null, array('class'=>'form-control input-lg', 'placeholder'=>'Title',  'required'=>'', 'maxlength'=>'255', 'id'=>'title')) }}

            {{ Form::label('subtitle', 'Subtitle :', ['class'=>'form-label']) }}
            {{ Form::text('subtitle', null, array('class'=>'form-control input-lg', 'placeholder'=>'Subtitle',  'required'=>'', 'maxlength'=>'255')) }}

            {{ Form::label('body', 'Body :', ['class'=>'form-label']) }}
            {{ Form::textarea('body', null, array('id'=>'body-editor','class'=>'form-control', 'placeholder'=>'Body', 'required'=>'')) }}

            {{ Form::label('slug', 'Url Slug :', ['class'=>'form-label']) }}
            {{ Form::text('slug', null, array('class'=>'form-control input-lg', 'placeholder'=>'Url Slug', 'required'=>'', 'maxlength'=>'255', 'minlength'=>'5', 'id'=>'slug')) }}

            {{ Form::submit('Create Post', array('class'=>'btn btn-lg btn-block btn-success', 'style'=>'margin-top:20px')) }}
            {!! Form::close() !!}

        </div>
    </div>

@stop

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    <script>
        CKEDITOR.replace('body-editor');


        $(document).ready(function () {
            $('#title').keyup(function () {
                var url_slug = $('#title').val().split(' ').join('-').toLowerCase();;
                $('#slug').val(url_slug);
            });
        });

    </script>

@stop