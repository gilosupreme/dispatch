@extends('layouts.supervisor-dashboard')

@section('user_name')
   {{Auth::user()->name }} &nbsp;<i class="fa fa-caret-down"></i>
@endsection

@section('table_name')
    <em> Enrolled System Users </em>
@endsection

@section('table_content')
<table id="datatable-buttons" class="table table-striped table-bordered">
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
                <td> {{ $user->name }} </td>
                <td>{{ $user->role->role }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->diffForHumans() }}</td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
