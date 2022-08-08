<?php  
	include('../../config/Database/connection.php');

	$result = $connection->query("SELECT * FROM contactus ");
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
                        <strong>Success!</strong> Message Deleted Successfully
                    </div>
                <?php } ?>

					<div class="container">
						<ul class="breadcrumb">
						  <li><a href="#">Home</a></li>
						  <li class="">Contact Us</li> 
						</ul> 
					</div>
					<div class="container">
						<?php if($result->num_rows > 0){ ?>
					<div class="table-responsive">
                    <table class="table table-bordered ">
                      <thead>
                        <tr>
                          <th> ID </th>
                          <th> Name </th>
                          <th> Subject </th>
                          <th> Message </th>
                          <th> Email </th>
                          <th> Date </th>
                          <th> Delete </th>
                        </tr>
                      </thead>
                      <tbody>
                    <?php $x = 1; do{ ?>
                        <tr>
                          <td> <?php echo $x++; ?> </td>
                          <td> <?php echo $rows['name']; ?> </td>
                          <td> <?php echo $rows['subject']; ?> </td>
                          <td> <?php echo $rows['message']; ?> </td>
                          <td> <?php echo $rows['email']; ?> </td>
                          <td> <?php echo $rows['reg_date']; ?> </td>
                          
                          <td class="text-center">
                            <a onclick="deleteMsg('Are You Sure to delete Message ?');" href="../delete/delete.php?c_id=<?php echo $rows['c_id']; ?>"><span class="fa fa-trash"></span></a></td>
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