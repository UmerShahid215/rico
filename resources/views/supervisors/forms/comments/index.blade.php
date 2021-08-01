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
            </div>
        </div>

        <!-- end:: Content Head -->
         @include('includes.flash-message')
        <!-- begin:: Content -->
        <div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

            <div class="row">
                <div class="col-xl-12">

                    <!--begin:: Widgets/Support Tickets -->
                    <div class="kt-portlet kt-portlet--height-fluid">
                        <div class="kt-portlet__head">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                    Comments
                                </h3>
                            </div>
                        </div>
                        <div class="kt-portlet__body">
                            <div class="kt-widget3">
                                @if($comments->isNOtEmpty())
                                 @foreach($comments as $comment)
                                <div class="kt-widget3__item">
                                    <div class="kt-widget3__header">
                                        <div class="kt-widget3__info">
                                            <span class="kt-widget3__username">
                                                {{ $comment->user->full_name }}
                                            </span><br>
                                            <span class="kt-widget3__time">
                                                {{ $comment->created_at->diffForHumans() }}
                                            </span><br>
                                            @if($comment->file)
                                            <a target="_blank" href="{{ route('supervisor.form.comment.file.downloads',['comment'=>$comment->id]) }}"class="kt-widget3__username">
                                                {{ $comment->file_name }}
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="kt-widget3__body">
                                        <p class="kt-widget3__text">
                                            {{ $comment->comment }}
                                        </p>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="alert alert-primary fade show" role="alert">
                                    <div class="alert-icon"><i class="flaticon-warning"></i></div>
                                    <div class="alert-text">No Comments Yet.</div>
                                    <div class="alert-close">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true"><i class="la la-close"></i></span>
                                        </button>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!--end:: Widgets/Support Tickets -->
                </div>

            </div>
    </div>


@endsection
@section('javascript')
@endsection
