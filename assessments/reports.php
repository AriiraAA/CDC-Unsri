<!DOCTYPE html>
<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 3.3.4
Version: 4.0.1
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
<html lang="en" class="no-js">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>CDC - Reports | Universitas Sriwijaya</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1" name="viewport"/>
<meta content="" name="description"/>
<meta content="" name="author"/>
<!-- BEGIN GLOBAL MANDATORY STYLES -->
<link href='http://fonts.googleapis.com/css?family=Oswald:400,300,700' rel='stylesheet' type='text/css'>
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/simple-line-icons/simple-line-icons.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/uniform/css/uniform.default.css" rel="stylesheet" type="text/css"/>
<link href="../assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css" rel="stylesheet" type="text/css"/>
<!-- END GLOBAL MANDATORY STYLES -->
<!-- BEGIN PAGE LEVEL PLUGIN STYLES -->
<link href="../assets/global/plugins/morris/morris.css" rel="stylesheet" type="text/css">
<!-- END PAGE LEVEL PLUGIN STYLES -->
<!-- BEGIN PAGE STYLES -->
<link href="../assets/admin/pages/css/tasks.css" rel="stylesheet" type="text/css"/>
<!-- END PAGE STYLES -->
<!-- BEGIN THEME STYLES -->
<!-- DOC: To use 'material design' style just load 'components-md.css' stylesheet instead of 'components.css' in the below style tag -->
<link href="../assets/global/css/components-md.css" id="style_components" rel="stylesheet" type="text/css"/>
<link href="../assets/global/css/plugins.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout6/css/layout.css" rel="stylesheet" type="text/css"/>
<link href="../assets/admin/layout6/css/custom.css" rel="stylesheet" type="text/css"/>
<!-- END THEME STYLES -->
<link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->
<body class="page-md page-quick-sidebar-over-content">

	<!-- BEGIN MAIN LAYOUT -->
	<!-- HEADER BEGIN -->
    <header class="page-header">
        <nav class="navbar" role="navigation">
            <div class="container-fluid">
                <div class="havbar-header">
                	<!-- BEGIN LOGO -->
                    <a id="index" class="navbar-brand" href="start.html">
                        <img src="../assets/admin/layout6/img/logo.png" alt="Logo">
                    </a>
                	<!-- END LOGO -->

	                <!-- BEGIN TOPBAR ACTIONS -->
	                <div class="topbar-actions">
		                <!-- DOC: Apply "search-form-expanded" right after the "search-form" class to have half expanded search box -->
						<form class="search-form" action="extra_search.html" method="GET">
							<div class="input-group">
								<input type="text" class="form-control" placeholder="Search here" name="query">
								<span class="input-group-btn">
									<a href="javascript:;" class="btn submit"><i class="fa fa-search"></i></a>
								</span>
							</div>
						</form>
						<!-- END HEADER SEARCH BOX -->

	                	
					</div>
	                <!-- END TOPBAR ACTIONS -->
                </div>
            </div>
            <!--/container-->
        </nav>
    </header>
	<!-- HEADER END -->

	<!-- PAGE CONTENT BEGIN -->
    <div class="container-fluid">
    	<div class="page-content page-content-popup">
    		<!-- BEGIN PAGE CONTENT FIXED -->
			<div class="page-content-fixed-header">
				<h2>Reports</h2>

				<div class="content-header-menu">
   
    				<!-- BEGIN MENU TOGGLER -->
    				<button type="button" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
	                    <span class="toggle-icon">
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                        <span class="icon-bar"></span>
	                    </span>
	                </button>
    				<!-- END MENU TOGGLER -->
    			</div>
			</div>

			<!-- BEGIN SIDEBAR -->
			<div class="page-sidebar-wrapper">
				<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
				<!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
				<div class="page-sidebar navbar-collapse collapse">
					<!-- BEGIN SIDEBAR MENU -->
					<!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
					<!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
					<!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
					<!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
					<!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
					<!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
					<ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
						<li class="active">
							<a href="index.html">
							<i class="icon-list"></i>
							<span class="title">Guidelines</span>
							</a>
						</li>
						<li>
							<a href="start.html">
							<i class="icon-home"></i>
							<span class="title">Reports</span>
							</a>
						</li>
						<li>
							<a href="javascript:;">
							<i class="icon-folder"></i>
							<span class="title">Multi Level Menu</span>
							<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<li>
									<a href="javascript:;">
									<i class="icon-settings"></i> Item 1 <span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="javascript:;">
											<i class="icon-user"></i>
											Sample Link 1 <span class="arrow"></span>
											</a>
											<ul class="sub-menu">
												<li>
													<a href="#"><i class="icon-power"></i> Sample Link 1</a>
												</li>
												<li>
													<a href="#"><i class="icon-paper-plane"></i> Sample Link 1</a>
												</li>
												<li>
													<a href="#"><i class="icon-star"></i> Sample Link 1</a>
												</li>
											</ul>
										</li>
										<li>
											<a href="#"><i class="icon-camera"></i> Sample Link 1</a>
										</li>
										<li>
											<a href="#"><i class="icon-link"></i> Sample Link 2</a>
										</li>
										<li>
											<a href="#"><i class="icon-pointer"></i> Sample Link 3</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="javascript:;">
									<i class="icon-globe"></i> Item 2 <span class="arrow"></span>
									</a>
									<ul class="sub-menu">
										<li>
											<a href="#"><i class="icon-tag"></i> Sample Link 1</a>
										</li>
										<li>
											<a href="#"><i class="icon-pencil"></i> Sample Link 1</a>
										</li>
										<li>
											<a href="#"><i class="icon-graph"></i> Sample Link 1</a>
										</li>
									</ul>
								</li>
								<li>
									<a href="#">
									<i class="icon-bar-chart"></i>
									Item 3 </a>
								</li>
							</ul>
						</li>
					</ul>
					<!-- END SIDEBAR MENU -->
				</div>
			</div>
			<!-- END SIDEBAR -->

			<div class="page-fixed-main-content">
				<div class="row">
	    			<div class="col-md-12">
	    				<!-- BEGIN Portlet PORTLET-->
						<div class="portlet light bordered">
							<div class="portlet-title">
								<div class="caption font-dark">
									<span class="caption-subject bold uppercase">Guidelines</span>
									<span class="caption-helper"></span>
								</div>
							</div>
							<div class="portlet-body" id="content">
    							ini conttnent
							</div>
						</div>
						<!-- END PORTLET-->
	    			</div>
	    		</div>
	    	</div>		
    	</div>
    </div>
	<!-- PAGE CONTENT END -->
    <!-- END MAIN LAYOUT -->
    <a href="#index" class="go2top"><i class="icon-arrow-up"></i></a>

<!-- BEGIN JAVASCRIPTS(Load javascripts at bottom, this will reduce page load time) -->
<!-- BEGIN CORE PLUGINS -->
<!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
<script src="../assets/global/plugins/jquery.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-migrate.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.blockui.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/uniform/jquery.uniform.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js" type="text/javascript"></script>
<!-- END CORE PLUGINS -->
<!-- BEGIN PAGE LEVEL PLUGINS -->
<script src="../assets/global/plugins/amcharts/amcharts/amcharts.js" type="text/javascript" ></script>
<script src="../assets/global/plugins/amcharts/amcharts/serial.js" type="text/javascript" ></script>
<script src="../assets/global/plugins/amcharts/amcharts/pie.js" type="text/javascript" ></script>
<script src="../assets/global/plugins/amcharts/amcharts/themes/light.js" type="text/javascript" ></script>
<script src="../assets/global/plugins/morris/morris.min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/morris/raphael-min.js" type="text/javascript"></script>
<script src="../assets/global/plugins/jquery.sparkline.min.js" type="text/javascript"></script>
<!-- END PAGE LEVEL PLUGINS -->

<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="../assets/global/scripts/metronic.js" type="text/javascript"></script>
<script src="../assets/admin/layout6/scripts/layout.js" type="text/javascript"></script>
<script src="../assets/admin/layout6/scripts/quick-sidebar.js" type="text/javascript"></script>
<script src="../assets/admin/layout6/scripts/index.js" type="text/javascript"></script>
<script src="../assets/admin/pages/scripts/tasks.js" type="text/javascript"></script>
<!-- END PAGE LEVEL SCRIPTS -->
<script>
jQuery(document).ready(function() {    
   	Metronic.init(); // init metronic core componets
   	Layout.init(); // init layout
    Index.init(); // init index page
    QuickSidebar.init(); // init quick sidebar
    Tasks.initDashboardWidget(); // init tash dashboard widget
});
</script>
<!-- END JAVASCRIPTS -->
</body>
<!-- END BODY -->
</html>