<?php
/******* 資料庫連結 **********/
function db_connect($server, $username, $password, $database) {
	return mysqli_connect($server, $username, $password, $database);
}

/******* 設定資料庫編碼 *******/
function db_set_encoding($conn,$ecstr) {
	return mysqli_set_charset($conn,$ecstr);
}

/******* 資料庫執行Query *****/
function db_query($conn,$sql) {
	return mysqli_query($conn,$sql);
}

/******* 取一筆資料 *****************/
function db_fetch_row($conn)
{
  return mysqli_fetch_row($conn);
}

/**********清除查詢結果 **************/
function db_freeresult($result)
{
   return mysqli_free_result($result);
}

/********* 計算查詢結果筆數 ************/
function db_numrows($result)
{
   return mysqli_num_rows($result);
}

/*******計算每一筆查詢結果的欄位數 ********/
function db_numfields($result)
{
   return mysqli_num_fields($result);
}

/*******關閉一個資料庫連結 ********/
function db_close($conn)
{
   return mysqli_close($conn);
}
?>