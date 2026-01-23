@extends('admin.admin_master')
@section('admin')

    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-4 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-22 fw-bold m-0 text-primary">Home Slider Setup</h4>
                    <p class="text-muted mb-0">Customize the main hero section of your website.</p>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-10 offset-lg-1">
                    <div class="card border-0 shadow-sm">
                        <div class="card-header border-bottom-0 pt-4 px-4">
                            <h5 class="card-title fs-16 fw-semibold mb-0">Slider Configuration</h5>
                        </div>
                        <div class="card-body p-4">
                            <form method="POST" action="{{ route('update.slider') }}" enctype="multipart/form-data">
                                @csrf

                                <input type="hidden" name="id" value="{{ $homeslider->id }}">
                                <input type="hidden" name="old_image" value="{{ $homeslider->image }}">

                                <div class="row g-4">
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Headline Title</label>
                                            <input type="text" name="title" class="form-control"
                                                value="{{ $homeslider->title }}" required placeholder="Enter hero title">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Action Link (URL)</label>
                                            <input type="text" name="link" class="form-control"
                                                value="{{ $homeslider->link }}" required
                                                placeholder="e.g. /services or https://...">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group mb-0">
                                            <label class="form-label">Short Description</label>
                                            <textarea name="description" class="form-control" rows="4" required
                                                placeholder="Enter a brief description for the hero section"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group mb-3">
                                            <label class="form-label">Slider Background Image</label>
                                            <div class="input-group">
                                                <input type="file" name="image" class="form-control" id="image">
                                            </div>
                                            <small class="text-secondary mt-1 d-block">Required Size: **306 x 618**
                                                pixels.</small>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group mb-4">
                                            <div class="image-preview-wrapper bg-light p-3 rounded">
                                                <img id="showImage" src="{{ asset($homeslider->image) }}"
                                                    class="rounded shadow-sm img-thumbnail" alt="slider image"
                                                    style="max-width: 300px; height: auto; object-fit: contain;">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2 border-top pt-4 mt-2">
                                    <button type="submit" class="btn btn-primary px-5">Update Slider</button>
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