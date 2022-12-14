@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('Add Employee') }}
                    <a class="btn btn-primary" href='{{ url("/employees") }}' style="float: right;">BACK</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form  method="post" action="{{ route('employees.store') }}" novalidate enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-2">
                            <label>First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" id="first_name">
                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label>Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" id="last_name">
                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group mb-2">
                            <label>Company</label>

                            <select id="company" name="company" class="form-control @error('company') is-invalid @enderror">
                                <option value="">Select Company</option>
                                
                                @foreach($copanies as $copany)
                                    <option value="{{ $copany->id }}">{{ $copany->name }}</option>
                                @endforeach
                            </select>

                            @error('company')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label>Email</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email">
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-2">
                            <label>Phone</label>
                            <input type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" id="phone">
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror                
                        </div>
                        <div class="d-grid mt-3">
                          <input type="submit" name="send" value="Submit" class="btn btn-dark btn-block">
                        </div>
                    </form>

                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
