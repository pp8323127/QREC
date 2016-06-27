<?php
	error_reporting(0);	//不顯示提醒
	$db_server = "localhost";
	$db_name = "qrec";
	$db_user = "qrec";
	$db_passwd = "e508";

	// 原本的
	// $db_server = "localhost";
	// $db_name = "mobile";
	// $db_user = "root";
	// $db_passwd = "root_admin";
	
	if(!@mysql_connect($db_server, $db_user, $db_passwd))
        die("無法對資料庫連線");
		
	
	if(!@mysql_select_db($db_name))
        die("無法使用資料庫");

    mysql_query("SET NAMES utf8");
?> 