@extends('layout.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h1>Post</h1>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create</a>

                        <form action="" method="GET" class="form-inline" role="form">
                            <div class="form-group">
                                <label class="sr-only" for=""></label>
                                <input type="text" name="keyword" class="form-control" value="{{ request()->input('keyword') }}" id="" placeholder="Keyword">
                            </div>

                            <button type="submit" class="btn btn-primary">Search</button>
                        </form>
                        <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Tag</th>
                                    <th>Trạng thái</th>
                                    <th>Created At</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td>{{ $post->id }}</td>
                                        <td>{{ $post->title }}</td>
                                        <td>
                                            @if ($post->category)
                                                {{ $post->category->name }}
                                            @endif
                                        </td>
                                        <td>
                                            @if ($post->tags->count())
                                                @foreach ($post->tags as $tag)
                                                    <p>{{ $tag->name }} - {{ $tag->pivot->created_at }}</p>
                                                @endforeach
                                            @endif
                                        </td>
                                        <td>
                                            <div id="btn-switch-{{ $post->id }}">
                                                @if ($post->status == 1)
                                                    hoạt động
                                                    <button class="btn btn-danger btn-off" data-id="{{ $post->id }}">Tắt</button>
                                                @else
                                                    không hoạt động
                                                    <button class="btn btn-success btn-on" data-id="{{ $post->id }}">Bật</button>
                                                @endif
                                            </div>

                                        </td>
                                        <td>{{ $post->created_at }}</td>
                                        <td>
                                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-primary">Edit</a>
                                            <form method="POST" action="{{ route('posts.destroy', $post->id) }}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $posts->appends($_GET) }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@push('js')
 <script>
    $(document).ready(function() {
        $(".btn-off").click(function () {
            let id = $(this).data('id');
            $.ajax({
                url: '/posts/' + id +  '/status',
                type: 'PUT',
                dataType: 'JSON',
                data: {status: 0},
            })
            .done(function(result) {
                console.log("#btn-switch-" + id + " button");
                if (result.status == 1) {
                    $("#btn-switch-" + id + " button").removeClass('btn-danger');
                    $("#btn-switch-" + id + " button").addClass('btn-success');
                } else {
                    $("#btn-switch-" + id + " button").addClass('btn-success');
                    $("#btn-switch-" + id + " button").removeClass('btn-danger');
                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

        });
    });
</script>
@endpush
