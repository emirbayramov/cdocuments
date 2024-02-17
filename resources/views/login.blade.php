@extends('base')

@section('title', 'Login')

@section('body')
    <form class="container" method="POST" action="{{route('auth')}}">
        <div class="row">
            <div class="col-sm-12 form-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input type="email" name="email" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 form-group ">
                <div class="input-group-prepend">
                    <span class="input-group-text">🔒</span>
                </div>
                <input type="password" name="password" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 ">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
        </div>
        @csrf
    </form>
@endsection
