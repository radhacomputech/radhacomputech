

                
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Document Gallery</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                
                <li class="active text-gray-silver">Document Gallery</li>
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
               <center> <a href="#" class="active" data-filter="*">Documents Of <?php echo config('sc_name');?></a></center>
                
              </div>
			  <div class='row'>
			 <div class='table-responsive'>
							<table class='table table-bordered table-striped table-hover'>
								<thead>
									<tr>
										<th>S.No.</th>
										<th>Document Title</th>
										<th>Date Of Uploading</th>
										<th>Remarks</th>
										<th><center>Download Link</center></th>
									</tr>
								</thead>
								<tbody>
					<?php 
					$i=1;
					$document_array = $this->Offer_model->getarray('gallery',array('status'=>'ACTIVE','file_type'=>'Download'));
					foreach($document_array as $row)
					{
					?>
					<tr>
						<td><?php echo $i;?></td>
						<td><?php echo ucwords($row['image_title']);?></td>
						
						<td><?php echo nice_date($row['image_date'],'d-M-Y');?></td>
						<td><?php echo $row['gallery_content'];?></td>
					
						<td align='center'><a  download href="<?php echo base_url().'gallery/'.$row['image_url'];?>" style='height:40px'>Download</a></td>
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
 