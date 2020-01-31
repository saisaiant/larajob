@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit A Job</div>
                    <div class="card-body">
                        <form action="{{ route('job.update', $job->id) }}" method="POST">
                            @csrf
                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" value="{{ $job->title }}" name="title">
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="5">{{ $job->description }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="roles">Role</label>
                            <textarea name="roles" class="form-control @error('roles') is-invalid @enderror" cols="30" rows="5">{{ $job->roles }}</textarea>
                            @error('roles')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="category_id">Category</label>
                            <select name="category_id" class="form-control">
                                @foreach (App\Category::all() as $cat)
                                    <option value="{{ $cat->id }}" {{ $cat->id == $job->category_id ? 'selected' : '' }}>{{ $cat->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="position">Position</label>
                            <input type="text" class="form-control @error('position') is-invalid @enderror" value="{{ $job->position }}" name="position">
                            @error('position')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ $job->address }}" name="address">
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="type">Type</label>
                            <select name="type" class="form-control">
                                <option value="fulltime" {{ $job->type=='fulltime' ? 'selected' : '' }}>Full Time</option>
                                <option value="parttime" {{ $job->type=='parttime' ? 'selected' : '' }}>Part Time</option>
                                <option value="casual" {{ $job->type=='casual' ? 'selected' : '' }}>Casual</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ $job->status == '1' ? 'selected' : '' }}>Live</option>
                                <option value="0" {{ $job->status == '0' ? 'selected' : '' }}>Draft</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="last_date">Last Date</label>
                            <input type="text" id="datepicker" class="form-control @error('last_date') is-invalid @enderror" value="{{ $job->last_date }}" name="last_date">
                            @error('last_date')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm">Submit</button>
                        </div>
                        @if (Session::has('message'))
                            <div class="alert alert-success">
                                {{ Session::get('message') }}
                            </div>
                        @endif
                    </form>
                    </div>
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection
