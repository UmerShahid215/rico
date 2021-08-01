@extends('layouts.master.master-admin')
@section('header')
    <style>
        .kt-badge--success {
            background: #1BB580 !important;
        }
    </style>
@stop
@section('content')
    <div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" id="kt_content">

        <!-- begin:: Content Head -->
        <div class="kt-subheader   kt-grid__item" id="kt_subheader">
            <div class="kt-container  kt-container--fluid ">
                <div class="kt-subheader__main">
                    <h3 class="kt-subheader__title">
                        New User
                    </h3>
                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                    <div class="kt-subheader__group" id="kt_subheader_search">
										<span class="kt-subheader__desc" id="kt_subheader_total">
											Enter user details and submit </span>
                    </div>
                </div>
                <div class="kt-subheader__toolbar">
                    <a href="#" class="btn btn-default btn-bold">
                        Back </a>
                    <div class="btn-group">
                        <button type="submit" class="btn btn-brand btn-bold">
                            Submit </button>


                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Content Head -->

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-wizard-v4" id="kt_user_add_user" data-ktwizard-state="step-first">

                <!--begin: Form Wizard Nav -->
                {{-- <div class="kt-wizard-v4__nav">
                    <div class="kt-wizard-v4__nav-items nav">


                        <div class="kt-wizard-v4__nav-item nav-item" data-ktwizard-type="step">
                            <div class="kt-wizard-v4__nav-body">
                                <div class="kt-wizard-v4__nav-number">
                                    2
                                </div>
                                <div class="kt-wizard-v4__nav-label">
                                    <div class="kt-wizard-v4__nav-label-title">
                                        Information
                                    </div>
                                    <div class="kt-wizard-v4__nav-label-desc">
                                        User's Information
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="kt-wizard-v4__nav-item nav-item" data-ktwizard-type="step">
                            <div class="kt-wizard-v4__nav-body">
                                <div class="kt-wizard-v4__nav-number">
                                    3
                                </div>
                                <div class="kt-wizard-v4__nav-label">
                                    <div class="kt-wizard-v4__nav-label-title">
                                        Address
                                    </div>
                                    <div class="kt-wizard-v4__nav-label-desc">
                                        User's Shipping Address
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div> --}}

                <!--end: Form Wizard Nav -->
                <div class="kt-portlet">
                    <div class="kt-portlet__body kt-portlet__body--fit">
                        <div class="kt-grid">
                            <div class="kt-grid__item kt-grid__item--fluid kt-wizard-v4__wrapper">

                                <!--begin: Form Wizard Form-->
                                <form action="{{ route('employee.forms.store') }}" id="employee-form-store" method="post" enctype="multipart/form-data" class="kt-form">
                                @csrf

                                <!--begin: Form Wizard Step 2-->
                                    <div class="kt-wizard-v4__content" >
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-wizard-v4__form">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="kt-section__body">
                                                            <div class="form-group row">
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <h3 class="kt-section__title kt-section__title-md">User's Account Details</h3>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Profile Pic</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                                                        <div class="kt-avatar__holder" style="background-image: url(assets/media/users/300_10.jpg)"></div>
                                                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="Change avatar">
                                                                            <i class="fa fa-pen"></i>
                                                                            <input type="file" name="profile_pic">
                                                                        </label>
                                                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="Cancel avatar">
																							<i class="fa fa-times"></i>
																						</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">DATE:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="date" name="date" value="{{ old('date') }}" id="" >
                                                                </div>
                                                                @error('date')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">T.L. NAME:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{ old('tl_name') }}" name="tl_name" id="" placeholder="Please Enter T.L Name">
                                                                </div>
                                                                @error('tl_name')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">AGENT NAME:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{ old('agent_name') }}" name="agent_name" id="" placeholder="Please Enter Agent Name">
                                                                </div>
                                                                @error('agent_name')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">CUSTOMER'S NAME:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" value="{{ old('customer_name') }}" type="text" name="customer_name" id="" placeholder="Please Enter Customer Name">
                                                                </div>
                                                                @error('customer')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">COMPANY'S NAME::</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" name="company_name" value="{{ old('company_name') }}" id="" placeholder="Please Enter Company Name">
                                                                </div>
                                                                @error('company_name')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">CELL PHONE:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{ old('cell_phone') }}" name="cell_phone" id="" placeholder="+923054812545">
                                                                </div>
                                                                @error('cell_phone')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">HOME PHONE:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input value="{{ old('home_phone') }}" class="form-control" type="text" name="home_phone" id="" placeholder="0424007460">
                                                                </div>
                                                                @error('home_phone')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">CUSTOMER'S EMAIL :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                                        <input type="text" class="form-control" name="customer_email"  placeholder="customeremail@gmail.com" value="{{ old('customer_email') }}" aria-describedby="basic-addon1">
                                                                    </div>
                                                                    <span class="form-text text-muted">Email will not be publicly displayed. <a href="#" class="kt-link">Learn more</a>.</span>
                                                                    @error('customer_email')
                                                                    <span class="kt-font-danger">{{ $message }}</span>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">SERVICE TYPE:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{ old('service_type') }}" name="service_type" id="" value="Please Enter Your Service Type" >
                                                                </div>
                                                                @error('service_type')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">BILLING AC:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" value="{{ old('billing_ac_number') }}" type="text" name="billing_ac_number" id="" value="{{ old('billing_ac_number') }}" placeholder = "Please Enter Your Billing AC" >
                                                                </div>
                                                                @error('billing_ac_number')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">REFERENCE :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" name="reference" id="" value="{{ old('reference') }}" placeholder = "Please Enter you reference." >
                                                                </div>
                                                                @error('reference')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">SSN :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input value="{{ old('ssn') }}" class="form-control" type="text" name="ssn" id="" value="Please Enter Your SSN" >
                                                                </div>
                                                                @error('ssn')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">DOB :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="date" name="dob" id="" value="{{ old('dob') }}" placeholder="Please Enter Your Date of Birth" >
                                                                </div>
                                                                @error('dob')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">PER MONTH :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" value="{{ old('per_month') }}" name="per_month" id="" value="Please Enter Your Per Month" >
                                                                </div>
                                                                @error('per_month')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">TOTAL TO PAY :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" value="{{ old('total_to_pay') }}" type="text" name="total_to_pay" id=""  placeholder="Please Enter Your Total to Pay" >
                                                                </div>
                                                                @error('total_to_pay')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">RECEIVABLE :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control"  type="text" name="receivable" id="" value="{{ old('receivable') }}" >
                                                                </div>
                                                                @error('receivable')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">REMARKS & COMMENTS :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input class="form-control" type="text" name="comment" id="" value="{{ old('comment') }}" >
                                                                </div>
                                                                @error('commment')
                                                                <span class="kt-font-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end: Form Wizard Step 2-->

                                    <!--begin: Form Wizard Step 3-->
                                    <div class="kt-wizard-v4__content" >
                                        <div class="kt-heading kt-heading--md">Setup Your Address</div>
                                        <div class="kt-form__section kt-form__section--first">
                                            <div class="kt-wizard-v4__form">
                                                <div class="form-group">
                                                    <label>COMPLETE ADDRESS</label>
                                                    <input type="text" class="form-control" name="complete_address" value="{{ old('complete_address') }}" placeholder="Please Enter Your Complete Address" >
                                                    <span class="form-text text-muted">Please enter your Address.</span>
                                                    @error('complete_address')
                                                    <span class="kt-font-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group">
                                                            <label>ZIP/POSTAL CODE:</label>
                                                            <input type="text" class="form-control" name="zip_code" value="{{ old('zip_code') }}">
                                                            <span class="form-text text-muted">Please enter your Zip Code.</span>
                                                        </div>
                                                        @error('zip_code')
                                                        <span class="kt-font-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input type="text" class="form-control" name="city" value="{{ old('city') }}" placeholder="Please Enter Your City">
                                                            <span class="form-text text-muted">Please enter your City.</span>
                                                        </div>
                                                        @error('city')
                                                        <span class="kt-font-danger">{{ $message }}</span>
                                                        @enderror

                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group">
                                                            <label>State</label>
                                                            <input type="text" class="form-control" name="state" value="{{ old('state') }}" placeholder="Please Enter Your State">
                                                            <span class="form-text text-muted">Please enter your state.</span>
                                                        </div>
                                                        @error('city')
                                                        <span class="kt-font-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end: Form Wizard Step 3-->

                                    <div>
                                         <button type="submit" id="employee-form-submit-btn" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
                                        Submit</button
                                    </div>
                                    <!--begin: Form Actions -->
                                    <div class="kt-form__actions">
                                        {{-- <div class="btn btn-secondary btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-prev">
                                            Previous
                                        </div> --}}

                                        {{-- <div class="btn btn-brand btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u" data-ktwizard-type="action-next">
                                            Next Step
                                        </div> --}}
                                    </div>
                                    <!--end: Form Actions -->
                                </form>

                                <!--end: Form Wizard Form-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>

    <!-- begin::Global Config(global config for global JS sciprts) -->
    <script>
        var KTAppOptions = {
            "colors": {
                "state": {
                    "brand": "#2c77f4",
                    "light": "#ffffff",
                    "dark": "#282a3c",
                    "primary": "#5867dd",
                    "success": "#34bfa3",
                    "info": "#36a3f7",
                    "warning": "#ffb822",
                    "danger": "#fd3995"
                },
                "base": {
                    "label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
                    "shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
                }
            }
        };
    </script>

    <!-- end::Global Config -->

    <!--begin::Global Theme Bundle(used by all pages) -->

    <!--begin:: Vendor Plugins -->

    <!--end:: Vendor Plugins for custom pages -->

    <!--end::Global Theme Bundle -->

    {{-- <!--begin::Page Scripts(used by this page) -->
    <script src="assets/js/pages/custom/user/add-user.js" type="text/javascript"></script> --}}

    <!--end::Page Scripts -->
    </body>
@endsection
<!-- end::Body -->
</html>
