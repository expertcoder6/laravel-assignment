@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">
                    {{ __('View Company') }}

                    <a class="btn btn-primary" href='{{ url("/companies") }}' style="float: right;">BACK</a>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <div class="form-group mb-2">
                        <label>Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ $company->name }}" disabled>
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ $company->email }}" disabled>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group mb-2">
                        <label>Logo</label>
                        <span style="padding:0 20px"></span>
                        @error('logo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <img src="{{url('/images/').'/'.$company->logo}}" alt="Image" width="100" height="100"/>
                    </div> 
                    <div class="form-group mb-2">
                        <label>Website</label>
                        <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" id="website" value="{{ $company->website }}" disabled>
                        @error('website')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror                
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
