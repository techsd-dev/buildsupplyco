@extends('frontend.layouts.master')
@section('title', 'Return and Shipment Policy')
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
    <div class="row align-items-center">
        <div class="col-lg-12">
            <section id="terms-and-conditions">
                <h2>{{ $data->title1 }}</h2>
                {!! $data->description1 !!}
            </section>
        </div>
    </div>
</div>
@endsection