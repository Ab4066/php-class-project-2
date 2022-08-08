<?php 
  include 'layout/header.php'; 
  include('config/database/connection.php');
  

  if(isset($_POST['submit'])){
    $msg = $_POST['message'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];

    $result = $connection->query("INSERT INTO contactus VALUES(null , '$name' , 
     '$subject','$email','$msg', curdate())");

    if($result){
      header("location:contact.php?succes=true");
    }else{
      header("location:contact.php?error=true");
    }
  }

?>
<section class="banner_area">
  <div class="banner_inner d-flex align-items-center">
    <div class="container">
      <div class="banner_content text-center">
        <h2>Contact Us</h2>
        <div class="page_link">
          <a href="index.php">Home</a>
          <a href="contact.php">Contact</a>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="section-margin">
<div class="container">
<div class="row">
<div class="col-12">
  <?php  if (isset($_GET["succes"])) { ?>
       <div class="alert alert-success">
          <span class="close" data-dismiss="alert">&times;</span>
          <strong>Success!</strong> Messages Sent Successfully
       </div>
  <?php } ?>
  <?php  if (isset($_GET["error"])) { ?>
       <div class="alert alert-danger">
          <span class="close" data-dismiss="alert">&times;</span>
          <strong>Warning!</strong>  Check Your Internet Connectivity...
      </div>
   <?php } ?>
  <h2 class="contact-title">Get in Touch</h2>
</div>
<div class="col-lg-8 mb-4 mb-lg-0">
  <form class="form-contact contact_form" method="post" novalidate="novalidate">
    <div class="row">
      <div class="col-12">
        <div class="form-group">
           <textarea class="form-control w-100" name="message" cols="30" rows="9" placeholder="Enter Message"></textarea>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
           <input class="form-control" name="name" id="name" type="text" placeholder="Enter your name">
        </div>
      </div>
      <div class="col-sm-6">
        <div class="form-group">
          <input class="form-control" name="email" id="email" type="email" placeholder="Enter email address">
        </div>
      </div>
      <div class="col-12">
        <div class="form-group">
          <input class="form-control" name="subject" id="subject" type="text" placeholder="Enter Subject">
        </div>
      </div>
    </div>
    <div class="form-group mt-lg-3">
       <button type="submit" name="submit" class="primary_btn button-contactForm">Send Message</button>
    </div>
  </form>
</div>

<?php 
  
    $result = $connection->query("SELECT * FROM personal_info LIMIT 1 ");
    $rows = $result->fetch_assoc();
  
 ?>

  <div class="col-lg-4">
  <div class="media contact-info">
  <span class="contact-info__icon"><i class="ti-home"></i></span>
    <div class="media-body">
    <h3 >
      <a style="color:dodgerblue !important;" href="<?php echo $rows['document']; ?>">
        <?php echo $rows['firstname']." Resume"; ?>
      </a>
    </h3>
    <p>You can resume CV here...</p>
    </div>
  </div>
  <div class="media contact-info">
    <span class="contact-info__icon"><i class="ti-tablet"></i></span>
    <div class="media-body">
      <h3><a href="tel:454545654">
        <?php echo $rows['phone']; ?>
      </a></h3>
      <p>Mon to Fri 9am to 6pm</p>
    </div>
  </div>
  <div class="media contact-info">
    <span class="contact-info__icon"><i class="ti-email"></i></span>
    <div class="media-body">
      <h3><a href="">
        <?php echo $rows['email']; ?>
      </span></a></h3>
      <p>Send us your query anytime!</p>
    </div>
    </div>
  </div>
</div>
</div>
</section>

<?php include 'layout/footer.php'; ?>
