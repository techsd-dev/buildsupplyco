@extends('backend.layouts.master')
@section('title') Return & Shipment Policy @endsection
@section('content')

@include('backend.flash')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Return & Shipment Policy</h4>
            </div><!-- end card header -->
            <div class="card-body">
                <div class="listjs-table" id="customerList">
                    <div class="row g-4 mb-3">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="live-preview">
                                            <!-- Form to create product -->
                                            <form action="{{ route('return.n.shpmnt.policy.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                                                <div class="row">
                                                    <!-- Product Name -->
                                                    <div class="col-lg-12">
                                                        <div class="form-floating">
                                                            <input type="text" name="title" class="form-control" value="{{ $data->title ?? '' }}" id="productNameInput">
                                                            <label for="productNameInput">Title</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <!-- Product Description -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating">
                                                            <textarea name="description" class="form-control" id="descriptionInput1" placeholder="Enter  description">{!! $data->description ?? '' !!}</textarea>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <!-- Product Name -->
                                                    <div class="col-lg-12">
                                                        <div class="form-floating">
                                                            <input type="text" name="title1" class="form-control" value="{{ $data->title1 ?? '' }}" id="productNameInput">
                                                            <label for="productNameInput">Title Two</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <!-- Product Description -->
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <div class="form-floating">
                                                            <textarea name="description1" class="form-control" id="descriptionInput2" placeholder="Enter  description two">{!! $data->description1 ?? '' !!}</textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br>
                                                <!-- Submit Button -->
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                    </div>
                                                </div>
                                        </div>
                                        </form>
                                        <!-- End of form -->
                                    </div>
                                </div><!-- end card body -->
                            </div><!-- end card -->
                        </div><!-- end col -->
                    </div><!-- end row -->
                </div><!-- end row -->
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->
</div><!-- end col -->
</div><!-- end row -->
@endsection
@section('script')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ URL::asset('public/build/libs/@ckeditor/ckeditor5-build-classic/build/ckeditor.js') }}"></script>
<script>
    $(document).ready(function() {
        // Initialize CKEditor for both description fields
        ClassicEditor
            .create(document.querySelector('#descriptionInput1'))
            .catch(error => {
                console.error('Error initializing editor for descriptionInput1:', error);
            });

        ClassicEditor
            .create(document.querySelector('#descriptionInput2'))
            .catch(error => {
                console.error('Error initializing editor for descriptionInput2:', error);
            });
    });
</script>
@endsection