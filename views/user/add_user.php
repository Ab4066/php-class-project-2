<?php 

  require_once("../../config/database/connection.php");


  if(isset($_POST["submit"])){ 

    $username = $_POST["username"];
    $password = $_POST["password"];
    $usertype = $_POST["usertype"];
    $resetCode = $_POST["rs_code"];

    $result = $connection->query("INSERT INTO users VALUES(null , '$username' , 
     '$password' , '$resetCode' , '$usertype' , curdate())");

    if($result){
      header("location:user_list.php?succes=true");
    }else{
      header("location:user_signup.php?error=true");
    }
  }

 ?>
<?php include '../layout/page_header.php'; ?>
      
			<div class="main m-card">
        <div class="container">
            <ul class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="user_list.php">User List</a></li>
              <li class="">Add New User</li> 
            </ul> 
          </div>
					<h2 class="text-center">Add User</h2>
					<div class="container">
                <div class="col-md-6 col-md-offset-3">
					        <form class="forms-sample" method="post" enctype="multipart/form-data" >
                      <div class="form-group">
                        <label class="lbl" for="email">Username</label>
                        <input type="text"  class="form-control" id="email" name="username" placeholder="Username">
                        <p class="msg" id="msg2"></p>
                      </div>
                      <div class="form-group">
                        <label class="lbl" for="passowrd">Password</label>
                        <input type="password"  class="form-control" name="password" id="password" placeholder="Password">
                        <p class="msg" id="msg3"></p>
                      </div>
                      <div class="form-group">
                        <label class="lbl" for="confrim_password">Confirm Password</label>
                        <input type="password"  class="form-control" id="confrim_password" placeholder="Confirm Password">
                        <p class="msg" id="msg4"></p>
                      </div>
                      <div class="form-group">
                        <label class="lbl">Reset Code</label>
                        <input type="number" name="rs_code"  class="form-control" placeholder="Reset Code">
                        <p class="msg" id="msg4"></p>
                      </div>
                      <div class="form-group">
                        <label class="lbl" for="usertype">Usertype</label>
                        <select class="form-control"  name="usertype" id="usertype">
                          <option value="adminstratore">Adminstratore</option>
                          <option value="student">Standard</option>
                        </select>
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary mr-2">Register</button>
                      <a href="user_list.php" class="btn btn-light">Cancel</a>
                    </form>
                    </div>
					</div>
			</div>
<?php include '../layout/page_footer.php'; ?>


<?php  if (isset($_GET["succes"])) { ?>
                    <div class="alert alert-success">
                        <span class="close" data-dismiss="alert">&times;</span>
                        <strong>Success!</strong> New Post Successfully Inserted
                    </div>
                <?php } ?>
                  <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li class="">Post</li> 
                  </ul> 
                