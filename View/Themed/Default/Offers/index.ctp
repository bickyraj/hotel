<!-- content -->
<div class="content">
	<!-- room -->
	<div class="section offers">
		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="center-align heading uppercase">Offers</h2>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="col-md-12">
					<p class="little-more center-align"><?php echo $description['Menu']['description'];?></p>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="image-gallery">
					<?php foreach($offers as $offer):?>
						<div class="col-md-4  col-sm-4">
							<div class="grid">
								<div class="image-div">
									<a href="<?php echo $this->webroot;?>offers/moreoffers/<?php echo $offer['Offer']['id'];?>"> <h2 class="offer-title center-align uppercase"> <?php echo $offer['Offer']['title'];?></h2><?php echo $this->Html->image('../webroot/files/offer/image/'.$offer['Offer']['image_dir'].'/'.$offer['Offer']['image'],['alt'=>'gear_img', 'width'=>'200']);?><span class="zoom-icon"></span> 
									</a>
								</div>
							</div>
						</div>
					<?php endforeach;?>
				</div>
			</div>
		</div><!--/container -->
	</div><!--/room -->
</div><!--/content -->