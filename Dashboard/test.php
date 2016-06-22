<?php session_start();
	require_once("./src/db.php");
	$admin_sql = mysql_query("SELECT * from admin where id = '{$_SESSION[admin_id]}'");
	if(mysql_num_rows($admin_sql)>0){
		$admin_row = mysql_fetch_array($admin_sql);
		echo $admin_row[2]."您好";
		echo "</br></br>";
		echo "<a href='./src/logout.php'>登出</a>";
	}else{
		echo "您尚未登入，請登入後再進入。";
		echo "<meta http-equiv='refresh' content=\"3;url=./index.html\" />";
	}
?>