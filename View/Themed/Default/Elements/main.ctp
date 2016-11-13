

<section id="main-banner">
    <div class="owl-carousel">
      <?php if(!empty($banners)):?>
        <?php foreach($banners as $banner):?>

          <a href="<?php echo $banner['Banner']['link'];?>"><div class="slides">
            <div class="dotted-bg"></div>
              <?php echo $this->Html->image('../webroot/files/banner/image/'.$banner['Banner']['image_dir'].'/'.$banner['Banner']['image'],['alt'=>'gear_img', 'class'=>'img-responsive']);?>
          </div>
        </a>
        <?php endforeach;?>
      <?php else:?>
        <div class="slides">
            <div class="dotted-bg"></div>
              <?php echo $this->Html->image('slide1.png',['alt'=>'Neelaya inn', 'class'=>'img-responsive']);?>
          </div>

        <div class="slides">
            <div class="dotted-bg"></div>
            <?php echo $this->Html->image('slide2.png',['alt'=>'Neelaya inn', 'class'=>'img-responsive']);?>
        </div>
      <?php endif;?>
    </div>

    <div class="banner-search">

        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-3">
                    <div class="form-group">
                        <select name="room-type" id="roomtype">
                          <?php foreach($roomtypes as $roomtype):?>
                            <option value="<?php echo $roomtype['Roomtype']['id'];?>"><?php echo $roomtype['Roomtype']['type'];?></option>
                          <?php endforeach;?>
                        </select>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <div class="input-group date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
              <input type="text" id="checkin" name="check-in" class="form-control" readonly=""  placeholder="Check In">
              <span class="input-group-btn">
              <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
              </span>
            </div>
                    </div>
                </div>

                <div class="col-md-3 col-sm-3">
                    <div class="form-group">
                        <div class="input-group date date-picker" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
              <input type="text" id="checkout"  name="check-out" class="form-control" readonly=""  placeholder="Check Out">
              <span class="input-group-btn">
              <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
              </span>
            </div>
                    </div>
                </div>
                <div class="col-md-1 col-sm-3">
                    <div class="form-group">
                       <input type="number" id="adults" placeholder="Adults" name="adults"></div>
                </div>
                <div class="col-md-1 col-sm-3">
                    <div class="form-group">
                       <input type="number" id="children" placeholder="Childrens" name="childern"></div>
                </div>
              <div class="col-md-2 col-sm-3">
                  <div class="form-group">
                      <button class="check-availability checkAvailability">Check Availability</button>
                  </div>
              </div>
            </div>
        </div>
    </div>
</section>
<!-- content -->
<div class="content">
  <!-- gallery -->
  <div class="section gallery">
    <!-- container -->
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="center-align heading uppercase">Gallery</h2>
        </div><!--/col-md-12 -->
      </div><!--/row -->
      <div class="row">
        <div class="col-md-12">
          <p class="little-more center-align"><?php echo $galleryDescription['Menu']['description'];?></p>
        </div><!--/col-md-12 -->
      </div><!--/row -->
      <div class="row">
        <div class="image-gallery">

            <?php if(!empty($images)):?>
            <?php foreach($images as $image):?>
              <div class="col-md-4  col-sm-4">
                <div class="grid">
                  <a href="<?php echo $this->Html->url('/img/').'../webroot/files/gallery/image/'.$image['Gallery']['image_dir'].'/'.$image['Gallery']['image'];?>" class="swipebox" title="Image Title"><?php echo $this->Html->image('../webroot/files/gallery/image/'.$image['Gallery']['image_dir'].'/'.$image['Gallery']['image'],['alt'=>'gear_img']);?><span class="zoom-icon"></span> </a>
                </div>
              </div>
          <?php endforeach;?>
        <?php else:?>
          <div class="col-md-4  col-sm-4">
            <div class="grid">
              <a href="images/pic1.png" class="swipebox" title="Image Title"> <img src="images/pic1.png" alt=""><span class="zoom-icon"></span> </a>
            </div>
          </div>
        <?php endif;?>
          
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <a href="gallery.html"><div class="view-more"><button>View More</button></div></a>
        </div>
      </div>
    </div><!--/container -->
  </div><!--/gallery -->

    <!--client-say-->
  <div class="section client-say">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h2 class="center-align heading uppercase">what our Client Says</h2>
        </div><!--/col-md-12 -->
      </div><!--/row -->
      <!-- requried-jsfiles-for owl -->
        <script>
          $(document).ready(function() {
            $("#owl-demo2").owlCarousel({
            items : 1,
            lazyLoad : true,
            autoPlay : true,
            navigation : false,
            navigationText :  false,
            pagination : true,
            });
          });
        </script>
      <!-- //requried-jsfiles-for owl -->
      <div class="row">
        <div class="col-md-12">
          <div id="owl-demo2" class="owl-carousel">
              <?php if(isset($testimonials) && !empty($testimonials)):?>
                <?php foreach($testimonials as $testimonial):?>
                  <div class="item">
                    <div class="client-say-info">
                      <?php echo $testimonial['Testimonial']['comment'];?>
                      <h4 class="name center-align"><?php echo $testimonial['Testimonial']['fullname'];?></h4>
                      <div class="border"></div>
                    </div> 
                  </div>
                <?php endforeach;?>
              <?php endif;?>
          </div>
        </div>
      </div>
    </div>
  </div><!-- /client-say-->
</div><!--/content -->

<div id="addRoomModal" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title">Reservation</h4>
        </div>
      <div class="modal-body">
            <div class="contact-form">
              <form action="<?php echo $this->webroot;?>reservations" role="form" id="RoomAdminIndexForm" enctype="multipart/form-data" method="post" accept-charset="utf-8">

                <ul>
                  <div class="row">
                    <div class="col-md-6">
                      <li>
                        <label>Full Name(*)</label>
                        <input type="text" name="data[Reservation][fullname]" required/>
                      </li>
                    </div>
                    <div class="col-md-6">
                      <li>
                        <label>Address</label>
                        <input type="text" name="data[Reservation][address]"/>
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
                        <input type="email" name="data[Reservation][email]" required/>
                      </li>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <li>
                        <label>Country</label>
                          <select name="data[Reservation][country]">
                            <?php foreach ($countries as $country):?>
                                      <option><?php echo $country['Country']['name'];?></option>
                            <?php endforeach;?>
                          </select>
                      </li>
                    </div>
                    <div class="col-md-6">
                      <li>
                        <label>Room Type(*)</label>
                        <select name="data[Reservation][roomtype_id]" id="formRoomtype">
                          <?php foreach ($roomtypes as $roomtype):?>
                                          <option value="<?php echo $roomtype['Roomtype']['id'];?>"><?php echo $roomtype['Roomtype']['type'];?></option>
                                      <?php endforeach;?>                                 </select>
                      </li>
                    </div>
                  </div>
                  
                  <div class="row">
                    <div class="col-md-6">
                      <li>
                        <label>Check In(*)</label>
                        <!-- <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                          <input type="text"  name="data[Reservation][checkin]" id="formCheckin" class="" readonly="readonly"  placeholder="" required>
                          <span class="input-group-btn">
                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                          </span>
                        </div> -->
                      </li>
                    </div>
                    <div class="col-md-6">
                      <li>
                        <label>Check Out(*)</label>
                        <div class="input-group date date-picker" data-date-format="dd-mm-yyyy" data-date-start-date="+0d">
                          <input type="text"  name="data[Reservation][checkout]" id="formCheckout" class="" readonly="readonly"  placeholder="" required>
                          <span class="input-group-btn">
                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                          </span>
                        </div>
                      </li>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <li>
                        <label>Adults</label>
                        <input type="number" name="data[Reservation][adults]" id="formAdults" />
                      </li>
                    </div>
                    <div class="col-md-6">
                      <li>
                        <label>Children</label>
                        <input type="number" name="data[Reservation][children]" id="formChildren" />
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
      <!-- dialog buttons -->
      
    </div>
  </div>
</div>

<script type="text/javascript">
  $(function()
    {

      $(".checkAvailability").on('click', function(event)
                    {
                        var roomtype = $("#roomtype").val();
                        var checkin = $("#checkin").val();
                        var checkout = $("#checkout").val();
                        var adults = $("#adults").val();
                        var children = $("#children").val();

                        console.log(roomtype);
                        $("#formRoomtype").val(roomtype);
                        $("#formCheckin").val(checkin);
                        $("#formCheckout").val(checkout);
                        $("#formAdults").val(adults);
                        $("#formChildren").val(children);

                        $("#addRoomModal").modal("show");
                    });
    });
</script>