<!DOCTYPE html>
<!--
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.1
Version: 3.3.0
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Metronic | Login Options - Login Form 1</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
{!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') !!}
{!! HTML::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! HTML::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
{!! HTML::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
{!! HTML::style('assets/global/plugins/uniform/css/uniform.default.css') !!}

<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL STYLES -->
{!! HTML::style('assets/admin/pages/css/login.css') !!}
<!-- END PAGE LEVEL SCRIPTS -->
<!-- BEGIN THEME STYLES -->
{!! HTML::style('assets/global/css/components.css') !!}
{!! HTML::style('assets/global/css/plugins.css') !!}
{!! HTML::style('assets/admin/layout/css/layout.css') !!}
{!! HTML::style('assets/admin/layout/css/themes/darkblue.css') !!}
{!! HTML::style('assets/admin/layout/css/custom.css') !!}
{!! HTML::style('assets/global/plugins/bootstrap-toastr/toastr.min.css') !!}

<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="login">
<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
<div class="menu-toggler sidebar-toggler">
</div>
<!-- END SIDEBAR TOGGLER BUTTON -->
<!-- BEGIN LOGO -->
<div class="logo">
	<img src="{{asset('assets/admin/layout/img/logo-big.png')}}" alt=""/>
</div>
<!-- END LOGO -->
<!-- BEGIN LOGIN -->
<div class="content">
	<!-- BEGIN LOGIN FORM -->
	{{--<form class="ajax_form" action="{{$action}}" method="post">--}}
	{!!Form::open(array('url' => $action,'id' => 'ajax_form'))!!}
		<h3 class="form-title">{{$Heading}}</h3>

		<div  id="error"></div>
		<div class="form-group">
			<input class="form-control" type="text" autocomplete="off" placeholder="Email" id="email" name="email"/>
			<span class="help-block"></span>
			<label class="control-label visible-ie8 visible-ie9">Email</label>
		</div>
		<div class="form-group">
			<input class="form-control" type="password" autocomplete="off" placeholder="Password" id="password" name="password"/>
			<label class="control-label visible-ie8 visible-ie9">Password</label>

		    <span class="help-block" ></span>
		</div>
		 {{--<div class="form-group has-feedback">--}}
                        {{--<input type="hidden" id="_token" name="_token" class="form-control" value="{{ csrf_token()  }}" />--}}
                    {{--</div>--}}
		<div class="form-actions">
			<button type="submit" class="btn btn-primary uppercase">Login</button>
        </div>
        {!! Form::close() !!}
    {{--</form>--}}
</div>
{!! HTML::script('assets/global/plugins/respond.min.js') !!}
{!! HTML::script('assets/global/plugins/excanvas.min.js') !!}
<![endif]-->
{!! HTML::script('assets/global/plugins/jquery.min.js') !!}
{!! HTML::script('assets/global/plugins/jquery-migrate.min.js') !!}
{!! HTML::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! HTML::script('assets/global/plugins/jquery.blockui.min.js') !!}
{!! HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js') !!}
{!! HTML::script('assets/global/plugins/jquery.cokie.min.js') !!}
<!-- END CORE PLUGINS -->
<!-- END PAGE LEVEL PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{!! HTML::script('assets/global/scripts/metronic.js')!!}
{!! HTML::script('assets/admin/layout/scripts/layout.js')!!}
{!! HTML::script('assets/js/commonjs.js')!!}
{!! HTML::script('assets/js/admin/ajaxform/jquery.form.min.js')!!}
{!! HTML::script('assets/global/plugins/bootstrap-toastr/toastr.min.js') !!}
<!-- END PAGE LEVEL SCRIPTS -->
<script>
     $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
    });
    $(document).ready(function() {
        $('body').on('submit','#ajax_form',function() {
            hideErrors();
            $(this).ajaxSubmit({
                url:  $(this).attr('action'),
                dataType: 'json',
                 beforeSend: function () {
                     responseArray = {
                            "status" : "responsePending",
                            "errorCode": "ResponsePending",
                            "message": "<span class='fa fa-info'></span> Checking login information. Please wait..."
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
jQuery(document).ready(function() {
       // We need to set assets path because default Metronic path causes problems
       Metronic.setAssetsPath("{{ URL::asset("assets") }}/");
   });
</script>

<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>