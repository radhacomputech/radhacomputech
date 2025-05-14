

                
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Examination Schedule</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                
                <li class="active text-gray-silver">Examination Schedule</li>
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
               <center> <a href="#" class="active" data-filter="*">Examination Schedule<?php echo config('sc_name');?></a></center>
                
              </div>
			  <div class='row'>
			 <div class='table-responsive'>
							<table class='table table-bordered table-striped table-hover'>
								<thead>
									<tr>
										<th>Si. No.</th>
										<th>Examination Name/ Description</th>
										<th><center>Download Link</center></th>
									</tr>
								</thead>
								<tbody>
					<?php 
					$i=1;
					$exam_array = $this->Offer_model->getarray('staff_details',array('status'=>'ACTIVE','staff_type'=>'Teaching'));
					foreach($exam_array as $row)
					{
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo ucwords($row['staff_name']);?></td>
						<td align='center'><a download href="<?php echo base_url().'uploads/'.$row['staff_photo'];?>" >Download</td>
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
 