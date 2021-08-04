@extends('layouts.supervisor-dashboard')

@section('user_name')
   {{Auth::user()->name }} &nbsp;<i class="fa fa-caret-down"></i>
@endsection

@section('profile-pic-sm')
    {{ $user->photo ? $user->photo->path : 'vendor/assets/images/users/avatar-1.jpg' }}
@endsection

@section('profile-pic-lg')
    {{ $user->photo ? $user->photo->path : 'vendor/assets/images/users/avatar-1.jpg' }}
@endsection

@section('table_name')
    <em> Enrolled System Users </em>
@endsection

@section('table_content')
<table id="datatable-buttons" class="table table-striped table-bordered">
    <caption><small style="color: #5966f7;">&nbsp;CLICK ON A USER'S <strong>NAME TO EDIT USER</strong> DETAILS</small></caption>
    <thead>
        <tr>
            <th>Name</th>
            <th>Role</th>
            <th>Email</th>
            <th>Date Enrolled</th>
        </tr>
    </thead>


    <tbody>

        @foreach ($users as $user)
            <tr>
                <td><a href="{{ route('users.edit', $user->id) }}"> {{ $user->name }} </a></td>
                <td>{{ $user->role->role }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
