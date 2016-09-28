@extends('layouts.adminlayout')
@section('CSS')
{!! HTML::style('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.css') !!}
@stop

@section('Heading')
<h3 class="page-title">
            Settings
            </h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="#">Dashboard</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <i class="fa fa-gears"></i>
            <a href="#">Settings</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <i class="fa fa-wrench"></i>
            <a href="#">General Settings</a>
        </li>
    </ul>
</div>
@stop
@section('BODY')
<div class="portlet box blue-steel">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-gears"></i> General Settings
        </div>
    </div>
    <div class="portlet-body form">
        {!! Form::open(['route' => ['admin.update.general.settings'], 'method' => 'post', 'class' => 'form-horizontal ajax_form form-bordered']) !!}
            <div class="form-body">
                <div  id="error"></div>
                <div class="form-group">
                    <label class="control-label col-md-3">Logo</label>
                    <div class="col-md-4">
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                                <img src="{{ URL::asset('assets/admin/layout/img/'.$settings->logo)}}" alt=""/>
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;">
                            </div>
                            <div>
                                <span class="btn default btn-file">
                                <span class="fileinput-new">
                                Select image </span>
                                <span class="fileinput-exists">
                                Change </span>
                                <input type="file" name="logo" id="logo">
                                </span>
                                <a href="#" class="btn red fileinput-exists" data-dismiss="fileinput">
                                Remove </a>
                            </div>
                        </div>
                        <span class="help-block"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Company Name<span class="required">* </span></label>
                    <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Company Name" name="name" id="name" value="{{$settings->name}}">
                            <span class="help-block" ></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Email<span class="required">* </span></label>
                    <div class="col-md-6">
                            <input type="email" class="form-control" placeholder="Email" name="email" id="email" value="{{$settings->email}}">
                            <span class="help-block" ></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Address<span class="required">* </span></label>
                    <div class="col-md-6">
                            <textarea rows="3" class="form-control" id="address" name="address">{{$settings->address}}</textarea>
                            <span class="help-block" ></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Phone Number<span class="required">* </span></label>
                    <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Phone Number" name="phone_number" id="phone_number" value="{{$settings->phone_number}}">
                            <span class="help-block" ></span>
                    </div>
                </div>
            </div>
             {{--<input type="hidden" id="_token" name="_token" class="form-control" value="{{ csrf_token()  }}" />--}}
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green"><span class="fa fa-check"></span> Update</button>
                        <button type="button" class="btn default">Cancel</button>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
</div>
@stop

@section('JS')
{!! HTML::script('assets/js/admin/ajaxform/jquery.form.min.js')!!}
{!! HTML::script('assets/global/plugins/bootstrap-toastr/toastr.min.js') !!}
{!! HTML::script('assets/global/plugins/bootstrap-fileinput/bootstrap-fileinput.js') !!}

<script>

    $(document).ready(function() {
        $('body').on('submit','.ajax_form',function() {
            var posturl = $(this).attr('action');
            hideErrors();
            $(this).ajaxSubmit({
                url: posturl,
                dataType: 'json',
                beforeSend: function () {
                    responseArray = {
                        "status" : "responsePending",
                        "errorCode": "ResponsePending",
                        "message": "<span class='fa fa-info'><span> Please wait..."
                    };
                    showResponseMessage(responseArray, "error");
                    Metronic.blockUI({
                        target: '.content',
                        boxed: true
                    });
                },
                success: function (response) {
                   showResponseMessage(response,'error');
                    Metronic.unblockUI('.content');

                },
                error: function (xhr, textStatus, thrownError) {
                    resposeArray = {
                        "status" : "fail",
                        "errorCode": "unkonwn",
                        "message": "Problem logging in, please try again!"
                    };
                    showResponseMessage(resposeArray, "error");
                    Metronic.unblockUI('.content');
                }
            });
            return false;
        });
    });
@if(Session::has('toastrHeading') && Session::has('toastrMessage'))
   showToastrMessage("{{ Session::get('toastrMessage') }}", "{{ Session::get('toastrHeading') }}");
@endif
</script>
@stop