@extends('layouts.supervisor-dashboard')

@section('styles')
   <style>
       section{
           padding-top: 2px;
       }
       .form-section{
           padding-left: 3px;
           display: none;
       }

       .form-section.current{
            display: inherit;
       }
       .parsley-errors-list{
            padding: 0;
            margin:2px 0px 8px;
            list-style: none;
            color: red;
       }
   </style>
@endsection

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
    <em> Dispatch Ambulance </em>
@endsection

@section('table_content')
<section>
    <form class="form-horizontal dispatch-form" method="POST" action=" {{ route('dispatch-ambulance.store') }} ">
        @csrf
        <div class="form-section">
            <div class="form-group">
                <label class="col-md-2 control-label">Caller Full Names</label>
                <div class="col-md-10">
                    <input type="text" class="form-control" name="name" placeholder="Caller Full Names" value="{{ old('name') }}" required>
                    <span class="help-block"><small>Enter Caller's Full Three Names</small></span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="caller_phone">Caller's Phone Number</label>
                <div class="col-md-10">
                    <input type="phone" id="caller_phone" name="caller_phone" class="form-control" placeholder="Caller's Phone" value="{{ old('caller_phone') }}" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="kin_name">Next Of Kin's Names </label>
                <div class="col-md-10">
                    <input type="text" id="kin_name" name="kin_name" class="form-control" placeholder="Next Of Kin's Names" value="{{ old('kin_name') }}" required>
                    <span class="help-block"><small>Enter Next Of Kin's Names</small></span>
                </div>
            </div>
        </div>

        <div class="form-section">
            <div class="form-group">
                <label class="col-md-2 control-label" for="victim_name">Victim's Names </label>
                <div class="col-md-10">
                    <input type="text" id="victim_name" name="victim_name" class="form-control" placeholder="Victim's Names" value="{{ old('victim_name') }}" required>
                    <span class="help-block"><small>Enter Victim's Names</small></span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Victim's Gender</label>
                <div class="col-sm-10">
                    <select class="form-control" name="victim_gender" required>
                        <option value="M"> Male </option>
                        <option value="F"> Female </option>
                        <option value="Other"> Other/Unknown </option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Preferred Hospital</label>
                <div class="col-sm-10">
                    <select class="form-control" name="role_id" required>
                        @foreach ($locations as $location)
                            <option value="{{ $location->id }}"> {{ $location->hospital }} </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="form-section">
            <div class="form-group">
                <label class="col-sm-2 control-label">Emergency Description</label>
                <div class="col-sm-10">
                    <textarea name="emergency_details" class="form-control" rows="5" placeholder="Enter Emergency Details Here" required></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 control-label">Assign Ambulance</label>
                <div class="col-sm-10">
                    <select class="form-control" name="role_id" required>
                        @foreach ($ambulance_array as $ambulance)
                            <option value="{{ $ambulance->id }}">
                                {{ $ambulance->reg_no }} With Driver:
                                @if ($driver = $ambulance->driver)
                                {{ $driver['name'] }}
                                @else
                                    {{ "No Driver Assigned" }}
                                @endif
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-2 control-label" for="kin_phone">Next Of Kin's Phone Number</label>
                <div class="col-md-10">
                    <input type="phone" id="kin_phone" name="kin_phone" class="form-control" placeholder="Kin's Phone" value="{{ old('kin_phone') }}" required>
                </div>
            </div>
        </div>

        <div class="form-navigation">
            <div class="form-group">
                <ul class="pager">
                    <div class="col-md-10">
                        <li class="previous disabled">
                            <a href=""><i class="fa fa-long-arrow-left"></i> Previous</a>
                        </li>
                    </div>

                    <div class="col-md-2">
                        <li class="next">
                            <a href="">Next <i class="fa fa-long-arrow-right"></i></a>
                        </li>
                    </div>

                    <div class="col-md-12 m-t-10">
                        <li class="">
                            <button type="submit" class="btn btn-primary btn-block waves-effect waves-light clear:left">Dispatch Ambulance</button>
                        </li>
                    </div>
                </ul>
            </div>
        </div>

    </form>
</section>

@endsection


