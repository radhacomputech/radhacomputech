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
		$grd = $this->Offer_model->multitableinfo('student',$arr,'grade');
		$issuedate = $this->Offer_model->multitableinfo('student',$arr,'cer_date');
		
		$completedate = $this->Offer_model->multitableinfo('student',$arr,'stu_pass');
	
	
		$cntrename = $this->Offer_model->multitableinfo('student',$arr,'ms_no');
		
		$religion = $this->Offer_model->multitableinfo('student',$arr,'stu_religion');
		$mobile = $this->Offer_model->multitableinfo('student',$arr,'stu_mobile');
		$sino = $this->Offer_model->multitableinfo('student',$arr,'si_no');
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
			 font-size:22px;
			 line-height:8px;
		 }
		 </style>
<center>
		results th, .results td {
  display: block;
  width: 100%;
  flex: 0 0 25%;  /* column width */
  max-width: 25%; /* column width */
  white-space: normal;
  text-align: center;	
			<table background="assets/images/certificate.bmp" cellpadding='5px' cellspacing='1px' border='0' width='1100px' height='778px' color="yellow">
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
		    <td align="center">SL. NO. : <b><u><?php echo $sino;?></b></u><font color="white">.........................................................................................</font>REG. NO : <b><u><?php echo $reg;?></u></b>
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
		   <td align="center">This is to Certify that mr/mrs/smt : <b><u><?php echo ucwords($name);?></u></b></td>
		</tr>	<tr>
		   <td align="center">S/o, W/o, D/o : <b> <u><?php echo ucwords($father_name);?></u></b>, D.O.B :<b><u><?php echo date('d-M-Y',strtotime($dob));?></u></b>
		</tr>		<tr>
		    <td align="center">has successfully completed the course of : <b><u> <?php echo $this->Offer_model->tableinfo('course_details',$trade,'course_name');?></u></b></td>
		</tr>		<tr>
		    <td align="center">
		        At: <b><u><?php echo $completedate; ?></u></b> of Duration : <b><u><?php echo $cntrename; ?></u></b>,</u></b>
		    </td>
		</tr>	<tr>
		    <td align="center">
		         and has secured : <b><u> "<?php echo $grd;?>"</b></u>,   Issued Date : <b><u><?php echo date('d-M-Y',strtotime($issuedate));?> </u></b> 
		    </td>
		</tr>	<tr>
		    <td align="center">
		       
		    </td>
		</tr>	
		</tr>
		
			
			
		
		<tr>
		  
		      <td align="center"><img src='<?php echo base_url();?>uploads/<?php echo $image;?>' height='100px' width='90px' onerror="this.onerror=null;this.src='<?php echo base_url();?>uploads/no_image.jpg';" >
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
				