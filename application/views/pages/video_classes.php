

                
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Student login</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                
                <li class="active text-gray-silver">Student Login</li>
              </ol>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Gallery Grid 3 -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <!-- Portfolio Filter -->
              <div class="portfolio-filter">
                
              </div>
              <center>
              <div class="" style='max-width:370px'>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a data-toggle="collapse"  href="#collapse1 " ><span class='text-primary' style='font-size:24px;font-weight:900'><u>Login Here</a></a>
                  </h4>
                </div>
                <div id="collapse1" class="panel-collapse collapse text-left">
                  <div class="panel-body bg-info">
                  <div id='loginBody'>
                  <form id='loginForm'>
                    <div class='form-group'>
                      <label>Enter Your Mobile No. *</label>
                      <input type='number' name='stu_mobile' class='form-control' id='stu_mobile' placeholder='10 Digit Mobile No.' required minlength='10' maxlength='10'>
                    </div>
                    <div class='form-group'>
                      <label>Enter Your Password *</label>
                      <input type='password' name='stu_pass' class='form-control' id='stu_pass' placeholder='Default Password is- 123.' required>
                    </div>
                    <?php ///echo md5('sonukr');?>
                    </form>
                    <button class='btn btn-block btn-primary' onClick='login(this)' data-name='student' data-ctrl='student_login' value='Login Now' data-frm='loginForm'>Login Now</button>
                    </div>
                    <div id='forgotBody' style='display:none'>
                    <form id='resetForm'>
                    <div class='form-group'>
                      <label>Enter Your Mobile No. *</label>
                      <input type='number' name='stu_mobile' class='form-control' id='stu_mobile' placeholder='10 Digit Mobile No.' required minlength='10' maxlength='10'>
                    </div>
                    </form>
                    <button class='btn btn-block btn-danger' onClick='resetPass(this)' value='Reset Now'>Reset Now</button>
                    
                    </div>
                    <br>
                    <div class='text-center' style='color:red; cursor:pointer'>
                      <span id='forgotSpan'>Forgot Password</span><br>
                      <span id='loginSpan' style='color:blue;display:none'>Back To Login</span>
                  </div>
                  </div>
                 
                  <!-- <div class="panel-footer bg-info">Panel Footer</div>
                </div> -->
              </div>
            </div>
            
            </center>
			  <div class='row'>
			 
              <!-- End Portfolio Filter -->

              <!-- Portfolio Gallery Grid -->
              
                <!-- Portfolio Item Start -->
				<?php 
					$image_array = $this->Offer_model->getarray('video',array('status'=>'ACTIVE','video_type'=>'Class'));
					foreach($image_array as $row)
					{
						$title = $row['video_title'];
					?>
					<div class='col-lg-3'>
					<?php 
					 $video_url = substr($row['video_url'],32);
					?>
					<!-- <iframe title="YouTube video player" class="youtube-player" type="text/html" 
width="100%" height="80" src="https://www.youtube.com/embed/<?php echo $video_url;?>"
frameborder="0" allowFullScreen></iframe> -->
						<center><h><?php //echo ucwords($title);?></h5></center>
                     </div>
					<?php }?>
               
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <!-- end main-content -->
  
  <!-- Footer -->