<?php
require("../phpMailer/class.phpmailer.php");
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
		$name="楊東霖";// 收件者的名稱or暱稱;
		$mail->From = $webmaster_email;
		$mail->AddBCC($email,$name);
		$mail->AddReplyTo($webmaster_email,"行動商務訂購系統");//這不用改

		$mail->WordWrap = 50;//每50行斷一次行
		//$mail->AddAttachment("/XXX.rar");附加檔案可以用這種語法(記得把上一行的//去掉)
		$mail->IsHTML(true); // send as HTML
		$mail->Subject = mb_encode_mimeheader("『行動商務購買系統』訂購成功", "UTF-8");// 信件標題
		$mail->Body = "<p><b>楊東霖</b>你好：</p>
						<p style='margin-left: 40px;'>系統已收到您從手機發出的訂單</p>
						<p style='margin-left: 40px;'>將會於您指定的時間點寄送貨物給您，感謝您的購買</p></p>
						<p style='margin-left: 40px;'>※本郵件是由系統自動寄送，請勿直接回覆。</p>
						";
		//信件內容(html版，就是可以有html標籤的如粗體、斜體之類)

			if(!$mail->Send()){
				echo "寄信發生錯誤：" . $mail->ErrorInfo;//如果有錯誤會印出原因
			}else{ 
				echo "寄信成功";
			}
		$mail->ClearAllRecipients();
		$mail->ClearAttachments();
?>