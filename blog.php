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
					<h2>Our Blog</h2>
				<div class="page_link">
					<a href="index.php">Home</a>
					<a href="blog.php">Blog</a>
				</div>
			</div>
		</div>
	</div>
</section>

<?php 
	
	$blogs = $connection->query("SELECT * FROM posts WHERE post_type='blog' ORDER BY p_id DESC ");
    $blog = $blogs->fetch_assoc();

 ?>


<section class="blog_area section-margin">
<div class="container">
<div class="row">
	<div class="col-lg-12 mb-5 mb-lg-0">
		<div class="blog_left_sidebar">
			<?php do{ ?>
			<article class="blog_item">
				<div class="blog_item_img">
					<img class="card-img rounded-0" src="views/dashboard/<?php echo $blog['image']; ?>" alt="">
					<a href="#" class="blog_item_date">
					<h3>
						<?php 
							$date=date_create($blog['reg_date']);
							echo date_format($date,"d");
						 ?>
					</h3>
					<p>
						<?php 
							echo date_format($date,"M");
						 ?>
					</p>
					</a>
				</div>
				<div class="blog_details">
					<a class="d-inline-block" href="single-blog.html">
					<h2><?php echo $blog['title']; ?></h2>
					</a>
					<p>
						<?php echo $blog['description']; ?>
					</p>
					<ul class="blog-info-link">
						<li><a href="#"><i class="far fa-user"></i> Travel, Lifestyle</a></li>
						<li><a href="#"><i class="far fa-comments"></i> 03 Comments</a></li>
					</ul>
				</div>
			</article>
		<?php }while($blog = $blogs->fetch_assoc()); ?>


			<nav class="blog-pagination justify-content-center d-flex">
				<ul class="pagination">
					<li class="page-item">
						<a href="#" class="page-link" aria-label="Previous">
						<span aria-hidden="true">
						<span class="ti-arrow-left"></span>
						</span>
						</a>
					</li>
					<li class="page-item">
						<a href="#" class="page-link">1</a>
					</li>
					<li class="page-item active">
						<a href="#" class="page-link">2</a>
					</li>
					<li class="page-item">
						<a href="#" class="page-link" aria-label="Next">
							<span aria-hidden="true">
								<span class="ti-arrow-right"></span>
							</span>
						</a>
					</li>
				</ul>
			</nav>

		</div>
	</div>
</div>
</div>
</section>
<?php include 'layout/footer.php'; ?>
