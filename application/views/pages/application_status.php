
  <!-- Start main-content -->
  <style>
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: none;
}
  </style>
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Application Status</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Career</a></li>
                
                <li class="active text-gray-silver">Application Status</li>
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
               <center> <a href="#" class="active" data-filter="*">Check Your Application Status Here</a></center>
                
              </div>
			  <div class='row'>
				<div class="banner" style="margin-bottom:3%"></div>

<div class="row">
<div class="col-md-2"></div>
<div class="col-md-8">

<table class="table" style='border:none'>
<tr align="center" style=";"><td></td><td colspan='3'>
						<form action="#" method="post">
                            <select Name ='exam_type' class='form-control' required>
								<option value =''>Select Your Application</option>
                                <option value ='ctet'>C-TET</option>
								
							</select></td></tr>
<tr><td align="right">
Registration No.:</td><td><input type="number" name="sid" required></td>
<td align="right">
Date Of Birth:</td><td><input type="date" name="date_of_birth" required></td></tr>
 <td></td><td></td><td > <input type="submit" class="btn btn-primary" name='find' value="SUBMIT"></div></td></tr>
</table></form></div></div>

<?php 
						if(isset($_POST['find']))
							
						{
							
						 extract($_POST); 
						// $id=substr($sid,-4)-10000;
						$id=$sid-1000000;
						$arr="id='$id' and date_of_birth='$date_of_birth'";
						$student_array = $this->Offer_model->getarray('ctet',$arr);
						$count = count($student_array);
						if($count>0)
						{
							echo "<table align='center' class='table table table-striped'>";
						foreach($student_array as $row)
						{
							 $student_id=$row['student_id'];
							
                    	    echo "<tr><td>".$row['student_name']."</td>";
                    	        echo "<td>".$sid."</td>";
								echo "<td>".$row['date_of_birth']."</td>";
								echo "<td>".$row['pay_status']."</td></tr>";
						}
						echo "</table>";	
						}
						
						 else {
							 echo "<center><span class='text-danger'>Oh! No. Data Found. <br> Please Check Your Registration No. & Date Of Birth. </center>";
							 //echo "</table>";
						}}
						?>
					<br>
				<br>						
						

             
               
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <!-- end main-content -->
  
  <!-- Footer -->