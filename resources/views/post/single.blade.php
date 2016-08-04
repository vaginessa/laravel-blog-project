@extends('layouts.main')

@section('title')
    | {{ $post->title }}
@stop

@section('header-image', '/img/post-bg.jpg')
@section('post-title')
    {{ $post->title }}
@stop
@section('post-subtitle')
    {{ $post->subtitle }}
@stop
@section('post-author')
    {{ $post->user->name }}
@stop
@section('post-date')
    {{ date('M j, Y', strtotime($post->created_at)) }}
@stop

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
            {!! $post->body  !!}
        </div>
    </div>

@stop