<?php include_once 'layout/header.php'; ?>
<?php 
    include('config/database/connection.php');
	$result = $connection->query("SELECT * FROM personal_info LIMIT 1 ");
    $rows = $result->fetch_assoc();

 ?>

<section class="banner_area">
	<div class="banner_inner d-flex align-items-center">
		<div class="container">
			<div class="banner_content text-center">
				<h2>About Us</h2>
			<div class="page_link">
				<a href="index.php">Home</a>
				<a href="about.php">About</a>
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

<?php include 'layout/footer.php'; ?>