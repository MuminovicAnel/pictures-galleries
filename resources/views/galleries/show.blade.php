@extends('layouts.app')

@section('content')
    <h1>Gallery : {{ $gallery->name }}</h1>
    <p>Provided by {{ $gallery->author }}</p>
@endsection
