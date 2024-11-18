@extends('frontend.layouts.master')
@section('title', 'Terms and Conditions')
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
</div>
@endsection