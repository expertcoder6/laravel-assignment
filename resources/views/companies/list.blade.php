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
                    {{ __('All Companies') }}

                    @if( $role == 1 )
                        <a href="{{ URL::route('companies.create') }}" class="btn btn-primary" style="float:right;">Add New</a>
                    @endif
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <?php //echo "<pre>"; print_r($companies); ?>

                    <table id="dtBasicExample" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th class="th-sm">Name</th>
                                <th class="th-sm">Email</th>
                                <th class="th-sm">Logo</th>
                                <th class="th-sm">Website</th>
                                <th class="th-sm">Created Date</th>
                                <th class="th-sm">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach( $companies as $company )
                                <tr>
                                    <td> {{ $company->name }} </td>
                                    <td> {{ $company->email }} </td>
                                    <td>
                                        <img src="{{url('/images/').'/'.$company->logo}}" alt="Image" width="100" height="100"/>
                                    </td>
                                    <td>
                                        {{ $company->website }}
                                    </td>
                                    <td>
                                        {{ 
                                        date('Y-m-d', strtotime($company->created_at)) 
                                        }}
                                    </td>
                                    <td>
                                        <a href='{{ url("/companies") }}/{{ $company->id }}/show' class="btn btn-info">Show</a>

                                        @if($role == 1 )
                                            <a href='{{ url("/companies") }}/{{ $company->id }}/edit' class="btn btn-primary">Edit</a>

                                            <form action="{{ route('companies.destroy', $company->id ) }}" method="post">
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
