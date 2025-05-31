@extends('layouts.app')

@section('title', 'Dashboard')

@section('vendor_styles')
<link href="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Post-->
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row g-5 g-xl-8">
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Statistics Widget 5-->
                    <div class="card bg-body-light card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body my-3">
                            <a href="#" class="card-title fw-bold text-success fs-5 mb-3 d-block">Sales Overview</a>
                            <div class="py-1">
                                <span class="text-dark me-2 fw-bold fs-2">$24,500</span>
                                <span class="fw-semibold text-muted fs-7">Revenue</span>
                            </div>
                            <div class="progress h-7px bg-success bg-opacity-50 mt-7">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics Widget 5-->
                </div>
                <!--end::Col-->
                
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Statistics Widget 5-->
                    <div class="card bg-body-light card-xl-stretch mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body my-3">
                            <a href="#" class="card-title fw-bold text-primary fs-5 mb-3 d-block">Active Users</a>
                            <div class="py-1">
                                <span class="text-dark me-2 fw-bold fs-2">2,300</span>
                                <span class="fw-semibold text-muted fs-7">Users</span>
                            </div>
                            <div class="progress h-7px bg-primary bg-opacity-50 mt-7">
                                <div class="progress-bar bg-primary" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics Widget 5-->
                </div>
                <!--end::Col-->
                
                <!--begin::Col-->
                <div class="col-xl-4">
                    <!--begin::Statistics Widget 5-->
                    <div class="card bg-body-light card-xl-stretch mb-5 mb-xl-8">
                        <!--begin::Body-->
                        <div class="card-body my-3">
                            <a href="#" class="card-title fw-bold text-danger fs-5 mb-3 d-block">New Orders</a>
                            <div class="py-1">
                                <span class="text-dark me-2 fw-bold fs-2">1,500</span>
                                <span class="fw-semibold text-muted fs-7">Orders</span>
                            </div>
                            <div class="progress h-7px bg-danger bg-opacity-50 mt-7">
                                <div class="progress-bar bg-danger" role="progressbar" style="width: 90%" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Statistics Widget 5-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Post-->
</div>
<!--end::Content-->
@endsection

@section('vendor_scripts')
<script src="{{ asset('assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
@endsection

@section('scripts')
<script>
    // Add your custom JavaScript here
</script>
@endsection