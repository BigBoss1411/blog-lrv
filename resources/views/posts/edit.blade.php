@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('posts.update', $post->id) }}" method="POST" role="form">
                    @csrf
                    @method('put')
                    <legend>Create new posts</legend>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" value="{{ $post->title }}" name="title" class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Content</label>
                        <input type="text" value="{{ $post->content }}" name="content" class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="input" class="form-control" required="required">
                            <option {{ $post->status == 1 ? 'selected' : '' }} value="1">Public</option>
                            <option {{ $post->status == 2 ? 'selected' : '' }} value="2">Draft</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="input" class="form-control" required="required">
                            <option value="">Choose</option>
                            @foreach ($categories as $category)
                                <option {{ $post->category_id = $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tag</label>
                        @php
                            $tagsIds = $post->tags->pluck('id')->toArray();
                        @endphp
                        <select name="tags[]" id="input" class="form-control" required="required" multiple>
                            @foreach ($tags as $tag)
                                <option {{ in_array($tag->id, $tagsIds) ? 'selected' : '' }} value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary">Update post</button>
                </form>
            </div>
        </div>
    </div>
@stop
