<!-- content -->
<div class="content">
	<!-- gallery -->
	<div class="section news">
		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="center-align heading uppercase">News & Events</h2>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="col-md-12">
					<p class="little-more center-align"><?php echo $description['Menu']['description'];?></p>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="image-gallery">
					<?php if(!empty($events)):?>
						<?php foreach($events as $event):?>
					<div class="col-md-4  col-sm-4">
						<div class="grid">
							<div class="image-div"><?php echo $this->Html->image('../webroot/files/event/image/'.$event['Event']['image_dir'].'/thumb_'.$event['Event']['image'],['alt'=>'gear_img']);?></div>
							<div class="title-text"><?php echo $this->Html->link($event['Event']['title'], ['controller'=>'events','action'=>'morenews', $event['Event']['id']], array('escape' => false));?></div>

							<?php

								// strip tags to avoid breaking any html
$string = strip_tags($event['Event']['description']);

if (strlen($string) > 150) {

    // truncate string
    $stringCut = substr($string, 0, 150);

    $string = substr($stringCut, 0, strrpos($stringCut, ' ')).'...'; 
}
							?>
							<p class="news-description"><?php echo $string;?> <?php echo $this->Html->link('Read more &#8594;', ['controller'=>'events','action'=>'morenews', $event['Event']['id']], array('escape' => false));?>
							</p>
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
	</div><!--/news -->
</div><!--/content -->

