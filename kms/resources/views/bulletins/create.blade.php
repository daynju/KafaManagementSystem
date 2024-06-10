@extends('layout.adminLayout')

@section('content')
    <div class="container">
        <form action="{{ route('bulletins.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" name="image" id="image" class="form-control" accept="image/*">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Bulletin</button>
            <a href="{{ route('bulletins.index') }}" class="btn btn-secondary ms-2">Back</a>
        </form>
    </div>
@endsection
