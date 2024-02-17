@extends('base')

@section('title', 'Show Document')

@section('body')
<div>
    <div class="row">
        <div class="col-sm-12">
            {{ $document->name }}>
            <a href="{{route('edit_document', $document)}}" class="btn btn-primary">Edit</a>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            {{ $document->content }}
        </div>
    </div>

</div>
@endsection
