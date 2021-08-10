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

@section('table_content')
<table id="datatable" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>File</th>
            <th>Date Created</th>
            <th>Delete Media</th>
        </tr>
    </thead>


    <tbody>

        @foreach ($photos as $photo)
            <tr>
                <td> {{ $photo->id }} </td>
                <td><img src="{{ $photo->path ? $photo->path : '/vendor/assets/images/big/img-1.jpg' }}" alt="media" height="50" width="50"> </td>
                <td>{{ $photo->created_at->diffForHumans() }}</td>
                <td>
                    <form class="form-horizontal" method="POST" action=" {{ route('media.destroy', $photo->id) }} ">
                        @csrf
                            <input type="hidden" class="form-control" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger btn-sm waves-effect waves-light">Delete Media</button>
                    </form>
                </td>
            </tr>
        @endforeach

    </tbody>
</table>
@endsection
