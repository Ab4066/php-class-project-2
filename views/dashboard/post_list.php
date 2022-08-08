<?php  
    include('../../config/Database/connection.php');

    $result = $connection->query("SELECT * FROM posts ORDER BY p_id DESC");
    $rows = $result->fetch_assoc();

 ?>
<?php include '../layout/page_header.php'; ?>

            <div class="main m-card">
                <?php  if (isset($_GET["succes"])) { ?>
                    <div class="alert alert-success">
                        <span class="close" data-dismiss="alert">&times;</span>
                        <strong>Success!</strong> New Post Successfully Inserted
                    </div>
                <?php } ?>

                <?php  if (isset($_GET["edit"])) { ?>
                    <div class="alert alert-success">
                        <span class="close" data-dismiss="alert">&times;</span>
                        <strong>Success!</strong> New Post Updated Successfully
                    </div>
                <?php } ?>
                <?php  if (isset($_GET["delete"])) { ?>
                    <div class="alert alert-success">
                        <span class="close" data-dismiss="alert">&times;</span>
                        <strong>Success!</strong> Post Deleted Successfully
                    </div>
                <?php } ?>

                    <?php  if (isset($_GET["error"])) { ?>
                    <div class="alert alert-danger">
                        <span class="close" data-dismiss="alert">&times;</span>
                        <strong>Warning!</strong>  Check Your Internet Connectivity...
                    </div>
                <?php } ?>

                    <div class="container">
                        <ul class="breadcrumb">
                          <li><a href="home.php">Home</a></li>
                          <li class="">Posts List</li> 
                        </ul> 
                    </div>
                    <div class="container">
                       <div align="left">
                    <a href="add_post.php" class="btn btn-primary btn-fw">
                            <i class="mdi mdi-plus"></i>Add Post</a>
                  </div>
                        <?php if($result->num_rows > 0){ ?>
                    <div class="table-responsive">
                    <table class="table table-bordered ">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> Title </th>
                          <th> Description</th>
                          <th> Post type</th>
                          <th>Image</th>
                          <th> Edit </th>
                          <th> Delete </th>
                        </tr>
                      </thead>
                      <tbody>
                        
                    <?php $x = 1; do{ ?>
                        <tr>
                          <td> <?php echo $x++; ?> </td>
                          <td> <?php echo $rows['title']; ?> </td>
                          <td> <?php echo $rows['description']; ?> </td>
                          <td> <?php echo $rows['post_type']; ?> </td>
                          <td class="text-center">
                            <img class="img img-thumbnails" width="100" src="<?php echo $rows['image']; ?>" >
                          </td>

                          <td class="text-center">
                            <a href="edit_post.php?p_id=<?php echo $rows['p_id']; ?>">
                              <span class="fa fa-edit"></span>
                            </a>
                          </td>
                          <td class="text-center">
                            <a onclick="deleteMsg('Are You Sure to delete Post ?');" 
                            href="../delete/delete.php?p_id=<?php echo $rows['p_id']; ?>">
                            <span class="fa fa-trash"></span></a></td>
                        </tr>
                    <?php }while($rows = $result->fetch_assoc()); ?>
                      </tbody>
                    </table>
                    </div>

                <?php }else{ ?>
                    <h1 class="display-5 text-center">No Country Added Yet ! </h1>
                <?php } ?>  
                    </div>
            </div>
<?php include '../layout/page_footer.php'; ?>