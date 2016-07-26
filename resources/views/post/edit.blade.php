@extends('layouts.main')

@section('title', '| Edit your post')

@section('header-image', '/img/home-bg.jpg')
@section('header-title', 'Edit your post')
@section('header-subtitle', 'You just have to write.')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h1>Update Post</h1>
            <hr>
            {!! Form::model($post, ['route'=>['post.update', $post->id], 'method'=>'PUT', 'data-parsley-validate'=>'']) !!}

            <div class="form-group">
                {{ Form::label('title', 'Title :', ['class'=>'form-label']) }}
                {{ Form::text('title', null, array('class'=>'form-control input-lg', 'placeholder'=>'Title',  'required'=>'', 'maxlength'=>'255', 'id'=>'title')) }}
            </div>

            <div class="form-group">
                {{ Form::label('subtitle', 'Subtitle :', ['class'=>'form-label']) }}
                {{ Form::text('subtitle', null, array('class'=>'form-control input-lg', 'placeholder'=>'Subtitle',  'required'=>'', 'maxlength'=>'255')) }}

            </div>
            <div class="form-group">
                {{ Form::label('body', 'Body :', ['class'=>'form-label']) }}
                {{ Form::textarea('body', null, array('id'=>'body-editor','class'=>'form-control', 'placeholder'=>'Body', 'required'=>'')) }}
            </div>

            <div class="form-group">
                {{ Form::label('slug', 'Url Slug :', ['class'=>'form-label']) }}
                {{ Form::text('slug', null, array('class'=>'form-control input-lg', 'placeholder'=>'Url Slug', 'required'=>'', 'maxlength'=>'255', 'minlength'=>'5', 'id'=>'slug')) }}
            </div>

            {{ Form::submit('Update Post', array('class'=>'btn btn-lg btn-block btn-success', 'style'=>'margin-top:20px')) }}
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
                var url_slug = $('#title').val().split(' ').join('-').toLowerCase();
                ;
                $('#slug').val(url_slug);
            });
        });

    </script>

@stop