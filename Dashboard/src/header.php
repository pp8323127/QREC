<?php 
// session_start();
	$siteURL = "http://163.18.42.209/QREC/Dashboard";
 	require_once("../src/db.php");
	require_once("../src/Application.Top.php");
	$sql = "SELECT * from admin where id = '{$_SESSION[admin_id]}'";
	if(fetchQueryRow($sql)<=0){
		echo "<meta http-equiv='refresh' content=\"0;url=../index.html\" />";
		echo "<script>alert('您尚未登入')</script>";
		die();
	}
	$admin_row = fetchQueryAll($sql);
	foreach($admin_row as $admin)
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title>Dashboard - E508 Lab</title>

		<meta name="description" content="overview &amp; stats" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
		
		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/bootstrap.css" />
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/font-awesome.css" />
		<!-- page calendar plugin styles -->
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/jquery-ui.custom.css" />
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/fullcalendar.css" />
		<!-- page profoile plugin styles -->
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/jquery.gritter.css" />
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/select2.css" />
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/datepicker.css" />
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/bootstrap-editable.css" />
		<!--alertify stlye-->
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/alertify.core.css" />
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/alertify.default.css" id="toggleCSS"/>
		<!-- page jqGrid plugin styles -->
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/jquery-ui.css" />
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/ui.jqgrid.css" />
		<!-- text fonts -->
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/ace-fonts.css" />
		<!-- ace styles -->
		<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/ace.css" class="ace-main-stylesheet" id="main-ace-style" />
		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?=$siteURL;?>/assets/css/ace-part2.css" class="ace-main-stylesheet" />
		<![endif]-->
		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?=$siteURL;?>/assets/css/ace-ie.css" />
		<![endif]-->
		<!-- ace settings handler -->
		<script src="<?=$siteURL;?>/assets/js/ace-extra.js"></script>

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?=$siteURL;?>/assets/js/html5shiv.js"></script>
		<script src="<?=$siteURL;?>/assets/js/respond.js"></script>
		<![endif]-->
		
		<!-- JS start---->
		<!--[if !IE]> -->
		<script type="text/javascript">
			window.jQuery || document.write("<script src='<?=$siteURL;?>/assets/js/jquery.js'>"+"<"+"/script>");
		</script>
		<!-- <![endif]-->

		<!--[if IE]>
			<script type="text/javascript">
			 window.jQuery || document.write("<script src='<?=$siteURL;?>/assets/js/jquery1x.js'>"+"<"+"/script>");
			</script>
		<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?=$siteURL;?>/assets/js/jquery.mobile.custom.js'>"+"<"+"/script>");
		</script>
		<script src="<?=$siteURL;?>/assets/js/bootstrap.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="<?=$siteURL;?>/assets/js/excanvas.js"></script>
		<![endif]-->
		<script src="<?=$siteURL;?>/assets/js/jquery-ui.custom.js"></script>
		<script src="<?=$siteURL;?>/assets/js/jquery.ui.touch-punch.js"></script>
		<script src="<?=$siteURL;?>/assets/js/jquery.gritter.js"></script>
		<script src="<?=$siteURL;?>/assets/js/jquery.easypiechart.js"></script>
		<script src="<?=$siteURL;?>/assets/js/jquery.sparkline.js"></script>
		<script src="<?=$siteURL;?>/assets/js/flot/jquery.flot.js"></script>
		<script src="<?=$siteURL;?>/assets/js/flot/jquery.flot.pie.js"></script>
		<script src="<?=$siteURL;?>/assets/js/flot/jquery.flot.resize.js"></script>
		<script src="<?=$siteURL;?>/assets/js/date-time/moment.js"></script>
		<script src="<?=$siteURL;?>/assets/js/date-time/bootstrap-datepicker.js"></script>
		<script src="<?=$siteURL;?>/assets/js/fullcalendar.js"></script>
		<script src="<?=$siteURL;?>/assets/js/bootbox.js"></script>
		<script src="<?=$siteURL;?>/assets/js/jquery.hotkeys.js"></script>
		<script src="<?=$siteURL;?>/assets/js/bootstrap-wysiwyg.js"></script>
		<script src="<?=$siteURL;?>/assets/js/select2.js"></script>
		<script src="<?=$siteURL;?>/assets/js/fuelux/fuelux.spinner.js"></script>
		<script src="<?=$siteURL;?>/assets/js/x-editable/bootstrap-editable.js"></script>
		<script src="<?=$siteURL;?>/assets/js/x-editable/ace-editable.js"></script>
		<script src="<?=$siteURL;?>/assets/js/jquery.maskedinput.js"></script>
		<script src="<?=$siteURL;?>/assets/js/dataTables/jquery.dataTables.js"></script>
		<script src="<?=$siteURL;?>/assets/js/dataTables/jquery.dataTables.bootstrap.js"></script>
		<script src="<?=$siteURL;?>/assets/js/dataTables/extensions/TableTools/js/dataTables.tableTools.js"></script>
		<script src="<?=$siteURL;?>/assets/js/dataTables/extensions/ColVis/js/dataTables.colVis.js"></script>
		<script src="<?=$siteURL;?>/assets/js/fuelux/fuelux.wizard.js"></script>
		<script src="<?=$siteURL;?>/assets/js/jquery.validate.js"></script>
		<script src="<?=$siteURL;?>/assets/js/additional-methods.js"></script>
		<script src="<?=$siteURL;?>/assets/js/jqGrid/jquery.jqGrid.src.js"></script>
		<script src="<?=$siteURL;?>/assets/js/jqGrid/i18n/grid.locale-en.js"></script>
		<script src="<?=$siteURL;?>/assets/js/markdown/markdown.js"></script>
		<script src="<?=$siteURL;?>/assets/js/markdown/bootstrap-markdown.js"></script>
		<script src="<?=$siteURL;?>/assets/js/alertify.js"></script>

		<!-- ace scripts -->
		<script src="<?=$siteURL;?>/assets/js/ace/elements.scroller.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/elements.colorpicker.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/elements.fileinput.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/elements.typeahead.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/elements.wysiwyg.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/elements.spinner.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/elements.treeview.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/elements.wizard.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/elements.aside.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/ace.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/ace.ajax-content.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/ace.touch-drag.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/ace.sidebar.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/ace.sidebar-scroll-1.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/ace.submenu-hover.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/ace.widget-box.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/ace.settings.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/ace.settings-rtl.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/ace.settings-skin.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/ace.widget-on-reload.js"></script>
		<script src="<?=$siteURL;?>/assets/js/ace/ace.searchbox-autocomplete.js"></script>
		<!-- JS end---->
	</head>

	<body class="no-skin">
		<!-- #section:basics/navbar.layout -->
		<div id="navbar" class="navbar navbar-default">
			<script type="text/javascript">
				try{ace.settings.check('navbar' , 'fixed')}catch(e){}
			</script>

			<div class="navbar-container" id="navbar-container">
				<!-- #section:basics/sidebar.mobile.toggle -->
				<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
					<span class="sr-only">Toggle sidebar</span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>

					<span class="icon-bar"></span>
				</button>

				<!-- /section:basics/sidebar.mobile.toggle -->
				<div class="navbar-header pull-left">
					<!-- #section:basics/navbar.layout.brand -->
					<a href="#" class="navbar-brand">
						<small>
							<i class="fa fa-send"></i>
							行動商務
						</small>
					</a>

					<!-- /section:basics/navbar.layout.brand -->

					<!-- #section:basics/navbar.toggle -->

					<!-- /section:basics/navbar.toggle -->
				</div>

				<!-- #section:basics/navbar.dropdown -->
				<div class="navbar-buttons navbar-header pull-right" role="navigation">
					<ul class="nav ace-nav">
						<li class="grey">
							<a data-toggle="dropdown" class="dropdown-toggle" href="#">
								<i class="ace-icon fa fa-bell icon-animated-bell"></i>
								<span class="badge badge-grey">3</span>
							</a>

							<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
								<li class="dropdown-header">
									<i class="ace-icon fa fa-exclamation-triangle"></i>
									3 個訊息
								</li>

								<li class="dropdown-content">
									<ul class="dropdown-menu dropdown-navbar navbar-pink">
										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
														[Test] 新訂單成立
													</span>
													<span class="pull-right badge badge-info">+3</span>
												</div>
											</a>
										</li>

										<li>
											<a href="#">
												<i class="btn btn-xs btn-primary fa fa-user"></i>
												[Test] 有玩家對您使用交信
											</a>
										</li>

										<li>
											<a href="#">
												<div class="clearfix">
													<span class="pull-left">
														<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
														[Test] 訂單待處理通知
													</span>
													<span class="pull-right badge badge-success">+4</span>
												</div>
											</a>
										</li>
									</ul>
								</li>
							</ul>
						</li>
						<!-- #section:basics/navbar.user_menu -->
						<li class="light-blue">
							<a data-toggle="dropdown" href="#" class="dropdown-toggle">
								<img class="nav-user-photo" src="../assets/avatars/fuser.jpg" alt="Jason's Photo" />
								<span class="user-info">
									<small>Welcome,</small>
									<?php echo $admin['admin_name'];?>
								</span>

								<i class="ace-icon fa fa-caret-down"></i>
							</a>

							<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
								<li>
									<a href="profile.php">
										<i class="ace-icon fa fa-user"></i>
										個人資料維護
									</a>
								</li>

								<li class="divider"></li>

								<li>
									<a href="../src/logout.php">
										<i class="ace-icon fa fa-power-off"></i>
										登出
									</a>
								</li>
							</ul>
						</li>

						<!-- /section:basics/navbar.user_menu -->
					</ul>
				</div>

				<!-- /section:basics/navbar.dropdown -->
			</div><!-- /.navbar-container -->
		</div>

		<!-- /section:basics/navbar.layout -->
		<div class="main-container" id="main-container">
			<script type="text/javascript">
				try{ace.settings.check('main-container' , 'fixed')}catch(e){}
			</script>

			<!-- #section:basics/sidebar -->
			<div id="sidebar" class="sidebar                  responsive">
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'fixed')}catch(e){}
				</script>

				<div class="sidebar-shortcuts" id="sidebar-shortcuts">
					<div class="sidebar-shortcuts-large" id="sidebar-shortcuts-large">

						<!-- /section:basics/sidebar.layout.shortcuts -->
					</div>

					<div class="sidebar-shortcuts-mini" id="sidebar-shortcuts-mini">
					</div>
				</div><!-- /.sidebar-shortcuts -->

				<ul class="nav nav-list">
					<li class="active">
						<a href="index.php">
							<i class="menu-icon fa fa-tachometer"></i>
							<span class="menu-text"> 首頁 </span>
						</a>
						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="order.php">
							<i class="menu-icon fa fa-shopping-cart"></i>
							<span class="menu-text"> 訂單管理 </span>
						</a>
						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-qrcode"></i>
							<span class="menu-text"> 商品管理 </span>
						</a>
						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="#" class="dropdown-toggle">
							<i class="menu-icon fa fa-users"></i>
							<span class="menu-text"> 帳號管理 </span>

							<b class="arrow fa fa-angle-down"></b>
						</a>

						<b class="arrow"></b>

						<ul class="submenu">
							<li class="">
								<a href="MemberEdit.php">
									<i class="menu-icon fa fa-caret-right"></i>
									會員帳號管理
								</a>

								<b class="arrow"></b>
							</li>

							<li class="">
								<a href="AdminEdit.php">
									<i class="menu-icon fa fa-caret-right"></i>
									管理者帳號管理
								</a>

								<b class="arrow"></b>
							</li>

						</ul>
					</li>

					<li class="">
						<a href="profile.php">
							<i class="menu-icon fa fa-user"></i>
							<span class="menu-text"> 個人資料維護 </span>
						</a>

						<b class="arrow"></b>
					</li>

					<li class="">
						<a href="../home/calendar.php">
							<i class="menu-icon fa fa-calendar"></i>

							<span class="menu-text">
								行事曆

								<!-- #section:basics/sidebar.layout.badge
								<span class="badge badge-transparent tooltip-error" title="2 Important Events">
									<i class="ace-icon fa fa-exclamation-triangle red bigger-130"></i>
								</span>

								/section:basics/sidebar.layout.badge -->
							</span>
						</a>

						<b class="arrow"></b>
					</li>
				</ul><!-- /.nav-list -->

				<!-- #section:basics/sidebar.layout.minimize -->
				<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
					<i class="ace-icon fa fa-angle-double-left" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
				</div>

				<!-- /section:basics/sidebar.layout.minimize -->
				<script type="text/javascript">
					try{ace.settings.check('sidebar' , 'collapsed')}catch(e){}
				</script>
			</div>