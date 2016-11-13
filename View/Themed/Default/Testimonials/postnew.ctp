<!-- content -->
<div class="content">
	<!-- about us -->
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="center-align heading uppercase">Testimonial</h2>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="col-md-12">
					<div class="description"><?php echo $description['Menu']['description'];?></div>
				</div>
			</div>

			<div class="row">
				<div class="col-md-12">
					<div class="related-topic">
						<h3 class="sub-heading uppercase"> Write a Review</h3>
						<form action="<?php echo $this->webroot;?>testimonials/postnew" role="form" id="RoomAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
							<div class="contact-form">
								<ul>
									<li><label>Name(*)</label>
									<input type="text" name="data[Testimonial][fullname]" required/></li>
									<li><label>Email(*)</label>
									<input type="email" name="data[Testimonial][email]" required/></li>
									<li><label>Message(*)</label>
									<textarea name="data[Testimonial][comment]" required/></textarea></li>
									<li><input type="submit" name="send" value="Post" /></li>
								</ul>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--/about us -->
</div><!--/content -->