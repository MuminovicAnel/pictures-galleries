@extends('layouts.app')

@section('content')
    <h1>{{$picture->title }}</h1>
    <p>Provided by {{ $picture->gallery->author }}</p>
        <img src="{{ route('galleries.pictures.show', ['gallery' => $picture->gallery, 'picture' => $picture]) }}"/>
@endsection
