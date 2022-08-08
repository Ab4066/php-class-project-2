<?php  
	include('../../config/Database/connection.php');

	$result = $connection->query("SELECT * FROM users ");
	$rows = $result->fetch_assoc();

 ?>
<?php include '../layout/page_header.php'; ?>

			<div class="main m-card">
				<?php  if (isset($_GET["succes"])) { ?>
    				<div class="alert alert-success">
					    <span class="close" data-dismiss="alert">&times;</span>
					    <strong>Success!</strong> New User Successfully Inserted
					</div>
    			<?php } ?>
          <?php  if (isset($_GET["delete"])) { ?>
                    <div class="alert alert-success">
                        <span class="close" data-dismiss="alert">&times;</span>
                        <strong>Success!</strong> User Deleted Successfully
                    </div>
                <?php } ?>

					<div class="container">
						<ul class="breadcrumb">
						  <li><a href="../dashboard/home.php">Home</a></li>
						  <li class="">User List</li> 
						</ul> 
					</div>
					<div class="container">
					<div align="left">
	    				<a href="add_user.php" class="btn btn-primary btn-fw">
	                    <i class="mdi mdi-plus"></i>Add New User</a>
	    			</div>
						<?php if($result->num_rows > 0){ ?>
					<div class="table-responsive">
                    <table class="table table-bordered ">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> Username </th>
                          <th> User type </th>
                          <th> Registration Date </th>
                          <th> Edit </th>
                          <th> Delete </th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php $x = 1; do{ ?>
                        <tr>
                          <td> <?php echo $x++; ?> </td>
                          <td> <?php echo $rows['username']; ?> </td>
                          <td> <?php echo $rows['utype']; ?> </td>
                          
                          <td> <?php echo $rows['reg_date']; ?> </td>

                          <td class="text-center">
                            <a href="edit_user.php?user_id=<?php echo $rows['user_id']; ?>"><span class="fa fa-edit"></span>
                            </a>
                          </td>
                          <td class="text-center">
                            <a onclick="deleteMsg('Are You Sure to delete User ?');" href="../delete/delete.php?user_id=<?php echo $rows['user_id']; ?>"><span class="fa fa-trash"></span></a></td>
                        </tr>
                    <?php }while($rows = $result->fetch_assoc()); ?>
                      </tbody>
                    </table>
					</div>

                <?php }else{ ?>
                	<h1 class="display-5 text-center">No User Added Yet ! </h1>
                <?php } ?>	
					</div>
			</div>
<?php include '../layout/page_footer.php'; ?>