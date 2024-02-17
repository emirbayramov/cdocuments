@extends('base')

@section('title', 'Home')

@section('body')
    <form class="container" action="{{route('share-document-post', $document)}}" method="post">
        <div class="row">
            <div class="col-sm-12">
                <table class="table table-responsive">
                    @foreach($users as $user)
                        <tr>
                            <td>
                                {{$user->email}}
                            </td>
                            <td style="width: 150px">
                                <input type="checkbox" name="user_ids[]" value="{{$user->id}}"
                                    @if ($document->users->contains($user->id)) checked @endif
                                >
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <input type="submit" value="Sumbit" class="btn btn-primary">
            </div>
        </div>
        @csrf
    </form>
@endsection
