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
                        Users
                    </h3>
                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
                    <div class="kt-subheader__group" id="kt_subheader_search">
										<span class="kt-subheader__desc" id="kt_subheader_total">
											Count : {{$count}} </span>
                        <form class="kt-margin-l-20" id="kt_subheader_search_form">
                            <div class="kt-input-icon kt-input-icon--right kt-subheader__search">
                                <input type="text" class="form-control" placeholder="Search..." id="generalSearch">
                                <span class="kt-input-icon__icon kt-input-icon__icon--right">
													<span>
														<svg xmlns="http://www.w3.org/2000/svg"
                                                             xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                                                             height="24px" viewBox="0 0 24 24" version="1.1"
                                                             class="kt-svg-icon">
															<g stroke="none" stroke-width="1" fill="none"
                                                               fill-rule="evenodd">
																<rect x="0" y="0" width="24" height="24"/>
																<path
                                                                    d="M14.2928932,16.7071068 C13.9023689,16.3165825 13.9023689,15.6834175 14.2928932,15.2928932 C14.6834175,14.9023689 15.3165825,14.9023689 15.7071068,15.2928932 L19.7071068,19.2928932 C20.0976311,19.6834175 20.0976311,20.3165825 19.7071068,20.7071068 C19.3165825,21.0976311 18.6834175,21.0976311 18.2928932,20.7071068 L14.2928932,16.7071068 Z"
                                                                    fill="#000000" fill-rule="nonzero" opacity="0.3"/>
																<path
                                                                    d="M11,16 C13.7614237,16 16,13.7614237 16,11 C16,8.23857625 13.7614237,6 11,6 C8.23857625,6 6,8.23857625 6,11 C6,13.7614237 8.23857625,16 11,16 Z M11,18 C7.13400675,18 4,14.8659932 4,11 C4,7.13400675 7.13400675,4 11,4 C14.8659932,4 18,7.13400675 18,11 C18,14.8659932 14.8659932,18 11,18 Z"
                                                                    fill="#000000" fill-rule="nonzero"/>
															</g>
														</svg>

                                                        <!--<i class="flaticon2-search-1"></i>-->
													</span>
												</span>
                            </div>
                        </form>
                    </div>
                    <div class="kt-subheader__group kt-hidden" id="kt_subheader_group_actions">
                        <div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span> Selected:
                        </div>
                        <div class="btn-toolbar kt-margin-l-20">
                            <div class="dropdown" id="kt_subheader_group_actions_status_change">
                                <button type="button" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle"
                                        data-toggle="dropdown">
                                    Update Status
                                </button>
                                <div class="dropdown-menu">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__section kt-nav__section--first">
                                            <span class="kt-nav__section-text">Change status to:</span>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link" data-toggle="status-change"
                                               data-status="1">
                                                <span class="kt-nav__link-text"><span
                                                        class="kt-badge kt-badge--unified-success kt-badge--inline kt-badge--bold">Approved</span></span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link" data-toggle="status-change"
                                               data-status="2">
                                                <span class="kt-nav__link-text"><span
                                                        class="kt-badge kt-badge--unified-danger kt-badge--inline kt-badge--bold">Rejected</span></span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link" data-toggle="status-change"
                                               data-status="3">
                                                <span class="kt-nav__link-text"><span
                                                        class="kt-badge kt-badge--unified-warning kt-badge--inline kt-badge--bold">Pending</span></span>
                                            </a>
                                        </li>
                                        <li class="kt-nav__item">
                                            <a href="#" class="kt-nav__link" data-toggle="status-change"
                                               data-status="4">
                                                <span class="kt-nav__link-text"><span
                                                        class="kt-badge kt-badge--unified-info kt-badge--inline kt-badge--bold">On Hold</span></span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <button class="btn btn-label-success btn-bold btn-sm btn-icon-h"
                                    id="kt_subheader_group_actions_fetch" data-toggle="modal"
                                    data-target="#kt_datatable_records_fetch_modal">
                                Fetch Selected
                            </button>
                            <button class="btn btn-label-danger btn-bold btn-sm btn-icon-h"
                                    id="kt_subheader_group_actions_delete_all">
                                Delete All
                            </button>
                        </div>
                    </div>
                </div>
                <div class="kt-subheader__toolbar">
                </div>
            </div>
        </div>

        <!-- end:: Content Head -->

        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

            <!--Begin::Section-->
            <div class="row">
                @foreach($data as $values)
                <div class="col-xl-3">
                    <!--Begin::Portlet-->
                    <div class="kt-portlet kt-portlet--height-fluid col-md-4">
                        <div class="kt-portlet__head kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <a href="#" class="btn btn-icon" data-toggle="dropdown">
                                    <i class="flaticon-more-1 kt-font-brand"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <ul class="kt-nav">
                                        <li class="kt-nav__item">
                                            <a href="{{ route('supervisor.employee.forms',$values->id) }}" class="kt-nav__link">
                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>
                                                <span class="kt-nav__link-text">Forms</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="kt-portlet__body">

                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-2">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        @if($values->profile_picture != NULL)
                                            <img class="kt-widget__img kt-hidden-" src="{{asset('assets/media/users/'.$values->profile_picture)}}"
                                                 alt="image">
                                        @else
                                            <img class="kt-widget__img kt-hidden-" src="{{asset('assets/media/users/dummy.png')}}"
                                                 alt="image">
                                        @endif
                                        <div
                                            class="kt-widget__pic kt-widget__pic--success kt-font-success kt-font-boldest kt-hidden">
                                            ChS
                                        </div>
                                    </div>
                                    <div class="kt-widget__info">
                                        <a href="#" class="kt-widget__username">
                                            {{$values->f_name .' '.$values->l_name}}
                                        </a>
                                        <span class="kt-widget__desc">
															{{$curr_user}}
														</span>
                                    </div>
                                </div>
                                <div class="kt-widget__body">
{{--                                    <div class="kt-widget__section">--}}
{{--                                        I distinguish three <a href="#"--}}
{{--                                                               class="kt-font-brand kt-link kt-font-transform-u kt-font-bold">#xrs-54pq</a>--}}
{{--                                        objectsves First--}}
{{--                                        esetablished and nice coocked rice--}}
{{--                                    </div>--}}
                                    <div class="kt-widget__item">
                                        <div class="kt-widget__contact">
                                            <span class="kt-widget__label">Email:</span>
                                            <a href="#" class="kt-widget__data">{{$values->email}}</a>
                                        </div>
                                        <div class="kt-widget__contact">
                                            <span class="kt-widget__label">Phone:</span>
                                            <a href="#" class="kt-widget__data">{{$values->phone_number}}</a>
                                        </div>
                                        <div class="kt-widget__contact">
                                            <span class="kt-widget__label">CNIC:</span>
                                            <span class="kt-widget__data">{{$values->cnic}}</span>
                                        </div>
                                    </div>
                                </div>
{{--                                <div class="kt-widget__footer">--}}
{{--                                    <button type="button" class="btn btn-label-warning btn-lg btn-upper">View--}}
{{--                                    </button>--}}
{{--                                </div>--}}
                            </div>

                            <!--end::Widget -->
                        </div>
                    </div>

                    <!--End::Portlet-->
                </div>
                @endforeach

{{--                <div class="col-xl-3">--}}

                {{--                    <!--Begin::Portlet-->--}}
                {{--                    <div class="kt-portlet kt-portlet--height-fluid">--}}
                {{--                        <div class="kt-portlet__head kt-portlet__head--noborder">--}}
                {{--                            <div class="kt-portlet__head-label">--}}
                {{--                                <h3 class="kt-portlet__head-title">--}}
                {{--                                </h3>--}}
                {{--                            </div>--}}
                {{--                            <div class="kt-portlet__head-toolbar">--}}
                {{--                                <a href="#" class="btn btn-icon" data-toggle="dropdown">--}}
                {{--                                    <i class="flaticon-more-1 kt-font-brand"></i>--}}
                {{--                                </a>--}}
                {{--                                <div class="dropdown-menu dropdown-menu-right">--}}
                {{--                                    <ul class="kt-nav">--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Reports</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-send"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Messages</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Charts</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-avatar"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Members</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-settings"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Settings</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="kt-portlet__body">--}}

                {{--                            <!--begin::Widget -->--}}
                {{--                            <div class="kt-widget kt-widget--user-profile-2">--}}
                {{--                                <div class="kt-widget__head">--}}
                {{--                                    <div class="kt-widget__media">--}}
                {{--                                        <img class="kt-widget__img kt-hidden-" src="assets/media/users/300_19.jpg"--}}
                {{--                                             alt="image">--}}
                {{--                                        <div--}}
                {{--                                            class="kt-widget__pic kt-widget__pic--danger kt-font-danger kt-font-boldest  kt-hidden">--}}
                {{--                                            MP--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="kt-widget__info">--}}
                {{--                                        <a href="#" class="kt-widget__username">--}}
                {{--                                            Charlie Stone--}}
                {{--                                        </a>--}}
                {{--                                        <span class="kt-widget__desc">--}}
                {{--                															PR Manager--}}
                {{--                														</span>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div class="kt-widget__body">--}}
                {{--                                    <div class="kt-widget__section">--}}
                {{--                                        Lorem ipsum dolor sit amet <a href="#"--}}
                {{--                                                                      class="kt-font-brand kt-link kt-font-transform-u kt-font-bold">--}}
                {{--                                            #xrs-23pq</a>, sed--}}
                {{--                                        <b>USD342/Annual</b> doloremagna--}}
                {{--                                    </div>--}}
                {{--                                    <div class="kt-widget__item">--}}
                {{--                                        <div class="kt-widget__contact">--}}
                {{--                                            <span class="kt-widget__label">Email:</span>--}}
                {{--                                            <a href="#" class="kt-widget__data">charlie@studiovoila.com</a>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="kt-widget__contact">--}}
                {{--                                            <span class="kt-widget__label">Phone:</span>--}}
                {{--                                            <a href="#" class="kt-widget__data">22(43)64534621</a>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="kt-widget__contact">--}}
                {{--                                            <span class="kt-widget__label">Location:</span>--}}
                {{--                                            <span class="kt-widget__data">Italy</span>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div class="kt-widget__footer">--}}
                {{--                                    <button type="button" class="btn btn-label-danger btn-lg btn-upper">write message--}}
                {{--                                    </button>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}

                {{--                            <!--end::Widget -->--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                {{--                    <!--End::Portlet-->--}}
                {{--                </div>--}}
                {{--                <div class="col-xl-3">--}}

                {{--                    <!--Begin::Portlet-->--}}
                {{--                    <div class="kt-portlet kt-portlet--height-fluid">--}}
                {{--                        <div class="kt-portlet__head kt-portlet__head--noborder">--}}
                {{--                            <div class="kt-portlet__head-label">--}}
                {{--                                <h3 class="kt-portlet__head-title">--}}
                {{--                                </h3>--}}
                {{--                            </div>--}}
                {{--                            <div class="kt-portlet__head-toolbar">--}}
                {{--                                <a href="#" class="btn btn-icon" data-toggle="dropdown">--}}
                {{--                                    <i class="flaticon-more-1 kt-font-brand"></i>--}}
                {{--                                </a>--}}
                {{--                                <div class="dropdown-menu dropdown-menu-right">--}}
                {{--                                    <ul class="kt-nav">--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Reports</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-send"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Messages</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Charts</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-avatar"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Members</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-settings"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Settings</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="kt-portlet__body">--}}

                {{--                            <!--begin::Widget -->--}}
                {{--                            <div class="kt-widget kt-widget--user-profile-2">--}}
                {{--                                <div class="kt-widget__head">--}}
                {{--                                    <div class="kt-widget__media">--}}
                {{--                                        <img class="kt-hidden" src="assets/media/users/100_1.jpg" alt="image">--}}
                {{--                                        <div--}}
                {{--                                            class="kt-widget__pic kt-widget__pic--info kt-font-info kt-font-boldest  kt-hidden-">--}}
                {{--                                            A K--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="kt-widget__info">--}}
                {{--                                        <a href="#" class="kt-widget__username">--}}
                {{--                                            Anna Krox--}}
                {{--                                        </a>--}}
                {{--                                        <span class="kt-widget__desc">--}}
                {{--                															Python Developer--}}
                {{--                														</span>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div class="kt-widget__body">--}}
                {{--                                    <div class="kt-widget__section">--}}
                {{--                                        I distinguish three <a href="#"--}}
                {{--                                                               class="kt-font-brand kt-link kt-font-transform-u kt-font-bold">#xrs-65pq </a>objectsves--}}
                {{--                                        First--}}
                {{--                                        esetablished and nice coocked--}}
                {{--                                    </div>--}}
                {{--                                    <div class="kt-widget__item">--}}
                {{--                                        <div class="kt-widget__contact">--}}
                {{--                                            <span class="kt-widget__label">Email:</span>--}}
                {{--                                            <a href="#" class="kt-widget__data">giannis@fifestudios.com</a>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="kt-widget__contact">--}}
                {{--                                            <span class="kt-widget__label">Phone:</span>--}}
                {{--                                            <a href="#" class="kt-widget__data">52(43)56254826</a>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="kt-widget__contact">--}}
                {{--                                            <span class="kt-widget__label">Location:</span>--}}
                {{--                                            <span class="kt-widget__data">Moscow</span>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div class="kt-widget__footer">--}}
                {{--                                    <button type="button" class="btn btn-label-brand btn-lg btn-upper">write message--}}
                {{--                                    </button>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}

                {{--                            <!--end::Widget -->--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                {{--                    <!--End::Portlet-->--}}
                {{--                </div>--}}
                {{--                <div class="col-xl-3">--}}

                {{--                    <!--Begin::Portlet-->--}}
                {{--                    <div class="kt-portlet kt-portlet--height-fluid">--}}
                {{--                        <div class="kt-portlet__head kt-portlet__head--noborder">--}}
                {{--                            <div class="kt-portlet__head-label">--}}
                {{--                                <h3 class="kt-portlet__head-title">--}}
                {{--                                </h3>--}}
                {{--                            </div>--}}
                {{--                            <div class="kt-portlet__head-toolbar">--}}
                {{--                                <a href="#" class="btn btn-icon" data-toggle="dropdown">--}}
                {{--                                    <i class="flaticon-more-1 kt-font-brand"></i>--}}
                {{--                                </a>--}}
                {{--                                <div class="dropdown-menu dropdown-menu-right">--}}
                {{--                                    <ul class="kt-nav">--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-line-chart"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Reports</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-send"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Messages</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-pie-chart-1"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Charts</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-avatar"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Members</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                        <li class="kt-nav__item">--}}
                {{--                                            <a href="#" class="kt-nav__link">--}}
                {{--                                                <i class="kt-nav__link-icon flaticon2-settings"></i>--}}
                {{--                                                <span class="kt-nav__link-text">Settings</span>--}}
                {{--                                            </a>--}}
                {{--                                        </li>--}}
                {{--                                    </ul>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}
                {{--                        </div>--}}
                {{--                        <div class="kt-portlet__body">--}}

                {{--                            <!--begin::Widget -->--}}
                {{--                            <div class="kt-widget kt-widget--user-profile-2">--}}
                {{--                                <div class="kt-widget__head">--}}
                {{--                                    <div class="kt-widget__media">--}}
                {{--                                        <img class="kt-widget__img kt-hidden-" src="assets/media/users/100_3.jpg"--}}
                {{--                                             alt="image">--}}
                {{--                                        <div--}}
                {{--                                            class="kt-widget__pic kt-widget__pic--brand kt-font-brand kt-font-boldest kt-hidden">--}}
                {{--                                            JM--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                    <div class="kt-widget__info">--}}
                {{--                                        <a href="#" class="kt-widget__username">--}}
                {{--                                            Jason Muller--}}
                {{--                                        </a>--}}
                {{--                                        <span class="kt-widget__desc">--}}
                {{--                															Atr Direcrtor--}}
                {{--                														</span>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div class="kt-widget__body">--}}
                {{--                                    <div class="kt-widget__section">--}}
                {{--                                        Contrary to popular belief, Lorem Ipsum is not simply random text <a href="#"--}}
                {{--                                                                                                             class="kt-font-brand kt-link kt-font-transform-u kt-font-bold">#xrs-65pq </a>.--}}
                {{--                                    </div>--}}
                {{--                                    <div class="kt-widget__item">--}}
                {{--                                        <div class="kt-widget__contact">--}}
                {{--                                            <span class="kt-widget__label">Email:</span>--}}
                {{--                                            <a href="#" class="kt-widget__data">jason@fifestudios.com</a>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="kt-widget__contact">--}}
                {{--                                            <span class="kt-widget__label">Phone:</span>--}}
                {{--                                            <a href="#" class="kt-widget__data">32(76)87545243</a>--}}
                {{--                                        </div>--}}
                {{--                                        <div class="kt-widget__contact">--}}
                {{--                                            <span class="kt-widget__label">Location:</span>--}}
                {{--                                            <span class="kt-widget__data">Melbourne</span>--}}
                {{--                                        </div>--}}
                {{--                                    </div>--}}
                {{--                                </div>--}}
                {{--                                <div class="kt-widget__footer">--}}
                {{--                                    <button type="button" class="btn btn-label-success btn-lg btn-upper">write message--}}
                {{--                                    </button>--}}
                {{--                                </div>--}}
                {{--                            </div>--}}

                {{--                            <!--end::Widget -->--}}
                {{--                        </div>--}}
                {{--                    </div>--}}

                {{--                    <!--End::Portlet-->--}}
                {{--                </div>--}}
            </div>


            <!--Begin::Pagination-->
{{--            <div class="row">--}}
{{--                <div class="col-xl-12">--}}

{{--                    <!--begin:: Components/Pagination/Default-->--}}
{{--                    <div class="kt-portlet">--}}
{{--                        <div class="kt-portlet__body">--}}

{{--                            <!--begin: Pagination-->--}}
{{--                            <div class="kt-pagination kt-pagination--brand">--}}
{{--                                <ul class="kt-pagination__links">--}}
{{--                                    <li class="kt-pagination__link--first">--}}
{{--                                        <a href="#"><i class="fa fa-angle-double-left kt-font-brand"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="kt-pagination__link--next">--}}
{{--                                        <a href="#"><i class="fa fa-angle-left kt-font-brand"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">...</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">29</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">30</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="kt-pagination__link--active">--}}
{{--                                        <a href="#">31</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">32</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">33</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">34</a>--}}
{{--                                    </li>--}}
{{--                                    <li>--}}
{{--                                        <a href="#">...</a>--}}
{{--                                    </li>--}}
{{--                                    <li class="kt-pagination__link--prev">--}}
{{--                                        <a href="#"><i class="fa fa-angle-right kt-font-brand"></i></a>--}}
{{--                                    </li>--}}
{{--                                    <li class="kt-pagination__link--last">--}}
{{--                                        <a href="#"><i class="fa fa-angle-double-right kt-font-brand"></i></a>--}}
{{--                                    </li>--}}
{{--                                </ul>--}}
{{--                                <div class="kt-pagination__toolbar">--}}
{{--                                    <select class="form-control kt-font-brand" style="width: 60px">--}}
{{--                                        <option value="10">10</option>--}}
{{--                                        <option value="20">20</option>--}}
{{--                                        <option value="30">30</option>--}}
{{--                                        <option value="50">50</option>--}}
{{--                                        <option value="100">100</option>--}}
{{--                                    </select>--}}
{{--                                    <span class="pagination__desc">--}}
{{--														Displaying 10 of 230 records--}}
{{--													</span>--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <!--end: Pagination-->--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                    <!--end:: Components/Pagination/Default-->--}}
{{--                </div>--}}
{{--            </div>--}}

            <!--End::Pagination-->
        </div>

        <!-- end:: Content -->
    </div>
@endsection
@section('javascript')
@endsection
