<?php 
if(!$this->session->userdata('token_id'))
{
  redirect(site_url().'logout');
  exit(0);
}
  $token = $this->session->userdata('token_id');
  $login_id = $token['login_id'];
  $user_type= $token['user_type'];
  $login_api = $this->Offer_model->tableinfo('user',$login_id,'my_api');

  $strtoken = session_id().$login_id; //.date('ymdhis');
if($login_api<>$strtoken)
{
 redirect(site_url().'logout');
 exit(0);
}
			
            extract($_SESSION['registration_session']);
            $student_id = $registration_id;
			
			$center_id = $this->Offer_model->multitableinfo('user',"id='$login_id'",'center_id');
			$inst_name = $this->Offer_model->multitableinfo('center_details',"id='$center_id'",'center_name');
			$inst_address = $this->Offer_model->multitableinfo('center_details',"id='$center_id'",'center_address');
			$center_code = $this->Offer_model->multitableinfo('center_details',"id='$center_id'",'center_code');
			 $inst_mobile = $this->Offer_model->multitableinfo('center_details',"id='$center_id'",'center_mobile');
			$inst_email = $this->Offer_model->multitableinfo('center_details',"id='$center_id'",'center_email');
		
		
		
		$arr = array('id'=>$student_id);
		$reg = $this->Offer_model->multitableinfo('student',$arr,'stu_roll');
		$center = $this->Offer_model->multitableinfo('student',$arr,'center_id');
		$name = $this->Offer_model->multitableinfo('student',$arr,'student_name');
		$father_name = $this->Offer_model->multitableinfo('student',$arr,'stu_father');
		$address = $this->Offer_model->multitableinfo('student',$arr,'stu_address');
		$dob = $this->Offer_model->multitableinfo('student',$arr,'stu_dob');
		$gender = $this->Offer_model->multitableinfo('student',$arr,'stu_gender');
		$category = $this->Offer_model->multitableinfo('student',$arr,'stu_category');
		$religion = $this->Offer_model->multitableinfo('student',$arr,'stu_religion');
		$mobile = $this->Offer_model->multitableinfo('student',$arr,'stu_mobile');
		$email = $this->Offer_model->multitableinfo('student',$arr,'stu_email');
		$reg_date = $this->Offer_model->multitableinfo('student',$arr,'stu_reg_date');
		$image = $this->Offer_model->multitableinfo('student',$arr,'student_photo');
		$trade = $this->Offer_model->multitableinfo('student',$arr,'stu_course');
	       $fee_details = $this->Offer_model->get_like('transaction',"student_id='$student_id'","fee_name","Reg");
	       //print_r($this->db->last_query());
	       //print_r($fee_details);
		if(count($fee_details)>0)
		{
			$reg_fee = $fee_details[0]->txn_amount;
		}
		else 
		{
			$reg_fee=0;
		}
		
		
		?>
		 <script src="<?php echo base_url();?>/assets/js/towords.js"></script>
		 <style>
		 td{
			 font-size:14px;
			 line-height:15px;
		 }
		 </style>
<center>
			 <button  onClick='pr()' id='btnprint'>Print</button>
			<table cellpadding='5px' cellspacing='0px' border='1px' width='600px'>
				<tr>
					<th colspan='4'bgcolor='purple' style='color:white;'>
					<h1 style='letter-spacing:4px;margin-bottom: 0px'><?php echo strtoupper($inst_name);?></h1>
					<tt>
					<i>
					<?php echo ucwords($inst_address);?><br>
					 Study Center Code :- <b><?php echo $center_code;?></b> || Mob:- <?php echo ucwords($inst_mobile);?><br>
					Email:- <?php echo ($inst_email);?><br>
					
					</i>
					</tt>
					</th>	
				</tr>
				 <tr>
					<td colspan='4' align='center'><strong><big>Registration Card</big></strong></td>	
				</tr>
				<tr>
						<td width='200px'>Registration No. :</td>
						<td colspan='2'><?php echo $reg;?></td>
						<td rowspan='4' align='center'><img src='<?php echo base_url();?>uploads/<?php echo $image;?>' height='100px' width='90px' onerror="this.onerror=null;this.src='<?php echo base_url();?>uploads/no_image.jpg';" ></td>
				</tr>
				<tr>
						<td>Student's Name :</td>
						<td colspan='2'><?php echo ucwords($name);?></td>
						
				</tr>
				<tr>
						<td>Father's Name :</td>
						<td colspan='2'><?php echo ucwords($father_name);?></td>
						
				</tr>
				
				<tr>
						<td>Date Of Birth :</td>
						<td colspan='2'><?php echo date('d-M-Y',strtotime($dob));?></td>
						
				</tr>
				<tr>
						<td>Gender :</td>
						<td><?php echo $gender;?></td>
						<td>Catagory :</td>
						<td ><?php echo $category;?></td>
				</tr>
				<tr>
						<td>Mobile No. :</td>
						<td ><?php echo $mobile?></td>
						<td>Religion :</td>
						<td > <?php echo $religion;?></td>
				</tr>
				<tr>
						<td>Email Id :</td>
						<td colspan='3'><?php echo $email;?></td>
						
				</tr>
				<tr>
						<td>Address :</td>
						<td colspan='3'><?php echo $address; ?></td>
						
				</tr>
				<tr>
						<td>Registration Date :</td>
						<td ><?php echo date('d-M-Y',strtotime($reg_date));?></td>
						<td>Course :</td>
						<td > <?php echo $this->Offer_model->tableinfo('course_details',$trade,'course_name');?></td>
				<tr>
						<td>Registration Fee :</td>
						
						<td colspan='3'> 
						&#8377; <?php echo $reg_fee;?> 
						<script> var words =toWords('<?php echo $reg_fee;?>'); document.write("<div class='t'><b>In Words : </b>"+words+" rupees only </div>"); </script>
						</td>		
				</tr>
				<tr>
						<td>Director Signature<br><br><br></td>
						<td colspan='3' width='200px'valign='top' style='color:red'><h4>Registration fee will not be refundable in any case.</h4></td>
						
				</tr>
				<tr>
				<td colspan='4' align='center'><h3>" कंप्यूटर शिक्षा लक्ष्य बनाओ, बेरोजगारी दूर भगाओ  | " <b><small> <small></small></small> <b></h3></td>
				</tr>
				</table>
				<br>
				<br>
				<table cellpadding='5px' cellspacing='0px' border='1px' width='600px'>
				<tr>
					<th colspan='4'bgcolor='purple' style='color:white;'>
					<h1 style='letter-spacing:4px;margin-bottom: 0px'><?php echo strtoupper($inst_name);?></h1>
					<tt>
					<i>
					<?php echo ucwords($inst_address);?><br>
					Study Center Code :- <b><?php echo $center_code;?></b> || Mob:- <?php echo ucwords($inst_mobile);?><br>
					Email:- <?php echo ($inst_email);?><br>
					
					
					</i>
					</tt>
					</th>	
				</tr>
				 <tr>
					<td colspan='4' align='center'><strong><big>Registration Card</big></strong></td>	
				</tr>
				<tr>
						<td width='200px'>Registration No. :</td>
						<td colspan='2'><?php echo $reg;?></td>
						<td rowspan='4'  align='center'><img src='<?php echo base_url();?>uploads/<?php echo $image;?>' height='100px' width='90px' onerror="this.onerror=null;this.src='<?php echo base_url();?>uploads/no_image.jpg';"></td>
				</tr>
				<tr>
						<td>Student's Name :</td>
						<td colspan='2'><?php echo ucwords($name);?></td>
						
				</tr>
				<tr>
						<td>Father's Name :</td>
						<td colspan='2'><?php echo ucwords($father_name);?></td>
						
				</tr>
				
				<tr>
						<td>Date Of Birth :</td>
						<td colspan='2'><?php echo date('d-M-Y',strtotime($dob));?></td>
						
				</tr>
				<tr>
						<td>Gender :</td>
						<td><?php echo $gender;?></td>
						<td>Catagory :</td>
						<td ><?php echo $category;?></td>
				</tr>
				<tr>
						<td>Mobile No. :</td>
						<td ><?php echo $mobile?></td>
						<td>Religion :</td>
						<td > <?php echo $religion;?></td>
				</tr>
				<tr>
						<td>Email Id :</td>
						<td colspan='3'><?php echo $email;?></td>
						
				</tr>
				<tr>
						<td>Address :</td>
						<td colspan='3'><?php echo $address; ?></td>
						
				</tr>
				<tr>
						<td>Registration Date :</td>
						<td ><?php echo date('d-M-Y',strtotime($reg_date));?></td>
						<td>Trade :</td>
						<td > <?php echo $this->Offer_model->tableinfo('course_details',$trade,'course_name');?></td>
				<tr>
						<td>Registration Fee :</td>
						
						<td colspan='3'> 
						&#8377; <?php echo $reg_fee;?> 
						<script> var words =toWords('<?php echo $reg_fee;?>'); document.write("<div class='t'><b>In Words : </b>"+words+" rupees only </div>"); </script>
						</td>		
				</tr>
				<tr>
						<td>Director Signature<br><br><br></td>
						<td colspan='3' width='200px'valign='top' style='color:red'><h4>Registration fee will not be refundable in any case.</h4></td>
						
				</tr>
				<tr>
				<td colspan='4' align='center'><h3> कंप्यूटर शिक्षा लक्ष्य बनाओ बेरोजगारी दूर भगओ         <b><small> <small></small></small> <b></h3></td>
				</tr>
				</table>
				</center>
          <script>
		  function pr()
			{
				var hidebtn=document.getElementById("btnprint");
				hidebtn.style.visibility="hidden";
				window.print();
				hidebtn.style.visibility="visible";
			}
			</script>
				