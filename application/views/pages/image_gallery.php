

                
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Gallery (Only Image)</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                
                <li class="active text-gray-silver">Image Gallery</li>
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
               <center> <a href="#" class="active" data-filter="*">All Images Of <?php echo config('sc_name');?></a></center>
                
              </div>
              <!-- End Portfolio Filter -->

              <!-- Portfolio Gallery Grid -->
              <div class="gallery-isotope grid-4 gutter-small clearfix" data-lightbox="gallery">
                <!-- Portfolio Item Start -->
				<?php 
					$image_array = $this->Offer_model->getarray('gallery',array('status'=>'ACTIVE'));
					foreach($image_array as $row)
					{
						$title = $row['image_title'];
					?>
					
					<?php 
					 $image_url =$row['image_url'];
					?>
                <div class="gallery-item design">
                  <div class="thumb">
                    <img class="img-fullwidth" src="<?php echo base_url();?>uploads/<?php echo $image_url;?>" alt="project" class='img-thumbnail' style='height:150px; border:solid 1px red'>
                    <div class="overlay-shade"></div>
                    <div class="text-holder">
                      <div class="title text-center"><?php echo $title;?></div>
                    </div>
                    <div class="icons-holder">
                      <div class="icons-holder-inner">
                        <div class="styled-icons icon-sm icon-dark icon-circled icon-theme-colored">
                          <a href="<?php echo base_url();?>uploads/<?php echo $image_url;?>" data-lightbox-gallery="gallery" title="Your Title Here"><i class="fa fa-picture-o"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
					<?php }?>
                <!-- Portfolio Item End -->
              </div>
              <!-- End Portfolio Gallery Grid -->

            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
  