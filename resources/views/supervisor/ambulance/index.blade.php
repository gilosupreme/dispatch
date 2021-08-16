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

@section('table_name')
    <em> All Media In System Database </em>
@endsection
