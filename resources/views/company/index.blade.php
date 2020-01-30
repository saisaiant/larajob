@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <div class="company-profile">
            <img src="{{ asset('cover/ceo.png') }}" class="img-fluid">
            <div class="company-desc">
                <img src="{{ asset('avatar/logo.png') }}" style="width:90px; height:90px">
                <p>{{ $company->description }}</p>
                <h3>{{ $company->cname }}</h3>
                <p>Slogan - {{ $company->slogan }}
                    Address - {{ $company->address }}
                    Phone - {{ $company->phone }}
                    Website - {{ $company->website }}</p>
            </div>
        </div>
        <table class="table">
            <thead>
                <th>Avatar</th>
                <th>Position</th>
                <th>Address</th>
                <th>Date</th>
                <th></th>
            </thead>
            <tbody>
                @foreach ($company->jobs as $job)                        
                    <tr>
                        <td><img src="{{ asset('avatar/logo.png') }}" style="width: 50px" alt=""></td>
                        <td>
                            position:{{ $job->position }} <br>
                            <i class="fa fa-clock" aria-hidden="true"></i> {{ $job->type }}
                        </td>
                        <td><i class="fa fa-map-marker" aria-hidden="true"></i> Address: {{ $job->address }}</td>
                        <td><i class="fa fa-globe" aria-hidden="true"></i> Date: {{ $job->created_at->diffForHumans() }}</td>
                        <td><a href="{{ route('jobs.show', [$job->id, $job->slug]) }}" class="btn btn-success btn-sm">Apply</a></td>
                    </tr>
                @endforeach                    
            </tbody>
        </table>
    </div>
</div>
@endsection
