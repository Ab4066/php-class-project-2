<?php 

  require_once("../../config/database/connection.php");


  if(isset($_GET['p_id'])){
    $id = $_GET['p_id'];

     $result = $connection->query("SELECT * FROM personal_info WHERE id =".$id);
     $row = $result->fetch_assoc();
    
  }


  if(isset($_POST["submit"])){ 

    $fname = $_POST["firstname"];
    $lname  = $_POST["lastname"];
    $job  = $_POST["job"];
    $phone  = $_POST["phone"];
    $email  = $_POST["email"];
    $h_cust  = $_POST["h_cust"];
    $c_project  = $_POST["c_project"];
    $desc  = $_POST["desc"];

    if($_FILES["doc"]["name"] != ""){
      unlink($row['document']);
      $document = "../../img/".time().$_FILES["doc"]["name"];
      move_uploaded_file($_FILES["doc"]["tmp_name"], $document);
    }else{
      $document = $row["document"];
    }


    if($_FILES["images"]["name"] != ""){
      unlink($row['images']);
      $photo = "../../img/".time().$_FILES["images"]["name"];
      move_uploaded_file($_FILES["images"]["tmp_name"], $photo);
    }else{
      $photo = $row["images"];
    }


    $result = $connection->query("UPDATE  personal_info SET firstname='$fname', 
     lastname='$lname' ,job='$job', phone='$phone', email='$email', 
     happy_customers=$h_cust ,complete_projects=$c_project, document='$document' ,
     description='$desc', images='$photo' , up_date=curdate()  WHERE id = ".$id);

    if($result){
      header("location:myprofile.php?edit=true");
    }else{
      header("location:myprofile.php?error=true");
    }
  }


 ?>
<?php include '../layout/page_header.php'; ?>
      
			<div class="main m-card">
					<h2 class="text-center">Eidt Profile</h2>
					<div class="container">
                <div class="col-md-6 col-md-offset-3">
					        <form class="forms-sample" method="post" enctype="multipart/form-data" >
                      <div class="form-group">
                        <label class="lbl">Firstname</label>
                        <input type="text"  class="form-control" name="firstname" value="<?php echo $row['firstname']; ?>">
                      </div>
                      <div class="form-group">
                        <label class="lbl">Lastname</label>
                        <input type="text"  class="form-control" name="lastname" value="<?php echo $row['lastname']; ?>">
                      </div>
                      <div class="form-group">
                        <label class="lbl">Job</label>
                        <input type="text"  class="form-control" name="job" value="<?php echo $row['job']; ?>">
                      </div>
                      <div class="form-group">
                        <label class="lbl">phone</label>
                        <input type="text"  class="form-control" name="phone" value="<?php echo $row['phone']; ?>">
                      </div>
                      <div class="form-group">
                        <label class="lbl" >Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $row['email']; ?>">
                      </div>  
                       <div class="form-group">
                        <label class="lbl">Happy Customer</label>
                        <input type="text" class="form-control" name="h_cust" value="<?php echo $row['happy_customers']; ?>">
                      </div>
                       <div class="form-group">
                        <label class="lbl" >Complete Projects</label>
                        <input type="text" class="form-control" name="c_project" value="<?php echo $row['complete_projects']; ?>">
                      </div>
                       <div class="form-group">
                        <label class="lbl" for="email">Descriptions</label>
                        <textarea class="form-control" name="desc" rows="8">
                          <?php echo $row['description']; ?>
                        </textarea>
                      </div>
                      <div class="form-group">
                        <label class="lbl">Document</label>
                        <input type="file" name="doc" class="form-control" >
                      </div>
                      <div class="form-group">
                        <label class="lbl">Photo</label>
                        <input type="file" name="images" class="form-control" >
                      </div>


                      <button type="submit" name="submit" class="btn btn-primary mr-2">Update</button>
                      <a href="myprofile.php" class="btn btn-light">Cancel</a>
                    </form>
                    </div>
					</div>
			</div>
<?php include '../layout/page_footer.php'; ?>