<?php 

  require_once("../../config/database/connection.php");


  if(isset($_POST["submit"])){ 

    $title = $_POST["title"];
    $desc  = $_POST["desc"];
    $post_type  = $_POST["post_type"];

    $path = "../../img/".time().$_FILES["image"]["name"];
    move_uploaded_file($_FILES["image"]["tmp_name"], $path);

    $result = $connection->query("INSERT INTO posts VALUES(null , '$title' , 
     '$desc', '$path','$post_type', curdate())");

    if($result){
      header("location:post_list.php?succes=true");
    }else{
      header("location:post_list.php?error=true");
    }
  }


 ?>
<?php include '../layout/page_header.php'; ?>
      
			<div class="main m-card">
          <div class="container">
            <ul class="breadcrumb">
              <li><a href="#">Home</a></li>
              <li><a href="post_list.php">Posts List</a></li>
              <li class="">Add New Post</li> 
            </ul> 
          </div>
					<h2 class="text-center">Add Posts</h2>
					<div class="container">
                <div class="col-md-6 col-md-offset-3">
					        <form class="forms-sample" method="post" enctype="multipart/form-data" >
                      <div class="form-group">
                        <label class="lbl" for="email">Title</label>
                        <input type="text"  class="form-control" name="title" placeholder="Title">
                        <p class="msg" id="msg2"></p>
                      </div>
                      <div class="form-group">
                        <label class="lbl" for="passowrd">Description</label>
                        <textarea class="form-control" name="desc"></textarea>
                        <p class="msg" id="msg3"></p>
                      </div>
                      <div class="form-group">
                        <label class="lbl">Post Type</label>
                        <select class="form-control" name="post_type">
                            <option value="project">Project</option>
                            <option value="blog">Blog</option>
                            <option value="services">Services</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label class="lbl">Photo</label>
                        <input type="file" name="image" id="image" class="form-control" >
                      </div>
                      <button type="submit" name="submit" class="btn btn-primary mr-2">Register</button>
                      <a href="user_list.php" class="btn btn-light">Cancel</a>
                    </form>
                    </div>
					</div>
			</div>
<?php include '../layout/page_footer.php'; ?>