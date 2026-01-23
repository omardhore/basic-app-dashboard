@extends('admin.admin_master')
@section('admin')

    <div class="content">
        <!-- Start Content-->
        <div class="container-xxl">

            <div class="py-4 d-flex align-items-sm-center flex-sm-row flex-column">
                <div class="flex-grow-1">
                    <h4 class="fs-22 fw-bold m-0 text-primary">All Reviews</h4>
                    <p class="text-muted mb-0">Manage customer testimonials and feedback.</p>
                </div>
                <div class="text-end">
                    <ol class="breadcrumb m-0 py-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">All Reviews</li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card border-0 shadow-sm">
                        <div
                            class="card-header border-bottom-0 d-flex justify-content-between align-items-center pt-4 px-4">
                            <h5 class="card-title fs-16 fw-semibold mb-0">Review List</h5>
                            <a href="{{ route('add.review') }}" class="btn btn-primary btn-sm px-4">
                                <i class="fe-plus me-1"></i> Add Review
                            </a>
                        </div>
                        <div class="card-body p-4">
                            <div class="table-responsive">
                                <table id="datatable" class="table table-hover table-borderless align-middle mb-0">
                                    <thead class="bg-light">
                                        <tr>
                                            <th class="ps-3">Sl</th>
                                            <th>Image</th>
                                            <th>Customer Name</th>
                                            <th>Position</th>
                                            <th>Message</th>
                                            <th class="text-end pe-3">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($reviews as $key => $item)
                                            <tr>
                                                <td class="ps-3 fw-medium">{{ $key + 1 }}</td>
                                                <td>
                                                    <img src="{{ asset($item->image) }}" class="rounded-circle shadow-sm"
                                                        style="width: 50px; height: 50px; object-fit: cover;">
                                                </td>
                                                <td>
                                                    <div class="fw-semibold text-dark">{{ $item->name }}</div>
                                                </td>
                                                <td><span
                                                        class="badge bg-soft-info text-info px-2 py-1">{{ $item->position }}</span>
                                                </td>
                                                <td>
                                                    <p class="text-muted mb-0"
                                                        style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                                        {{ $item->message }}
                                                    </p>
                                                </td>
                                                <td class="text-end pe-3">
                                                    <div class="btn-group">
                                                        <a href="{{ route('edit.review', $item->id) }}"
                                                            class="btn btn-soft-info btn-sm me-1" title="Edit">
                                                            <i class="fe-edit-2"></i> Edit
                                                        </a>
                                                        <a href="{{ route('delete.review', $item->id) }}"
                                                            class="btn btn-soft-danger btn-sm" id="delete" title="Delete">
                                                            <i class="fe-trash-2"></i> Delete
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection