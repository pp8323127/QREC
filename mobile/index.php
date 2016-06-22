<html>
<body>
------------登入測試------------
<form action="mobile_process.php" method="post">
　acc：<input type="text" name="acc"><br>
　pwd：<input type="text" name="pwd"><br>
　proc:<input type="text" name="proc" value="login_check"><br>
　devicetoken:<input type="text" name="devicetoken" value="987654321"><br>
　<input type="submit" value="送出表單">
</form>
------------管理者登入測試------------
<form action="mobile_process.php" method="post">
　acc：<input type="text" name="id"><br>
　pwd：<input type="text" name="pw"><br>
　proc:<input type="text" name="proc" value="admin_login"><br>
　devicetoken:<input type="text" name="token" value="987654321"><br>
　<input type="submit" value="送出表單">
</form>
------------物品數量查詢------------
<form action="mobile_process.php" method="post">
　json：<input type="text" name="json" value='[{"pid":"A01","spec":"M"},{"pid":"C02","spec":"none"}]' size="50"><br>
　proc:<input type="text" name="proc" value="product_search"><br>
　<input type="submit" value="送出表單">
</form>
------------查詢全部產品------------
<form action="mobile_process.php" method="post">
　proc:<input type="text" name="proc" value="GetProduct"><br>
　<input type="submit" value="送出表單">
</form>
------------查詢使用者所有訂單------------
<form action="mobile_process.php" method="post">
　proc:<input type="text" name="proc" value="GetOrder"><br>
  學號:<input type="text" name="acc" value=""><br>
　<input type="submit" value="送出表單">
</form>
------------更新管理者資料------------
<form action="mobile_process.php" method="post">
	proc:<input type="text" name="proc" value="admin_update"><br>
	學號:<input type="text" name="acc" value=""><br>
	聯絡電話:<input type="text" name="phone" value=""><br>
	姓名:<input type="text" name="name" value=""><br>
	信箱:<input type="text" name="email" value=""><br>
　<input type="submit" value="送出表單">
</form>
------------更新使理者資料------------
<form action="mobile_process.php" method="post">
	proc:<input type="text" name="proc" value="user_update"><br>
	學號:<input type="text" name="acc" value=""><br>
	聯絡電話:<input type="text" name="phone" value=""><br>
	姓名:<input type="text" name="name" value=""><br>
	信箱:<input type="text" name="email" value=""><br>
　<input type="submit" value="送出表單">
</form>
------------新增訂單------------
<form action="mobile_process.php" method="post">
	proc:<input type="text" name="proc" value="order_inserts"><br>
	學號:<input type="text" name="acc" value=""><br>
	訂單編號:<input type="text" name="oid" value=""><br>
	訂單資料:<input type="text" name="oitem" value=""><br>
	訂單金額:<input type="text" name="oprice" value=""><br>
	收貨人姓名:<input type="text" name="rname" value=""><br>
	收貨人電話:<input type="text" name="rphone" value=""><br>
	收貨人電子郵件:<input type="text" name="remail" value=""><br>
	交易地點:<input type="text" name="tplace" value=""><br>
	交易時間:<input type="text" name="ttime" value=""><br>
　<input type="submit" value="送出表單">
</form>
------------查詢該訂單所有資訊------------
<form action="mobile_process.php" method="post">
proc:<input type="text" name="proc" value="GetOrderInfo"><br>
學號:<input type="text" name="oid" value="20151021143234vUHH100"><br>
　<input type="submit" value="送出表單">
</form>
------------查詢使用者資訊------------
<form action="mobile_process.php" method="post">
proc:<input type="text" name="proc" value="GetMember"><br>
學號:<input type="text" name="acc" value="0324813"><br>
　<input type="submit" value="送出表單">
</form>
</body>
</html>
