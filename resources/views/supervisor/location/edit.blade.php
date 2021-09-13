@extends('layouts.supervisor-dashboard')

@section('user_name')
   {{ $user->name }} &nbsp;<i class="fa fa-caret-down"></i>
@endsection

@section('profile-pic-sm')
    {{ $user->photo ? $user->photo->path : 'vendor/assets/images/users/avatar-1.jpg' }}
@endsection

@section('profile-pic-lg')
    {{ $user->photo !== null ? $user->photo->path : 'vendor/assets/images/users/avatar-1.jpg' }}
@endsection

@section('alerts')

@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade in">
        <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                <strong>{{$error}}</strong>
            </li>
            @endforeach
        </ul>
    </div>
@endif

@endsection

@section('table_name')
    <em> Edit {{$location->location}} Location Details</em>
@endsection

@section('table_content')

<form class="form-horizontal" method="POST" action=" {{ route('location.update', $location->id) }} ">
    @csrf
    <input type="hidden" class="form-control" name="_method" value="PATCH">
    <div class="form-group">
        <label class="col-md-2 control-label">Name Of Location</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="location" placeholder="Location Name" value="{{ $location->location }}" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Name Of Hospital</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="hospital" placeholder="Hospital Name" value="{{ $location->hospital }}" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Co-ordinates Of Location</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="co-ordinates" placeholder="Enter Co-ordinates Value" value="{{ $location->latitude }},{{ $location->longitude }}">
            <span class="help-block"><small>Enter Location Latitude And Longitude Value As Per Google Maps Format</small></span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Update Location</button>
        </div>
    </form>
    <form class="form-horizontal" method="POST" action=" {{ route('location.destroy', $location->id) }} ">
        @csrf
        <div class="col-md-4">
            <input type="hidden" class="form-control" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger btn-block waves-effect waves-light">Delete Location</button>
        </div>
    </div>
    </form>

@endsection
