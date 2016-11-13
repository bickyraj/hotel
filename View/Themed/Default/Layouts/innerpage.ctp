
<!DOCTYPE html>
<html>
<head>
<title>Neelaya inn Pvt. Ltd.</title>
<?php echo $this->Html->css('bootstrap'); ?>
<?php echo $this->Html->css('all'); ?>

<meta name="viewport" content="width=device-width, initial-scale=1">
<!--js--> 
<?php echo $this->Html->script('jquery.min'); ?>
<!--/js-->
<?php echo $this->Html->css('font-awesome.min'); ?>
<?php echo $this->Html->css('jquery.smartmenus.bootstrap'); ?>
<?php echo $this->Html->css('owl.carousel'); ?>

<?php echo $this->Html->script('owl.carousel'); ?>
<!-- Calender -->
<?php echo $this->Html->css('bootstrap-datepicker3.min'); ?>
<!--/calender -->
<?php echo $this->Html->css('../toastr/build/toastr');?>

<?php echo $this->Html->css('swipebox'); ?>

<?php echo $this->Html->script('jquery.swipebox.min'); ?>
<script type="text/javascript">
    jQuery(function($) {
      $(".swipebox").swipebox();
    });
  </script>
</head>
<body>
<!-- header -->
<header id="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-2 col-xs-12">
                <div class="logo"><a href="<?php echo $this->webroot;?>">
                  <?php echo $this->Html->image('logo.png',['alt'=>'Neelaya inn', 'class'=>'img-responsive']);?></a></div>
            </div>

            <div class="col-md-8 col-sm-10">
                <nav class="navbar navbar-default">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#main-navigation">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <?php echo $this->element('navigation',['cache'=>true]);?>
                </nav>
            </div>
        </div>
    </div>
</header><!-- /header -->

<?php echo $this->fetch('content');?>

<!-- footer -->
<?php echo $this->element('footer',['cache'=>true]);?>
</div><!-- /footer -->
<?php echo $this->Html->script('jquery.smartmenus.min'); ?>
<?php echo $this->Html->script('jquery.smartmenus.bootstrap.min'); ?>
<?php echo $this->Html->script('bootstrap.min'); ?>
<?php echo $this->Html->script('main'); ?>
<?php echo $this->Html->script('bootstrap-datepicker.min'); ?>
<?php echo $this->Html->script('metronic'); ?>
<?php echo $this->Html->script('components-pickers'); ?>
<?php echo $this->Html->script('../toastr/toastr');?>
<?php echo $this->Html->script('ui-general');?>

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
                        <div class="input-group date" id="reservCheckIn" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
                          <input type="text"  name="data[Reservation][checkin]" id="formCheckin" class="" readonly="readonly"  placeholder="" required>
                          <span class="input-group-btn"  style="text-align:center !important;">
                            <button class="btn default" type="button"><i class="fa fa-calendar"></i></button>
                          </span>
                        </div>
                      </li>
                    </div>
                    <div class="col-md-6">
                      <li>
                        <label>Check Out(*)</label>
                        <div class="input-group date" id="reservCheckOut" data-date-format="yyyy-mm-dd" data-date-start-date="+0d">
                          <input type="text"  name="data[Reservation][checkout]" id="formCheckout" class="" readonly="readonly"  placeholder="" required>
                          <span class="input-group-btn" style="text-align:center !important;">
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

      $("#reservCheckIn").datepicker({startDate:"+0d", autoclose:true});

      $("#reservCheckIn").datepicker().on('changeDate', function(event){

        var today = new Date($("#formCheckin").val());
        // alert(today);
        var d = new Date(today.getFullYear(), today.getMonth(), today.getDate());

          $("#reservCheckOut").datepicker('setStartDate',d);
    });

      $("#reservCheckOut").datepicker({autoclose:true});
        $(".checkAvailability").on('click', function(event)
                    {

                        $("#addRoomModal").modal("show");
                    });
    });
</script>
<script>
        jQuery(document).ready(function() {       
           ComponentsPickers.init();
           Metronic.init();
           UIGeneral.init();
        });   
    </script>
</body>


</html>


