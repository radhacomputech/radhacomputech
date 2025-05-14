
<?php 
if(!$this->session->userdata('student_token'))
{
  redirect(site_url().'video_classes');
  exit(0);
}
  $token = $this->session->userdata('student_token');
  $login_id = $token['student_id'];
  $login_api = $this->Offer_model->multitableinfo('student',"id='$login_id'",'stu_api');
  $strtoken = session_id().$login_id; //.date('ymdhis');
  $student_name = $this->Offer_model->multitableinfo('student',"id='$login_id'",'student_name');
  $course_id = $this->Offer_model->multitableinfo('student',"id='$login_id'",'stu_course');
  $course_name = $this->Offer_model->multitableinfo('course_details',"id='$course_id'",'course_name');

if($login_api<>$strtoken)
{
 redirect(site_url().'video_classes');
 exit(0);
}

?>

                
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Gallery Grid 3 -->
    <section>
      <div class="container">
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <!-- Portfolio Filter -->
              <div class="portfolio-filter">
                <i class='fa fa-user-circle-o fa-1.5x' title='Logout'  onClick='logOut(this)' style='float:right;cursor:pointer'>logout</i> 
                <center>
                    <h4>Welcome, </h4> <h3><b><?php echo $student_name;?></b></h3>
                                  
                 
                </div>
                 
                  </div>
              </div>
             </center> 
              <div class='row'>
             <center>
              <a href="" class="btn btn-primary">Online  Examination</a>   
              <a href="https://payments.cashfree.com/forms/sikshavikash" class="btn btn-primary">Apply  For Certificate</a>
              <a href="view_cer" class="btn btn-primary">Download Certificate</a>   
              <a href="view_marks" class="btn btn-primary">Download Markssheet</a>
              </center>
              </div>
			  <div class='row'><br>
			     
			              <!-- End Portfolio Filter -->

              <!-- Portfolio Gallery Grid -->
              
                <!-- Portfolio Item Start -->
				<?php 
					$image_array = $this->Offer_model->get_like('video',array('status'=>'ACTIVE','video_type'=>'Class'),'topics',$course_name);
				// 	$image_array = $this->Offer_model->getarray('video',array('status'=>'ACTIVE','video_type'=>'Class'));
					foreach($image_array as $row)
					{
                    $title = $row->video_title;
                    $topics = explode(",",$row->topics);
                    $resp  = in_array($course_name,$topics);
                      if($resp)
                      {
                      ?>
					<div class='col-lg-3'>
					<?php 
					 $video_url = substr($row->video_url,32);
					?>
					<iframe title="YouTube video player" class="youtube-player" type="text/html" 
width="100%" height="80" src="https://www.youtube.com/embed/<?php echo $video_url;?>"
frameborder="0" allowFullScreen></iframe>
						<center><h><?php echo ucwords($title);?></h5></center>
                     </div>
					<?php }}?>
               
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
