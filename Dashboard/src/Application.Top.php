<?php session_start();
 	require_once("../src/db.php");
	
//MySQL
function fetchQueryAll($query,$type=MYSQL_BOTH){
	$rows=array();
	if($result=mysql_query($query)){
		while($row=mysql_fetch_array($result,$type))
			array_push($rows,$row);
		mysql_free_result($result);
	}
	return $rows;
}

function fetchQueryRow($query){
	if($result=mysql_query($query)){
		if($row=mysql_fetch_row($result)){
			mysql_free_result($result);
			return $row;
		}
		mysql_free_result($result);
	}
	return ;
}

//ajax
//管理者註冊
if($_POST['status']=='admin_register'){
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
	$acc_array = explode("@",$_POST["user_email"]);
	if (CheckPOP3($acc_array[0],$_POST["user_pwd"])){
		$acc = substr($acc_array[0],1);
		$admin_sql = mysql_query("SELECT * from admin where admin_acc = '{$acc}'");
		if(mysql_num_rows($admin_sql)>0)
			echo "exist";
		else{
			$InsertAdmin = "Insert into admin (id, admin_acc, admin_name, admin_email) values (NULL, '{$acc}', '{$_POST[user_name]}', '{$_POST[user_email]}')";
			if(mysql_query($InsertAdmin))
				echo "success";
			else
				echo "fails";
		}
	} else {
		$acc = substr_replace($acc_array[0], 'u', 0, 0);
		if(CheckPOP3($acc,$_POST["user_pwd"])){
			$admin_sql = mysql_query("SELECT * from admin where admin_acc = '$acc_array[0]'");
			if(mysql_num_rows($admin_sql)>0)
				echo "exist";
			else{
				$InsertAdmin = "Insert into admin (id, admin_acc, admin_name, admin_email) values (NULL, '{$acc_array[0]}', '{$_POST[user_name]}', '{$_POST[user_email]}')";
				if(mysql_query($InsertAdmin))
					echo "success";
				else
					echo "fails";
			}
		} else {
			echo "error";
		}
	}
}
//管理者登入
if($_POST['status']=='admin_login'){
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
	$acc_array = explode("@",$_POST["login_acc"]);
	if (CheckPOP3($acc_array[0],$_POST["login_pwd"])){
		$acc = substr($acc_array[0],1);
		$admin_sql = mysql_query("SELECT * from admin where admin_acc = '{$acc}'");
		if(mysql_num_rows($admin_sql)>0){
			$admin_row = mysql_fetch_array($admin_sql);
			$_SESSION['admin_id']=$admin_row[0];
			echo "success";
		}else
			echo "fails";
	} else {
		$acc = substr_replace($acc_array[0], 'u', 0, 0);
		if(CheckPOP3($acc,$_POST["login_pwd"])){
			$admin_sql = mysql_query("SELECT * from admin where admin_acc = '$acc_array[0]'");
			if(mysql_num_rows($admin_sql)>0){
				$admin_row = mysql_fetch_array($admin_sql);
				$_SESSION['admin_id']=$admin_row[0];
				echo "success";
			}else
				echo "fails";
		} else {
			echo "error";
		}
	}
}
//管理者資料維護

if($_POST['status']=='admin_profile'){
	if($_POST['admin_name']!="" && $_POST['admin_email']!="" && $_POST['admin_phone']!=""){
		$sql = "update admin set admin_name='{$_POST[admin_name]}', admin_phone='{$_POST[admin_phone]}', admin_email='{$_POST[admin_email]}' where id='{$_SESSION[admin_id]}'";
		if(mysql_query($sql))
			echo "success";
		else
			echo "fails";
	}else
		echo "error";
}
?>