@extends('main')

@section('title', '| Create New Post')

@section('header-image', '/img/home-bg.jpg')
@section('header-title', 'Create Your Post')
@section('header-subtitle', 'You only have to write.')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h1>Create New Post</h1>
            <hr>

            {!! Form::open(array('route' => 'post.store', 'data-parsley-validate'=>'')) !!}

            {{ Form::label('author', 'Author :') }}
            {{ Form::text('author', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'100')) }}

            {{ Form::label('title', 'Title :') }}
            {{ Form::text('title', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255')) }}

            {{ Form::label('subtitle', 'Subtitle :') }}
            {{ Form::text('subtitle', null, array('class'=>'form-control', 'required'=>'', 'maxlength'=>'255')) }}

            {{ Form::label('body', 'Body :') }}
            {{ Form::textarea('body', null, array('id'=>'body-editor','class'=>'form-control', 'required'=>'')) }}

            {{ Form::submit('Create Post', array('class'=>'btn btn-lg btn-block btn-success', 'style'=>'margin-top:20px')) }}
            {!! Form::close() !!}

        </div>
    </div>

@stop

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    <script>
        CKEDITOR.replace('body-editor', {
            extraPlugins: 'codemirror',
        });
    </script>

@stop