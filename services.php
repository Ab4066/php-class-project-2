<?php 
	include 'layout/header.php'; 
    include('config/database/connection.php');
	$result = $connection->query("SELECT * FROM personal_info LIMIT 1 ");
    $rows = $result->fetch_assoc();
 ?>

<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>Our Services</h2>
				<div class="page_link">
				<a href="index.php">Home</a>
				<a href="services.php">Services</a>
				</div>
			</div>
		</div>
	</div>
</section>


<?php 
	
	$services = $connection->query("SELECT * FROM posts WHERE post_type='services' ");
    $serve = $services->fetch_assoc();

 ?>
<section class="services_area">
	<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="main_title">
				<p class="top_text">Our Service <span></span></p>
				<h2>What Service We <br>
				Offer For You </h2>
			</div>
		</div>
	</div>
	<div class="row">
		<?php do { ?>
		<div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
			<div class="service_item">
				<img width="300" src="views/dashboard/<?php echo $serve['image']; ?>" alt="">
				<h4><?php echo $serve['title']; ?></h4>
				<p>
					<?php echo $serve['description']; ?>
				</p>
				<a href="#" class="primary_btn2 mt-35">Learn More</a>
			</div>
		</div>
		<?php }while($serve = $services->fetch_assoc()); ?>
	</div>
	</div>
</section>


<section class="about_area section_gap">
<div class="container">
	<div class="row justify-content-start align-items-center">
		<div class="col-lg-5">
		<div class="text-align">
			<img width="350" class="img img-thumbnails" src="views/dashboard/<?php echo $rows['images']; ?>" alt="">
		</div>
		</div>
		<div class="offset-lg-1 col-lg-5">
			<div class="main_title text-left">
				<p class="top_text">About me <span></span></p>
				<h2>
				<?php echo $rows['job']; ?>
				</h2>
				<p>
				<?php echo $rows['description']; ?>
				</p>
				<a class="primary_btn" target="_blank" href="views/dashboard/<?php echo $rows['document']; ?>"><span>Download CV</span></a>
			</div>
		</div>
	</div>
</div>
</section>

<?php include 'layout/footer.php'; ?>