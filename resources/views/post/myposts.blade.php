@extends('layouts.main')

@section('title', '| My Posts')

@section('header-image', '/img/home-bg.jpg')
@section('header-title', 'My Posts')
@section('header-subtitle', 'Browse posts of yours.')

@section('content')
    <div class="row">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            @foreach($posts as $post)
                <div class="post-preview">
                    <div class="col-sm-10">

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
                        <hr>
                    </div>
                    <div class="col-sm-2">
                        <div style="float: right">
                            {!! Form::open(['route'=>['post.destroy', $post->id], 'method'=>'DELETE']) !!}
                            <button name="submit" type="submit" data-toggle="tooltip" title="Delete"
                                    style="padding: 5px 15px"
                                    class="btn btn-block btn-danger"><span class="fa fa-times"></span></button>
                            {!! Form::close() !!}
                        </div>
                        <div style="float: right">
                            <a href="{{ route('post.edit', $post->id) }}" data-toggle="tooltip" title="Edit"
                               style="padding: 5px 15px"
                               class="btn btn-block btn-default"><span
                                        class="fa fa-pencil-square-o"></span></a>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="center">
                {{ $posts->links() }}
            </div>
        </div>
    </div>
@stop

@section('scripts')
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
@endsection