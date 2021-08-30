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
    <em> All Registered Ambulance Locations In The System </em>
@endsection

@section('table_content')
<table id="datatable-buttons" class="table table-striped table-bordered">
    <caption>
        <small style="color: #5966f7;">&nbsp;CLICK ON A LOCATION ID <strong> TO EDIT LOCATION</strong> DETAILS</small>
    </caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Location</th>
            <th>Hospital Name</th>
            <th>Date Created</th>
        </tr>
    </thead>

    <tbody>

        @foreach ($locations as $location)
            <tr>
                <td><a href="{{ route('location.show', $location->id) }}"> {{ $location->id }} </a></td>
                <td>{{ $location->location }}</td>
                <td>{{ $location->hospital }}</td>
                <td>{{ $location->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection

