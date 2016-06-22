<?php  session_start();
	define('ROOT','..');
	require_once(ROOT."/src/header.php"); 
?>

			<!-- /section:basics/sidebar -->
			<div class="main-content">
				<div class="main-content-inner">
					<!-- #section:basics/content.breadcrumbs -->
					<div class="breadcrumbs" id="breadcrumbs">
						<script type="text/javascript">
							try{ace.settings.check('breadcrumbs' , 'fixed')}catch(e){}
						</script>

						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="index.php">首頁</a>
							</li>
							
							<li class="active">個人資料維護</li>

						</ul><!-- /.breadcrumb -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<div class="page-header">
							<h1>
								個人資料維護
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									編輯個人資料
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<div>
									<div id="user-profile-3" class="user-profile row">
										<div class="col-sm-offset-1 col-sm-10">
											<div class="space"></div>

											<form class="form-horizontal" id="profile_form">
												<div class="tabbable">
													<ul class="nav nav-tabs padding-16">
														<li class="active">
															<a data-toggle="tab" href="#edit-basic">
																<i class="green ace-icon fa fa-pencil-square-o bigger-125"></i>
																基本資訊
															</a>
														</li>
													</ul>

													<div class="tab-content profile-edit-tab-content">
														<div id="edit-basic" class="tab-pane in active">
															<h4 class="header blue bolder smaller">頭像</h4>

															<div class="row">
																<div class="col-xs-12 col-sm-3"></div>
																<div class="col-xs-12 col-sm-6">
																	<input type="file" />
																</div>
																<div class="col-xs-12 col-sm-3"></div>
															</div>

															<h4 class="header blue bolder smaller">個人資料</h4>

															<div class="form-group">
																<label class="col-sm-4 control-label no-padding-right" for="form_name">姓名</label>

																<div class="col-sm-8">
																	<span class="input-icon input-icon-right">
																		<input type="text" id="form_name" name="form_name" value="<?=$admin['admin_name']?>" />
																		<i class="ace-icon fa fa-android"></i>
																	</span>
																</div>
															</div>

															<div class="space-4"></div>
															
															<div class="form-group">
																<label class="col-sm-4 control-label no-padding-right" for="form_email">Email</label>
																<div class="col-sm-8">
																	<span class="input-icon input-icon-right">
																		<input type="email" id="form_email" name="form_email" value="<?=$admin['admin_email']?>" size="30"/>
																		<i class="ace-icon fa fa-envelope"></i>
																	</span>
																</div>
															</div>


															<div class="space-4"></div>

															<div class="form-group">
																<label class="col-sm-4 control-label no-padding-right" for="form_phone">聯絡方式</label>

																<div class="col-sm-8">
																	<span class="input-icon input-icon-right">
																		<input class="input-medium input-mask-phone" type="text" id="form_phone" name="form_phone" value="<?=$admin['admin_phone']?>"/>
																		<i class="ace-icon fa fa-phone fa-flip-horizontal"></i>
																	</span>
																</div>
															</div>
														</div>
													</div>
												</div>

												<div class="clearfix form-actions">
													<div class="col-md-offset-4 col-md-8">
														<button class="btn btn-info" type="button" id="profile_submit">
															<i class="ace-icon fa fa-check bigger-110"></i>
															儲存
														</button>

														&nbsp; &nbsp;
														<button class="btn" type="reset">
															<i class="ace-icon fa fa-undo bigger-110"></i>
															重設
														</button>
													</div>
												</div>
											</form>
										</div><!-- /.span -->
									</div><!-- /.user-profile -->
								</div>
								<!-- PAGE CONTENT ENDS -->
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->
			
		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
				///////////////////////////////////////////
				$('#user-profile-3').find('input[type=file]').ace_file_input({
					style:'well',
					btn_choose:'Change avatar',
					btn_change:null,
					no_icon:'ace-icon fa fa-picture-o',
					thumbnail:'large',
					droppable:true,
					
					allowExt: ['jpg', 'jpeg', 'png', 'gif'],
					allowMime: ['image/jpg', 'image/jpeg', 'image/png', 'image/gif']
				})
				.end().find('button[type=reset]').on(ace.click_event, function(){
					$('#user-profile-3 input[type=file]').ace_file_input('reset_input');
				})
				.end().find('.date-picker').datepicker().next().on(ace.click_event, function(){
					$(this).prev().focus();
				})
				$('.input-mask-phone').mask('(9999) 999-999');
			
				$('#user-profile-3').find('input[type=file]').ace_file_input('show_file_list', [{type: 'image', name: '../assets/avatars/profile-pic.jpg'}]);

			});
			
			function reset () {
				alertify.set({
					labels : {
						ok     : "OK",
						cancel : "Cancel"
					},
					delay : 5000,
					buttonReverse : false,
					buttonFocus   : "ok"
				});
			}
			
			//profile
			$("#profile_form").validate({
				errorElement: 'div',
				errorClass: 'help-block',
				focusInvalid: false,
				ignore: "",
				onsubmit: true,
				rules: {
					form_name: "required",
					form_email:  {
						required: true,
						email: true
					},
					form_phone:  "required"
				},
				messages: {
					form_name: "Please enter your Name",
					form_email: "Please enter your Email",
					form_phone: "Please enter your phone"
				},
				submitHandler: function(form) {
					$.ajax({
						type: "POST",
						url: "../src/Application.Top.php",
						data: {admin_name: $("#form_name").val(), admin_email: $("#form_email").val(), admin_phone: $("#form_phone").val(), status:"admin_profile"},
						success: function(data){
							data = data.replace(/[\s]+/g, ""); 
							if(data=="success"){
								reset();
								alertify.success("更新成功!");
							}else if(data=="fails"){
								reset();
								alertify.error("更新失敗!");
							}else if(data=="error"){
								reset();
								alertify.error("參數錯誤，請再嘗試一次");
							}else{
								alertify.error(data);
							}
						},
						error: function(){
							reset();
							alertify.error("系統錯誤，請聯絡系統管理員。");
						}	
					});
				}
			});
			
			
			$("#profile_submit").on( 'click', function () {
				 $("#profile_form").submit(); 
			});
		</script>

<?php require_once(ROOT."/src/footer.php");?>
