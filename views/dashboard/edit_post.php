<?php 

  require_once("../../config/database/connection.php");


  if(isset($_GET['p_id'])){
    $id = $_GET['p_id'];

     $result = $connection->query("SELECT * FROM posts WHERE p_id =".$id);
     $row = $result->fetch_assoc();
    
  }


  if(isset($_POST["submit"])){ 

    $title = $_POST["title"];
    $desc  = $_POST["desc"];
    $post_type  = $_POST["post_type"];



    if($_FILES["photo"]["name"] != ""){
      unlink($row['image']);
      $path = "../../img/".time().$_FILES["photo"]["name"];
      move_uploaded_file($_FILES["photo"]["tmp_name"], $path);
    }else{
      $path = $row["image"];
    }


    $result = $connection->query("UPDATE  posts SET title = '$title' , description = '$desc' , image = '$path',
    post_type='$post_type' , reg_date=curdate()  WHERE p_id = ".$id);

    if($result){
      header("location:post_list.php?edit=true");
    }else{
      header("location:post_list.php?error=true");
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
                        <label class="lbl">Title</label>
                        <input type="text"  class="form-control" name="title" value="<?php echo $row['title']; ?>">
                      </div>
                       <div class="form-group">
                        <label class="lbl">Post Type</label>
                        <select class="form-control" name="post_type">
            <option <?php if($row['post_type'] == 'project') echo "selected"; ?>  value="project">Project</option>
            <option <?php if($row['post_type'] == 'blog') echo "selected"; ?>  value="blog">Blog</option>
            <option <?php if($row['post_type'] == 'services') echo "selected"; ?>  value="services">Services</option>
                        </select>
                      </div>
                      
                       <div class="form-group">
                        <label class="lbl" for="email">Descriptions</label>
                        <textarea class="form-control" name="desc" rows="8">
                          <?php echo $row['description']; ?>
                        </textarea>
                      </div>
                      
                      <div class="form-group">
                        <label class="lbl">Image</label>
                        <input type="file" name="photo" class="form-control" >
                      </div>

                      <button type="submit" name="submit" class="btn btn-primary mr-2">Update</button>
                      <a href="myprofile.php" class="btn btn-light">Cancel</a>
                    </form>
                    </div>
					</div>
			</div>
<?php include '../layout/page_footer.php'; ?>