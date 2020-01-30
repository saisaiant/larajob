@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            @if (empty(Auth::user()->profile->avator))
                <img src="{{ asset('avatar/man.jpg') }}" style="width:100%;">
            @else 
                <img src="{{ asset('uploads/avatar') }}/{{ Auth::user()->profile->avator }}" alt="" style="width:100%;">    
            @endif
            <form action="{{ route('avatar') }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <input type="file" name="avatar" class="form-control @error('avatar') is-invalid @enderror" class="mb-2">
                    @error('avatar')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <button type="submit" class="btn btn-success btn-sm float-right">Update</button>
            </form>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">Update Your Profile</div>
                <form action="{{ route('profile.create') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->profile->address }}">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone Number</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" value="{{ Auth::user()->profile->phone_number }}">
                            @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="experience">Experience</label>
                            <textarea name="experience" id="experience" cols="30" rows="4" class="form-control @error('experience') is-invalid @enderror">{{ Auth::user()->profile->experience }}</textarea>
                            @error('experience')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="bio">Bio</label>
                            <textarea name="bio" id="bio" cols="30" rows="4" class="form-control @error('bio') is-invalid @enderror">{{ Auth::user()->profile->bio }}</textarea>
                            @error('bio')
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
                    Your Information
                </div>
                <div class="card-body">
                    <p>Name : {{ Auth::user()->name }}</p>
                    <p>Email : {{ Auth::user()->email }}</p>
                    <p>Address : {{ Auth::user()->profile->address }}</p>
                    <p>Phone No : {{ Auth::user()->profile->phone_number }}</p>
                    <p>Gender : {{ Auth::user()->profile->gender }}</p>
                    <p>Experience : {{ Auth::user()->profile->experience }}</p>
                    <p>Bio : {{ Auth::user()->profile->bio }}</p>
                    <p>Member On : {{ date('F d Y', strtotime(Auth::user()->created_at) ) }}</p>
                    @if (!empty(Auth::user()->profile->cover_letter))
                        <p><a href="{{ Storage::url(Auth::user()->profile->cover_letter) }}">Cover Letter</a></p>
                    @else
                        <p>Please Upload CoverLetter</p>
                    @endif

                    @if (!empty(Auth::user()->profile->resume))
                        <p><a href="{{ Storage::url(Auth::user()->profile->resume) }}">Resume</a></p>
                    @else
                        <p>Please Upload Resume</p>
                    @endif
                </div>
            </div>
            <div class="card mb-2">
                <div class="card-header">
                    Update Coverletter
                </div>
                <div class="card-body">
                    <form action="{{ route('cover.letter') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="file" name="cover_letter" class="form-control @error('cover_letter') is-invalid @enderror mb-2">
                            @error('cover_letter')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <button type="submit" class="btn btn-success btn-sm float-right">Update</button>
                    </form>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    Update Resume
                </div>
                <div class="card-body">
                    <form action="{{ route('resume') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <input type="file" name="resume" class="form-control @error('resume') is-invalid @enderror mb-2">
                            @error('resume')
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
