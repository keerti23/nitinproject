@extends('...layouts.adminlayout')
@section('CSS')

@stop

@section('Heading')
<h3 class="page-title">
            Change Password
            </h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="index.html">Home</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="#">Change Password</a>
        </li>
    </ul>
</div>
@stop

@section('BODY')
<div class="portlet box blue-steel">
    <div class="portlet-title">
        <div class="caption">
            <i class="fa fa-key"></i> Change Password
        </div>
    </div>
    <div class="portlet-body form">
        {!! Form::open(['route' => ['admin.change.password'], 'method' => 'post', 'class' => 'form-horizontal ajax_form form-bordered']) !!}
            <div class="form-body">
            <div  id="error"></div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Old Password<span class="required">* </span></label>
                    <div class="col-md-6">
                            <input type="password" class="form-control" placeholder="Password" name="oldpassword" id="oldpassword">
                            <span class="help-block" ></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">New Password<span class="required">* </span></label>
                    <div class="col-md-6">
                            <input type="password" class="form-control" placeholder="Password" name="newpassword" id="newpassword">
                            <span class="help-block" ></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-md-3 control-label">Confirm Password<span class="required">* </span></label>
                    <div class="col-md-6">
                            <input type="password" class="form-control" placeholder="Password" name="confirmpassword" id="confirmpassword">
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
<script>

    $(document).ready(function() {
        $('body').on('submit','.ajax_form',function() {
            var posturl = $(this).attr('action');
            var formid = '#' + $(this).attr('id');
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
</script>
@stop
