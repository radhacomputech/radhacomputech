

              
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Facilitators</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <!-- <li><a href="#">Home</a></li> -->
                <li><a href="#">About</a></li>
                
                <li class="active text-gray-silver">Facilitators</li>
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
               <center> <a href="#" class="active" data-filter="*">List Of Employees/Social Workers/Volunteers</a></center>
                
              </div>
			
			   
                <div class="row">
				<div class='col-lg-12'>
				<div class='row'>
					<div class='col-lg-1'> &nbsp; </div>
					<div class='col-lg-10'>
					<br>
					<div class='table-responsive'>
					
							<!-- <center><h4><u>List Of Courses</u></h4></center> -->
							<table class='table table-bordered table-striped table-hover'>
								<thead>
									<tr style='background-color: #2a3e69;color: #fff;'>
										<th>S.No.</th>
										<th>Name</th>
										<th>Father's Name</th>
										<th>Date Of Joining</th>
										<th>Period Of Serving</th>
										<th>Designation</th>
										<!-- <th><center>Course Eligibility</center></th> -->
									</tr>
								</thead>
								<tbody>
					<?php 
					$i=1;
					$grant_array = $this->Offer_model->getarray('facilitators',array('status'=>'ACTIVE'));
					foreach($grant_array as $row)
					{
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo $row['facilitator_name'];?></td>
						<td><?php echo $row['father'];?></td>
						<td><?php echo nice_date($row['doj'],'d-M-Y');?></td>
						<td><?php echo $row['period'];?></td>
						<td><?php echo $row['designation'];?></td>
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
   