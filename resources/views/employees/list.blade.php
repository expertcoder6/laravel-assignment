@extends('layouts.app')

@section('content')

@php
    $role = Auth::user()->role;
@endphp

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('All Employees') }}

                    @if( $role == 1 )
                        <a href="{{ URL::route('employees.create') }}" class="btn btn-primary" style="float:right;">Add New</a>
                    @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <?php //echo "<pre>"; print_r($employees); ?>

                    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">First Name</th>
                                <th class="th-sm">Last Name</th>
                                <th class="th-sm">Company</th>
                                <th class="th-sm">Email</th>
                                <th class="th-sm">Phone</th>
                                <th class="th-sm">Created Date</th>
                                <th class="th-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $employees as $employee )
                                <tr>
                                    <td> {{ $employee->first_name }} </td>
                                    <td> {{ $employee->last_name }} </td>
                                    <td> 
                                        {{ $employee->companyName($employee->company) }} 
                                    </td>
                                    <td>
                                        {{ $employee->email }}
                                    </td>
                                    <td>
                                        {{ $employee->phone }}
                                    </td>
                                    <td>
                                        {{ 
                                        date('Y-m-d', strtotime($employee->created_at)) 
                                        }}
                                    </td>
                                    <td>
                                        <a href='{{ url("/employees") }}/{{ $employee->id }}/show' class="btn btn-info">Show</a>

                                        @if( $role == 1 )
                                            <a href='{{ url("/employees") }}/{{ $employee->id }}/edit' class="btn btn-primary">Edit</a>

                                            <form action="{{ route('employees.destroy', $employee->id ) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure to delete this user?')">
                                                    Delete
                                                </button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
