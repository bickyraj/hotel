<!-- content -->
<div class="content">
	<!-- gallery -->
	<div class="section news">
		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="center-align heading uppercase">Gallery</h2>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="col-md-12">
					<p class="little-more center-align"><?php echo $description['Menu']['description'];?></p>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="image-gallery">
					<?php if(!empty($images)):?>
						<?php foreach($images as $image):?>
							<div class="col-md-4  col-sm-4">
								<div class="grid">
									<a href="<?php echo $this->Html->url('/img/').'../webroot/files/gallery/image/'.$image['Gallery']['image_dir'].'/'.$image['Gallery']['image'];?>" class="swipebox" title="Image Title"> <?php echo $this->Html->image('../webroot/files/gallery/image/'.$image['Gallery']['image_dir'].'/'.$image['Gallery']['image'],['alt'=>'gear_img']);?><span class="zoom-icon"></span> </a>
								</div>
							</div>
							<?php endforeach;?>
					<?php endif;?>

				</div>
			</div>

			<!-- <div class="row">
				<div class="col-md-12">
					<div class="clear"></div>
					<div class="pagination">
						<ul>
							<li><a href="#">Previous</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li><a href="#">3</a></li>
							<li><a href="#">Next</a></li>
						</ul>
					</div>
				</div>
			</div> -->
			
		</div><!--/container -->
	</div><!--/gallery -->
</div><!--/content -->
