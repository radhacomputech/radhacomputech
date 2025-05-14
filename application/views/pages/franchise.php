
  <!-- Start main-content -->
  <div class="main-content">


    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Centers</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Franchises</a></li>
                <li class="active text-gray-silver">Franchises</li>
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
               <center> <a href="#" class="active" data-filter="*">List Of Frenchises</a></center>
			   </center>
			  
				<hr>
              </div>
			 
			  <form id='resVeriForm'>
			  <div class='row'>
                 				<div class='row'>
					
					<div class='col-lg-12'>
					<div class='table-responsive'>
							<table class='table table-bordered table-striped table-hover'>
								<thead>
									<tr>
										<th>Si. No.</th>
										<th>Center Code</th>
										<th>Center Name</th>
										<th>Name Of Direcotro</th>
										<th>Address</th>
										<th>Date Of  Agreemennt</th>
										
									</tr>
								</thead>
								<tbody>
					<?php 
					$i=1;
					$arr = "status='ACTIVE' or status='LOOUT'";
					$center_array = $this->Offer_model->getarray('center_details',$arr);
					foreach($center_array as $row)
					{
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo ucwords($row['center_code']);?></td>
						<td><?php echo ucwords($row['center_name']);?></td>
						<td><?php echo ucwords($row['center_director']);?></td>
						<td><?php echo ucwords($row['center_address']);?></td>
						<td><?php echo nice_date($row['center_dos'],'d-M-Y');?></td>
						
					</tr>
					<?php  $i++; }?>
								</tbody>
							</table>
						</div>
					</div>
                </div>
            </div>
				</div>
				<hr>
				
				<center><button class='btn btn-info btn-sn'>Read More &rarr;</button></center>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->
  <!-- Footer -->
  <script src='<?php echo base_url();?>assets/js/online.js'></script>