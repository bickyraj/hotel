<?php
 	// echo "<pre>"; print_r($offer);die();
?>
<!-- content -->
<div class="content">
	<!-- gallery -->
	<div class="section news">
		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-9"><h2 class="title-text uppercase"><?php echo $offer['Offer']['title'];?></h2>
					<div class="more-news">
						<div class="item">
							<?php echo $this->Html->image('../webroot/files/offer/image/'.$offer['Offer']['image_dir'].'/'.$offer['Offer']['image'],['alt'=>'gear_img']);?>
						</div>
					</div>
					<div class="description">
						<?php echo $offer['Offer']['content'];?>
					</div>
				</div>

				<div class="col-md-3">
					<div class="feature">
						<h3 class="sub-heading uppercase"> Offers</h3>
						<ul>
							<?php foreach($offer['Offerlist'] as $list):?>
								<li><?php echo $list['title'];?></li>
							<?php endforeach;?>
						</ul>
					</div>
				</div>
			</div>

		</div><!--/container -->
	</div><!--/news -->

</div><!--/content -->