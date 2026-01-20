@extends('admin.admin_master')

@section('admin')
    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-3 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-18 fw-semibold m-0">Profile</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">

                        <div class="card-body">

                            <div class="align-items-center">
                                <div class="d-flex align-items-center">
                                    <img src="{{ (!empty($user->photo)) ? url('upload/admin_images/' . $user->photo) : url('upload/no_image.jpg') }}"
                                        class="rounded-circle avatar-xxl img-thumbnail float-start" alt="image profile">

                                    <div class="overflow-hidden ms-4">
                                        <h4 class="m-0 text-dark fs-20">{{ $user->name }}</h4>
                                        <p class="my-1 text-muted fs-16">{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>



                            <div class="tab-pane pt-4" id="profile_setting" role="tabpanel">
                                <div class="row">

                                    <div class="row">
                                        <div class="col-lg-6 col-xl-6">
                                            <div class="card border mb-0">

                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h4 class="card-title mb-0">Personal Information</h4>
                                                        </div><!--end col-->
                                                    </div>
                                                </div>

                                                <div class="card-body">
                                                    <form method="POST" action="{{ route('admin.profile.store') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Name</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input class="form-control" name="name" type="text"
                                                                    value="{{ $user->name }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Email</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input class="form-control" name="email" type="email"
                                                                    value="{{ $user->email }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Phone</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input class="form-control" name="phone" type="text"
                                                                    value="{{ $user->phone }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Address</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input class="form-control" name="address" type="text"
                                                                    value="{{ $user->address }}">
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Profile Photo</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input class="form-control" name="photo" type="file"
                                                                    id="image">
                                                            </div>
                                                        </div>

                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label"></label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <img id="showImage"
                                                                    src="{{ (!empty($user->photo)) ? url('upload/admin_images/' . $user->photo) : url('upload/no_image.jpg') }}"
                                                                    class="rounded-circle avatar-lg img-thumbnail"
                                                                    alt="profile-image">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-12 col-xl-12">
                                                                <button type="submit" class="btn btn-primary">Save
                                                                    Changes</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div><!--end card-body-->
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-xl-6">
                                            <div class="card border mb-0">

                                                <div class="card-header">
                                                    <div class="row align-items-center">
                                                        <div class="col">
                                                            <h4 class="card-title mb-0">Change Password</h4>
                                                        </div><!--end col-->
                                                    </div>
                                                </div>

                                                <div class="card-body mb-0">
                                                    <form method="POST" action="{{ route('admin.update.password') }}">
                                                        @csrf
                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Old Password</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input
                                                                    class="form-control @error('old_password') is-invalid @enderror"
                                                                    name="old_password" type="password"
                                                                    placeholder="Old Password" id="old_password">
                                                                @error('old_password')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">New Password</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input
                                                                    class="form-control @error('new_password') is-invalid @enderror"
                                                                    name="new_password" type="password"
                                                                    placeholder="New Password" id="new_password">
                                                                @error('new_password')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="form-group mb-3 row">
                                                            <label class="form-label">Confirm Password</label>
                                                            <div class="col-lg-12 col-xl-12">
                                                                <input class="form-control" name="new_password_confirmation"
                                                                    type="password" placeholder="Confirm Password"
                                                                    id="new_password_confirmation">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <div class="col-lg-12 col-xl-12">
                                                                <button type="submit" class="btn btn-primary">Change
                                                                    Password</button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div><!--end card-body-->
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-xl-6">
                                            <div class="card border mb-0 mt-3">
                                                <div class="card-header">
                                                    <h4 class="card-title mb-0">Two Factor Authentication</h4>
                                                </div>
                                                <div class="card-body">
                                                    <form method="POST" action="{{ route('bs.verify.update') }}">
                                                        @csrf
                                                        @method('PUT')

                                                        @if (auth()->user()->two_factor_enabled)
                                                            <div class="mb-3">
                                                                <p class="text-success fw-medium">
                                                                    {{ __('Two factor authentication is currently enabled.') }}
                                                                </p>
                                                            </div>
                                                            <button type="submit" class="btn btn-danger">
                                                                {{ __('Disable') }}
                                                            </button>
                                                        @else
                                                            <div class="mb-3">
                                                                <p class="text-muted fw-medium">
                                                                    {{ __('Two factor authentication is currently disabled.') }}
                                                                </p>
                                                            </div>
                                                            <button type="submit" class="btn btn-primary">
                                                                {{ __('Enable') }}
                                                            </button>
                                                        @endif
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- end education -->
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