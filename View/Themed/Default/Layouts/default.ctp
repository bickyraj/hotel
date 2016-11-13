
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

  <?php echo $this->Html->script('jquery.smartmenus.min'); ?>
<?php echo $this->Html->script('jquery.smartmenus.bootstrap.min'); ?>
<?php echo $this->Html->script('bootstrap.min'); ?>

<?php echo $this->Html->script('bootbox.min'); ?>
<?php echo $this->Html->script('bootbox'); ?>

<?php echo $this->Html->script('main'); ?>
<?php echo $this->Html->script('bootstrap-datepicker.min'); ?>
<?php echo $this->Html->script('metronic'); ?>
<?php echo $this->Html->script('components-pickers'); ?>
<?php echo $this->Html->script('../toastr/toastr');?>

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
<!-- /footer -->


</body>
<script>
        jQuery(document).ready(function() {       
           ComponentsPickers.init();
        });   
    </script>
</html>