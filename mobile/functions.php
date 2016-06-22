<?php
require('GCMPushMessage.php');
require("phpmailer/class.phpmailer.php");
//推撥給使用者
function send_gcm_message($con,$title,$message,$id,$oid) {
	$GetTokenSql = "select user_devicetoken from mobile.user where id = '{$id}'";
	$GetTokenResult = mysqli_query($con,$GetTokenSql);
	$GetTokenRow=mysqli_fetch_row($GetTokenResult);
	$msg = $title.";".$message.";".$oid;
	$apiKey = 'AIzaSyDzzlyUvXVeIwVZLF7_J5G0wtg_5b_5Sgs';
	$gcpm = new GCMPushMessage($apiKey);
	$gcpm->setDevices($GetTokenRow[0]);
	$response = $gcpm->send($msg);
}

//推撥給管理者
function send_admin_gcm_message($con,$title,$message,$oid) {
	$msg = $title.";".$message.";".$oid;
	$GetTokenSql = "select admin_devicetoken from admin where admin_devicetoken != 'NULL'";
	$GetTokenResult = mysqli_query($con,$GetTokenSql);
	while($GetTokenRow=mysqli_fetch_row($GetTokenResult)){
		$apiKey = 'AIzaSyDzzlyUvXVeIwVZLF7_J5G0wtg_5b_5Sgs';
		$gcpm = new GCMPushMessage($apiKey);
		$gcpm->setDevices($GetTokenRow[0]);
		$response = $gcpm->send($msg);
	}

}

function send_email($con,$GetOid) {
	//向資料庫搜尋該訂單的資訊
	$i=1;
	$str="";
	$sum=0;
	$EmailItemSql = "select * from mobile.order as mo inner join user as user on mo.user_id = user.id where mo.oid = '{$GetOid}'";
	$EmailItemResult = mysqli_query($con,$EmailItemSql);
	$EmailItemRow=mysqli_fetch_row($EmailItemResult);
		$name = $EmailItemRow[15];  //姓名
		$tplace = $EmailItemRow[8]; //交易地點
		$ttime = $EmailItemRow[9]; //交易時間
		$sum += $EmailItemRow[4]; //金額
	foreach(json_decode($EmailItemRow[3]) as $json => $key){
		$pruductSql="select name, price from product where pid='{$key->pid}'";
		$pruductResult = mysqli_query($con,$pruductSql);
		$pruductRow=mysqli_fetch_row($pruductResult);
		$str .= "<p style='margin-left: 40px;'>". $i ." : ".$pruductRow[0]."(".$pruductRow[1].")      數量:".$key->num."</p>";  //商品名稱，價格，數量
		$i++;
	}
  $mail = new PHPMailer();
  $mail->IsSMTP();
  $mail->SMTPAuth = true; // turn on SMTP authentication
  mb_internal_encoding('UTF-8');
  $mail->CharSet = "utf-8";//這幾行是必須的
  $mail->Username = "nkfusterc";
  $mail->Password = "tsufkn!ERC!";//這邊是你的gmail帳號和密碼

  $mail->FromName = mb_encode_mimeheader("行動商務訂購系統", "UTF-8");// 寄件者名稱(你自己要顯示的名稱)
  $webmaster_email = "test@gmail.com"; //回覆信件至此信箱

  $email="superzoro168@gmail.com";// 收件者信箱
  $name=$name;// 收件者的名稱or暱稱;
  $mail->From = $webmaster_email;
  $mail->AddBCC($email,$name);
  $mail->AddReplyTo($webmaster_email,"行動商務訂購系統");//這不用改

  $mail->WordWrap = 50;//每50行斷一次行
  //$mail->AddAttachment("/XXX.rar");附加檔案可以用這種語法(記得把上一行的//去掉)
  $mail->IsHTML(true); // send as HTML
  $mail->Subject = mb_encode_mimeheader("『行動商務購買系統』訂購成功", "UTF-8");// 信件標題
  $mail->Body = "<p><b>".$name."</b>你好：</p>
      <p style='margin-left: 40px;'>系統已收到您從手機發出的訂單，訂購商品明細如下</p>".$str."
      <p style='margin-left: 40px;'>交貨地點：".$tplace."</p></p>
      <p style='margin-left: 40px;'>交貨時間：".$ttime."</p></p>
      <p style='margin-left: 40px;'>總交易金額為：<font color='red'>NT$".$sum."</font></p></p>
      <p style='margin-left: 40px;'>將會於您指定的時間點寄送貨物給您，感謝您的購買</p></p>
      <p style='margin-left: 40px;'>※本郵件是由系統自動寄送，請勿直接回覆。</p>
      ";
  //信件內容(html版，就是可以有html標籤的如粗體、斜體之類)
  if(!$mail->Send()){
    echo "寄信發生錯誤：" . $mail->ErrorInfo;//如果有錯誤會印出原因
  }
  $mail->ClearAllRecipients();
  $mail->ClearAttachments();  
}

function CheckPOP3($id,$passwd,$port=110){
		$server = "ccms.nkfust.edu.tw";
		$if_false = false; //此變數傳回值即為登入成敗依據  先預設false   
		@$fs=fsockopen($server,$port,$errno,$errstr,5);
		if (!$fs)
			return false;
			$msg=fgets($fs,128);
			fputs($fs,"user $id\r\n");
			$msg=fgets($fs,128);
			if (strpos($msg,"+OK")===false)
			$if_false=true;
		fputs($fs,"pass $passwd\r\n");
		$msg=fgets($fs,128);
		if (strpos($msg,"+OK")===false)
			$if_false=true;
		fputs($fs,"quit\r\n");
		fclose($fs);
		if (@$if_false)
			return false;
		return true;
}
?>