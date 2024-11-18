@extends('frontend.layouts.master')
@section('title', 'Faqs')
@section('content')
@include('frontend.flash')
<!--about-area start-->
<div class="faq-area mt-50">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div id="accordion">
					@foreach($data as $index => $faq)
					  <div class="card single-faq">
						<div class="card-header faq-heading" id="heading{{ $index }}">
						  <h5 class="mb-0">
							<a href="#collapse{{ $index }}" class="btn btn-link" data-toggle="collapse" aria-expanded="{{ $index == 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $index }}">
								{{ $faq['question'] }}
								<i class="fa fa-plus-circle pull-right"></i>
								<i class="fa fa-minus-circle pull-right"></i>
							</a>
						  </h5>
						</div>

						<div id="collapse{{ $index }}" class="collapse {{ $index == 0 ? 'show' : '' }}" aria-labelledby="heading{{ $index }}" data-parent="#accordion">
						  <div class="card-body">
							<p>{{ $faq['ans'] }}</p>
						  </div>
						</div>
					  </div>
					@endforeach
				</div>
			</div>
		</div>
	</div>
</div>
<!--faq-area end-->
@endsection
