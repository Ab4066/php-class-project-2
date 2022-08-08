<?php
  
  session_start();
  include('../../config/database/connection.php');

  if(isset($_POST["submit"])){
      $username = mysqli_real_escape_string($connection , $_POST["username"]);
      $password = mysqli_real_escape_string($connection , $_POST["password"]);

      $username = htmlspecialchars($username);
      $password = htmlspecialchars($password);
      
      $result=$connection->query("SELECT * FROM users WHERE username='$username'
       AND password='$password'");
      $row = $result->fetch_assoc();

        if($result->num_rows == 1){
            $id = $row['u_id'];
            $_SESSION["usertype"] = $row["utype"];
            header("location:../dashboard/home.php?login=true");
          }else{
            header("location:login.php?fail=ture");
       	  }
      }
?>

<!DOCTYPE html>
<html>
<head>
	<title>sing in</title>
	<link rel="stylesheet" type="text/css" href="../assets/css/lib/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/main-style.css">
	<link rel="stylesheet" type="text/css" href="../fonts/font-awesome/css/font-awesome.min.css">
	<style type="text/css">
		.login-card{
			margin-top: 150px;
			padding: 40px;
			background-color: #fff;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		}

		body{
			background-image: url(../../images/KH/wall_1.jpg);
			background-size: 100% 100%;
			background-attachment: fixed;
		}
	</style>
</head>
<body>

		<div class="container" >
				<div class="col-md-6 col-md-offset-3" >
					<div class="login-card" >
					<div class="text-center">
						<h3>Sign In</h3>
					<h3>Enter your Credintial</h3>	
					</div>
					<form class="form-horizontal" method="POST">
					  <div class="form-group">
					    <label class="control-label col-md-2" for="email">Username:</label>
					    <div class="col-md-10">
					      <input type="text" name="username" class="form-control input-text" id="email" placeholder="Username">
					    </div>
					  </div>
					  <div class="form-group">
					    <label class="control-label col-md-2" for="pwd">Password:</label>
					    <div class="col-md-10"> 
					      <input type="password" name="password" class="form-control input-text" id="pwd" placeholder="Password">
					    </div>
					  </div>
					  <?php if(isset($_GET['fail'])){ ?>
					  	<div class="text-danger text-center">
					  		incorrect username or password
					  	</div>
					  <?php } ?>
					  <div class="form-group"> 
					    <div class="col-md-offset-2 col-md-10">
					      <div class="checkbox">
					        <!-- <label><a href="#">Forget Password?</a></label> -->
					      </div>
					    </div>
					  </div>
					  <div class="form-group"> 
					    <div class="col-md-offset-2 col-md-10">
					      <button type="submit" name="submit" class="btn btn-success">Sign in</button>
					      <a href="../../index.php" class="btn btn-back">
					      	<span>Cancel</span>
					      </a>
					    </div>
					  </div>
				</form> 
			</div>
		</div>
	</div>
<!-- /*Start Footer*/ -->

     
<script type="text/javascript" src="../../assets/js/lib/jquery.min.js"></script>
<script type="text/javascript" src="../../assets/js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="../../assets/js/defualt.js"></script>
</body>
</html>