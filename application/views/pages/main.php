
  
  <!-- Start main-content -->
  <div class="main-content"> 
    <!-- Section: About -->
    <section class="">
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-8">
            
              <h2 class="text- font-weight-600 mt-0 font-28 line-bottom">Learn Free Computer Courses, With
Free Call Support.</h2>
             <p align='justify'><?php echo config_item('sc_name');?> is best insititute of Bihar and  registered by Ministry of Corporate Affairs, Government of India, and Authorized Center Of Digital Infocare Computer Centre,  CIN No-U47410BR2024PTC068696 " <?php echo config_item('sc_name');?>  is all about the freedom to explore our abilities from theoretical to experimental, to think differently and to be an individual. We bring creative and unconventional approaches to our teaching and courses which we provide for our student but everything we do is based on the highest academic standards of teaching and research so your degree will help you stand out from the crowd.....</p>
						<br>
              <a class="btn btn-theme-colored btn-flat btn-lg mt-10 mb-sm-30" href="#">Know
 More →</a>
            </div>
            <div class="col-md-4">
					<div class='panel panel-primary' style='height:320px'>
						<div class='panel-heading'>
							Notice Board
						</div>
						<div class='panel-body'>
							<marquee direction ='up' scrollamount='5' height='232px' width="270" onmouseover='this.stop()' onmouseout='this.start()'>
					<?php
						$notice_arr = $this->Offer_model->getarray('notice',array('status'=>'ACTIVE'));		
						  $i=1;
						  foreach($notice_arr as $row)
						{
					?>
						<a href="notice.php"><img src="<?php echo base_url().'web/images';?>/logo.png" align='left' style='width:50px;' ></a>
				
				<br>
				
					<h6><?php echo $i.'.'.'&nbsp; '; echo $row['notice_title']; ?> &nbsp; &nbsp;  <a  download href="<?php echo base_url().'uploads/'; echo $row['attachment'];?>"><?php echo $row['attachment']; ?> </a></h6>

				
				
			
		
				<?php $i++; }  ?>
			</marquee>
						</div>
						<!-- <button class='btn btn-sm btn-dark'>Show All</button>-->
					</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

   <!-- Section: blog -->
    <section id="blog" class="bg-lighter">
      <div class="container">
        <div class="section-title mb-10">
          <div class="row">
            <div class="col-md-10">
              <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Our Free Computer Courses <span class="text-theme-color-2 font-weight-400">& Get Certificate</span></h2>
		
           </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
              <article class="post clearfix mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <img src="<?php echo base_url();?>web/images/gallery/event.jpg" alt="" class="img-responsive img-fullwidth"> 
                  </div>
                </div>
                <div class="entry-content p-20 pr-10 bg-white">
                  <div class="entry-meta media mt-0 no-bg no-border">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600 border-bottom"><i class='fa fa-book'></i></li> 
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Diploma in Computer Application</a></h4>                   
                      </div>
                    </div>
                  </div>
                  <p class="mt-10">DCA stands for " Diploma in Computer Application". The DCA course contains the basic and foundation subjects related to computer science and computer applications. The main aim of the Diploma in Computer Application program is to prepare candidates in such a way that they can work in any office environment..</p>
                 <a class="btn btn-theme-colored btn-flat btn-lg mt-10 mb-sm-30" href="#">Get Admission →</a>
                  <div class="clearfix"></div>
                </div>
              </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">
              <article class="post clearfix mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <img src="<?php echo base_url();?>web/images/gallery/prize.jpg" alt="" class="img-responsive img-fullwidth"> 
                  </div>
                </div>
                <div class="entry-content p-20 pr-10 bg-white">
                  <div class="entry-meta media mt-0 no-bg no-border">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600 border-bottom"><i class='fa fa-book'></i></li>
                       
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Tally ERP With GST(Tally Prime)</a></h4>                   
                      </div>
                    </div>
                  </div>
                  <p class="mt-10">Tally ERP 9 is a most popular accounting software package used for recording day to day business data of a company. It is completely practice based job-oriented program targeted at providing all necessary Accounting and Tally. Latest version of the Tally ERP 9 is Tally Prime. Tally ERP 9 Software is one of the acclaimed financial accounting  </p>
                 <a class="btn btn-theme-colored btn-flat btn-lg mt-10 mb-sm-30" href="#">Get Admission →</a>
                  <div class="clearfix"></div>
                </div>
              </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">
              <article class="post clearfix">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <img src="<?php echo base_url();?>web/images/gallery/abc.jpg" alt="" class="img-responsive img-fullwidth"> 
                  </div>
                </div>
                <div class="entry-content p-20 pr-10 bg-white">
                  <div class="entry-meta media mt-0 no-bg no-border">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600 border-bottom"><i class='fa fa-book'></i></li>
                       
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Advance Diploma in Computer Application</a></h4>                    
                      </div>
                    </div>
                  </div>
                  <p class="mt-10">ADCA stands for "Advance Diploma in Computer Application". The course typically covers a wide range of topics, including computer hardware, DCA, Tally ERP 9, GST, Adv.Excel , Photoshop. The ADCA course includes both theoretical and practical sessions. We have successfully trained more than 8000+ students in classroom settings  </p>
                  <a class="btn btn-theme-colored btn-flat btn-lg mt-10 mb-sm-30" href="#">Get Admission →</a>
                  <div class="clearfix"></div>
                </div>
              </article>
              </div>
          </div>
        </div>
      </div>
    </section>
     </div>
   <section id="blog" class="bg-lighter">
      <div class="container">
        <div class="section-title mb-10">
          <div class="row">
            <div class="col-md-10">
              <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Our Vocational Course <span class="text-theme-color-2 font-weight-400"> & Get Certificate</span></h2>
			 
           </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.3s">
              <article class="post clearfix mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <img src="<?php echo base_url();?>web/images/gallery/beau.jpg" alt="" class="img-responsive img-fullwidth"> 
                  </div>
                </div>
                <div class="entry-content p-20 pr-10 bg-white">
                  <div class="entry-meta media mt-0 no-bg no-border">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600 border-bottom"><i class='fa fa-book'></i></li> 
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Diploma in Beautician Training</a></h4>                   
                      </div>
                    </div>
                  </div>
                  <p class="mt-10">Beautician course allows individuals to learn fundamentals and advanced practices related to beauty, make-up, and skincare. The syllabus of a beautician course generally includes major topics such as different types of makeup techniques, skin anatomy, skincare, hair styling and grooming, manicures, pedicures, waxing, and other beauty treatments.</p>
                  <a class="btn btn-theme-colored btn-flat btn-lg mt-10 mb-sm-30" href="#">Get Admission →</a>
                  <div class="clearfix"></div>
                </div>
              </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">
              <article class="post clearfix mb-sm-30">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <img src="<?php echo base_url();?>web/images/gallery/ctt.jpg" alt="" class="img-responsive img-fullwidth"> 
                  </div>
                </div>
                <div class="entry-content p-20 pr-10 bg-white">
                  <div class="entry-meta media mt-0 no-bg no-border">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600 border-bottom"><i class='fa fa-book'></i></li>
                       
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Diploma in Nursary Teacher Training</a></h4>                   
                      </div>
                    </div>
                  </div>
                  <p class="mt-10">The Diploma in Nursery Teacher Training (NTT) is a highly relevant course for those who want to pursue a career in early childhood education. This program provides a comprehensive foundation in understanding young children’s needs, development stages, and how to effectively support their growth. With the growing emphasis on early childhood education.</p>
                   <a class="btn btn-theme-colored btn-flat btn-lg mt-10 mb-sm-30" href="#">Get Admission →</a>
                  <div class="clearfix"></div>
                </div>
              </article>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-4 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.4s">
              <article class="post clearfix">
                <div class="entry-header">
                  <div class="post-thumb thumb"> 
                    <img src="<?php echo base_url();?>web/images/gallery/sew.jpg" alt="" class="img-responsive img-fullwidth"> 
                  </div>
                </div>
                <div class="entry-content p-20 pr-10 bg-white">
                  <div class="entry-meta media mt-0 no-bg no-border">
                    <div class="entry-date media-left text-center flip bg-theme-colored pt-5 pr-15 pb-5 pl-15">
                      <ul>
                        <li class="font-16 text-white font-weight-600 border-bottom"><i class='fa fa-book'></i></li>
                       
                      </ul>
                    </div>
                    <div class="media-body pl-15">
                      <div class="event-content pull-left flip">
                        <h4 class="entry-title text-white text-uppercase m-0 mt-5"><a href="#">Diploma in Cutting & Sewing  (Tailoring) </a></h4>                    
                      </div>
                    </div>
                  </div>
                  <p class="mt-10">Diploma in Cutting and Tailoring is a specialized program designed to teach individuals the skills required for cutting, designing, and sewing garments. This diploma focuses on practical training in garment construction, pattern making, fabric selection, and various tailoring techniques.Whether seeking employment in the fashion industry. </p>
                   <a class="btn btn-theme-colored btn-flat btn-lg mt-10 mb-sm-30" href="#">Get Admission →</a>
                  <div class="clearfix"></div>
                </div>
              </article>
              
              
              
              
              
              
              
            </div>
          </div>
        </div>
      </div>
      
      
      
      
      
      
    </section>
    
    
    
    
    
    
    
  </div>
   
   
   
   
   
   
   
   
   
   
   
   
   
     <!-- Section: team -->
    <section>
      <div class="container">
        <div class="section-title mb-10">
          <div class="row">
            <div class="col-md-8">
              <h2 class="mt-0 text-uppercase font-28 line-bottom line-height-1">Our <span class="text-theme-color-2 font-weight-400">Mission & Vision</span></h2>
           </div>
          </div>
        </div>
        <div class="section-content">
          <div class="row multi-row-clearfix">
            <div class="col-sm-6 col-md-6 sm-text-center mb-sm-30">
              <div class="team maxwidth400">
                <div class="thumb"><img  src="<?php echo base_url();?>web/images/gallery/mission.jpg" alt=""></div>
                <div class="content border-1px border-bottom-theme-color-2-2px p-15 bg-light clearfix">
                  
                  <p class="mb-20">Digital India is a flagship programme of the Government of India with a vision to transform India into a digitally empowered society and knowledge economy..</p>
                  
                 <!-- <a class="btn btn-theme-colored btn-sm pull-right flip" href="<?php echo base_url();?>web/page-teachers-details.html">view details</a>-->
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-md-6 sm-text-center mb-sm-30">
              <div class="team maxwidth400">
                <div class="thumb"><img src="<?php echo base_url();?>web/images/gallery/vision.jpg" alt=""></div>
                <div class="content border-1px border-bottom-theme-color-2-2px p-15 bg-light clearfix">
                  
                  <p class="mb-20">Our vision is to create intellectually, morally, spiritually sound and committee citizens who will become human resource of high caliber and obtain the necessary skills to be successful in the aspects of their lives.</p>
                
                  <!--<a class="btn btn-theme-colored btn-sm pull-right flip" href="<?php echo base_url();?>web/page-teachers-details.html">view details</a>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


    <!-- Divider: testimonials -->
    <section class="divider parallax layer-overlay overlay-theme-colored-9" data-background-ratio="0.5" data-bg-img="images/bg/bg2.jpg">
      <div class="container pb-50">
        <div class="section-title">
          <div class="row">
            <div class="col-md-6">
              <h5 class="font-weight-300 m-0 text-gray-lightgray"></h5>
              <h2 class="mt-0 mb-0 text-uppercase line-bottom text-white font-28">Empower <span class="font-30 text-theme-color-2">India</span></h2>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 mb-10">
            <div class="owl-carousel-2col boxed" data-dots="true">
              <div class="item">
                <div class="testimonial pt-10">
                  <div class="thumb pull-left mb-0 mr-0 pr-20">
                    <img width="75" class="img-circle" alt="" src="<?php echo base_url();?>web/images/testimonials/apj_abdul_klam.jpg">
                  </div>
                  <div class="ml-100 ">
                    <h4 class="text-white mt-0">"If you want to shine like a sun, First burn like a sun." </h4>
                    <p class="author mt-20">- <span class="text-theme-color-2">&rarr; </span> <small><em class="text-gray-lightgray">A.P.J. Abdul Klam Azad</em></small></p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial pt-10">
                  <div class="thumb pull-left mb-0 mr-0 pr-20">
                    <img width="75" class="img-circle" alt="" src="<?php echo base_url();?>web/images/testimonials/nelsonmondela.jpg">
                  </div>
                  <div class="ml-100 ">
                    <h4 class="text-white mt-0">"Educaton is the most powerful weapon to change the world."</h4>
                    <p class="author mt-20">- <span class="text-theme-color-2">&rarr; </span> <small><em class="text-gray-lightgray">Nelson Mandela</em></small></p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial pt-10">
                  <div class="thumb pull-left mb-0 mr-0 pr-20">
                    <img width="75" class="img-circle" alt="" src="<?php echo base_url();?>web/images/testimonials/einstien.jpg">
                  </div>
                  <div class="ml-100 ">
                    <h4 class="text-white mt-0">Education is not the learning of facts but the training of the mind to think.</h4>
                    <p class="author mt-20">- <span class="text-theme-color-2">&rarr; </span> <small><em class="text-gray-lightgray">Albert Einstin</em></small></p>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimonial pt-10">
                  <div class="thumb pull-left mb-0 mr-0 pr-20">
                    <img width="75" class="img-circle" alt="" src="<?php echo base_url();?>web/images/testimonials/mkgandhi.jpg">
                  </div>
                  <div class="ml-100 ">
                    <h4 class="text-white mt-0">If we want to reach real place in the world, we should start educating children.</h4>
                    <p class="author mt-20">- <span class="text-theme-color-2"></span> <small><em class="text-gray-lightgray">M. K. Gandhi</em></small></p>
                  </div>
                </div>
              </div>
            </div> 
          </div>
        </div>
      </div>
    </section>
    100% Free : Apply For Computer Institute Franchise | Free Computer Institute Franchise | Free Computer Center Franchise | Free Computer Education Franchise | Computer Institute Franchise Absolutely Free | Free Computer Education Franchise in Village Area | Best Computer Institute Franchise in India| “RGYCSM” Franchise | Free Franchise| 100% Free Franchise | Top Computer Institute Franchise | Topper Computer Institute Franchise | Free Computer Skill Training Franchise | Free Computer Institute in India | Best Computer Institute Franchise | Excellent Computer Institute Franchise| Free Computer Centre Franchise in India| Free Computer Education Institute Franchise in India| Free Computer Education Franchise in India|100% Free Computer Institute Franchise in India| Free Computer Centre Registration in India| Free Computer Education Centre Authorization in India| Free Computer Institute Franchise in India| Free Computer Franchise in India |Free Computer Education Franchise| Free Computer Education Organization in India| Govt Recognized Computer Institute franchise |Best Computer Institute Franchise in India| Franchise| Topper Computer Franchise in India| Free Computer Education Centre Franchise in India| Free Computer Institute Franchise All Over India| Free Computer Education Institute Franchise in India| Top Computer Institute Franchise in India| Computer Centre Franchise in India |Free Institute Franchise in India|

