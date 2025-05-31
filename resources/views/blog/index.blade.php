@extends('layouts.app')

@section('title', 'Blog Management')

@section('content')
<div class="container-fluid">
    <!--begin::Card-->
    <div class="card">
        <!--begin::Card header-->
        <div class="card-header border-0 pt-6">
            <!--begin::Card title-->
            <div class="card-title">
                <h2>Blog Management</h2>
            </div>
            <!--begin::Card title-->
            <!--begin::Card toolbar-->
            <div class="card-toolbar">
                <!--begin::Toolbar-->
                <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createBlogModal">
                        <i class="ki-duotone ki-plus fs-2"></i>Add Blog
                    </button>
                </div>
                <!--end::Toolbar-->
            </div>
            <!--end::Card toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        <div class="card-body py-4">
            <!--begin::Table-->
            <table class="table align-middle table-row-dashed fs-6 gy-5" id="blogsTable">
                <thead>
                    <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
                        <th>Title</th>
                        <th>Author</th>
                        <th>Published At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="text-gray-600 fw-semibold">
                </tbody>
            </table>
            <!--end::Table-->
        </div>
        <!--end::Card body-->
    </div>
    <!--end::Card-->
</div>

<!-- Create Blog Modal -->
<div class="modal fade" id="createBlogModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Create New Blog</h2>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-2x"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <form id="createBlogForm" class="form">
                    @csrf
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Title</label>
                        <input type="text" name="title" class="form-control form-control-solid mb-3 mb-lg-0" required />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Content</label>
                        <textarea name="content" class="form-control form-control-solid mb-3 mb-lg-0" rows="5" required></textarea>
                    </div>
                    <div class="text-center pt-15">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Submit</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Edit Blog Modal -->
<div class="modal fade" id="editBlogModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <div class="modal-content">
            <div class="modal-header">
                <h2>Edit Blog</h2>
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <i class="ki-duotone ki-cross fs-2x"></i>
                </div>
            </div>
            <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                <form id="editBlogForm" class="form">
                    @csrf
                    <input type="hidden" name="blog_id" />
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Title</label>
                        <input type="text" name="title" class="form-control form-control-solid mb-3 mb-lg-0" required />
                    </div>
                    <div class="fv-row mb-7">
                        <label class="required fw-semibold fs-6 mb-2">Content</label>
                        <textarea name="content" class="form-control form-control-solid mb-3 mb-lg-0" rows="5" required></textarea>
                    </div>
                    <div class="text-center pt-15">
                        <button type="submit" class="btn btn-primary">
                            <span class="indicator-label">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        // Add CSRF token to all AJAX requests
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        // Initialize DataTable
        var table = $('#blogsTable').DataTable({
            processing: true,
            serverSide: false,
            ajax: {
                url: "{{ route('blogs.get') }}",
                dataSrc: 'blogs'
            },
            columns: [
                { data: 'title' },
                { data: 'user.name' },
                { 
                    data: 'published_at',
                    render: function(data) {
                        return moment(data).format('YYYY-MM-DD HH:mm');
                    }
                },
                {
                    data: null,
                    render: function(data, type, row) {
                        return `
                            <button class="btn btn-sm btn-light btn-active-light-primary edit-blog" data-blog='${JSON.stringify(row)}'>
                                Edit
                            </button>
                            <button class="btn btn-sm btn-light btn-active-light-danger delete-blog" data-id="${row.id}">
                                Delete
                            </button>
                        `;
                    }
                }
            ]
        });

        // Create Blog
        $('#createBlogForm').on('submit', function(e) {
            e.preventDefault();
            var formData = new FormData(this);

            $.ajax({
                url: "{{ route('blogs.store') }}",
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#createBlogModal').modal('hide');
                    table.ajax.reload();
                    toastr.success(response.message);
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        toastr.error('An error occurred while creating the blog');
                    }
                }
            });
        });

        // Edit Blog
        $(document).on('click', '.edit-blog', function() {
            var blog = $(this).data('blog');
            var form = $('#editBlogForm');
            
            form.find('[name="blog_id"]').val(blog.id);
            form.find('[name="title"]').val(blog.title);
            form.find('[name="content"]').val(blog.content);
            
            $('#editBlogModal').modal('show');
        });

        // Update Blog
        $('#editBlogForm').on('submit', function(e) {
            e.preventDefault();
            var blogId = $(this).find('[name="blog_id"]').val();
            var formData = new FormData(this);
            formData.append('_method', 'PUT');

            $.ajax({
                url: `/blogs/${blogId}`,
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    $('#editBlogModal').modal('hide');
                    table.ajax.reload();
                    toastr.success(response.message);
                },
                error: function(xhr) {
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        $.each(errors, function(key, value) {
                            toastr.error(value[0]);
                        });
                    } else {
                        toastr.error('An error occurred while updating the blog');
                    }
                }
            });
        });

        // Delete Blog
        $(document).on('click', '.delete-blog', function() {
            var blogId = $(this).data('id');
            
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                buttonsStyling: false,
                customClass: {
                    confirmButton: 'btn btn-danger',
                    cancelButton: 'btn btn-light'
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/blogs/${blogId}/delete`,
                        type: 'DELETE',
                        success: function(response) {
                            table.ajax.reload();
                            Swal.fire({
                                title: 'Deleted!',
                                text: response.message,
                                icon: 'success',
                                buttonsStyling: false,
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                }
                            });
                        },
                        error: function(xhr) {
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred while deleting the blog',
                                icon: 'error',
                                buttonsStyling: false,
                                confirmButtonText: 'OK',
                                customClass: {
                                    confirmButton: 'btn btn-primary'
                                }
                            });
                        }
                    });
                }
            });
        });
    });
</script>
@endpush 