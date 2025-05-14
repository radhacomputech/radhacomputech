

              
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Courses</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                
                <li class="active text-gray-silver">Courses</li>
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
               <center> <a href="#" class="active" data-filter="*">View Course Of <?php echo config('sc_name');?></a></center>
                
              </div>
			 <!--  <div class='row'>
				<form action="" method='post'>
				<div class='col-lg-4'></div>
				<div class='col-lg-4'>
				<select name='c_cat' class='form-control' required>
				<option value=''>Select Course Category</option>
				<?php
				  $course_cat = dropdown('course_category');
				  foreach($course_cat as $cat)
				  {
				  ?>
				  <option value='<?php echo $cat; ?>'><?php echo $cat;?></option>
				  <?php }?>
				</select>
				</div>
			   <div class='col-lg-4'>
			   <button class='btn btn-sm btn-primary'>Show List</button>
			   </div>
			   </form>
			   </div> -->
			   
                <div class="row">
				<div class='col-lg-12'>
				<div class='row'>
					<div class='col-lg-1'> &nbsp; </div>
					<div class='col-lg-10'>
					<br>
					<div class='table-responsive'>
					
							<center><h4><u>List Of Courses</u></h4></center>
							<table class='table table-bordered table-striped table-hover'>
								<thead>
									<tr style='background-color: #2a3e69;color: #fff;'>
										<th>S.No.</th>
										<th>Course Name</th>
										<th>Course Duration</th>
											<th>Admission Link</th>
										<!-- <th><center>Course Eligibility</center></th> -->
									</tr>
								</thead>
								<tbody>
					<?php 
					$i=1;
					$grant_array = $this->Offer_model->getarray('course_details',array('status'=>'ACTIVE'));
					foreach($grant_array as $row)
					{
						$course_name = $row['course_name'];
						$course_duration = $row['course_duration'];
						//$course_eligibility = $row['course_eligibility'];
						
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo ucwords($course_name);?></td>
						<td><?php echo ucwords($course_duration);?></td>
						<td><a href="/online_admission"><font color="green"><U><b>Click For Admission </b></U></font></a></td>
						<!-- <td><?php echo ucwords($course_eligibility);?></td> -->
					</tr>
					<?php  $i++; }?>
								</tbody>
							</table>
						</div>
				</div>
				</div>
				</div>
				</div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
   