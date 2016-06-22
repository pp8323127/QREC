<?php
require('db_config.php');
require('db_functions.php');
// 連結資料庫
$conn = db_connect($server, $username, $password, $database);
if(!$conn) { die('資料庫連結失敗！'); }
// db設定編碼為utf-8
db_set_encoding($conn,'utf8');

//推撥給使用者
function send_gcm_message($con,$title,$message,$id) {
	use Gcm-master\src\Client;
	$apiKey = 'AIzaSyDzzlyUvXVeIwVZLF7_J5G0wtg_5b_5Sgs';
	$client = new Client($apiKey);
	
	$GetTokenSql = "select user_devicetoken from mobile.user where id = '{$id}'";
	$GetTokenResult = mysqli_query($con,$GetTokenSql);
	$GetTokenRow=mysqli_fetch_row($GetTokenResult);
	$registrationIds = $GetTokenRow[0];
	$data = array(
		'title' => $title,
		'message' => $message,
	);
	
	$success = $client->send($data, $registrationIds);
	echo $success;
}

//推撥給管理者
function send_admin_gcm_message($con,$title,$message) {
	use Gcm-master\src\Client;
	$apiKey = 'AIzaSyDzzlyUvXVeIwVZLF7_J5G0wtg_5b_5Sgs';
	$client = new Client($apiKey);
	$GetTokenSql = "select admin_devicetoken from admin where admin_devicetoken != 'NULL'";
	$GetTokenResult = mysqli_query($con,$GetTokenSql);
	while($GetTokenRow=mysqli_fetch_row($GetTokenResult)){
		$registrationIds[] = $GetTokenRow[0];
	}
	$data = array(
		'title' => $title,
		'message' => $message,
	);
	
	$success = $client->send($data, $registrationIds);

}
//更新使用者資料
if ($proc == 'order_inserts'){
	if($_POST['acc']!="" && $_POST['oid']!="" && $_POST['oitem']!="" && $_POST['oprice']!="" && $_POST['rname']!="" && $_POST['rphone']!="" && $_POST['remail']!="" && $_POST['tplace']!="" && $_POST['ttime']!=""){
		$getid_sql = "select id from user where user_acc = '{$_POST[acc]}'";
		if($result=db_query($conn,$getid_sql)){
			$getid_row = db_fetch_row($result);
			$tupdate = date("Y-m-d H-i-s"); 
			$insert_sql = "Insert into mobile.order (id, user_id, oid, order_item, order_price, receive_name, receive_phone, receive_email, tplace, ttime, tupdate, situation) values ( NULL, '{$getid_row[0]}', '{$_POST[oid]}', '{$_POST[oitem]}', '{$_POST[oprice]}', '{$_POST[rname]}', '{$_POST[rphone]}', '{$_POST[remail]}', '{$_POST[tplace]}', '{$_POST[ttime]}', '{$tupdate}','1')";
			if(db_query($conn,$insert_sql)){
				$gcmTitle="行動商務訊息通知";
				$gcmMessage="您已訂購完成!";
				$gcmID=$getid_row[0];
				send_gcm_message($conn,$gcmTitle,$gcmMessage,$gcmID);
				send_admin_gcm_message($conn,"訂單成立通知","已有新的訂單成立");
				send_email($conn,$_POST[oid]);
				echo "success";
			}
			else
				echo "fails";
		}else
			echo "查無此帳號";
	}else{
		echo "參數有誤";
	}
}
?>