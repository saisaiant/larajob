@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if (empty(Auth::user()->company->logo))
                <img src="{{ asset('avatar/man.jpg') }}" style="width:100%;">
            @else 
                <img src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}" alt="" style="width:100%;">    
            @endif
            <form action="{{ route('company.logo') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <input type="file" name="logo" class="form-control @error('logo') is-invalid @enderror" class="mb-2">
                    @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-success btn-sm float-right">Update</button>
            </form>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Update Your Company Information</div>
                <form action="{{ route('company.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->company->address }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ Auth::user()->company->phone }}">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="website">Website</label>
                            <input type="text" class="form-control @error('website') is-invalid @enderror" name="website" value="{{ Auth::user()->company->website }}">
                            @error('website')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="slogan">Slogan</label>
                            <input type="text" class="form-control @error('slogan') is-invalid @enderror" name="slogan" value="{{ Auth::user()->company->slogan }}">
                            @error('slogan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ Auth::user()->company->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-success btn-sm" type="submit">Update</button>
                        </div>
                    </div>
                    @if (Session::has('message'))
                        <div class="alert alert-success">
                            {{ Session::get('message') }}
                        </div>
                    @endif
                </form>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-2">
                <div class="card-header">
                    About Your Company
                </div>
                <div class="card-body">
                    <p>Company Name: {{ Auth::user()->company->cname }}</p>
                    <p>Address: {{ Auth::user()->company->address }}</p>
                    <p>Phone: {{ Auth::user()->company->phone }}</p>
                    <p>Website: <a href="{{ Auth::user()->company->website }}">{{ Auth::user()->company->website }}</a></p>
                    <p>Slogan: {{ Auth::user()->company->slogan }}</p>
                    <p>Description: {{ Auth::user()->company->description }}</p>
                    <p><a href="{{ Auth::user()->company->id }}/{{ Auth::user()->company->slug }}">View</a></p>
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header">
                    Update Cover Photo
                </div>
                <div class="card-body">
                    <form action="{{ route('cover.photo') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="file" name="cover_photo" class="form-control @error('cover_photo') is-invalid @enderror mb-2">
                            @error('cover_photo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button type="submit" class="btn btn-success btn-sm float-right">Update</button>
                    </form>
                </div>
            </div>            
        </div>
    </div>
</div>
@endsection
