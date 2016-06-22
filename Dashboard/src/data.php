<?php session_start();
if($_SESSION['admin_id']!=""){
	require_once("./db.php");
	require_once("./Application.Top.php");
	if($_GET['type']=="MemberInfo"){
		$row = fetchQueryAll("select * from user");
		$i=0;
		foreach($row as $user){
			$responce[$i] = array("acc"=>$user[1], "name"=>$user[2], "phone"=>$user[3], "email"=>$user[4], "token"=>$user[5], "yn"=>$user[6]);
			$i++;
		}
		echo json_encode($responce);
	}
	
}else{
	echo "<meta http-equiv='refresh' content=\"0;url=../index.html\" />";
	die();
}
?>