@extends('layout.admin')

@section('content')
<div class="pt-5"></div>
<div class="row">
    <div class="col-6">
        <div class="card">
            <div class="card-header">
                Update Profile
            </div>
            <div class="card-body">
                <form action="{{ route('user.update-profile') }}" method="POST" role="form">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" id="" value="{{ old('email', Auth::user()->email) }}">
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Fullname</label>
                        <input type="text" name="fullname" value="{{ old('fullname', Auth::user()->fullname) }}" class="form-control" id="">
                        @error('fullname')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
