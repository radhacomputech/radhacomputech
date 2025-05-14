  <!-- Start main-content -->
  <div class="main-content">


    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Online Admission</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Student Zone</a></li>
                
                <li class="active text-gray-silver">Online Admission</li>
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
            <div class="col-md-1"></div>
            <div class="col-md-10">
              <!-- Portfolio Filter -->
              <div class="portfolio-filter">
               <center> <a href="#" class="active" data-filter="*">Online Admission</a></center>
			   </center>
			   <center>
        
                <p>  All (*) marked fields are mandatory. Kindly fill the form carefully.</p>
				</center>
				<hr>
                <span id ='admMsg'></span>
              </div>
             
              <input type="hidden" id='id' value='<?php echo $insert_id;?>'>
			  <div class='row'>
				<form id='admForm'>
                 <div class='col-lg-4'> 
				  <div class='form-group'>
				  <label>Today's Date * </label>
				  <input type='date' name='stu_reg_date' id='stu_reg_date' value="<?php echo date('Y-m-d'); ?>" class='form-control form-control-sm' onChange='getReg()'  min="<?php echo date('Y-m-d'); ?>" max="<?php echo date('Y-m-d'); ?>" hidden>
				  </div>
				   <div class='form-group'>
				   <label>Student's Name * </label>
				  <input type='text' name='student_name' id='stu_name' value='' required  class='form-control form-control-sm'>
				  </div>
				  <div class='form-group'>
				   <label>Father's Name * </label>
				  <input type='text' name='stu_father' id='stu_father' value='' required class='form-control form-control-sm'>
				  </div>
				  <div class='form-group'>
				  <label>Date Of Birth * </label>
				  <input type='date' name='stu_dob' id='stu_dob' value="<?php //echo date('Y-m-d'); ?>" class='form-control form-control-sm' onChange='getReg()' required>
				  </div>
                </div>
				<div class='col-lg-4'>
				 <div class='form-group'>
				   <label>Student's Mobile No. * </label>
				  <input type='number' name='stu_mobile' id='stu_mobile' value='' required class='form-control form-control-sm' maxlength='10' minlength='10'>
				  </div>
				   <div class='form-group'>
				   <label>Student's Email </label>
				  <input type='text' name='stu_email' id='stu_email' value=''  class='form-control form-control-sm'>
				  </div>
				<div class='form-group'>
				   <label>Gender * </label>
				  <select name='stu_gender' id='stu_gender' class='form-control' required>
				  <option value=''>===Select One===</option>
				  <?php
				  $st_gender = dropdown('gender');
				  foreach($st_gender as $gen_value)
				  {
				  ?>
				  <option value='<?php echo $gen_value;?>'><?php echo $gen_value;?></option>
				  <?php }?>
				  </select>
				  </div>
				   <div class='form-group'>
				   <label>Religion * </label>
				  <select name='stu_religion' id='stu_religion' class='form-control' required>
				  <option value=''>===Select One===</option>
				  <?php
				  $st_rel = dropdown('religion');
				  foreach($st_rel as $rel_value)
				  {
				  ?>
				  <option value='<?php echo $rel_value;?>'><?php echo $rel_value;?></option>
				  <?php }?>
				  </select>
				  </div>
				
				 
				  <input type='hidden' name='stu_roll' id='stu_roll' value='' class='form-control form-control-sm' readonly>
				 
				
				  </div>
					<div class='col-lg-4'>
					 <div class='form-group'>
				   <label>Category * </label>
				  <select name='stu_category' id='stu_category' class='form-control' required>
				  <option value=''>===Select One===</option>
				  <?php
				  $st_cat = dropdown('category');
				  foreach($st_cat as $cat_value)
				  {
				  ?>
				  <option value='<?php echo $cat_value;?>'><?php echo $cat_value;?></option>
				  <?php }?>
				  </select>
				  </div>
				 <div class='form-group'>
				   <label>Address * </label>
				  <textarea name='stu_address'id='stu_address' class='form-control' required></textarea>
				  </div>
				  
				<div class='form-group'>
				   <label>Course * </label>
				  <select name='stu_course' id='stu_course' class='form-control' required>
				  <option value=''>===Select Course===</option>
				  <?php
				  $course_name = $this->Offer_model->table_dropdown('course_details','ACTIVE');
				  foreach($course_name as $course_value)
				  {
				  ?>
				  <option value='<?php echo $course_value->id;?>'><?php echo $course_value->course_name;?></option>
				  <?php }?>
				  </select>
				  </div>
				  <input type='hidden' name='status' value='UNPAID'>
				  <div class='form-group'>
				   <label>Student Image </label>
				  <input type='file'  name='student_photo' id='stu_image' value='' class='form-control form-control-sm'>
				  </div>
				  <span id='photo'></span>
                
					</div>
				</form>
			</div>
			
		
			<input type='checkbox' onChange='enableBtn(this)' value='#admBtn' title='check me to proceed further'>
		<td colspan='3'><b> Decleration </b> I hereby declared that I have submitted application form and all the informations are correct and true to the best of my knowledge and belief. In case of any descrepancy you are entitled to cancel my <strong>Registration</strong> at any time.
		<hr>
                   <center>
					<button class="btn btn-primary btn-sm" type="button" id='admBtn' onClick='extForm(this)' data-frm='#admForm' data-ctrl='online_admission' data-name='student' disabled value='Submit Now' href="https://payments.cashfree.com/forms/sikshavikash">Submit Now</button> &nbsp; &nbsp; &nbsp; 
                    <div class='row'>
                        <div class='col-lg-4'></div>
                         <div class='col-lg-6'>
						 
						</div>
                     </div>
                    </div>
				</div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->
  <!-- Footer -->
  

