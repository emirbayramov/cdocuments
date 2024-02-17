@extends('base')

@section('title', 'Edit Document')

@section('body')
    <form class="container" method="POST" action="{{$isCreate ? route('create-document-post') : route('edit-document-post', $document)}}">
        <div class="row">
            <div class="col-sm-12 form-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                <input type="text" name="name" class="form-control" value="{{ $document->name }}">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">Text</span>
                </div>
                <textarea name="content" class="form-control">{{ $document->content }}</textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 ">
                <input type="submit" class="btn btn-primary" value="Save">
            </div>
        </div>
        @csrf
    </form>
@endsection
