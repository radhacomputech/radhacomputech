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
		
		
		$cnternm = $this->Offer_model->multitableinfo('student',$arr,'stu_pass');
		
		$cntrename = $this->Offer_model->multitableinfo('student',$arr,'ms_no');
		
		$mothername = $this->Offer_model->multitableinfo('student',$arr,'mother');
		
		
		$vivano = $this->Offer_model->multitableinfo('student',$arr,'viva');
		$writtenno = $this->Offer_model->multitableinfo('student',$arr,'written');
		$totalmark = $this->Offer_model->multitableinfo('student',$arr,'total_marks');
		$projectno = $this->Offer_model->multitableinfo('student',$arr,'project');
		$prack = $this->Offer_model->multitableinfo('student',$arr,'practicle');
		$percent = $this->Offer_model->multitableinfo('student',$arr,'grade');
		
		
		
		
		
		
		
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
			 font-size:15px;
			 line-height:3px;
		 }
		 </style>
<center>
			
			<table background="assets/images/mrks.png" cellpadding='5px' cellspacing='0px' border='0' width='778px' height='1100px' color="yellow">
	<tr>
	                <td></td>
	                
	            </tr><tr>
	                <td></td>
	                
	            </tr>
	            
	            <tr>
	                <td></td>
	                
	            </tr><tr>
	                <td></td>
	                
	            </tr>
	             <tr>
	                <td></td>
	                
	            </tr> <tr>
	                <td></td>
	                
	            </tr>
	            <tr>
	                <td></td>
	                
	            </tr>
	            <tr>
	                <td></td>
	                
	            </tr>
	            
	            <tr>
	                <td></td>
	                
	            </tr><tr>
	                <td></td>
	                
	            </tr><tr>
	                <td></td>
	                
	            </tr>
	            <tr>
	                <td></td>
	                
	            </tr>
	            
	            <tr>
	                <td></td>
	                
	            </tr>
	            <tr>
	                <td></td>
	                
	            </tr><tr>
	                <td></td>
	                
	            </tr>
	            
	            <tr>
	                <td></td>
	                
	            </tr>
	            <tr>
	                <td></td>
	                
	            </tr>
	            
	            <tr>
	                <td></td>
	                
	            </tr><tr>
	                <td></td>
	                
	            </tr><tr>
	                <td></td>
	                
	            </tr>
	            <tr>
	                <td></td>
	                
	            </tr>
	            
	                <td align="center">SL. NO. : <b><u><?php echo $sino;?></b></u><font color="white">.........................................................................................</font>REG. NO : <b><u><?php echo $reg;?></u></b>
	                
	              
	            </tr>
	             
	            <tr>
	                <td align="center">STUDENT NAME: <B><U><?php echo ucwords($name);?> </U></B></td>
	                
	            </tr><tr>
	                <td align="center">S/O,W/O,D/O: <B><U><?php echo ucwords($father_name);?></U></B></td>
	                
	            </tr>
	            
	            <tr>
	                <td align="center">MOTHER'S NAME: <B><U><?php echo ucwords($mothername);?></U></B></td>
	                
	            </tr>
	            
	            
	            
	            <tr>
	                <td align="center">COURSE NAME:<B><U><?php echo $this->Offer_model->tableinfo('course_details',$trade,'course_name');?></U></B></td>
	                
	            </tr>
	            <tr>
	                <td align="center">COURSE DURATION:<B><U> <?php echo ($cntrename);?> </U></B> </td>
	                </tr>
	            
	            <tr>
	               <td align="center">CENTER NAME: <B><U><?php echo ($cnternm);?> </U></B> </td>
	               </tr> 
	            <tr>
	                <td align="center">___________________________________________________________________________________</td>
	               </tr> 
	                <tr>
	                <td align="center"><b><u>Moduled Covered</u></b></td>
	               </tr> 
	            
	            <tr>
	                
	                <td align="center">DCA :Fundamental,MS-DOS,Windows 10,MS-Word, MS-Excel, MS-Power Point, Internet,</td>
	            </tr><tr>
	                <td align="center">Networking, MultiMedia, HTML, System Maintenence.</td>
	               
	            </tr><tr>
	                <td align="center">CFA :Introduction to Financial Accounting,(Tally Accounting Software),Accounts</td>
	                
	            </tr><tr>
	                <td align="center">with Inventory (On Tally,Accounting Software), Project,</td>
	              
	            </tr><tr>
	                <td align="center">DTP :Page Maker, Corel Draw, Photoshop, Digital Studio Works</td>
	                
	            </tr>
	            
	             <tr>
	                <td align="center">__________________________________________________________________________________</td>
	               </tr> 
	            
	            <tr>
	                <td align="center"><b><u>Performance As Per Examinations</u></b></td>
	               </tr>
	            <tr>
	                <td align="center"><b>EXAMINATION<font color="white">.....................</font>TOTAL MARKS <font color="white">..................</font>MARKS OBTAINED</b></td>
	                
	            </tr><tr>
	               <td align="center"><FONT COLOR="WHITE">__</fONT>WRITTEN:<font color="white">.........................................</font>100 <font color="white">..........................................</font><?php echo ($writtenno);?></td>
	               
	            </tr><tr>
	                <td align="center">PRACTICAL:<font color="white">.........................................</font>100 <font color="white">..........................................</font><?php echo ($prack);?></td>
	                
	            </tr><tr>
	                <td align="center"><FONT COLOR="WHITE">_</fONT>PROJECT:<font color="white">...........................................</font>100 <font color="white">...........................................</font><?php echo ($projectno);?></td>
	                
	            </tr><tr>
	                 <td align="center"><FONT COLOR="WHITE">_____</fONT>VIVA:<font color="white">.......... ................................</font>100 <font color="white">.................................... ......</font><?php echo ($vivano);?></td>
	            </tr><tr>
	                <td align="center"><FONT COLOR="WHITE">____</fONT>TOTAL:<font color="white">.......... .................................</font>400 <font color="white">....................................... .</font><?php echo ($totalmark);?></td>
	            </tr>
	            <tr>
	                <td align="center"><B>PERCENTAGE/GRADE:<font color="white">.....</font>: <font color="white">.......</font><u><?php echo ($percent);?></u></B></td>
	            </tr><tr>
	                <td align="center">__________________________________________________________________________________</td>
	               
	            </tr><tr>
	                <td align="center"><b><u>DISTRIBUTION OF GRADES/MARKS</u></b></td>
	               
	            </tr><tr>
	                <td align="center">EXCELLENT: 85%-100% | VERY GOOD: 70%-84% | </td>
	               
	            </tr><tr>
	                <td align="center">GOOD: 55%-69% | SATISFACTORY: 40%-54% | FAIL: BELOW 40%</td>
	                
	            </tr><tr>
	                <td align="center">
		    </td>
	               
	            </tr><tr>
	                <td></td>
	                
	            </tr>
	            
	            
	            <tr>
	                <td></td>
	                
	            </tr>
	            
	            <tr>
	                <td></td>
	                
	            </tr>
	            <tr>
	                <td></td>
	                
	            </tr>
	            <tr>
	                <td></td>
	                
	            </tr>
	            <tr>
	                <td></td>
	                
	            </tr><tr>
	                <td></td>
	                
	            </tr><tr>
	                <td></td>
	                
	            </tr><tr>
	                <td></td>
	                
	            </tr>
	            <tr>
	                <td></td>
	                
	            </tr>
	            <tr>
	                <td></td>
	                
	            </tr>
	            
	            
	            <tr>
	                <td></td>
	                
	            <tr>
	                <td></td>
	                
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
				