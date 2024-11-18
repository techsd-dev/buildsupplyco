@extends('backend.layouts.master')
@section('title') Settings @endsection
@section('content')

@include('backend.flash')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">Settings</h4>
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
                                            <form action="{{ route('settings.store') }}" method="POST" enctype="multipart/form-data">
                                                @csrf

                                                <input type="hidden" name="id" value="{{ $data->id ?? '' }}">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="title" class="form-control" value="{{ $data->title ?? '' }}" id="productNameInput">
                                                            <label for="productNameInput">Title</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="content" class="form-control" value="{{ $data->content ?? '' }}" id="productNameInput">
                                                            <label for="productNameInput">Content</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="fb" class="form-control" value="{{ $data->fb ?? '' }}" id="productNameInput">
                                                            <label for="productNameInput">Facebook</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="ytb" class="form-control" value="{{ $data->ytb ?? '' }}" id="productNameInput">
                                                            <label for="productNameInput">YouTube</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-lg-4">
                                                        <div class="form-floating">
                                                            <input type="text" name="twitter" class="form-control" value="{{ $data->twitter ?? '' }}" id="productNameInput">
                                                            <label for="productNameInput">Twitter</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-floating">
                                                            <input type="text" name="insta" class="form-control" value="{{ $data->insta ?? '' }}" id="productNameInput">
                                                            <label for="productNameInput">Instagram</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-4">
                                                        <div class="form-floating">
                                                            <input type="text" name="linkedin" class="form-control" value="{{ $data->linkedin ?? '' }}" id="productNameInput">
                                                            <label for="productNameInput">LinkedIn</label>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="phone" class="form-control" value="{{ $data->phone ?? '' }}" id="productNameInput">
                                                            <label for="productNameInput">Phone</label>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-floating">
                                                            <input type="text" name="email" class="form-control" value="{{ $data->email ?? '' }}" id="productNameInput">
                                                            <label for="productNameInput">Email</label>
                                                        </div>
                                                    </div>
                                                </div><br>
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

        ClassicEditor
            .create(document.querySelector('#descriptionInput1'))
            .catch(error => {
                console.error(error);
            });
    });
</script>
@endsection