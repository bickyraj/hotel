
<!-- content -->
<div class="content">
	<!-- contact  us -->
	<div class="section">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="center-align heading uppercase">Reservation</h2>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="col-md-12">
					<div class="description">
						Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
						Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. 
					</div>
				</div>
			</div>

			<div class="row contact-div">
				<div class="col-md-9">
					<div class="related-topic">
						<h3 class="sub-heading uppercase"> Check Availabilty Form</h3>
						<div class="contact-form">
							<form action="/neelaya/reservations" role="form" id="RoomAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">

								<ul>
									<div class="row">
										<div class="col-md-6">
											<li>
												<label>Full Name(*)</label>
												<input type="text" name="data[Reservation][fullname]" />
											</li>
										</div>
										<div class="col-md-6">
											<li>
												<label>Address</label>
												<input type="text" name="data[Reservation][address]" />
											</li>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<li>
												<label>Phone No.</label>
												<input type="text" name="data[Reservation][phone]" />
											</li>
										</div>
										<div class="col-md-6">
											<li>
												<label>Email(*)</label>
												<input type="email" name="data[Reservation][email]" />
											</li>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<li>
												<label>Country(*)</label>
												<select name="data[Reservation][country]">
													<?php foreach($countries as $country):?>
					                            		<option><?php echo $country['Country']['name'];?></option>
					                            	<?php endforeach;?>
					                        </select>
											</li>
										</div>
										<div class="col-md-6">
											<li>
												<label>Room Type(*)</label>
												<select name="data[Reservation][roomtype_id]">
													<?php foreach ($roomtypes as $roomtype):?>
						                            	<option value="<?php echo $roomtype['Roomtype']['id'];?>"><?php echo $roomtype['Roomtype']['type'];?></option>
						                        	<?php endforeach;?>					                        </select>
											</li>
										</div>
									</div>
									
									<div class="row">
										<div class="col-md-6">
											<li>
												<label>Check In(*)</label>
												<input type="text" name="data[Reservation][checkin]" />
											</li>
										</div>
										<div class="col-md-6">
											<li>
												<label>Check Out(*)</label>
												<input type="text" name="data[Reservation][checkout]" />
											</li>
										</div>
									</div>
									<div class="row">
										<div class="col-md-6">
											<li>
												<label>Adults</label>
												<input type="number" name="data[Reservation][adults]" />
											</li>
										</div>
										<div class="col-md-6">
											<li>
												<label>Children</label>
												<input type="number" name="data[Reservation][children]" />
											</li>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<li><label>Message</label>
											<textarea name="data[Reservation][message]" /></textarea></li>
										</div>
									</div>
									<div class="row">
									<div class="col-md-12">
										<li><input type="submit" name="submit" value="Submit" /></li>
									</div>
									</div>
								</ul>
							</form>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="feature">
						<h3 class="sub-heading uppercase"> Contact Us</h3>
						<ul class="news-info contact-details">
							<li><i class="location"></i><?php echo $contact['Contact']['address'];?></li>
							<li><i class="contact-call"></i><?php echo $contact['Contact']['phone'];?></li>
							<li><i class="contact-email"></i><?php echo $contact['Contact']['email'];?></li>
							<li><i class="web"></i><?php echo $contact['Contact']['website'];?></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--/contact us -->
</div><!--/content -->