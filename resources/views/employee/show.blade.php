@extends('layouts.app')

@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
            <p style="font-size:20px; font-weight:bold;">Employee details</p>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" value="{{ $employee->name }}">
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" value="{{ $employee->email }}">
            </div>

            <div class="form-group">
                <label for="joining_date">Joining date</label>
                <input type="date" class="form-control" value="{{ $employee->joining_date }}">
            </div>

            <div class="form-group">
                <label for="joining_salary">Joining salary</label>
                <input type="number" class="form-control" value="{{ $employee->joining_salary }}">
            </div>

            <div class="form-group">
                <label for="is_active">Active</label><br>
                <input type="checkbox"  {{ $employee->is_active ? 'checked' : '' }}/>
            </div>
            <a href="{{ route('employee.index') }}" class="btn btn-primary">Back</button>
        </div>
    </div>
@endsection
