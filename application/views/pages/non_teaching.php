

                <?php $this->load->view('pages/header');?>
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Non Teaching Members</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                
                <li class="active text-gray-silver">Non Teaching Members</li>
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
               <center> <a href="#" class="active" data-filter="*">Non Teaching Members Of <?php echo config('sc_name');?></a></center>
                
              </div>
			  <div class='row'>
			 <div class='table-responsive'>
							<table class='table table-bordered table-striped table-hover'>
								<thead>
									<tr>
										<th>Si. No.</th>
										<th>Staff's Name</th>
										<th>Date Of Birth</th>
										<th>Date Of Appointment</th>
										<th>Designation</th>
										<th>Subject</th>
										<th><center>Photo</center></th>
									</tr>
								</thead>
								<tbody>
					<?php 
					$i=1;
					$staff_array = $this->Admin_model->getarray('staff_details',array('status'=>'ACTIVE','staff_type'=>'Non Teaching'));
					foreach($staff_array as $row)
					{
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo ucwords($row['staff_name']);?></td>
						<td><?php echo nice_date($row['staff_dob'],'d-M-Y');?></td>
						<td><?php echo nice_date($row['staff_doj'],'d-M-Y');?></td>
						<td><?php echo ucwords($row['staff_desig']);?></td>
						<td><?php echo ucwords($row['staff_subject']);?></td>
						<td align='center'><img src="<?php echo base_url().'uploads/'.$row['staff_photo'];?>" "this.onerror=null;this.src='<?php echo base_url();?>uploads/no_image.jpg';" style='height:40px'></td>
					</tr>
					<?php  $i++; }?>
								</tbody>
							</table>
						</div>
             
               
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
    <?php $this->load->view('pages/footer');?>