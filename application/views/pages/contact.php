

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Contact Us</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                <!--<li><a href="#">Pages</a></li>-->
                <li class="active text-gray-silver">Contact Us</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Divider: Contact -->
    <section class="divider">
      <div class="container pt-0">
        <div class="row mb-60 bg-deep">
          <div class="col-sm-12 col-md-4">
            <div class="contact-info text-center pt-60 pb-60 border-right">
              <i class="fa fa-phone font-36 mb-10 text-theme-colored"></i>
              <h2>Call Us</h2>
              <h3 class="text-gray"><a href='callto:<?php echo config('sc_contact1');?>' ><?php echo config('sc_contact1');?></a></h3>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="contact-info text-center  pt-60 pb-60 border-right">
              <i class="fa fa-map-marker font-36 mb-10 text-theme-colored"></i>
              <h2>Address</h2>
              <h3 class="text-gray"><?php echo config('sc_address2');?>, <?php echo config('sc_district');?>,<br><?php echo config('sc_state');?> - <?php echo config('sc_pin');?></h3>
            </div>
          </div>
          <div class="col-sm-12 col-md-4">
            <div class="contact-info text-center  pt-60 pb-60">
              <i class="fa fa-envelope font-36 mb-10 text-theme-colored"></i>
              <h2>Email</h2>
              <h3 class="text-gray"><a href='mailto:<?php echo config('sc_email');?>' ><?php echo config('sc_email');?></a></h3>
            </div>
          </div>
        </div>
        <div class="row pt-10">
          <div class="col-md-5">
          <h4 class="mt-0 mb-30 line-bottom">Find On Google Map</h4>
          <!-- Google Map HTML Codes -->
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14372.361702251617!2d84.77090327106835!3d25.767576612277594!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3992baaf3f0ffa09%3A0xdd41da16486265a3!2sBara+Telpa%2C+Bada+Telpa%2C+Chhapra%2C+Bihar+841312!5e0!3m2!1sen!2sin!4v1525156427059" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen=""></iframe>
          <!-- Google Map Javascript Codes -->
          <script src="http://maps.google.com/maps/api/js"></script>
          <script src="js/google-map-init.js"></script>
          </div>
          <div class="col-md-7">
            <h4 class="mt-0 mb-30 line-bottom">Interested in discussing?</h4>
			<div class='text-danger'>
						<?php if (isset($success_message)) {
						echo ucwords($success_message);
						}
						?>
					</div>
					<?php if ($this->session->flashdata('success_message')) {
							?>
					<div class="alert alert-success" style='width:100%'>
					  <strong> <i class='fa fa-check-circle'></i> <?php 
					  echo ucwords($this->session->flashdata('success_message'));
					  $this->session->unset_userdata('success_message');
					  ?>
					  </strong>
					</div>
					<?php }?>
            <!-- Contact Form -->
            <?php echo form_open(base_url().'index.php/pages/enquiry');?>

              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_name">Name <small>*</small></label>
                    <?php echo form_input(array('name'=>'e_name','id'=>'e_name','class'=>'form-control form-control-sm','placeholder'=>'Your Full Name'),set_value('e_name'));
							 echo form_error('e_name');
						 ?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Email <small>*</small></label>
                   <?php 
							 echo form_input(array('name'=>'e_email','id'=>'e_email','class'=>'form-control form-control-sm','placeholder'=>'Your Email'),set_value('e_email'));
							 echo form_error('e_email');
						 ?>
                  </div>
                </div>
              </div>                
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_name">Purpose <small>*</small></label>
                    <?php 
							 echo form_input(array('name'=>'e_purpose','id'=>'e_purpose','class'=>'form-control form-control-sm','type'=>'text','placeholder'=>'Purpose Of Query'),set_value('e_purpose'));
							 echo form_error('e_purpose');
						 ?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label for="form_phone">Phone</label>
                    <?php echo form_input(array('name'=>'e_mobile','id'=>'e_mobile','class'=>'form-control form-control-sm','type'=>'number','maxlength'=>'10','minlength'=>'10','placeholder'=>'10 Digit Mobile No.'),set_value('e_mobile'));
							 echo form_error('e_mobile');
						 ?>
                  </div>
                </div>
              </div>

              <div class="form-group">
                <label for="form_name">Message</label>
                 <?php 
					 echo form_textarea(array('name'=>'e_message','id'=>'e_message','rows'=>'4','class'=>'form-control form-control-sm','placeholder'=>'Write Your Query Here ....'),set_value('e_message'));
					 echo form_error('e_message');
						?>
              </div>
              <div class="form-group">
			  <?php echo form_submit(array('id'=>'end_submit','value'=>'Send your message','class'=>'btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px'));
						echo form_close();
									?>
                
                <button type="reset" class="btn btn-flat btn-theme-colored text-uppercase mt-10 mb-sm-30 border-left-theme-color-2-4px">Reset</button>
              </div>
            </form>

            <!-- Contact Form Validation-->
            <script type="text/javascript">
              $("#contact_form").validate({
                submitHandler: function(form) {
                  var form_btn = $(form).find('button[type="submit"]');
                  var form_result_div = '#form-result';
                  $(form_result_div).remove();
                  form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                  var form_btn_old_msg = form_btn.html();
                  form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                  $(form).ajaxSubmit({
                    dataType:  'json',
                    success: function(data) {
                      if( data.status == 'true' ) {
                        $(form).find('.form-control').val('');
                      }
                      form_btn.prop('disabled', false).html(form_btn_old_msg);
                      $(form_result_div).html(data.message).fadeIn('slow');
                      setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                    }
                  });
                }
              });
            </script>
          </div>
        </div>
      </div>
    </section>
  </div>
  <!-- end main-content -->

        
          

            <!-- Quick Contact Form Validation-->
            <script type="text/javascript">
              $("#quick_contact_form2").validate({
                submitHandler: function(form) {
                  var form_btn = $(form).find('button[type="submit"]');
                  var form_result_div = '#form-result';
                  $(form_result_div).remove();
                  form_btn.before('<div id="form-result" class="alert alert-success" role="alert" style="display: none;"></div>');
                  var form_btn_old_msg = form_btn.html();
                  form_btn.html(form_btn.prop('disabled', true).data("loading-text"));
                  $(form).ajaxSubmit({
                    dataType:  'json',
                    success: function(data) {
                      if( data.status == 'true' ) {
                        $(form).find('.form-control').val('');
                      }
                      form_btn.prop('disabled', false).html(form_btn_old_msg);
                      $(form_result_div).html(data.message).fadeIn('slow');
                      setTimeout(function(){ $(form_result_div).fadeOut('slow') }, 6000);
                    }
                  });
                }
              });
            </script>
          </div>
        </div>
      </div>
   
    