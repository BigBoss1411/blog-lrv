@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="{{ route('posts.store') }}" method="POST" role="form">
                    @csrf
                    <legend>Create new posts</legend>
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="title" class="form-control" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Content</label>
                        <input type="text" name="content" class="form-control mce" id="">
                    </div>

                    <div class="form-group">
                        <label for="">Status</label>
                        <select name="status" id="input" class="form-control" required="required">
                            <option value="1">Public</option>
                            <option value="2">Draft</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_id" id="input" class="form-control" required="required">
                            <option value="">Choose</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tag</label>
                        <select name="tags[]" id="input" class="form-control select2" required="required" multiple>
                            @foreach ($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Create new post</button>
                </form>
            </div>
        </div>
    </div>
@endsection
