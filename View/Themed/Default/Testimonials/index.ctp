<?php echo $this->Html->script('../toastr/toastr');?>
<?php

if($this->Session->check('msg'))
    {
      // echo "<pre>";print_r($_SESSION);die();
        $m =$this->Session->read('msg');

        
        unset($_SESSION['msg']);
        // echo $m;die();

        if($m==1)
        {
            echo "<script>

                toastr.success('Thank you!!');
        </script>";
        }
        else
        {
            echo "<script>

                toastr.warning('Error posting review. Please try again!!');
        </script>";
        }
    }
?>
<!-- content -->
<div class="content">
	<!-- gallery -->
	<div class="section news">
		<!-- container -->
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="center-align heading uppercase">Testimonial</h2>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			
			<div class="row">
				<div class="col-md-12">
					<p class="little-more center-align"><?php echo $description['Menu']['description'];?></p>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="col-md-12">
					<div class="right-float post-new"><a href="<?php echo $this->webroot;?>testimonials/postnew">Write a Review</a></div>
				</div>
			</div>
			<div class="row">
				<?php if(isset($testimonials) && !empty($testimonials)):?>
					<?php foreach($testimonials as $testimonial):?>
							<div class="col-md-12">
								<div class="testimonial-grid">
									<div class="post-details">
										<div class="title-text left-float post-by"><?php echo $testimonial['Testimonial']['fullname'];?></div>
										<div class="post-date right-float"><?php echo $testimonial['Testimonial']['created'];?></div>
									</div>
									<p class="news-description testimonial-p"><?php echo $testimonial['Testimonial']['comment'];?></p>
								</div>
							</div>
					<?php endforeach;?>
				<?php endif;?>
			</div>
		</div><!--/container -->
	</div><!--/gallery -->

</div><!--/content -->