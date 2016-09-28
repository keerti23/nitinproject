<!DOCTYPE html>

<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>{{$pageTitle}}</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<meta name="csrf-token" content="{{ csrf_token() }}" />
<!-- BEGIN GLOBAL MANDATORY STYLES -->
{!! HTML::style('http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all') !!}
{!! HTML::style('assets/global/plugins/font-awesome/css/font-awesome.min.css') !!}
{!! HTML::style('assets/global/plugins/simple-line-icons/simple-line-icons.min.css') !!}
{!! HTML::style('assets/global/plugins/bootstrap/css/bootstrap.min.css') !!}
{!! HTML::style('assets/global/plugins/uniform/css/uniform.default.css') !!}
{!! HTML::style('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css') !!}
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE STYLES -->
{!! HTML::style('assets/admin/pages/css/tasks.css') !!}
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'rounded corners' style just load 'components-rounded.css' stylesheet instead of 'components.css' in the below style tag -->
{!! HTML::style('assets/global/css/components-rounded.css') !!}
{!! HTML::style('assets/global/css/plugins.css') !!}
{!! HTML::style('assets/admin/layout/css/layout.css') !!}
{!! HTML::style('assets/admin/layout/css/themes/default.css') !!}
{!! HTML::style('assets/admin/layout/css/custom.css') !!}
{!! HTML::style('assets/global/plugins/bootstrap-toastr/toastr.min.css') !!}
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
@yield('CSS')
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<!-- DOC: Apply "page-header-fixed-mobile" and "page-footer-fixed-mobile" class to body element to force fixed header or footer in mobile devices -->
<!-- DOC: Apply "page-sidebar-closed" class to the body and "page-sidebar-menu-closed" class to the sidebar menu element to hide the sidebar by default -->
<!-- DOC: Apply "page-sidebar-hide" class to the body to make the sidebar completely hidden on toggle -->
<!-- DOC: Apply "page-sidebar-closed-hide-logo" class to the body element to make the logo hidden on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-hide" class to body element to completely hide the sidebar on sidebar toggle -->
<!-- DOC: Apply "page-sidebar-fixed" class to have fixed sidebar -->
<!-- DOC: Apply "page-footer-fixed" class to the body element to have fixed footer -->
<!-- DOC: Apply "page-sidebar-reversed" class to put the sidebar on the right side -->
<!-- DOC: Apply "page-full-width" class to the body element to have full width page without the sidebar menu -->
<body class="page-header-fixed page-quick-sidebar-over-content page-style-square">
<!-- BEGIN HEADER -->
<div class="page-header navbar navbar-fixed-top">
	<!-- BEGIN HEADER INNER -->
	<div class="page-header-inner">
		<!-- BEGIN LOGO -->
		<div class="page-logo">
			<a href="{{route('admin.dashboard')}}">
			<img src="{{asset('assets/admin/layout/img/'.$settings->logo)}}" alt="logo"  height="30px" class="logo-default"/>
			</a>
			<div class="menu-toggler sidebar-toggler hide">
				<!-- DOC: Remove the above "hide" to enable the sidebar toggler button on header -->
			</div>
		</div>
		<!-- END LOGO -->
		<!-- BEGIN RESPONSIVE MENU TOGGLER -->
		<a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
		</a>
        <div class="top-menu">
            <ul class="nav navbar-nav pull-right">
                <li class="dropdown dropdown-user">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
                    <span class="username">
                    {{$admin->name}}</span>
                    <i class="fa fa-angle-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-default">

                        <li>
                            <a href="{{route('change.password.view')}}">
                            <i class="icon-key"></i> Change Password </a>
                        </li>
                        <li>
                            <a href="{{route('admin.logout')}}">
                            <i class="icon-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- END TOP NAVIGATION MENU -->
    </div>
    <!-- END HEADER INNER -->
</div>
<div class="clearfix">
</div>
<!-- BEGIN CONTAINER -->
<div class="page-container">
	<!-- BEGIN SIDEBAR -->
	<div class="page-sidebar-wrapper">
		<div class="page-sidebar navbar-collapse collapse">
			<!-- BEGIN SIDEBAR MENU -->
			<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
			<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
			<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
			<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
			<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
			<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
			<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
				<!-- DOC: To remove the sidebar toggler from the sidebar you just need to completely remove the below "sidebar-toggler-wrapper" LI element -->
				<li class="sidebar-toggler-wrapper">
					<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
					<div class="sidebar-toggler">
					</div>
					<!-- END SIDEBAR TOGGLER BUTTON -->
				</li>
				<!-- DOC: To remove the search box from the sidebar you just need to completely remove the below "sidebar-search-wrapper" LI element -->
				<li class="start {{$dashboard or ''}}">
					<a href="{{route('admin.dashboard')}}">
					<i class="icon-home"></i>
					<span class="title">Dashboard</span>
					</a>
                </li>
                 <li class="{{$Settings}}">
                    <a href="">
                    <i class="fa fa-gears"></i>
                    <span class="title ">Settings</span>
                    </a>
                    <ul class="sub-menu">
                        <li class="{{$general or ''}}">
                            <a href="{{route('admin.general.settings')}}">
                            <i class="fa fa-gear"></i>
                            General Settings</a>
                        </li>
                        <li class="{{$profile or ''}}">
                            <a href="{{route('admin.profile.settings')}}">
                            <i class="icon-user"></i>
                            Profile Settings</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div> <!-- END SIDEBAR MENU -->
    </div>
    	<!-- END SIDEBAR -->
    <!-- BEGIN CONTENT -->

    <div class="page-content-wrapper">
        <div class="page-content">
            @yield('Heading')
            @yield('BODY')
        </div>
    </div>
</div>
<!-- END CONTAINER -->
<!-- BEGIN FOOTER -->
<div class="page-footer">
	<div class="page-footer-inner">
		{{ date('Y')}} &copy; {{$settings->name}}.
	</div>
	<div class="scroll-to-top">
		<i class="icon-arrow-up"></i>
	</div>
</div>
<!-- END FOOTER -->
<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
{!! HTML::script('assets/global/plugins/respond.min.js') !!}
{!! HTML::script('assets/global/plugins/excanvas.min.js') !!}
<![endif]-->
{!! HTML::script('assets/global/plugins/jquery.min.js') !!}
{!! HTML::script('assets/global/plugins/jquery-migrate.min.js') !!}
<!-- IMPORTANT! Load jquery-ui-1.10.3.custom.min.js before bootstrap.min.js to fix bootstrap tooltip conflict with jquery ui tooltip -->
{!! HTML::script('assets/global/plugins/jquery-ui/jquery-ui-1.10.3.custom.min.js') !!}
{!! HTML::script('assets/global/plugins/bootstrap/js/bootstrap.min.js') !!}
{!! HTML::script('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js') !!}
{!! HTML::script('assets/global/plugins/jquery.blockui.min.js') !!}
{!! HTML::script('assets/global/plugins/uniform/jquery.uniform.min.js') !!}
{!! HTML::script('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js') !!}
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
{!! HTML::script('assets/global/scripts/metronic.js') !!}
{!! HTML::script('assets/admin/layout/scripts/layout.js') !!}
{!! HTML::script('assets/js/commonjs.js')!!}
@yield('JS')
<script>
jQuery(document).ready(function() {
   Metronic.init(); // init metronic core componets
   Layout.init(); // init layout
  });
  jQuery(document).ready(function() {
         // We need to set assets path because default Metronic path causes problems
         Metronic.setAssetsPath("{{ URL::asset("assets") }}/");
     });

   $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>
