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
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>{{ $post->title }}</h1>
                <div class="content">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
    </div>
@stop
