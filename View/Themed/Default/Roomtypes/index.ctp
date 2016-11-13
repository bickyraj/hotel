
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
					<p class="little-more center-align"><?php echo $description['Menu']['description'];?></p>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="image-gallery">
					<?php if(!empty($roomtypes)):?>
						<?php foreach ($roomtypes as $roomtype):?>

							<div class="col-md-4  col-sm-4">
								<div class="grid">
								<a href="<?php echo $this->webroot;?>roomfeatures/index/<?php echo $roomtype['Roomtype']['id'];?>"><div class="title-text roomtitle"><?php echo $roomtype['Roomtype']['type'];?></div></a>
									<div class="image-div">
										<a href="<?php echo $this->webroot;?>roomfeatures/index/<?php echo $roomtype['Roomtype']['id'];?>"><?php echo $this->Html->image('../webroot/files/roomtype/image/'.$roomtype['Roomtype']['image_dir'].'/'.$roomtype['Roomtype']['image'],['alt'=>'gear_img', 'width'=>'200']);?><span class="zoom-icon"></span> </a>
										<div class="price-tag price-rate"><p><?php echo $roomtype['Roomtype']['price'];?></p></div>
									</div>
									<div class="feature-icons">
										<ul>
									<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Relaxing bed"><i class="fa fa-bed"></i></li>
									<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Phone"><i class="fa fa-phone"></i></li>
									<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Television"><i class="fa fa-television"></i></li>
									<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="24 hour WIFI"><i class="fa fa-wifi"></i></li>
									<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Coffee"><i class="fa fa-coffee"></i></li>
									<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Newspaper"><i class="fa fa-file-text-o"></i></li>
									<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Extinguisher"><i class="fa fa-fire-extinguisher"></i></li>
									<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Books"><i class="fa fa-book"></i></li>
									<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Beers"><i class="fa fa-beer"></i></li>
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
										<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Relaxing bed"><i class="fa fa-bed"></i></li>
										<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Phone"><i class="fa fa-phone"></i></li>
										<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Television"><i class="fa fa-television"></i></li>
										<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="24 hour WIFI"><i class="fa fa-wifi"></i></li>
										<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Coffee"><i class="fa fa-coffee"></i></li>
										<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Newspaper"><i class="fa fa-file-text-o"></i></li>
										<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Extinguisher"><i class="fa fa-fire-extinguisher"></i></li>
										<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Books"><i class="fa fa-book"></i></li>
										<li class="btn tooltips" data-container="body" data-placement="bottom" data-original-title="Beers"><i class="fa fa-beer"></i></li>
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