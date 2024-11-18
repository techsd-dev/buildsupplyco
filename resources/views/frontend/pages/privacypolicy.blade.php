@extends('frontend.layouts.master')
@section('title', 'Privacy Polic')
@section('content')
@include('frontend.flash')
<!--content-area start-->
<div class="container">
    <div class="row align-items-center">
        <div class="col-lg-12">
            <section id="terms-and-conditions">
                <h2>{{ $data->title }}</h2>
                {!! $data->description !!}
            </section>
        </div>
    </div>
</div>
@endsection