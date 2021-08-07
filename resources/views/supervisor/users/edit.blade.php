@extends('layouts.supervisor-dashboard')

@section('user_name')
   {{$user->name }} &nbsp;<i class="fa fa-caret-down"></i>
@endsection

@section('profile-pic-sm')
    {{ $user->photo ? $user->photo->path : '/vendor/assets/images/users/avatar-1.jpg' }}
@endsection

@section('profile-pic-lg')
    {{ $user->photo ? $user->photo->path : '/vendor/assets/images/users/avatar-1.jpg' }}
@endsection

@section('alerts')

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

@endsection

@section('dashboard_panels')
<div class="text-center mb-1">
    <img src="{{ $user->photo ? $user->photo->path : '/vendor/assets/images/users/avatar-1.jpg' }}" alt="" class="border border-rounded" height="200">
</div>
@endsection

@section('table_name')
    <em> Update User Information </em>
@endsection

@section('table_content')
<form class="form-horizontal" method="POST" action=" {{ route('users.update', $user->id) }} " enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" name="_method" value="PATCH">
    <div class="form-group">
        <label class="col-md-2 control-label">Full Names</label>
        <div class="col-md-10">
            <input type="text" class="form-control" name="name" value=" {{ $user->name }} ">
            <span class="help-block"><small>Enter User's Full Names</small></span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label" for="email">Email</label>
        <div class="col-md-10">
            <input type="email" id="email" name="email" class="form-control" value="{{ $user->email }}">
        </div>
    </div>

    <div class="form-group">
        <label class="col-sm-2 control-label">User Role</label>
        <div class="col-sm-10">
            <select class="form-control" name="role_id">
                @foreach ($roles_array as $id => $role)
                    <option value="{{ $id }}"> {{ $role }} </option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Choose A Profile Picture</label>
        <div class="col-md-10">
            <button type="button" class="fileupload btn btn-primary waves-effect waves-light">
                <span>Choose File</span>
                <input type="file" class="upload" name="photo_id">
            </button>
            <span class="help-block"><small>Hover On Button For File's Name</small></span>
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label">Password</label>
        <div class="col-md-10">
            <input type="password" class="form-control" name="password" >
        </div>
    </div>

    <div class="form-group">
        <label class="col-md-2 control-label"></label>
        <div class="col-md-4">
            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Update User</button>
        </div>
    </div>

</form>
@endsection
