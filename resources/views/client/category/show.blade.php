@extends('client.layout.master')

@push('css')
<style>
    .post {
        border: dashed 2px #7c7c7c;
        margin-bottom: 27px;
        padding: 5px 20px;
        border-radius: 14px;
    }
</style>
@endpush

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1>{{ $category->name }}</h1>
            <p>Lorem ipsum, dolor sit amet, consectetur adipisicing elit. Nemo, distinctio doloribus excepturi error, saepe voluptate voluptates eum veniam doloremque iste!</p>
            <p>
                <a class="btn btn-primary btn-lg">Learn more</a>
            </p>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                @foreach ($category->posts as $post)
                    <div class="post">
                        <h1>{{ $post->title }}</h1>
                        <p>{{ substr(strip_tags($post->content), 0, 200)  }} ...</p>
                        <p><a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Xem</a></p>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
@stop
