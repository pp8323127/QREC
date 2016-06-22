<?php session_start();
	define('ROOT','..');
	require_once(ROOT."/src/header.php"); 
	$order_sql="select * from mobile.order as mo left join mobile.order_status as mos on mo.oid=mos.oid where mo.oid = '{$_GET[id]}'";
	$order_row = fetchQueryAll($order_sql);
	foreach($order_row as $order)
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

							<li>
								<a href="order.php">訂單管理</a>
							</li>
							<li class="active">訂單狀態</li>
						</ul><!-- /.breadcrumb -->
						<!-- /section:basics/content.searchbox -->
					</div>

					<!-- /section:basics/content.breadcrumbs -->
					<div class="page-content">
						<div class="page-header">
							<h1>
								訂單狀態
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									查詢訂單狀態
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
								<!-- PAGE CONTENT BEGINS -->
								<div class="widget-box">
									<div class="widget-header widget-header-blue widget-header-flat">
										<h4 class="widget-title lighter">訂單編號 :  <b><?php echo $order[1];?></b></h4>
									</div>

									<div class="widget-body1">
										<div class="widget-main">
											<!-- #section:plugins/fuelux.wizard -->
											<div id="fuelux-wizard-container">
												<div>
													<!-- #section:plugins/fuelux.wizard.steps -->
													<ul class="steps">
														<li class="active">
															<span class="step">成立</span>
															<span class="title">2015-09-30 01:24:51</br>楊東霖</span>
														</li>

														<li class="active">
															<span class="step">確認</span>
															<span class="title">2015-10-01 16:39:12</br>陳瑋俊</span>
														</li>

														<li class="active">
															<span class="step">理貨</span>
															<span class="title">2015-10-01 16:56:23</br>陳瑋俊</span>
														</li>

														<li>
															<span class="step">出貨</span>
															<span class="title"></span>
														</li>
														<li>
															<span class="step">送達</span>
															<span class="title"></span>
														</li>
													</ul>

													<!-- /section:plugins/fuelux.wizard.steps -->
												</div>

												<hr />
												<!-- #section:plugins/fuelux.wizard.container -->
												<div class="row">
													<div class="col-xs-12 col-sm-6">
														<div class="widget-box transparent">
															<div class="widget-header widget-header-small">
																<h4 class="widget-title smaller">
																	<i class="ace-icon fa fa-check-square-o bigger-110"></i>
																	訂單資訊
																</h4>
															</div>
															
															<div class="profile-info-row profile-user-info-striped">
																<div class="profile-user-info">
																	<div class="profile-info-row">
																		<div class="profile-info-name"> 收貨人姓名 </div>
																		<div class="profile-info-value">
																			<span>Tony</span>
																		</div>
																	</div>

																	<div class="profile-info-row">
																		<div class="profile-info-name"> 收貨人連絡電話 </div>

																		<div class="profile-info-value">
																			<span>0988888888</span>
																		</div>
																	</div>

																	<div class="profile-info-row">
																		<div class="profile-info-name"> 聯絡人電子郵件 </div>
																		<div class="profile-info-value">
																			<span>u0324813@nkfust.edu.tw</span>
																		</div>
																	</div>

																	<div class="profile-info-row">
																		<div class="profile-info-name"> 交易地點 </div>
																		<div class="profile-info-value">
																			<span>管理學院(C棟)</span>
																		</div>
																	</div>

																	<div class="profile-info-row">
																		<div class="profile-info-name"> 交易時間 </div>
																		<div class="profile-info-value">
																			<span>2015年9月30日 1點24分</span>
																		</div>
																	</div>
																	
																	<div class="profile-info-row">
																		<div class="profile-info-name"> 訂單成立時間 </div>
																		<div class="profile-info-value">
																			<span>2015-09-30 01:24:51</span>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>

													<div class="col-xs-12 col-sm-6">
														<div class="widget-box transparent">
															<div class="widget-header widget-header-small header-color-blue2">
																<h4 class="widget-title smaller">
																	<i class="ace-icon fa fa-lightbulb-o bigger-120"></i>
																	產品資訊
																</h4>
															</div>
															<table id="simple-table" class="table table-striped table-bordered table-hover">
																<thead>
																	<tr>
																		<th class="center">產品名稱</th>
																		<th class="center">產品規格</th>
																		<th class="center">產品數量</th>
																		<th class="center">小計</th>
																	</tr>
																</thead>
																<tbody>
																	<tr>
																		<td>NKFUST經典款_酒紅色短袖純棉T恤</td>
																		<td>M</td>
																		<td>2</td>
																		<td>700</td>
																	</tr>
																	<tr>
																		<td>運動提袋(黑色)-NKFUST</td>
																		<td></td>
																		<td>3</td>
																		<td>900</td>
																	</tr>
																	<tr>
																		<td>NKFUST經典款_酒紅色短袖純棉T恤</td>
																		<td>M</td>
																		<td>2</td>
																		<td>700</td>
																	</tr>
																	<tr>
																		<td>運動提袋(黑色)-NKFUST</td>
																		<td></td>
																		<td>3</td>
																		<td>900</td>
																	</tr>
																</tbody>
															</table>
														</div>
													</div>
												</div>
												
												<div class="row">
													<div class="col-xs-12">
														
														<h4 class="header blue">
															<i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
															備註
														</h4>
														<div class="wysiwyg-editor" id="editor1"></div>
														
													</div>
												</div>
												<!-- /section:plugins/fuelux.wizard.container -->
											</div>

											<hr />
											<div class="wizard-actions">
												<!-- #section:plugins/fuelux.wizard.buttons -->
												<button class="btn btn-prev">
													<i class="ace-icon fa fa-arrow-left"></i>
													返回
												</button>

												<button class="btn btn-success btn-next">
													儲存
													<i class="ace-icon fa fa-arrow-right icon-on-right"></i>
												</button>

												<!-- /section:plugins/fuelux.wizard.buttons -->
											</div>

											<!-- /section:plugins/fuelux.wizard -->
										</div><!-- /.widget-main -->
									</div><!-- /.widget-body -->
								</div>
							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div><!-- /.main-content -->


		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			
				$('[data-rel=tooltip]').tooltip();
			
				$(".select2").css('width','200px').select2({allowClear:true})
				.on('change', function(){
					$(this).closest('form').validate().element($(this));
				}); 
			
				$('#modal-wizard-container').ace_wizard();
				
				function showErrorAlert (reason, detail) {
					var msg='';
					if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
					else {
						//console.log("error uploading file", reason, detail);
					}
					$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
					 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
				}
				//editor1
				$('#editor1').ace_wysiwyg({
					toolbar:
					[
						'font',
						null,
						'fontSize',
						null,
						{name:'bold', className:'btn-info'},
						{name:'italic', className:'btn-info'},
						{name:'strikethrough', className:'btn-info'},
						{name:'underline', className:'btn-info'},
						null,
						{name:'insertunorderedlist', className:'btn-success'},
						{name:'insertorderedlist', className:'btn-success'},
						{name:'outdent', className:'btn-purple'},
						{name:'indent', className:'btn-purple'},
						null,
						{name:'justifyleft', className:'btn-primary'},
						{name:'justifycenter', className:'btn-primary'},
						{name:'justifyright', className:'btn-primary'},
						{name:'justifyfull', className:'btn-inverse'},
						null,
						{name:'createLink', className:'btn-pink'},
						{name:'unlink', className:'btn-pink'},
						null,
						{name:'insertImage', className:'btn-success'},
						null,
						'foreColor',
						null,
						{name:'undo', className:'btn-grey'},
						{name:'redo', className:'btn-grey'}
					],
					'wysiwyg': {
						fileUploadError: showErrorAlert
					}
				}).prev().addClass('wysiwyg-style2');
				
			});
		</script>		
		
<?php require_once("../src/footer.php");?>