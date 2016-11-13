
<!-- footer -->
<div class="section footer">
  <!-- container -->
  <div class="container">
    <!-- row -->
    <div class="row">
      <!-- col-md-3 -->
      <div class="col-md-3 col-xs-6">
        <h4 class="footer-heading">Facebook Fans</h4>

        <!-- Facebook like button -->
<div id="fb-root"></div>
<script>
(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.0";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));   
</script>
        
        <!-- Load Facebook SDK for JavaScript -->

    <div class="fb-like" style="background-color:white; padding:5px;" data-href="https://www.facebook.com/The-Neelaya-Inn-841485775939971" data-layout="standard" data-action="like" data-show-faces="true" data-width="250" data-share="true"></div>
      </div>
      <!-- End col-md-3 -->

      <div class="col-md-4 col-xs-6">
        <div class="footer-contact-us">
          <h4 class="footer-heading uppercase">Stay Connected with us</h4>
          <ul class="btm-social">
            <li><a href="https://www.facebook.com/The-Neelaya-Inn-841485775939971"><i class="facebook"></i></a></li>
            <li><a href="#"><i class="twitter"></i></a></li>
            <li><a href="#"><i class="instagram"></i></a></li>
            <li><a href="#"><i class="google-plus"></i></a></li>
          </ul>
        </div>
      </div>

      <div class="col-md-5 col-xs-6">
        <div class="footer-contact-us">
          <h4 class="footer-heading uppercase">Contact Us</h4>
          <ul class="footer-contact-info">
            <?php if(!empty($contact)):?>
              <li><i class="location"></i><?php echo $contact['Contact']['address'];?></li>
              <li><i class="phone-icon"></i><?php echo $contact['Contact']['phone'];?></li>
              <li><i class="email-icon"></i><?php echo $contact['Contact']['email'];?></li>
              <li><i class="web"></i><?php echo $contact['Contact']['website'];?></li>
            <?php endif;?>
          </ul>
        </div>
      </div><!-- End col-md-3 -->

    </div><!-- End row -->
  </div><!-- container -->
</div><!-- /footer -->