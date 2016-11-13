
<!-- content -->
<div class="content">
	<!-- about us -->
	<div class="section about-us">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h2 class="center-align heading uppercase"><?php echo $roomtype['Roomtype']['type'];?></h2>
				</div><!--/col-md-12 -->
			</div><!--/row -->
			<div class="row">
				<div class="col-md-9">
					<div class="slider-div">
						<div class="price-tag"><p> <?php echo $roomtype['Roomtype']['price'];?></p></div>
						<script>
							$(document).ready(function() {
 
  var sync1 = $("#sync1");
  var sync2 = $("#sync2");
 
  sync1.owlCarousel({
    singleItem : true,
    slideSpeed : 1000,
    navigation: true,
    pagination:false,
    autoPlay : true,
    afterAction : syncPosition,
    responsiveRefreshRate : 200,
  });
 
  sync2.owlCarousel({
    items : 15,
    autoPlay : true,
    itemsDesktop      : [1199,10],
    itemsDesktopSmall     : [979,10],
    itemsTablet       : [768,8],
    itemsMobile       : [479,4],
    pagination:false,
    responsiveRefreshRate : 100,
    afterInit : function(el){
      el.find(".owl-item").eq(0).addClass("synced");
    }
  });
 
  function syncPosition(el){
    var current = this.currentItem;
    $("#sync2")
      .find(".owl-item")
      .removeClass("synced")
      .eq(current)
      .addClass("synced")
    if($("#sync2").data("owlCarousel") !== undefined){
      center(current)
    }
  }
 
  $("#sync2").on("click", ".owl-item", function(e){
    e.preventDefault();
    var number = $(this).data("owlItem");
    sync1.trigger("owl.goTo",number);
  });
 
  function center(number){
    var sync2visible = sync2.data("owlCarousel").owl.visibleItems;
    var num = number;
    var found = false;
    for(var i in sync2visible){
      if(num === sync2visible[i]){
        var found = true;
      }
    }
 
    if(found===false){
      if(num>sync2visible[sync2visible.length-1]){
        sync2.trigger("owl.goTo", num - sync2visible.length+2)
      }else{
        if(num - 1 === -1){
          num = 0;
        }
        sync2.trigger("owl.goTo", num);
      }
    } else if(num === sync2visible[sync2visible.length-1]){
      sync2.trigger("owl.goTo", sync2visible[1])
    } else if(num === sync2visible[0]){
      sync2.trigger("owl.goTo", num-1)
    }
    
  }
 
});
						</script>
							<!-- //requried-jsfiles-for owl -->
						<div id="sync1" class="owl-carousel">
							<?php foreach ($roomtype['Roomslider'] as $slider):?>
								<div class="item">
									<?php echo $this->Html->image('../webroot/files/roomslider/image/'.$slider['image_dir'].'/'.$slider['image'],['alt'=>'gear_img', 'width'=>'200']);?>
								</div>
							<?php endforeach;?>
						</div>
						<div id="sync2" class="owl-carousel">
							<?php foreach ($roomtype['Roomslider'] as $slider):?>
								<div class="item">
									<?php echo $this->Html->image('../webroot/files/roomslider/image/'.$slider['image_dir'].'/'.$slider['image'],['alt'=>'gear_img']);?>
								</div>
							<?php endforeach;?>
						</div>
					</div>
					<div class="description">
						<?php echo $roomtype['Roomtype']['content'];?>
					</div>
				</div>

				<div class="col-md-3">
					<div class="feature">
						<h3 class="sub-heading uppercase"> <?php echo $roomtype['Roomtype']['type'];?> Features</h3>
						<ul>
							<?php foreach($roomfeatures as $roomfeature):?>
								<li><?php echo $roomfeature['Roomfeature']['features'];?></li>
							<?php endforeach;?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
	<!--/about us -->
</div><!--/content -->