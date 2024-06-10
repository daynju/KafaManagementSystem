@extends('layout.adminLayout')

@section('content')
    <div class="bulletin-card">
        @if ($bulletin->image)
        <div class="d-flex justify-content-center mb-4">
            <img src="{{ asset('storage/' . $bulletin->image) }}" alt="Bulletin Image">
        </div>
        @endif
        <h2>{{ $bulletin->title }}</h2>
        <small><b>{{ $bulletin->created_at->format('F d, Y') }}</b></small><br>
        <p>{!! nl2br(e($bulletin->description)) !!}</p> 
    </div>
@endsection