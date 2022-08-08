<?php 


  require_once("../../config/database/connection.php");

	// Delete Country
		if(isset($_GET["user_id"])){
		$id = $_GET["user_id"];

			$rec = $connection->query("delete from users where user_id='$id'");
			if($rec){
				header("location:../user/user_list.php?delete=true");
			}else{
				header("location:../user/user_list.php?fail=true");
			}
	   	}


	   	if(isset($_GET["p_id"])){
		$id = $_GET["p_id"];

		$rec = $connection->query("delete from posts where p_id='$id'");
			if($rec){
				header("location:../dashboard/post_list.php?delete=true");
			}else{
				header("location:../dashboard/post_list.php?fail=true");
			}
	   	}

	   	if(isset($_GET["c_id"])){
		$id = $_GET["c_id"];

		$rec = $connection->query("delete from contactus where c_id='$id'");
			if($rec){
				header("location:../dashboard/contact.php?delete=true");
			}else{
				header("location:../dashboard/contact.php?fail=true");
			}
	   	}



 ?>