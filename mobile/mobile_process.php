<?php
// require some file
require('functions.php');
require('db_config.php');
require('db_functions.php');
// 連結資料庫
$conn = db_connect($server, $username, $password, $database);
if(!$conn) { die('資料庫連結失敗！'); }
// db設定編碼為utf-8
db_set_encoding($conn,'utf8');
// 要執行的動作
$proc = $_REQUEST['proc'];
if ($proc == 'details_select') {
	//oid
	$oid = $_REQUEST['oid'];

	//找出該訂單的使用者資料
	$sql = "SELECT `username`,`userphone`,`useremail`,`tplace`,`ttime` FROM `order` WHERE oid like '$oid'";
	$result = db_query($conn,$sql);
	$row = db_fetch_row($result);
	echo $row[0].','.$row[1].','.$row[2].','.$row[3].','.$row[4];

	echo "\n";

	//印出訂購之所有商品
	$i=1;
	$str="";
	$sum=0;
	$EmailItemSql = "SELECT o.username, o.tplace, o.ttime, i.name, i.price, oi.num FROM `order` as o left join orderitem as oi on o.oid = oi.oid left join item as i on oi.pid = i.id where o.oid = '$oid'";
	$EmailItemResult = db_query($conn,$EmailItemSql);
	while ($EmailItemRow=db_fetch_row($EmailItemResult)) {
		$name = $EmailItemRow[0];
		$tplace = $EmailItemRow[1];
		$ttime = $EmailItemRow[2];
		$str .= $i ." : ".$EmailItemRow[3]."(".$EmailItemRow[4].")      數量:".$EmailItemRow[5]."<br>";
		$sum += $EmailItemRow[4]*$EmailItemRow[5];
		$i++;
	}
	echo substr_replace($str,'',-1);

	echo "\n";

	echo $sum;
	//-----------END------------------
}

// 使用者登入
if ($proc == "login_check"){
	if (CheckPOP3($_POST["acc"],$_POST["pwd"])){
		$acc = substr($_POST["acc"],1);
		$sql = "select id, user_devicetoken, user_status from user where user_acc = '{$acc}'";
		if ($result = db_query($conn,$sql)) {
			if(db_numrows($result)>0){
				$row = db_fetch_row($result);
				if($row[2]==1){
					if($row[1]==$_POST['devicetoken']){
						echo "success";
					}else{
						$sql_update="UPDATE user set user_devicetoken='{$_POST[devicetoken]}' where user_acc = '$acc'";
						if(db_query($conn,$sql_update)){
							echo "success";
						}else{
							echo "error";
						}
					}
				}else{
					echo "forbidden";
				}
			}else{
				$sql_add="Insert into user (id, user_acc, user_devicetoken, user_status) value (NULL, '{$acc}', '{$_POST[devicetoken]}', '1')";
				if(db_query($conn,$sql_add)){
					echo "success";
				}else{
					echo "error";
				}			
			}
		}
	} else {
		$acc = substr_replace($_POST["acc"], 'u', 0, 0);
		if(CheckPOP3($acc,$_POST["pwd"])){
			$sql = "select id, user_devicetoken, user_status from user where user_acc = '{$_POST[acc]}'";
			if ($result = db_query($conn,$sql)) {
				if(db_numrows($result)>0){
					$row = db_fetch_row($result);
					if($row[2]==1){
						if($row[1]==$_POST['devicetoken']){
							echo "success";
						}else{
							$sql_update="UPDATE user set user_devicetoken='{$_POST[devicetoken]}' where user_acc = '$_POST[acc]'";
							if(db_query($conn,$sql_update)){
								echo "success";
							}else{
								echo "error";
							}
						}
					}else{
						echo "forbidden";
					}
				}else{
					$sql_add="Insert into user (id, user_acc, user_devicetoken, user_status) value (NULL, '{$_POST[acc]}', '{$_POST[devicetoken]}', '1')";
					if(db_query($conn,$sql_add)){
						echo "success";
					}else{
						echo "error";
					}
				}
			}
		}else{
			echo "fails";
		}
	}
}

// 管理者登入
if ($proc == 'admin_login') {
	$isadmin = false;
	$id = $_REQUEST['id'];
	$pw = $_REQUEST['pw'];
	$token = $_REQUEST['token']; //device token
	if(CheckPOP3($id,$pw)){
		$acc = substr($id,1);
		$sql = "SELECT * FROM admin where admin_acc ='{$acc}'";
		if ($result=db_query($conn,$sql)) {
			if(db_numrows($result)<=0) {//資料庫沒資料
				$email= $id.'@nkfust.edu.tw';
				$sql_insert="Insert into admin (id, admin_acc, admin_email, admin_devicetoken) values (NULL, '{$acc}', '{$email}', '{$token}')";
				if(db_query($conn,$sql_insert))
					echo "success";
				else
					echo "fails";
			}else{ //有此帳號，判斷資料使否正確
				$sql_row = db_fetch_row($sql);
				if($sql_row['admin_devicetoken']==$token){
					echo "success";
				}else{
					$sql_update="UPDATE admin set admin_devicetoken='{$token}' where admin_acc = '{$acc}'";
					if(db_query($conn,$sql_update))
						echo "success";
					else
						echo "fails";
				}
			}
		}
	}else if(CheckPOP3(substr_replace($id, 'u', 0, 0),$pw)){
		$sql = "SELECT * FROM admin where admin_acc ='{$id}'";
		if ($result=db_query($conn,$sql)) {
			if(db_numrows($result)<=0) {//資料庫沒資料
				$email= 'u'.$id.'@nkfust.edu.tw';
				$sql_insert="Insert into admin (id, admin_acc, admin_email, admin_devicetoken) values (NULL, '{$id}', '{$email}', '{$token}')";
				if(db_query($conn,$sql_insert))
					echo "success";
				else
					echo "fails";
			}else{ //有此帳號，判斷資料使否正確
				$sql_row = db_fetch_row($sql);
				if($sql_row['admin_devicetoken']==$token){
					echo "success";
				}else{
					$sql_update="UPDATE admin set admin_devicetoken='{$token}' where admin_acc = '{$id}'";
					if(db_query($conn,$sql_update))
						echo "success";
					else
						echo "fails";
				}
			}
		}
	}else{
		echo "fails";
	}
	//---------------END------------------
}

if ($proc == 'item_select') {
	$sql = "SELECT `id`, `name`, `price`, `pic`, `pic_link`, `link` FROM `item`";
	//參考 http://stackoverflow.com/questions/383631/json-encode-mysql-results
	if ($result=db_query($conn,$sql))
	{
		$rows = array();
		while ($row=db_fetch_row($result))
		{
			$rows[] = $row;
		}
		// Free result set
		db_freeresult($result);
		
		print json_encode($rows);
	}
	$conn->close();
}

//產品數量查詢
if ($proc == 'product_search') {
	if($_POST['json']){
		$count=0;
		foreach(json_decode($_POST['json']) as $json => $key){
			$sql="select product_amount from product_specification where pid='{$key->pid}' and product_spec='{$key->spec}'";
			if ($result=db_query($conn,$sql)){
					$row=db_fetch_row($result);
					$data[$count]=array("pid"=>$key->pid,"spec"=>$key->spec,"amount"=>$row[0]);
					$count++;
			}
		}
		echo json_encode($data);
	}else{
		echo "error";	
	}
}

//訂單查詢
if ($proc == 'GetOrder') {
	if($_POST['acc']){
		$count=0;
		$sql="select * from mobile.order as mo inner join user as user on mo.user_id = user.id where user.user_acc='{$_POST[acc]}'";
		$result=db_query($conn,$sql);
			if (db_numrows($result)>0){
				while($row=db_fetch_row($result)){
					$data[$count]=array('oid'=>$row[2], 'order_item'=>$row[3], 'order_price'=>$row[4], 'receive_name'=>$row[5], 'receive_phone'=>$row[6], 'receive_email'=>$row[7], 'tplace'=>$row[8], 'ttime'=>$row[9], 'tupdate'=>$row[10], 'situation'=>$row[11]);
					$count++;
				}
			}else
				echo "查無訂單資料";	
		echo json_encode($data);
	}else{
		echo "error";	
	}
}

//抓所有產品狀態
if ($proc == 'GetProduct') {
	$sql = "select * from product as p inner join product_specification as ps where p.pid = ps.pid";
	$result=db_query($conn,$sql);
	$i=0;
	while($row=db_fetch_row($result)){
		$str[$i] = array("pid"=>$row[0],"name"=>$row[1],"price"=>$row[2],"pic"=>$row[3],"pic_link"=>$row[4],"link"=>$row[5],"product_spec"=>$row[8],"product_amount"=>$row[9]);
		$i++;
	}
	echo json_encode($str);
}

//更新管理者資料
if ($proc == 'admin_update'){
	if($_POST['acc']!="" && $_POST['phone']!="" && $_POST['name']!="" && $_POST['email']!=""){
		$sql = "Update admin set admin_name='{$_POST[name]}', admin_phone='{$_POST[phone]}', admin_email='{$_POST[email]}' where admin_acc='{$_POST[acc]}'";
		if($result=db_query($conn,$sql))
			echo "success";
		else
			echo "fails";
	}else{
		echo "參數有誤";
	}
}

//更新使用者資料
if ($proc == 'user_update'){
	if($_POST['acc']!="" && $_POST['phone']!="" && $_POST['name']!="" && $_POST['email']!=""){
		$sql = "Update user set user_name='{$_POST[name]}', user_phone='{$_POST[phone]}', user_email='{$_POST[email]}' where user_acc='{$_POST[acc]}'";
		if($result=db_query($conn,$sql))
			echo "success";
		else
			echo "fails";
	}else{
		echo "參數有誤";
	}
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
				send_gcm_message($conn,$gcmTitle,$gcmMessage,$gcmID,$_POST[oid]);
				send_admin_gcm_message($conn,"訂單成立通知","已有新的訂單成立",$_POST[oid]);
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

//查詢該訂單所以資訊
if ($proc == 'GetOrderInfo'){
	if($_POST['oid']!=""){
		$getorder_sql = "select * from mobile.order where oid = '{$_POST[oid]}'";
		if($result=db_query($conn,$getorder_sql)){
			$getorder_row = db_fetch_row($result);
			$data = array("receive_name"=>$getorder_row[5],
						"receive_phone"=>$getorder_row[6],
						"receive_email"=>$getorder_row[7],
						"tplace"=>$getorder_row[8],
						"ttime"=>$getorder_row[9],
						"price"=>$getorder_row[4],
						"order_item"=>$getorder_row[3]);
		}
		echo json_encode($data);	
	}else{
		echo "參數有誤";
	}
}

//更新使用者資料
if ($proc == 'GetMember'){
	if($_POST['acc']!=""){
		$getmember_sql = "select user_name, user_phone from mobile.user where user_acc = '{$_POST[acc]}'";
		if($result=db_query($conn,$getmember_sql)){
			$getmember_row = db_fetch_row($result);
			if($getmember_row[0]!=null){
				$data = array("name"=>$getmember_row[0],
							"phone"=>$getmember_row[1]);
				echo json_encode($data);	
			}else
				echo "false";			
		}
	}else{
		echo "參數有誤";
	}
}
?>