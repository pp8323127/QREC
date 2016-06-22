<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>電子郵件寄送程式(測試版)</title>
</head>
<?php
//error_reporting(E_ALL ^​​ E_NOTICE);
if($_POST){ 
$Import_TmpFile = $_FILES['file']['tmp_name']; 
require_once ('connect.php'); 
mysql_select_db('webmail'); //選擇資料庫
require_once('Excel/reader.php'); 
mysql_query("TRUNCATE TABLE cof");
$data = new Spreadsheet_Excel_Reader(); 
$data->setOutputEncoding('UTF-8');
$data->read($Import_TmpFile);
$array =array();
for ($i = 1; $i <= $data->sheets[0]['numRows']; $i++) { 
for ($j = 1; $j <= $data->sheets[0]['numCols']; $j++) { 
$array[$i][$j] = $data->sheets[0]['cells'][$i][$j]; 
}
}
sava_data($array); 
}  
function sava_data($array){
$count =0; 
$total =0; 
foreach( $array as $tmp){ 
$sql = "INSERT INTO cof( id, receive, acc, pwd, det) VALUES("; //採購單的匯入.
$sql.=" 'NULL','$tmp[2]','$tmp[3]','$tmp[4]','$tmp[5]')";
$result = mysql_query($sql) or die("無法送出" . mysql_error( ));
echo $sql;
if(! mysql_num_rows(mysql_query($Isql) )){ //取得返回列的數目  送出一個 query 字符串。
}  
$count++; 
$total++; 
}  
echo " "; 
}
function TtoD($text){ 
$jd1900 = GregorianToJD(1, 1, 1900)-2; 
$myJd = $text+$jd1900; 
$myDate = JDToGregorian($myJd);
$myDate = explode('/',$myDate); 
$myDateStr = str_pad($myDate[2],4,'0', STR_PAD_LEFT)."-".str_pad($myDate[0],2,'0', STR_PAD_LEFT)."-".str_pad($myDate 
[1],2,'0', STR_PAD_LEFT); 
return $myDateStr; 
} 
	echo '<script language="javascript">
		alert("導入完成");
		location.href="index.php";
		</script>';
?>
<body>
</body>
</html>