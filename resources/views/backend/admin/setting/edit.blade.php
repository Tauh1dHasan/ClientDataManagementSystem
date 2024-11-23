@extends('backend.layouts.app')
@section('content')
    <div id="content" class="app-content">
        @include('alerts.alerts')
        <div class="d-flex align-items-center mb-3">
            <div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('admin.index')}}">DASHBOARD</a></li>
                    <li class="breadcrumb-item active">Update Setting</li>
                </ul>
                <h1 class="page-header mb-0">Update Setting</h1>
            </div>
            <div class="ms-auto">
                <a href="{{URL::previous()}}" class="btn btn-outline-theme"><i class="fa-solid fa-backward"></i> Back</a>
            </div>
        </div>

        <div class="card">


            <div class="card-body">
                <form action="{{ route('admin.setting.update', $setting->id ?? 1) }}" method="post" id="kt_form_1"
                    enctype="multipart/form-data">
                    @csrf


                    <div class="row">
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Title: </label>
                                <input type="text" class="form-control" name="title" placeholder="Enter Setting Name"
                                    value="{{ $setting->title ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Sub-Title: </label>
                                <input type="text" class="form-control" name="sub_title" placeholder="Enter Setting Name"
                                    value="{{ $setting->sub_title ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Address: </label>
                                <input type="text" class="form-control" name="address" placeholder="Enter Address"
                                    value="{{ $setting->address ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Phone: </label>
                                <input type="text" class="form-control" name="phone" placeholder="Enter Phone Number"
                                    value="{{ $setting->phone ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Alternative Phone: </label>
                                <input type="text" class="form-control" name="alt_phone" placeholder="Enter Phone Number"
                                    value="{{ $setting->alt_phone ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Mobile Number: </label>
                                <input type="text" class="form-control" name="mobile" placeholder="Enter Mobile Number"
                                    value="{{ $setting->mobile ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Alternative Mobile: </label>
                                <input type="text" class="form-control" name="alt_mobile"
                                    placeholder="Enter Mobile Number" value="{{ $setting->alt_mobile ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Email: </label>
                                <input type="text" class="form-control" name="email" placeholder="Enter Mobile Number"
                                    value="{{ $setting->email ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Alternative Email: </label>
                                <input type="text" class="form-control" name="alt_email"
                                    placeholder="Enter Mobile Number" value="{{ $setting->alt_email ?? '' }}" />
                            </div>
                        </div>
                        <div class="col-md-4 mb-2">
                            <div class="form-group">
                                <label>Logo: </label>

                                <img class="mt-2" src="{{ asset('storage/setting/' . $setting->logo) }}"
                                    style="max-height: 45px;" />

                                <input type="file" name="logo" class="form-control mt-2">
                            </div>
                        </div>

                        <div class="col-md-12 mb-2">
                            <div class="form-group">
                                <button class="btn btn-outline-lime btn-success mb-1 text-white"
                                    type="submit">Update</button>
                            </div>
                        </div>

                    </div>


                </form>

            </div>

            <div class="card-arrow">
                <div class="card-arrow-top-left"></div>
                <div class="card-arrow-top-right"></div>
                <div class="card-arrow-bottom-left"></div>
                <div class="card-arrow-bottom-right"></div>
            </div>

        </div>
    @endsection
