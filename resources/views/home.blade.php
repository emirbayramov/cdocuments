@extends('base')

@section('title', 'Home')

@section('body')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a class="btn btn-success" href="{{route('create-document')}}">Create New</a>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-responsive">
                    @foreach($documents as $document)
                        <tr>
                            <td>
                                {{$document->name}}
                            </td>
                            <td style="width: 150px">
                                <a class="btn btn-success" href="{{route('edit-document', $document)}}">Edit</a>
                                <a class="btn btn-danger" href="{{route('share-document', $document)}}">Share</a>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
@endsection
