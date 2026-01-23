@extends('admin.admin_master')
@section('admin')

    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-4 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-22 fw-bold m-0 text-primary">Add Review</h4>
                    <p class="text-muted mb-0">Create a new customer testimonial for your website.</p>
                </div>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('all.review') }}">Reviews</a></li>
                        <li class="breadcrumb-item active">Add Review</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header border-bottom-0 pt-4 px-4">
                            <h5 class="card-title fs-16 fw-semibold mb-0">Review Information</h5>
                        </div>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('store.review') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Customer Name</label>
                                            <input type="text" name="name" class="form-control" required
                                                placeholder="e.g. John Doe">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Position / Company</label>
                                            <input type="text" name="position" class="form-control" required
                                                placeholder="e.g. CEO at TechCorp">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Review Message</label>
                                            <textarea name="message" class="form-control" rows="5" required
                                                placeholder="Write the customer testimonial here..."></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Customer Image</label>
                                            <div class="input-group">
                                                <input type="file" name="image" class="form-control" id="image" required>
                                            </div>
                                            <small class="text-muted mt-1 d-block">Recommended size: Square aspect
                                                ratio.</small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group mb-4">
                                            <div class="image-preview-wrapper bg-light p-2 rounded">
                                                <img id="showImage" src="{{ url('upload/no_image.jpg') }}"
                                                    class="rounded-circle avatar-xl img-thumbnail shadow-sm"
                                                    alt="review image"
                                                    style="width: 120px; height: 120px; object-fit: cover;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2 border-top pt-4 mt-2">
                                    <a href="{{ route('all.review') }}" class="btn btn-outline-secondary px-4">Cancel</a>
                                    <button type="submit" class="btn btn-primary px-5">Save Review</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@section('script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>
@endsection