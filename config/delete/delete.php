<?php 

	require_once("../Database/connection.php");

	// Delete User 
		if(isset($_GET["user_id"])){
		$id = $_GET["user_id"];

		$record = $connection->query("select photo from users where user_id = ".$id);
		$photo = $record->fetch_assoc();
		$file = $photo['photo'];
		unlink($file);

		$rec = $connection->query("delete from users where user_id='$id'");
			if($rec){
				header("location:../../views/user/user_list.php?delete=true");
			}else{
				header("location:../../views/user/user_list.php?error=true");
			}
	   	}

	


?>