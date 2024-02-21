@extends('layouts.app')

@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success">
            {{ session()->get('success') }}
        </div>
    @endif
    <div class="panel panel-default">
        <div class="panel-body">
            <strong>Employee List</strong>
            <a href="{{ route('employee.create') }}" class="btn btn-primary btn-xs pull-right py-0">Create Employee</a>
            <table class="table table-responsive table-bordered table-stripped" style="margin-top:10px;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Joining Date</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr>
                        <td>{{ $employee->id }}</td>
                        <td>{{ $employee->name }}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->joining_date }}</td>
                        <td><span type="button" class="btn btn-{{ $employee->is_active ? 'success' : 'danger' }} btn-xs py-0">{{ $employee->is_active ? 'Active' : 'Inactive' }}</span></td>
                        <td>
                            <a href="{{ route('employee.show',$employee->id) }}" class="btn btn-primary btn-xs py-0">Show</a>
                            <a href="{{ route('employee.edit',$employee->id) }}" class="btn btn-warning btn-xs py-0">Edit</a>
                            <form action="{{ route('employee.destroy',$employee->id) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger btn-xs py-0">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $employees->links() }}
        </div>
    </div>
@endsection