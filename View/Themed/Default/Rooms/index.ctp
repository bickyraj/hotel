<!-- content -->
<div class="content">
	<!-- room -->
	<div class="section room">
		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="center-align heading uppercase">Room Types</h2>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="col-md-12">
					<p class="little-more center-align">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.</p>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="image-gallery">
					<?php if(!empty($rooms)):?>
						<?php foreach ($rooms as $room):?>

							<div class="col-md-4  col-sm-4">
								<div class="grid">
									<div class="image-div">
										<a href="double.html"><?php echo $this->Html->image('../webroot/files/room/image/'.$room['Room']['image_dir'].'/'.$room['Room']['image'],['alt'=>'gear_img', 'width'=>'200']);?><span class="zoom-icon"></span> </a>
										<div class="price-rate">$<?php echo $room['Room']['price'];?></div>
									</div>
									<div class="feature-icons">
										<ul>
											<li><i class="fa fa-bed"></i></li>
											<li><i class="fa fa-phone"></i></li>
											<li><i class="fa fa-television"></i></li>
											<li><i class="fa fa-wifi"></i></li>
											<li><i class="fa fa-coffee"></i></li>
										</ul>
									</div>
								</div>
							</div>
						<?php endforeach;?>
						<?php else:?>
							<div class="col-md-4  col-sm-4">
						<div class="grid">
							<div class="image-div">
								<a href="double.html"> <img src="images/pic2.png" alt=""><span class="zoom-icon"></span> </a>
								<div class="price-rate">$1000</div>
							</div>
							<div class="feature-icons">
								<ul>
									<li><i class="fa fa-bed"></i></li>
									<li><i class="fa fa-phone"></i></li>
									<li><i class="fa fa-television"></i></li>
									<li><i class="fa fa-wifi"></i></li>
									<li><i class="fa fa-coffee"></i></li>
								</ul>
							</div>
						</div>
					</div>

					<div class="col-md-4  col-sm-4">
						<div class="grid">
							<div class="image-div">
								<a href="triple.html"> <img src="images/pic5.png" alt=""><span class="zoom-icon"></span> </a>
								<div class="price-rate">$1000</div>
							</div>
							<div class="feature-icons">
								<ul>
									<li><i class="fa fa-bed"></i></li>
									<li><i class="fa fa-phone"></i></li>
									<li><i class="fa fa-television"></i></li>
									<li><i class="fa fa-wifi"></i></li>
									<li><i class="fa fa-coffee"></i></li>
								</ul>
							</div>
						</div>
					</div>
					<?php endif;?>
					
				</div>
			</div>
		</div><!--/container -->
	</div><!--/room -->
</div><!--/content -->