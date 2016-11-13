

<!-- content -->
<div class="content">
	<!-- gallery -->
	<div class="section news">
		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-9"><h2 class="title-text uppercase"><?php echo $event['Event']['title'];?></h2>
					<div class="more-news">
						<div class="item">
							<?php echo $this->Html->image('../webroot/files/event/image/'.$event['Event']['image_dir'].'/'.$event['Event']['image'],['alt'=>'gear_img']);?>
						</div>
					</div>
					<div class="description">
						<?php echo $event['Event']['description'];?>
					</div>
				</div>

				<div class="col-md-3">
					<div class="feature">
						<h3 class="sub-heading uppercase"> News & Events</h3>
						<ul>
							<?php if(!empty($events)):?>
									<?php foreach($events as $event):?>
										<li>
											<?php echo $this->Html->link( $event['Event']['title'], ['controller'=>'events','action'=>'morenews', $event['Event']['id']], array('escape' => false));?></li>
									<?php endforeach;?>
								<?php endif;?>
						</ul>
					</div>
				</div>
			</div>

		</div><!--/container -->
	</div><!--/news -->

</div><!--/content -->