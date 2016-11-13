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
	<!-- contact  us -->
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="center-align heading uppercase">Contact Us</h2>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="col-md-12">
					<div class="map"><iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d3532.013164870253!2d85.31137449420667!3d27.716879800752434!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1448612965161" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
					<div class="description">
						<?php echo $description['Menu']['description'];?>
					</div>
				</div>
			</div>

			<div class="row contact-div">
				<div class="col-md-9">
					<div class="related-topic">
						<h3 class="sub-heading uppercase"> Contact Form</h3>
						<div class="contact-form">
							<form action="<?php echo $this->webroot;?>contacts/index" role="form" id="RoomAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">
							<ul>
								<li><label>Name(*)</label>
								<input type="text" name="name" required/></li>
								<li><label>Email(*)</label>
								<input type="email" name="email" required/></li>
								<li><label>Subject</label>
								<input type="text" name="subject" /></li>
								<li><label>Message(*)</label>
								<textarea name="message" required/></textarea></li>
								<li><input type="submit" name="send" value="Submit" /></li>
							</ul>
						</form>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="feature">
						<h3 class="sub-heading uppercase"> Contact Us</h3>
						<ul class="news-info contact-details">
							<?php if(!empty($contact)):?>
									<li><i class="location"></i><?php echo $contact['Contact']['address'];?></li>
									<li><i class="contact-call"></i><?php echo $contact['Contact']['phone'];?></li>
									<li><i class="contact-email"></i><?php echo $contact['Contact']['email'];?></li>
									<li><i class="web"></i><?php echo $contact['Contact']['website'];?></li>
								<?php endif;?>

						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--/contact us -->
</div><!--/content-->
