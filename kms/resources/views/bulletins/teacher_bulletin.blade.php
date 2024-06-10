@extends('layout.adminLayout')

@section('content')
    <div class="bulletins">
        @foreach ($bulletins as $bulletin)
            <div class="bulletin-card">
                @if ($bulletin->image)
                    <img src="{{ asset('storage/' . $bulletin->image) }}" alt="Bulletin Image">
                @endif
                <div>
                    <h2>{{ $bulletin->title }}</h2>
                    <small><b>{{ $bulletin->created_at->format('F d, Y') }}</b></small><br>
                    <p>
                        {{ Str::limit($bulletin->description, 150) }}
                        @if (Str::length($bulletin->description) > 150)
                            <a href="{{ route('bulletins.show', $bulletin->id) }}">See more</a>
                        @endif
                    </p>
                </div>
            </div>
        @endforeach
    </div>
@endsection