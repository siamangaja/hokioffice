@extends('layouts.main')
@section('title', $title)

@section('content')
<!--begin::Post-->
<div class="post d-flex flex-column-fluid" id="kt_post">
<!--begin::Container-->
<div id="kt_content_container" class="container-xxl">
<!--begin::Basic info-->
<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bolder m-0">{{$title}}</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_profile_details" class="collapse show">
        <!--begin::Form-->
        <form id="" class="form" action="{{url('user/profile')}}" method="POST">
        @csrf
            <!--begin::Card body-->
            <div class="card-body border-top p-9">

			@if (session('error'))
			<div class="alert alert-danger alert-dismissible fade show" role="alert">
				{{ session('error') }}
			</div>
			@endif
			@if (session('success'))
			<div class="alert alert-success alert-dismissible fade show" role="alert">
				{{ session('success') }}
			</div>
			@endif

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label required fw-bold fs-6">Name</label>
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="name" class="form-control" placeholder="Name" value="{{ $d->name }}" required/>
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Email</span>
                    </label>
                    <div class="col-lg-8 fv-row">
                        <input type="email" name="email" class="form-control" placeholder="Email" value="{{ $d->email }}" required readonly/>
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">Address</label>
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="address" class="form-control" placeholder="Address" value="{{ $d->address }}" />
                    </div>
                </div>

                <div class="row mb-6">
                    <label class="col-lg-4 col-form-label fw-bold fs-6">
                        <span class="required">Phone</span>
                    </label>
                    <div class="col-lg-8 fv-row">
                        <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ $d->phone }}" required />
                    </div>
                </div>

            </div>
            <!--end::Card body-->
            <!--begin::Actions-->
            <div class="card-footer d-flex justify-content-end py-6 px-9">
                <a href="{{url('user')}}" class="btn btn-light btn-active-light-primary me-2">Kembali</a>
                <button type="submit" class="btn btn-primary" id="submit">Update</button>
            </div>
            <!--end::Actions-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Content-->
</div>
<!--end::Basic info-->
</div>
<!--end::Container-->
</div>
<!--end::Post-->
@stop