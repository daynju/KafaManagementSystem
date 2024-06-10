@extends('layout.adminLayout')


@section('content')
    <a href="{{ route('bulletins.create') }}" class="btn btn-primary mb-4">Add New Bulletin</a>
    <div class="bulletins">
        @foreach ($bulletins as $bulletin)
            <div class="bulletin-card">
                @if ($bulletin->image)
                <div class="d-flex justify-content-center mb-4">
                    <img src="{{ asset('storage/' . $bulletin->image) }}" alt="Bulletin Image">
                </div>
                @endif
                <h2>{{ $bulletin->title }}</h2>
                <small><b>{{ $bulletin->created_at->format('F d, Y') }}</b></small><br>
                <p>
                    {{ Str::limit($bulletin->description, 150) }}
                    @if (Str::length($bulletin->description) > 150)
                        <a href="{{ route('bulletins.show', $bulletin->id) }}">See more</a>
                    @endif
                </p>
                <a href="{{ route('bulletins.edit', $bulletin->id) }}" class="btn-edit">Edit</a>
                <form action="{{ route('bulletins.destroy', $bulletin->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn-delete">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
