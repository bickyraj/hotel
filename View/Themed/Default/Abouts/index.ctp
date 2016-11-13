<!-- content -->
<div class="content">
	<!-- about us -->
	<div class="section about-us">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="center-align heading uppercase">About Us</h2>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="col-md-9">
					<div class="about-us-img">
						 <?php echo $this->Html->image('../webroot/files/about/image/'.$about['About']['image_dir'].'/'.$about['About']['image'],['alt'=>'gear_img']);?>
					</div>
					<div class="description">
						<p><?php 

						if(isset($output) && $output ==1)
						{
							
							echo $about['About']['description'];
						}else
						{
							echo "No content added.";
						}
						?></p>
					</div>
					<div class="feature related-link">
						<h3 class="sub-heading uppercase"> Related Link</h3>
						<ul>
							<li><a href="<?php echo $this->webroot;?>events">News & Events</a></li>
							<li><a href="<?php echo $this->webroot;?>Galleries">Gallery</a></li>
							<li><a href="<?php echo $this->webroot;?>Testimonials">Tesimonial</a></li>
						</ul>
					</div>
				</div>

				<div class="col-md-3">
					<div class="feature">
						<h3 class="sub-heading uppercase"> Hotel Amenities</h3>
						<ul>
							<?php foreach($features as $feature):?>
								<li><?php echo $feature['Feature']['title'];?></li>
							<?php endforeach;?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--/about us -->
</div><!--/content -->