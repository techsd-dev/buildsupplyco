@extends('frontend.layouts.master')
@section('title', 'Careers')
@section('content')

@include('frontend.flash')
<style>
    .career-list {
        background: hsl(0 0% 96% / 1);
        padding: 100px 0px 70px;
    }

    .job-description {
        padding: 20px;
        border-radius: 10px;
        margin-bottom: 30px;
        position: relative;
        transition: all 0.3s ease-in;
        background: #f0f0f0;
        box-shadow: 3px 3px 4px rgba(180, 167, 192, 0.27), -2px -2px 4px white;
        z-index: 1;
        cursor: pointer;
    }

    .job-description::after {
        content: "";
        background: #e23e1d;
        border-radius: 15px;
        height: 100%;
        width: 100%;
        position: absolute;
        left: 0;
        top: 0;
        pointer-events: none;
        border-radius: 10px;
        clip-path: circle(10% at 0% 0%);
        transition: all 0.3s ease-in;
        color: #fff !important;
        z-index: -1;
    }

    .job-description:hover h4 {
        color: #fff;
    }

    .job-description:hover::after {
        clip-path: circle(100%);
    }
</style>

<div class="career-list my-5">
    <div class="container ">
        <div class="row">
            <!-- Responsibilities Card -->
            @foreach($data as $career)
            <div class="col-md-4">
                <div class="card job-description">
                    <div class="card-body p-2">
                        <h4 class="card-title mb-0">{{ $career->designation }}</h4>
                        <p class="card-text"><strong>Location:</strong> {{ $career->job_location }}</p>
                            <p class="card-text"><strong>Qualification:</strong> {{ $career->qualification }}</p>
                            <p class="card-text"><strong>Experience:</strong> {{ $career->experience }} years</p>
                            <p class="card-text">{{ Str::limit($career->overview, 150) }}</p>
                            <a href="{{ route('fr.details', $career->slug) }}" class="btn btn-primary">View Details</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection