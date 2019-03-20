@extends('layouts.app')

@section('content')
    <h1>Galleries</h1>

    <ul>
        @foreach($galleries as $gallery)
            <li>
                <a href="{{ route('galleries.show', $gallery->id) }}"> {{ $gallery->name }} </a>
                <img src="{{ route('galleries.pictures.show', compact('gallery', 'picture')) }}"/>
            </li>
        @endforeach
    </ul>
@endsection
