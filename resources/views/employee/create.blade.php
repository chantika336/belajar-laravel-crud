@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p style="font-size:20px; font-weight:bold;">Create New Employee</p>
            <form action="{{ route('employee.store') }}" method="POST">
                @csrf
                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('joining_date') ? ' has-error' : '' }}">
                    <label for="joining_date">Joining date</label>
                    <input type="date" name="joining_date" id="joining_date" class="form-control">

                    @if ($errors->has('joining_date'))
                        <span class="help-block">
                            <strong>{{ $errors->first('joining_date') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('joining_salary') ? ' has-error' : '' }}">
                    <label for="joining_salary">Joining salary</label>
                    <input type="number" name="joining_salary" id="joining_salary" class="form-control">

                    @if ($errors->has('joining_salary'))
                        <span class="help-block">
                            <strong>{{ $errors->first('joining_salary') }}</strong>
                        </span>
                    @endif
                </div>

                <div class="form-group{{ $errors->has('is_active') ? ' has-error' : '' }}">
                    <label for="is_active">Active</label><br>
                    <input type="checkbox" name="is_active" id="is_active" value="1">
                    @if ($errors->has('is_active'))
                        <span class="help-block">
                            <strong>{{ $errors->first('is_active') }}</strong>
                        </span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Create Employee</button>
            </form>
        </div>
    </div>
@endsection