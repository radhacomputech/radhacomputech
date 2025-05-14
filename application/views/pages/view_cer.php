
  <!-- Start main-content -->
  <div class="main-content">


    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Download Certificate</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Student Zone</a></li>
                <li><a href="#">Download Certificate</a></li>
                
                <li class="active text-gray-silver">Download Certificate</li>
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
               <center> <a href="#" class="active" data-filter="*">Download Certificate</a></center>
			   </center>
			   <center>
                <p> Fill  Registration No. and Date Of Birth  to Download Certificate.</p>
				</center>
				<hr>
              </div>
			 
              <?php 
								
								if(isset($_POST['search']))
								{
									extract($_POST);
									$res = $this->Offer_model->getarray('student',"stu_roll='$student_roll' and stu_dob='$date_of_birth'  and status in('RESULT OUT','UPDATED')");
									
									if($res)
									{
                    $row = $res[0];
                 
								?>
									<div class='row'>
								<div class='col-lg-300'></div>
								<div class='col-lg-300'>
								<div class='file-responsive'  width: 55%;>
								     
										<button onClick="window.print()">Print this page</button>`
									<center>
									
									
									
									<table><td>
									
									  <table background="assets/images/certificate.bmp" cellpadding='5px' cellspacing='1px' border='0' width='1100px' height='778px' color="yellow" >
			<tr>
			   <td>
			       
			   </td>
			</tr>
			<tr>
		    <td>
		        
		    </td>
		</tr>
		<tr>
		    <td>
		        
		    </td>
		</tr>
		<tr>
		    <td>
		        
		    </td>
		</tr>
			
			<tr>
		    <td>
		        
		    </td>
		<tr>
		    <td>
		        
		    </td>
		</tr>	<tr>
		    <td>
		        
		    </td>
		</tr>
		<tr>
		    <td>
		        
		    </td>
		</tr>
			<tr>
		    <td>
		        
		    </td>
		</tr>
		<tr>
		    <td>
		        
		    </td>
		</tr>
		<tr>
		    <td>
		        
		    </td>
		</tr>
		
		<tr>
		    <td>
		        
		    </td>
		</tr>	
		<tr>
		    <td>
		        
		    </td>
		</tr>
		
		<tr>
		    <td>
		        
		    </td>
		</tr>
		<tr>
		    <td>
		        
		    </td>
		</tr>
		<tr>
		    <td>
		        
		    </td>
		</tr>
		
			
		    
		</tr>	<tr>
		    <td>
		        
		    </td>
		</tr>	
		<tr>
		    <td align="center">SL. NO. : <b><u><?php echo $row['si_no'];?></b></u><font color="white">.........................................................................................</font>REG. NO : <b><u><?php echo $row['stu_roll']?></u></b>
		    </td>
		</tr>
		<tr>
		    <td>
		        
		    </td>
		</tr>
		<tr>
		    <td>
		        
		    </td>
		</tr>
	
	<tr>
		    <td>
		        
		    </td>
		</tr>
		<tr>
		   <td align="center">This is to Certify that mr/mrs/smt : <b><u><?php echo $row['student_name'];?></u></b></td>
		</tr>	<tr>
		   <td align="center">S/o, W/o, D/o : <b> <u><?php echo $row['stu_father'];?></u></b>, D.O.B :<b><u><?php echo nice_date($row['stu_dob'],'d-M-Y');?></u></b>
		</tr>		<tr>
		    <td align="center">has successfully completed the course of : <b><u> <?php echo $stu_course = $this->Offer_model->multitableinfo('course_details',"id=".$row['stu_course'],"course_name");?></u></b></td>
		</tr>		<tr>
		    <td align="center">
		        At: <b><u><?php echo $this->Offer_model->multitableinfo('center_details',"id=".$row['center_id'],"center_name");?></u></b> of Duration : <b><u>000000000</u></b>,</u></b>
		    </td>
		</tr>	<tr>
		    <td align="center">
		         and has secured : <b><u> "<?php echo $row['grade'];?>"</b></u>,   Issued Date : <b><u><?php echo $row['grade'];?></u></b> 
		    </td>
		</tr>	<tr>
		    <td align="center">
		       
		    </td>
		</tr>	
		</tr>
		
			
			
		
		<tr>
		  
		      <td align="center"><img src='<?php echo base_url();?>uploads/<?php echo $row['student_photo'];?>' height='100px' width='90px' onerror="this.onerror=null;this.src='<?php echo base_url();?>uploads/no_image.jpg';" >
		    </td>
		</tr>
		
		
		
		
		
			<tr>
		    <td>
		        
		    </td>
		</tr>
		
		<tr>
		    <td>
		        
		    </td>
		</tr>
		
				</table>
				</td></table>
									  
							
									  
									  
									  
									<br>
								
									</center>
								</div>
								</div>
								<?php 
									}
									else {
								
									echo "<i><h4 style='color:red' align='center' >No Record Found. Result Is Not Updated Or  Please Check Your Roll No. or Date Of Birth.</h4></i>";
									echo "<center><a href='result_verification'><button class='btn btn-xs btn-primary' style='margin-top:30px;' onClick='send' name='search' value='search'> Go Back</button></a></center>";

									}
								 } else { 
									?>
										<div class='row'>
									<form id='verifyForm' method='post' action=''>
								<div class='col-lg-3'>
								</div>
								<div class='col-lg-3'>
									<div class='form-grop'>
										<label>Enter Your Roll. No.* </label>
									<input type='number' name='student_roll' id='student_roll' class='form-control' placeholder='Enter You Reg. No.' required>
									</div>
								</div>
								<div class='col-lg-3'>
									<div class='form-grop'>
										<label>Date Of Birth * </label>
									<input type='date' name='date_of_birth' id='date_of_birth' class='form-control' required>
									</div>
								</div>
							
								<div class='col-lg-1'>
									<div class='form-grop' style='margin-top:10px'>
                
									<button class='btn btn-xs btn-primary' style='margin-top:30px;' onClick='send' name='search' value='search' target="_blank"> Download</button>
									
									</div>
								</div>
								</form>
								 <?php }?>
            </div>
          </div>
        </div>
      </div>
    </section>
  <!-- end main-content -->
  <!-- Footer -->
  <script src='<?php echo base_url();?>assets/js/online.js'></script>
