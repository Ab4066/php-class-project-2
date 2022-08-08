<?php include_once 'layout/header.php'; ?>
<?php 
    include('config/database/connection.php');
	$result = $connection->query("SELECT * FROM personal_info LIMIT 1 ");
    $rows = $result->fetch_assoc();

 ?>
<section class="home_banner_area">
	<div class="banner_inner">
		<div class="container">
			<div class="row align-items-center justify-content-between">
				<div class="col-lg-6">
					<div class="banner_content">
					<h3>Hey There !</h3>
					<h1 class="text-uppercase">I am <?php echo $rows['firstname']; ?></h1>
					<h5 class="text-uppercase"><?php echo $rows['job']; ?></h5>
						<div class="social_icons my-5">
						<a href="#"><i class="ti-twitter"></i></a>
						<a href="#"><i class="ti-skype"></i></a>
						<a href="#"><i class="ti-instagram"></i></a>
						<a href="#"><i class="ti-dribbble"></i></a>
						<a href="#"><i class="ti-vimeo"></i></a>
						</div>
					<a class="primary_btn" target="_blank" href="views/dashboard/<?php echo $rows['document']; ?>">
						<span>See My Work</span>
					</a>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="home_right_img">
						<img class="img-fluid" src="views/dashboard/<?php echo $rows['images']; ?>" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<section class="statistics_area">
	<div class="container">
		<div class="row justify-content-lg-start justify-content-center">
			<div class="col-lg-2 col-md-3">
				<div class="statistics_item">
				<h3><span class="counter"><?php echo $rows['happy_customers']; ?></span>k+</h3>
				<p>Happy Customer</p>
				</div>
			</div>
			<div class="col-lg-2 col-md-3">
				<div class="statistics_item">
				<h3><span class="counter"><?php echo $rows['complete_projects']; ?></span>k+</h3>
				<p>Complete Projects</p>
				</div>
			</div>
			<div class="col-lg-2 col-md-3">
				<div class="statistics_item">
				<h4><span>0789 158 510</span></h4>
				<p>My Contact</p>
				</div>
			</div>
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


<?php 
	
	$projects = $connection->query("SELECT * FROM posts WHERE post_type='project' ");
    $project = $projects->fetch_assoc();

 ?>
<section class="blog-area section-gap">
	<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="main_title">
				<p class="top_text">My Projects <span></span></p>
				<h2>Latest Project which <br>
				I have worked... </h2>
			</div>
		</div>
	</div>
		<div class="row">
			<?php do{ ?>
			<div class="col-lg-4 col-md-6">
				<div class="single-blog">
					<div class="thumb">
						<img class="img-fluid" src="views/dashboard/<?php echo $project['image']; ?>" alt="">
					</div>
					<div class="short_details">
						<div class="meta-top d-flex">
							<a href="#"><i class="ti-user"></i> Admin post</a>
							<a href="#"><i class="ti-calendar"></i> <?php echo $project['reg_date']; ?></a>
						</div>
						<a class="d-block" href="single-blog.html">
							<h4><?php echo $project['title']; ?></h4>
						</a>
						<div class="text-wrap">
							<p>
								<?php echo $project['description']; ?>
							</p>
						</div>
						<a href="#" class="primary_btn2">Learn More</a>
					</div>
				</div>
			</div>
		<?php }while($project = $projects->fetch_assoc()); ?>
		</div>
	</div>
</section>

<?php 
	
	$blogs = $connection->query("SELECT * FROM posts WHERE post_type='blog' ");
    $blog = $blogs->fetch_assoc();

 ?>
<section class="blog-area section-gap">
	<div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="main_title">
				<p class="top_text">Our blog <span></span></p>
				<h2>Latest Story From <br>
				Our Blog </h2>
			</div>
		</div>
	</div>
		<div class="row">
			<?php do{ ?>
			<div class="col-lg-4 col-md-6">
				<div class="single-blog">
					<div class="thumb">
						<img class="img-fluid" src="views/dashboard/<?php echo $blog['image']; ?>" alt="">
					</div>
					<div class="short_details">
						<div class="meta-top d-flex">
							<a href="#"><i class="ti-user"></i> Admin post</a>
							<a href="#"><i class="ti-calendar"></i> <?php echo $blog['reg_date']; ?></a>
						</div>
						<a class="d-block" href="single-blog.html">
							<h4><?php echo $blog['title']; ?></h4>
						</a>
						<div class="text-wrap">
							<p>
								<?php echo $blog['description']; ?>
							</p>
						</div>
						<a href="#" class="primary_btn2">Learn More</a>
					</div>
				</div>
			</div>
		<?php }while( $blog = $blogs->fetch_assoc()); ?>
		</div>
	</div>
</section>




<?php include 'layout/footer.php'; ?>