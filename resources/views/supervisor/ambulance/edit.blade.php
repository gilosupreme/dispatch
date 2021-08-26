@extends('layouts.supervisor-dashboard')

@section('user_name')
   {{Auth::user()->name }} &nbsp;<i class="fa fa-caret-down"></i>
@endsection

@section('profile-pic-sm')
{{ $user->photo ? $user->photo->path : url('vendor/assets/images/users/avatar-1.jpg') }}
@endsection

@section('profile-pic-lg')
    {{ $user->photo ? $user->photo->path : 'vendor/assets/images/users/avatar-1.jpg' }}
@endsection

@if (count($errors) > 0)
    <div class="alert alert-danger alert-dismissible fade in">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true"><strong>×</strong></span></button>
        <ul>
            @foreach ($errors->all() as $error)
            <li>
                <strong>{{ $error }}</strong>
            </li>
            @endforeach
        </ul>
    </div>
@endif

@section('dashboard_panels')
<div class="text-center mb-1">
    <img src="{{ $ambulance->photo ? $ambulance->photo->path : '/vendor/assets/images/users/avatar-1.jpg' }}" alt="" class="border border-rounded" height="200">
</div>
@endsection

@section('table_name')
    <em> Edit And Update Registered Ambulance Details </em>
@endsection

@section('table_content')

<form class="form-horizontal" method="POST" action=" {{ route('ambulance.update', $ambulance->id) }} " enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" name="_method" value="PATCH">
    <div class="form-group">
        <label class="col-md-2 control-label">Ambulance Plate Registration</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="reg_no" placeholder="Plate Number" value="{{ $ambulance->reg_no }}">
            <span class="help-block"><small>Enter Ambulance's Full Pate Number, Separated with SPACE</small></span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Ambulance Status</label>
        <div class="col-sm-10">
            <select class="form-control" name="status">
                    <option hidden selected disabled> {{ ($ambulance->status === 0) ? 'Resting' : 'On Duty' }} </option>
                    <option value="0"> Resting </option>
                    <option value="1"> On Duty </option>
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Select Ambulance Image</label>
        <div class="col-md-10">
            <button type="button" class="fileupload btn btn-primary waves-effect waves-light">
                <span>Choose Ambulance Photo</span>
                <input type="file" class="upload" name="photo_id">
            </button>
            <span class="help-block"><small>Hover On Button For File's Name</small></span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">Assign Driver</label>
        <div class="col-sm-10">
            <select class="form-control" name="driver_id">
                @foreach ($drivers_array as $driver)
                    <option disabled selected hidden>
                        @if ($current_driver = $ambulance->driver)
                            {{ $current_driver['name'] }}
                        @else
                            {{ "Select Driver" }}
                        @endif
                    </option>
                    <option value="{{ $driver->id }}"> {{ $driver->name }} </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-4 m-b-1 mb-md-1">
            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light mb-1">Update Ambulance Details</button>
        </div>
</form>
<form class="form-horizontal" method="POST" action=" {{ route('ambulance.destroy', $ambulance->id) }} ">
        @csrf
        <div class="col-md-4">
            <input type="hidden" class="form-control" name="_method" value="DELETE">
            <button type="submit" class="btn btn-danger btn-block waves-effect waves-light">Delete Ambulance</button>
        </div>
    </div>
</form>

@endsection
