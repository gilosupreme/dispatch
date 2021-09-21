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
    <em> Register A new Location Into The System </em>
@endsection

@section('table_content')

<form class="form-horizontal" method="POST" action=" {{ route('location.store') }} ">
    @csrf
    <div class="form-group">
        <label class="col-md-2 control-label">Name Of Location</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="location" placeholder="Location Name" value="{{ old('location') }}" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Name Of Hospital</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="hospital" placeholder="Hospital Name" value="{{ old('hospital') }}" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Co-ordinates Of Location</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="co-ordinates" placeholder="Enter Co-ordinates Value" value="{{ old('co-ordinates') }}">
            <span class="help-block"><small>Enter Location Latitude And Longitude Value As Per Google Maps Format</small></span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Register Location</button>
        </div>
    </div>

</form>

@endsection
