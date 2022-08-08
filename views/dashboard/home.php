<?php  
    include('../../config/database/connection.php');

    $projects = $connection->query("SELECT count(p_id) AS projects FROM posts WHERE post_type = 'project' ");
    $pro = $projects->fetch_assoc();

    $blogs = $connection->query("SELECT count(p_id) AS blogs FROM posts WHERE post_type = 'blog' ");
    $blog = $blogs->fetch_assoc();

    $servcies = $connection->query("SELECT count(p_id) AS services FROM posts WHERE post_type = 'services' ");
    $serve = $servcies->fetch_assoc();

     $contact = $connection->query("SELECT count(c_id) AS cont FROM contactus");
     $conts = $contact->fetch_assoc();

     $users = $connection->query("SELECT count(user_id) AS usr FROM users");
     $user = $users->fetch_assoc();

 ?>
<?php include '../layout/page_header.php'; ?>

            <div class="main m-card">
               
                    <h2 class="text-center">Statistics </h2>
                    <div class="container">
                    <div class="table-responsive">
                    <table class="table table-bordered ">
                      <tr>
                      	<th>ID</th>
                      	<th>statistics Title </th>
                      	<th>Amount</th>
                      </tr>
                      <tr>
                      	<th>1</th>
                      	<td>Number of Projects</td>
                      	<td><?php echo $pro['projects']; ?>&nbsp; Projects</td>
                      </tr>
                      <tr>
                      	<th>2</th>
                      	<td>Number of Blogs</td>
                      	<td><?php echo $blog['blogs']; ?>&nbsp; Blogs</td>
                      </tr>
                      <tr>
                      	<th>3</th>
                      	<td>Number Of Services</td>
                      	<td><?php echo $serve['services']; ?>&nbsp; Services</td>
                      </tr>
                       <tr>
                        <th>3</th>
                        <td>Number Of Contact Messages</td>
                        <td><?php echo $conts['cont']; ?>&nbsp; Messages</td>
                      </tr>
                       <tr>
                        <th>3</th>
                        <td>Number Of Users</td>
                        <td><?php echo $user['usr']; ?>&nbsp; Users</td>
                      </tr>
                    </table>
                    </div>

                    </div>
            </div>
<?php include '../layout/page_footer.php'; ?>