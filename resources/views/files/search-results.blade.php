<!-- resources/views/files/search-results.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Search Results</h1>

        @if ($searchResults->isNotEmpty())
            <ul>
                @foreach ($searchResults as $file)
                    <li>{{ $file->filename }}</li>
                    <!-- Add more file details as needed -->
                @endforeach
            </ul>
        @else
            <p>No results found.</p>
        @endif
    </div>
@endsection
