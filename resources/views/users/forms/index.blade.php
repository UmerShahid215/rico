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
                <div class="kt-subheader__toolbar">
                    <a href="#" class="">
                    </a>
                    <a href="{{route('employee.forms.create')}}" class="btn btn-label-brand btn-bold">
                        Add Form </a>
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
                                Forms
                            </h3>
                        </div>
                    </div>
                    <div class="kt-portlet__body">
                        <div class="kt-section">
                            @if($forms->isNOtEmpty())
                            <div class="kt-section__content">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>#</th>
                                            <th>Agent Name</th>
                                            <th>Customer Name</th>
                                            <th>Company Name</th>
                                            <th>Sevice Type</th>
                                            <th>Billing Number</th>
                                            <th>Status</th>
                                            <th>Receivable</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      @foreach($forms as $key => $form)
                                        <tr>
                                            <th scope="row">{{ $key + 1 }}</th>
                                            <td>{{ $form->agent_name  ?? ''}}</td>
                                            <td>{{ $form->customer_name  ?? ''}}</td>
                                            <td>{{ $form->company_name  ?? ''}}</td>
                                            <td>{{ $form->sevice_type ?? ''}}</td>
                                            <td>{{ $form->billing_ac_number ?? ''}}</td>
                                            <td>
                                                <span class="kt-badge  kt-badge--{{ $form->statusColor() }} kt-badge--inline kt-badge--pill">{{ $form->status }}</span>
                                            </td>
                                            <td>{{ $form->receivable ?? ''}}</td>
                                            <td>
                                                <div class="kt-widget__action">
                                                    <a type="button" href="{{ route('employee.form.view',['form' => $form->id]) }}" class="btn btn-brand btn-sm btn-upper">View</a>
                                                    @if(!now()->gt($form->comment_disable_time))
                                                    <button type="button" onclick="event.preventDefault();addComment(this);"class="btn btn-bold btn-label-brand btn-sm" data-form="{{ $form->id }}">Add Comment</button>
                                                    @endif
                                                    <a type="button" href="{{ route('employee.form.comments.show',['form' => $form->id]) }}" class="btn btn-brand btn-sm btn-upper">Comments</a>
                                                </div>
                                            </td>
                                        </tr>
                                       @endforeach
                                    </tbody>
                                </table>
                            </div>
                            @else
                            <div class="alert alert-info" role="alert">
                                <div class="alert-text"> Sorry you did not add any form yet.</div>
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
    </div>

    <div class="modal fade" id="kt_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    </button>
                </div>
                <form action="{{ route('employee.form.comments.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                <div class="modal-body">
                        <div class="form-group">
                            <label for="recipient-name" class="form-control-label">File:</label>
                            <input type="file" name="file" class="form-control" id="recipient-name">
                        </div>
                        <div class="form-group">
                            <label for="message-text" class="form-control-label">Message:</label>
                            <textarea class="form-control" name="comment" id="message-text"></textarea>
                        </div>
                        <input type="hidden" class="form-control" name="form" id="comment-related-form" value="">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Send Comment</button>
                </div>
            </form>
            </div>
        </div>
    </div>

@endsection
@section('javascript')
<script>
    function addComment(event){
        const form = $(event).data('form');
        $("#comment-related-form").val(form);
        $("#kt_modal_4").modal('show');
    }
</script>
@endsection
