@extends('layouts.app')

@section('content')
<script src="{{ asset('js/uploadAWS3.js') }}" defer></script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">New Picture for gallery:{{$gallery->name}}</div>

                    <div class="card-body">
                        <form action="" enctype="multipart/form-data" >
                            @csrf
                            {!! Directo::inputsAsHtml() !!}
                            <input type="hidden" name="url" value="{!! Directo::formUrl() !!}">
                            <div class="form-group row">
                                <label for="title" class="col-md-4 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control{{ $errors->has('title') ? ' is-invalid' : '' }}"name="title" value="{{ old('title') }}" required autofocus>

                                    @if ($errors->has('title'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                    <div class="form-group row">
                        <label for="path" class="col-md-4 col-form-label text-md-right">Image</label>

                        <div class="col-md-6">
                            <input id="path" type="file" class="form-control-file{{ $errors->has('path') ? ' is-invalid' : '' }}" name="file" value="{{ old('path') }}">

                            @if ($errors->has('path'))
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $errors->first('path') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row mb-0">
                        <div class="col-md-8 offset-md-4">
                            <button type="submit" class="btn btn-primary" name="submit">
                                Create
                            </button>
                        </div>
                    </div>
                </form>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection
