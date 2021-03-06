@extends('layouts.main')

@section('title', '| Welcome')

@section('header-image', '/img/home-bg.jpg')
@section('header-title', 'Your Blog')
@section('header-subtitle', 'Start creating your posts today free.')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            @foreach($posts as $post)
                <div class="post-preview">
                    <a href="{{ route('single-blog', $post->slug) }}">
                        <h2 class="post-title">
                            {{ $post->title }}
                        </h2>

                        <h3 class="post-subtitle">
                            {{ $post->subtitle }}
                        </h3>
                    </a>

                    <p class="post-meta">Posted by <a href="#">{{ $post->user->name }}</a>
                        on {{ date('M j, Y', strtotime($post->created_at)) }}</p>
                </div>
                <hr>
            @endforeach

            <!-- Pager -->
            <ul class="pager">
                <li class="next">
                    <a href="{{ route('blog') }}">Show All &rarr;</a>
                </li>
            </ul>
        </div>
    </div>
@stop