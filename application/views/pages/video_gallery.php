

                
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Video Gallery</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                
                <li class="active text-gray-silver">Video Gallery</li>
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
               <center> <a href="#" class="active" data-filter="*">All Videos Of <?php echo config('sc_name');?></a></center>
                
              </div>
			  <div class='row'>
			 
              <!-- End Portfolio Filter -->

              <!-- Portfolio Gallery Grid -->
              
                <!-- Portfolio Item Start -->
				<?php 
					$image_array = $this->Offer_model->getarray('video',"status='ACTIVE' and video_type not in('Class')");
				
					foreach($image_array as $row)
					{
						 $title = $row['video_title'];
					?>
					<div class='col-lg-3'>
					<?php 
					 $video_url = substr($row['video_url'],32);
					?>
					<iframe title="YouTube video player" class="youtube-player" type="text/html" 
width="100%" height="80" src="https://www.youtube.com/embed/<?php echo $video_url;?>"
frameborder="0" allowFullScreen></iframe>
						<center><h><?php echo ucwords($title);?></h5></center>
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
