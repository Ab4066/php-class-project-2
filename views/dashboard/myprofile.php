<?php  
    include('../../config/database/connection.php');

    $result = $connection->query("SELECT * FROM personal_info ");
    $rows = $result->fetch_assoc();

 ?>
<?php include '../layout/page_header.php'; ?>

           <div class="main m-card">
            <?php  if (isset($_GET["edit"])) { ?>
                     <div class="alert alert-success">
                        <span class="close" data-dismiss="alert">&times;</span>
                        <strong>Success!</strong> Information Updated Successfully
                     </div>
                <?php } ?>
                <?php  if (isset($_GET["error"])) { ?>
                     <div class="alert alert-danger">
                        <span class="close" data-dismiss="alert">&times;</span>
                        <strong>Warning!</strong>  Check Your Internet Connectivity...
                    </div>
                 <?php } ?>
              <h2 class="text-center">My Profile </h2>
                 <div class="">
                   <?php do{ ?>
                 <div class="col-md-12 col-sm-12">
                <div class="col-md-4 col-sm-12 " align="center">
                    <div class="img img-responsive">
                        <img src="<?php echo $rows['images']; ?>" class="img img-responsive img-thumbnail" width="80%">
                        <div>
                        <a href="edit_profile.php?p_id=<?php echo $rows['id']; ?>" class="btn btn-primary">Edit Profile &nbsp;&nbsp; <span class="fa fa-edit"></span></a><br>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div>
                      <table class="table ">
                        <tr>
                          <th>Firstname</th>
                          <td><?php echo $rows['firstname']; ?></td>
                        </tr>
                         <tr>
                          <th>Lastname</th>
                          <td><?php echo $rows['lastname']; ?></td>
                        </tr>
                        <tr>
                          <th>Job</th>
                          <td><?php echo $rows['job']; ?></td>
                        </tr>
                        <tr>
                          <th>Phone</th>
                          <td><?php echo $rows['phone']; ?></td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td><?php echo $rows['email']; ?></td>
                        </tr>
                        <tr>
                          <th>Happy Customers</th>
                          <td><?php echo $rows['happy_customers']; ?> &nbsp; Customers </td>
                        </tr>
                        <tr>
                          <th>Completed Projects</th>
                          <td><?php echo $rows['complete_projects']; ?>  &nbsp;  Projects</td>
                        </tr>
                        <tr>
                          <th>Descriptions</th>
                          <td><?php echo $rows['description']; ?></td>
                        </tr>
                        <tr>
                          <th>CV</th>
                          <td>
                            <a target="_blank" href="<?php echo $rows['document']; ?>" ><?php echo $rows['firstname']." CV"; ?></a>
                          </td>
                        </tr>
                      </table>
                    </div>
                </div> 
            </div>
            <hr>
            <?php }while($rows = $result->fetch_assoc()); ?>
            </div>
<?php include '../layout/page_footer.php'; ?>