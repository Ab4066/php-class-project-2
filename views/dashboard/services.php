<?php  
    include('../../config/Database/connection.php');

    $result = $connection->query("SELECT * FROM services ");
    $rows = $result->fetch_assoc();

 ?>
<?php include '../layout/page_header.php'; ?>
          <div class="container">
            <div class="main m-card">
                <?php  if (isset($_GET["succes"])) { ?>
                    <div class="alert alert-success">
                        <span class="close" data-dismiss="alert">&times;</span>
                        <strong>Success!</strong> New Post Successfully Inserted
                    </div>
                <?php } ?>

                    <div class="container">
                        <ul class="breadcrumb">
                          <li><a href="#">Home</a></li>
                          <li class="">Post</li> 
                        </ul> 
                       <div align="center">
                          <a href="add_post.php" class="btn btn-primary btn-fw">
                          <i class="mdi mdi-plus"></i>Add New Post</a>
                      </div>
                      <hr>
                 <?php $x = 1; do{ ?>
                <div class="row">
                 <div class="row text-right icons" style="float: right;padding-right: 50px;">
                        <a href=""><span class="fa fa-edit">&nbsp;&nbsp;</span></a>
                        <a onclick="deleteMsg('Are you sure to delete Employee?');" href="">
                        <span class="fa fa-trash"></span></a>
                 </div>
                <div class="col-md-4 col-sm-12 " align="center">
                    <div class="img img-responsive">
                        <img src="<?php echo $rows['image']; ?>" class="img img-responsive img-thumbnail" width="80%">
                    </div>
                </div>

                <div class="col-md-8">
                    <div>
                      <h2><?php echo $rows['title']; ?></h2>
                      <p><?php echo $rows['description']; ?></p>
                      <h6><?php echo $rows['post_date']; ?></h6>
                    </div>
                </div> 
            </div>
            <hr>
            <?php }while($rows = $result->fetch_assoc()); ?>
                </div>
               </div>
              </div>
            </div>
<?php include '../layout/page_footer.php'; ?>