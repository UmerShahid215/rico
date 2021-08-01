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
                        Employees
                    </h3>
                    <span class="kt-subheader__separator kt-subheader__separator--v"></span>
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
                    <a href="{{route('admin.employees.create')}}" class="btn btn-label-brand btn-bold">
                        Add Employee </a>
                </div>
            </div>
        </div>

        <!-- end:: Content Head -->
         @include('includes.flash-message')
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
            <div class="row">
                <div class="kt-portlet">
                    <div class="kt-portlet__head">
                        <div class="kt-portlet__head-label">
                            <h3 class="kt-portlet__head-title">
                                Employees List
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section">
                            @if($users->isNOtEmpty())
                            <div class="kt-section__content">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone Number</th>
                                            <th>Date Of Birth</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($users as $key => $user)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <th>
                                                <img alt="Pic" style="width:2.4rem;boder-radius:4px" src="{{asset($user->profile_picture ? '/storage/'.$user->profile_picture : 'assets/download.jpeg')}}"/>
                                            </th>
                                            <td>{{ $user->full_name  ?? ''}}</td>
                                            <td>{{ $user->email ?? ''}}</td>
                                            <td>{{ $user->phone_number ?? ''}}</td>
                                            <td>{{ $user->dob ?? ''}}</td>
                                            <td>
                                                <div class="kt-widget__action">
                                                    <a type="button" href="{{ route('admin.employees.edit',[$user->id]) }}" class="btn btn-brand btn-sm btn-upper">Edit</a>
                                                    <a type="button" href="{{ route('admin.employees.forms',[$user->id]) }}" class="btn btn-brand btn-sm btn-upper"> Forms</a>
                                                    <a type="button" href="{{ route('admin.employees.shift',[$user->id]) }}" class="btn btn-brand btn-sm btn-upper"> Shift</a>
                                                </div>
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="alert alert-info" role="alert">
                                <div class="alert-text"> Sorry you did not add any Employees yet.</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </div>
@endsection
@section('javascript')
@endsection
