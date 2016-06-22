<table border="1" cellpadding="1" cellspacing="1" style="width: 500px;">
	<tr>
		<td colspan="5" style="text-align: center;">財金學院_模擬投資競賽_email發送測試網站</td>
	</tr>
	<tr>
		<td colspan="5" style="text-align: center;"><a href="./emailtest.php">點我開始傳送電子郵件</a>、<a href="./up.php">上傳EXCEL到資料庫</a></td>
	</tr>
	<tr>
		<td>編號</td>
		<td>信箱</td>
		<td>帳號</td>
		<td>密碼</td>
		<td>名稱</td>
	</tr>
<?php
include("./connect.php");
	  $sql = "select * from cof";
	  $result=mysql_query($sql);
	while($row = mysql_fetch_row($result)){
	echo "
		<tr>
			<td>".$row[0]."</td>
			<td>".$row[1]."</td>
			<td>".$row[2]."</td>
			<td>".$row[3]."</td>
			<td>".$row[4]."</td>
		</tr>
	";
	}
?>
</table>
<b>發送標題:</b>恭喜您！成功報名『2014第一科大校園投資模擬競賽』</br>
<b>寄件人:</b>stu801106@gmail.com</br>
<b>寄件人名稱:</b>財務金融學院</br>
<b>回覆人:</b>cof@nkfust.edu.tw</br>
<b>回覆人名稱:</b>財務金融學院</br>
<b>顯示內容:</b>
<p>______同學你好：</p>
						<p style='margin-left: 40px;'>感謝您報名&quot;投資模擬競賽&quot;</p>
						<p style='margin-left: 40px;'>小組帳號：_______</p>
						<p style='margin-left: 40px;'>小組密碼：_______</p>
						<p style='margin-left: 40px;'>請您謹記此資料並定時注意本院活動訊息通知</p>
						<p>謝謝</p>
