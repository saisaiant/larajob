@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>Avatar</th>
                            <th>Position</th>
                            <th>Address</th>
                            <th>Date</th>
                            <th></th>
                        </thead>
                        <tbody>
                            @foreach ($jobs as $job)                        
                                <tr>
                                    <td>                                        
                                        @if (empty(Auth::user()->company->logo))
                                            <img src="{{ asset('avatar/man.jpg') }}" style="width:50px;">
                                        @else 
                                            <img src="{{ asset('uploads/logo') }}/{{ Auth::user()->company->logo }}" alt="" style="width:70px;">    
                                        @endif
                                    </td>
                                    <td>
                                        position:{{ $job->position }} <br>
                                        <i class="fa fa-clock" aria-hidden="true"></i> {{ $job->type }}
                                    </td>
                                    <td><i class="fa fa-map-marker" aria-hidden="true"></i> Address: {{ $job->address }}</td>
                                    <td><i class="fa fa-globe" aria-hidden="true"></i> Date: {{ $job->created_at->diffForHumans() }}</td>
                                    <td>
                                        <a href="{{ route('jobs.show', [$job->id, $job->slug]) }}" class="btn btn-success btn-sm">Apply</a>
                                        <a href="{{ route('job.edit', [$job->id]) }}" class="btn btn-dark btn-sm">Edit</a>
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
