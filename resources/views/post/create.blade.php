@extends('layouts.main')

@section('title', '| Create New Post')

@section('header-image', '/img/home-bg.jpg')
@section('header-title', 'Create Your Post')
@section('header-subtitle', 'You just have to write.')

@section('stylesheets')
    {!! Html::style('css/parsley.css') !!}
    {!! Html::style('css/bootstrap-tagsinput.css') !!}

    <style>
        .bootstrap-tagsinput {
            line-height: 30px;
            width: 100% !important;
            display: block;
        }

        .bootstrap-tagsinput input {
            height: 46px;
            padding: 10px 16px;
            font-size: 18px;
        }

        .bootstrap-tagsinput .tag {
            margin: 3px;
        }
    </style>
@endsection

@section('content')

    <div class="row">
        <div class="col-sm-offset-2 col-sm-8">
            <h1>Create New Post</h1>
            <hr>

            {!! Form::open(array('route' => 'post.store', 'data-parsley-validate'=>'', 'id'=>'creation-form')) !!}
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

            <div class="form-group">
                {{ Form::label('category_id', 'Category :', ['class'=>'form-label']) }}
                <select class="form-control input-lg" name="category_id" id="category_id" required>
                    @foreach($categories as $categ)
                        <option value="{{ $categ->id }}">{{ $categ->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                {{ Form::label('tags', 'Tags :', ['class'=>'form-label']) }}
                <input class="form-control input-lg" type="text" id="tags"/>
            </div>

            {{ Form::submit('Create Post', array('class'=>'btn btn-lg btn-block btn-success', 'style'=>'margin-top:20px')) }}
            {!! Form::close() !!}

        </div>
    </div>

@stop

@section('scripts')

    {!! Html::script('js/parsley.min.js') !!}
    {!! Html::script('js/bootstrap-tagsinput.min.js') !!}
    <script>
        CKEDITOR.replace('body-editor');


        $(document).ready(function () {
            $('#title').keyup(function () {
                var url_slug = $('#title').val().split(' ').join('-').toLowerCase();
                ;
                $('#slug').val(url_slug);
            });

            $("#category_id").select2({
                theme: "bootstrap",
                placeholder: "Select a category",
                containerCssClass: "input-lg"
            });

            $('#tags').tagsinput({
                maxTags: 10,
                minChars: 5,
                trimValue: true,
                allowDuplicates: false,
                onTagExists: function (item, $tag) {
                    $tag.hide().fadeIn();
                }
            });

            $('#creation-form').on('keyup keypress', function (e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });
        });

    </script>

@stop