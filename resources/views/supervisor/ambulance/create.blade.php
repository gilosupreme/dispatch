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
    <em> Register A new Ambulance Into The System </em>
@endsection

@section('table_content')

<form class="form-horizontal" method="POST" action=" {{ route('ambulance.store') }} " enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label class="col-md-2 control-label">Ambulance Plate Registration</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="reg_no" placeholder="Plate Number" value="{{ old('reg_no') }}">
            <span class="help-block"><small>Enter Ambulance's Full Pate Number, Separated with SPACE</small></span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Ambulance Status</label>
        <div class="col-sm-10">
            <select class="form-control" name="status">
                    <option value="0"> Standby </option>
                    <option value="1"> On Duty </option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Select Ambulance Image</label>
        <div class="col-md-10">
            <button type="button" class="fileupload btn btn-primary waves-effect waves-light">
                <span>Choose Ambulance Photo</span>
                <input type="file" class="upload" name="photo_id" value="{{ old('photo_id') }}">
            </button>
            <span class="help-block"><small>Hover On Button For File's Name</small></span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Assign Driver</label>
        <div class="col-sm-10">
            <select class="form-control" name="driver_id">
                @foreach ($drivers_array as $driver)
                    <option value="{{ $driver->id }}"> {{ $driver->name }} </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Register Ambulance</button>
        </div>
    </div>

</form>

@endsection
