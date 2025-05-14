
  <!-- Start main-content -->
  <div class="main-content">


    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Student Verification</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Student Zone</a></li>
                <li><a href="#">Student Verification</a></li>
                
                <li class="active text-gray-silver">Student Verification</li>
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
               <center> <a href="#" class="active" data-filter="*">Online Result Verification</a></center>
			   </center>
			   <center>
                <p> Fill  Registration No. and Date Of Birth  and Click On Verify Now Button.</p>
				</center>
				<hr>
              </div>
			 
              <?php 
								
								if(isset($_POST['search']))
								{
									extract($_POST);
									$res = $this->Offer_model->getarray('student',"stu_roll='$student_roll' and stu_dob='$date_of_birth'  and status in('RESULT OUT','UPDATED')");
									
									if($res)
									{
                    $row = $res[0];
                 
								?>
									<div class='row'>
								<div class='col-lg-2'></div>
								<div class='col-lg-8'>
								<div class='table-responsive'>
									<center>
									<table class='table table-bordered'>
										<tr>
											<th>Registration No.</th>
											<td><?php echo $row['stu_roll']?></td>
											<td colspan='2' align='center' rowspan='3' style='width:115px'><img src='<?php echo base_url();?>uploads/<?php echo $row['student_photo'];?>' class='img-thumbnail' width='120px'></td>
										</tr>
										<tr>
											<th>Name Of Center</th>
											<td><?php echo $this->Offer_model->multitableinfo('center_details',"id=".$row['center_id'],"center_name");?></td>
											
										</tr>
										<tr>
											<th>Name</th>
											<td><?php echo $row['student_name'];?></td>
											
										</tr>
										<tr>
											<th>Father's Name</th>
											<td><?php echo $row['stu_father'];?></td>
											<th>Mother's Name</th>
											<td><?php //echo $row['stu_mother'];?></td>
										</tr>
										<!-- <tr>
											<th>Mother's Name</th>
											<td><?php echo $row['stu_mother'];?></td>
										<tr> -->
										<tr>
											<th>Date Of Birth</th>
											<td><?php echo nice_date($row['stu_dob'],'d-M-Y');?></td>
											<th>Gender</th>
											<td><?php echo $row['stu_gender'];?></td>
										</tr>
										<tr>
											<th>Email Id</th>
											<td><?php echo $row['stu_email'];?></td>
											<th>Mobile No.</th>
											<td><?php echo $row['stu_mobile'];?></td>
											
										<tr>
										</tr>
											<th>Address</th>
											<td><?php echo $row['stu_address'];?></td>
											<th>Course</th>
											<td><?php echo $stu_course = $this->Offer_model->multitableinfo('course_details',"id=".$row['stu_course'],"course_name");?></td>
											
										</tr>
                    </tr>
											<th>Grade</th>
											<td><?php echo $row['grade'];?></td>
											<th>Certificate No.</th>
											<td><?php echo $row['si_no'];?></td>
											
										</tr>
									</table><br>
									<a href='result_verification'><button class='btn btn-xs btn-primary'>Go Bck</button></a>
									</center>
								</div>
								</div>
								<?php 
									}
									else {
								
									echo "<i><h4 style='color:red' align='center' >No Record Found. Result Is Not Updated Or  Please Check Your Roll No. or Date Of Birth.</h4></i>";
									echo "<center><a href='result_verification'><button class='btn btn-xs btn-primary' style='margin-top:30px;' onClick='send' name='search' value='search'> Go Back</button></a></center>";

									}
								 } else { 
									?>
										<div class='row'>
									<form id='verifyForm' method='post' action=''>
								<div class='col-lg-3'>
								</div>
								<div class='col-lg-3'>
									<div class='form-grop'>
										<label>Enter Your Roll. No.* </label>
									<input type='number' name='student_roll' id='student_roll' class='form-control' placeholder='Enter You Reg. No.' required>
									</div>
								</div>
								<div class='col-lg-3'>
									<div class='form-grop'>
										<label>Date Of Birth * </label>
									<input type='date' name='date_of_birth' id='date_of_birth' class='form-control' required>
									</div>
								</div>
							
								<div class='col-lg-1'>
									<div class='form-grop' style='margin-top:10px'>
                
									<button class='btn btn-xs btn-primary' style='margin-top:30px;' onClick='send' name='search' value='search'> Submit</button>
									</div>
								</div>
								</form>
								 <?php }?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->
  <!-- Footer -->
  <script src='<?php echo base_url();?>assets/js/online.js'></script>
