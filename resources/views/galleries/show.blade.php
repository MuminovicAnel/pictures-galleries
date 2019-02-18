@extends('layouts.app')

@section('content')
    <h1>Gallery : {{ $gallery->name }}</h1>
    <p>Provided by {{ $gallery->author }}</p>
    <ul>
    @foreach($gallery->pictures as $picture)
            <li>
                <a href="{{ route('galleries.pictures.show', compact('gallery', 'picture')) }}"> {{ $picture->title }} </a>
                    <img src="{{ route('galleries.pictures.show', compact('gallery', 'picture')) }}"/>
            </li>
        @endforeach
    </ul>
@endsection
