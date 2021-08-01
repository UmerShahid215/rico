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
                        Form
                    </h3>
                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                    <div class="kt-subheader__group" id="kt_subheader_search">
										<span class="kt-subheader__desc" id="kt_subheader_total">
											Form Detail </span>
                    </div>
                </div>
                <div class="kt-subheader__toolbar">
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
                                <form class="kt-form">
                                <!--begin: Form Wizard Step 2-->
                                    <div class="kt-wizard-v4__content" >
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-wizard-v4__form">
                                                <div class="row">
                                                    <div class="col-xl-12">
                                                        <div class="kt-section__body">
                                                            <div class="form-group row">
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <h3 class="kt-section__title kt-section__title-md">Form Details
                                                                        <span class="kt-badge  kt-badge--{{ $form->statusColor() }} kt-badge--inline kt-badge--pill">{{ $form->status }}</span>
                                                                    </h3>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">Profile Pic</label>
                                                                <div class="col-lg-9 col-xl-6">
                                                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_add_avatar">
                                                                        <div class="kt-avatar__holder" style="background-image: url({{asset( $form->profile_pic ? 'storage/'.$form->profile_pic : 'assets/download.jpeg')}})"></div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">DATE:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control"  id="" value = "{{ $form->date->format('m/d/Y') ?? '' }}" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">T.L. NAME:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="tl_name" id=""  value="{{ $form->tl_name }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">AGENT NAME:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="agent_name" id=""  value="{{ $form->agent_name }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">CUSTOMER'S NAME:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="customer_name" id="" value="{{ $form->customer_name }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">COMPANY'S NAME::</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="company_name" id="" value="{{ $form->company_name}}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">CELL PHONE:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="cell_phone" id=""  value="{{ $form->cell_phone }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">HOME PHONE:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="home_phone" id="" value="{{ $form->home_phone }}">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">CUSTOMER'S EMAIL :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <div class="input-group">
                                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                                        <input disabled type="text" class="form-control" name="customer_email"   value="{{ $form->customer_email }}"aria-describedby="basic-addon1">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">SERVICE TYPE:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="service_type" id="" value="{{ $form->service_type }}" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">BILLING AC:</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="billing_ac_number" id="" value="{{ $form->billing_ac_number }}" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">REFERENCE :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="reference" id="" value="{{ $form->reference }}" >
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">SSN :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="ssn" id="" value="{{ $form->ssn }}" >
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">DOB :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control"  name="dob" id="" value="{{ $form->dob->format('m/d/Y') ?? '' }}" >
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">PER MONTH :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="per_month" id="" value="{{ $form->per_month }}" >
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">TOTAL TO PAY :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="total_to_pay" id="" value="{{ $form->total_to_pay }}" >
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">RECEIVABLE :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="receivable" id="" value="{{ $form->receivable }}"  >
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="col-xl-3 col-lg-3 col-form-label">REMARKS & COMMENTS :</label>
                                                                <div class="col-lg-9 col-xl-9">
                                                                    <input disabled class="form-control" type="text" name="comment" id="" value="{{
                                                                        $form->comment }}" >
                                                                </div>
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
                                        <div class="kt-heading kt-heading--md">Your Address</div>
                                        <div class="kt-form__section kt-form__section--first">
                                            <div class="kt-wizard-v4__form">
                                                <div class="form-group">
                                                    <label>COMPLETE ADDRESS</label>
                                                    <input disabled type="text" class="form-control" name="complete_address" value="{{ $form->complete_address }}" >
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group">
                                                            <label>ZIP/POSTAL CODE:</label>
                                                            <input disabled type="text" class="form-control" name="zip_code" value="{{ $form->zip_code }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6">
                                                        <div class="form-group">
                                                            <label>City</label>
                                                            <input disabled type="text" class="form-control" name="city" value="{{ $form->city }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-xl-6">
                                                        <div class="form-group">
                                                            <label>State</label>
                                                            <input disabled type="text" class="form-control" name="state" value="{{ $form->state }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!--end: Form Wizard Step 3-->

                                    {{-- <div>
                                         <button type="submit" id="employee-form-submit-btn" class="btn btn-success btn-md btn-tall btn-wide kt-font-bold kt-font-transform-u">
                                        Submit</button
                                    </div> --}}
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
