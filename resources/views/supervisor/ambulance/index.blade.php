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
    <em> Registered Ambulances </em>
@endsection

@section('table_content')
<table id="datatable-buttons" class="table table-striped table-bordered">
    <caption><small style="color: #5966f7;">&nbsp;CLICK ON AN AMBULANCE ID <strong> TO EDIT AMBULANCE</strong> DETAILS</small></caption>
    <thead>
        <tr>
            <th>ID</th>
            <th>Registration Number</th>
            <th>Ambulance Status</th>
            <th>Date Registered</th>
        </tr>
    </thead>


    <tbody>

        @foreach ($ambulances as $ambulance)
            <tr>
                <td><a href="{{ route('ambulance.edit', $ambulance->id) }}"> {{ $ambulance->id }} </a></td>
                <td>{{ $ambulance->reg_no }}</td>
                <td>{{ $ambulance->status }}</td>
                <td>{{ $ambulance->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
