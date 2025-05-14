 <!-- Footer -->
  <footer id="footer" class="footer divider layer-overlay overlay-dark-9" data-bg-img="images/bg/bg2.jpg">
    <div class="container" style='color:#cac6c6'>
      <div class="row border-bottom">
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
		  <h4 class="widget-title"><?php echo config_item('sc_name');?></h4>
            <img class="mt-5 mb-20" alt="" src="<?php echo base_url();?>web/images/foot_logo.png">
            
			<p align='justify'> is best insititute of Bihar and registered by Ministry of Corporate Affairs, Government of India, and Authorized Center Of Digital Infocare Computer Centre, CIN No-U47410BR2024PTC068696</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h4 class="widget-title">Useful Links</h4>
            <ul class="list angle-double-right list-border">
              <li><a href="<?php echo base_url();?>">Home</a></li>
              <li><a href="<?php echo base_url();?>about_us">About Us</a></li>
              <li><a href="<?php echo base_url();?>franchise">Franchise</a></li>
              <li><a href="<?php echo base_url();?>image_gallery">Gallery</a></li>
              <li><a href="<?php echo base_url();?>grant">Grants</a></li>
              <li><a href="<?php echo base_url();?>contact_us">Contact Us</a></li>              
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h4 class="widget-title">Connect With Us</h4>
            <ul class="list angle-double-right list-border">
              <li><a href="callto:<?php echo config_item('sc_contact1');?>"><i class="fa fa-phone text-theme-color-2 mr-5"> </i> <?php echo config_item('sc_contact1');?>   </a></li>
              <li><a href="mailto:<?php echo config_item('sc_email');?>"><i class="fa fa-envelope text-theme-color-2 mr-5"> </i> <?php echo config_item('sc_email');?>   </a></li>
              <li><a href="<?php echo base_url();?>"><i class="fa fa-globe text-theme-color-2 mr-5"> </i> <?php echo config_item('sc_url');?>   </a></li>
              <li><a href="#"><i class="fa fa-facebook text-theme-color-2 mr-5"> </i> Facebook </a></li>
              <li><a href="#"><i class="fa fa-twitter text-theme-color-2 mr-5"> </i> Twitter </a></li>
              <li><a href="#"><i class="fa fa-youtube text-theme-color-2 mr-5"> </i> Youtube </a></li>
                            
            </ul>
          </div>
        </div>
        <div class="col-sm-6 col-md-3">
          <div class="widget dark">
            <h4 class="widget-title line-bottom-theme-colored-2">Opening Hours</h4>
            <div class="opening-hours">
              <ul class="list-border">
                <li class="clearfix"> <span> Monday :  </span>
                  <div class="value pull-right"> 6:00 am - 7:00 pm </div>
                </li>
				<li class="clearfix"> <span> Tuesday :  </span>
                  <div class="value pull-right"> 6:00 am - 7:00 pm </div>
                </li>
                <li class="clearfix"> <span> Wednesday :  </span>
                  <div class="value pull-right"> 6:00 am - 7:00 pm </div>
                </li>
                <li class="clearfix"> <span> Thursday :  </span>
                  <div class="value pull-right"> 6:00 am - 7:00 pm </div>
                </li>
				<li class="clearfix"> <span> Friday :  </span>
                  <div class="value pull-right"> 6:00 am - 7:00 pm </div>
                </li>
				<li class="clearfix"> <span> Saturday :  </span>
                  <div class="value pull-right"> 6:00 am - 7:00 pm </div>
                </li>
                <li class="clearfix"> <span> Sunday : </span>
                  <div class="value pull-right"> 8:00 am - 12:00 AM </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer-bottom bg-black-333">
      <div class="container pt-20 pb-20">
        <div class="row">
          <div class="col-md-6">
            <p style='color:#cac6c6;' class="font-11 text-black-777 m-0">Copyright &copy;2024-2025 <?php echo config_item('sc_name');?>. All Rights Reserved</p>
          </div>
          <div class="col-md-6 text-right">
            <div class="widget no-border m-0">
              <ul class="list-inline sm-text-center mt-5 font-12">
                <li>
                  <a href="#">Website Develope By :-</a>
                </li>
                
                <li>
                  <a href="https://Aikaaa.com"target='_blank'>Aikaaa</a>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  
  <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
</div>
<!-- end wrapper -->
<input type='hidden' id='base_url' value='<?php echo base_url();?>index.php/admin/'>
<!-- Footer Scripts -->
<!-- JS | Custom script for all pages -->
<script>
    $(function(){
 
	$("input[type='text']").keyup(function()
	{
		var yourInput = $(this).val();
		re = /[`~!#$%^&*()|+\=?;:'"<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(yourInput);
		if(isSplChar)
		{
			var no_spl_char = yourInput.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
		}
	});
 
});
</script>
<!--notification js -->
<script src="assets/plugins/notifications/js/lobibox.min.js"></script>
<script src="assets/plugins/notifications/js/notifications.min.js"></script>
<script src="assets/plugins/notifications/js/notification-custom-script.js"></script>
<script src="<?php echo base_url();?>assets/js/jquery.validate.min.js"></script>
<script src="<?php echo base_url();?>assets/js/system.js"></script>
<script src="<?php echo base_url();?>assets/js/bootbox.min.js"></script>
<script src="<?php echo base_url();?>web/js/event.js"></script>
<script src="<?php echo base_url();?>web/js/custom.js"></script>

</body>
</html>