

                
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Study Material</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                
                <li class="active text-gray-silver">Study Material</li>
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
               <center> <a href="#" class="active" data-filter="*">Download Study Material Here</a></center>
                
              </div>
			  <div class='row'>
				<div class='table-responsive'>
					<table class='table table-stripped table-hover table-bordered'>
					<thead>
						<tr>
						<th>#</th>
						<th>Uploaded On</th>
						<th>Document Title</th>
						<!-- <th>Document Discription</th> -->
						<th>Download Link</th>
						</tr>
					</thead>
					<tbody>
				<?php 
				$i=1;
					$attachment_array = $this->Offer_model->getarray('attachment',array('status'=>'ACTIVE'));
					foreach($attachment_array as $row)
					{
						$title = $row['mat_title'];
					?>
          <tr>
					<td><?php echo $i;?></td>
					<td><?php echo nice_date($row['mat_date'],'d-M-Y');?></td>
					<td><?php echo $row['mat_title'];?></td>
					<!-- <td><?php echo $row['link_discription'];?></td> -->
					<td align='center'><a href='<?php echo  base_url();?>uploads/<?php echo $row['mat_url'];?>' download>Download</a></td></tr>
					<?php $i++;}?>
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
  