<?php  session_start();
	unset($_SESSION['admin_id']);
	if(isset($_SESSION['admin_id'])){
		echo '<script>  alert("登出失敗，請再嘗試一次");  </script>';

	}else{
		echo '<script>  alert("已登出");  </script>';
	}
	echo "<meta http-equiv='refresh' content='0;url=../index.html'/>";
?>
