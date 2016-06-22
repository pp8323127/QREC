<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>電子郵件寄送程式(測試版)</title>
</head>
<?php include('connect.php');?>
<script> 
	function import_check(){
		var f_content = form1.file.value;
		var fileext=f_content.substring(f_content.lastIndexOf("."),f_content.length) 
		fileext=fileext.toLowerCase() 
		if (fileext!='.xls'){
			alert("對不起，導入資料格式必須是xls格式文件哦，請您調整格式後重新上傳，謝謝！");
			return false;
		}	 
	} 
</script>
<body>
<form id="form1" name="form1" enctype="multipart/form-data" method="POST" action="insert.php">
	<table width="98%" border="0" align="center" style="margin-top:20px; border:1px solid #9abcde;"> 
		<tr > 
			<td height="28" colspan="2"><label><strong>檔案上傳</strong></label></td> 
		</tr> 
		<tr> 
			<td width="18%" height="50"> 選擇你要導入的Excel資料表</td>
				<input name="file" type="file" id="file" size="50" />
				<label><input name="button" type="submit" class="nnt_submit" id="button" value="導入資料" onclick="import_check();"/></label> 
			</td> 
		</tr> 
		<tr> 
			<td colspan="2" bgcolor="#DDF0FF"> [<span class="STYLE1">注</span>]資料表導入格式說明:</td> 
		</tr>
		<tr> 
			<td colspan="2"> 1、其它.導入資料表文件必須是<strong>excel</strong>文件格式{.<span class="STYLE2">xls</span>}為副檔名． </td> 
		</tr> 
		<tr>
			<td colspan="2"> <a href="./sample.xls">範例excel參考</a></td> 
		</tr>
	</table>
</form> 
</body>
</html>