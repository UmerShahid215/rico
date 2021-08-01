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
                      Semi Admin
                    </h3>
                    {{--                <span class="kt-subheader__separator kt-subheader__separator--v"></span>--}}
                    {{--                <div class="kt-subheader__group" id="kt_subheader_search">--}}
                    {{--										<span class="kt-subheader__desc" id="kt_subheader_total">--}}
                    {{--									    		Alex Stone </span>--}}
                    {{--                </div>--}}
                </div>

                <div class="kt-subheader__toolbar">
                    {{--                <a href="#" class="btn btn-default btn-bold">--}}
                    {{--                    Back </a>--}}
                    <div class="btn-group">
                        <button form="my-form" type="submit" class="btn btn-brand btn-bold">
                            Save Changes </button>
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- end:: Content Head -->

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="kt-portlet kt-portlet--tabs">
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-toolbar">
                        <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#kt_user_edit_tab_1" role="tab">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z" fill="#000000" fill-rule="nonzero" />
                                            <path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z" fill="#000000" opacity="0.3" />
                                        </g>
                                    </svg> Profile
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <form action="{{route('manager.profile.update')}}" method="post" enctype="multipart/form-data" id="my-form">
                        @csrf
                        @method('put')

                        {{-- <input type="hidden" value="{{$user_type}}" name="user_type">
                        <input type="hidden" value="{{$user_permission}}" name="user_permission"> --}}

                        <div class="tab-content">
                            <div class="tab-pane active" id="kt_user_edit_tab_1" role="tabpanel">
                                <div class="kt-form kt-form--label-right">
                                    <div class="kt-form__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                {{-- <div class="row">
                                                    <label class="col-xl-3"></label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <h3 class="kt-section__title kt-section__title-sm">{{ $user_type }} Info:</h3>
                                                    </div>
                                                </div> --}}
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control" type="text" value="{{$user->f_name}}" name="f_name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Last Name</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control" type="text" value="{{$user->l_name}}" name="l_name">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                            <input type="number" class="form-control" placeholder="Phone"  aria-describedby="basic-addon1" name="phone_number" value="{{ $user->phone_number }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">DOB</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-user"></i></span></div>
                                                            <input type="date" class="form-control" placeholder="DOB"  aria-describedby="basic-addon1" name="dob" value="{{ $user->dob }}">
                                                        </div>
                                                        {{--                                                    <span class="form-text text-muted">We'll never share your email with anyone else.</span>--}}
                                                    </div>
                                                </div>
                                                <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button form="my-form" type="submit" class="btn btn-brand btn-bold">
                                Save Changes </button>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- end:: Content -->
    </div>


        <script>
        // Getting an instance of the widget.
        const widget = uploadcare.Widget('[role=uploadcare-uploader]');
        // Selecting an image to be replaced with the uploaded one.
        const preview = document.getElementById('preview');
        // "onUploadComplete" lets you get file info once it has been uploaded.
        // "cdnUrl" holds a URL of the uploaded file: to replace a preview with.
        widget.onUploadComplete(fileInfo => {
            preview.src = fileInfo.cdnUrl;
            // alert(fileInfo.cdnUrl);

            const toDataURL = url => fetch(url)
                .then(response => response.blob())
                .then(blob => new Promise((resolve, reject) => {
                    const reader = new FileReader()
                    reader.onloadend = () => resolve(reader.result)
                    reader.onerror = reject
                    reader.readAsDataURL(blob)
                }))


            toDataURL(fileInfo.cdnUrl)
                .then(dataUrl => {
                    // console.log(dataUrl)
                    preview.src = dataUrl;
                    document.getElementById("destination").value = dataUrl;
                })

        })





    </script>
@endsection
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#current-dp').attr('src', e.target.result);
                $('#files').attr('src', e.target.result);
            };
            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
