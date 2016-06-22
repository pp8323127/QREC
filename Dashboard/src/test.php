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

if($_POST['type']=='MemberEdit'){
	echo $_POST['acc'];
}
?>