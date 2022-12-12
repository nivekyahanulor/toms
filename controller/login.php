<?php

	ob_start();
	session_start();

	if(isset($_POST['login'])){
		
		$username	= $_POST['username'];
		$password 	= $_POST['password'];
		
		$sql      = "SELECT * FROM adminaccount WHERE username='".$username."' AND password='".md5($password)."' and isActive =0";
		$result1  = mysqli_query($mysqli,$sql)or die(mysqli_error($mysqli));
		$sql_row1 = mysqli_num_rows($result1);
		$srow1    = mysqli_fetch_assoc($result1);
		$sql_id1  = $srow1['accountID'];
		
		if ($sql_row1 == 1 ){
			$_SESSION['accountID'] = $sql_id1;
			$_SESSION['username'] = $srow1['admin_name'];
			header("Location: admin/index.php");
		} else {
			
			$sql1     = "SELECT * FROM skaccount WHERE username='".$username."' AND password='".md5($password)."'";
			$result2  = mysqli_query($mysqli,$sql1)or die(mysqli_error($mysqli));
			$sql_row2 = mysqli_num_rows($result2);
			$srow2    = mysqli_fetch_assoc($result2);
			$sql_id2  = $srow2['brgyID'];
			
			if ($sql_row2  == 1){
				$_SESSION['brgyID'] = $sql_id2;
				$_SESSION['username'] = $srow2['username'];
				header("Location: user/index.php");
			} else {
				echo "error";
			}
		}
	 
		
	}