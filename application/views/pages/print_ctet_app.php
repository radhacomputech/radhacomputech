<?php 
 $uri = $this->uri->segment('4');
 $arr = "id=$uri";
	$pay_status = $this->Admin_model->multitableinfo('ctet',$arr,'pay_status');
	$course_id = $this->Admin_model->multitableinfo('ctet',$arr,'student_course');
	$student_name = $this->Admin_model->multitableinfo('ctet',$arr,'student_name');
?>
<style> 
table {width:900px;font-family:calibri;}
td{padding:5px;border-bottom:dotted 1px gray;text-align:left;text-transform:capitalize;}
strong{text-align:center;font-weight:800;color:maroon;font-size:20px;}
.txt {width:350px; height:24px;line-height:30px;font-size:20px;}
h7{padding:0px;margin:0px;font-size:30px;color:midnightblue;font-family:arial black;}
hr{solid 1px #000;}
.head{color:midnightblue;font-family:arial;border:none;}
	p{text-transform:none;}
</style>
<center>
<table  width="1000">
<tbody>
<tr>
	 <td class='head'>
	 <img src='<?php echo base_url(); ?>web/images/logo.png' height='110px' >
	 </td>
	 <td colspan='4' class='head'><center> <p><h7> <b>KRISHN FOUNDATION
CHAPRA <br></b>
	 <small> BIHAR</small></h7>
			<br>Kachahari Station Main Road, Chapra (Saran)
			<br>info@krishnfoundation.com | www.krishnfoundation.com  </p> 
	
	 </td>
</tr>

<tr><td colspan='5' style='border-top:solid 2px gray;border-bottom:solid 2px gray;'>  <center><h2> Online Application Form (<?php echo ctetinfo($id,'pay_status'); ?>) </h2>(Computer Teacher Eligbility Test 2018 / Computer Teacher Training 2018)</center> </td></tr>
<tr>
<td>1 </td>
<td>Name of Post </td>
	<td>
	  <b style='text-transform:uppercase;'><?php //echo $postname[ctetinfo($id,'student_course')]; 
	  $pid = 1000 + ctetinfo($id,'student_id'); 
	  ?></b>
	</td>
	<td rowspan='9'> <center><h4> Application No. :  <?php echo $token ="10000".$id ; ?><br>
	</center>
	</h4><br>
	<img src='upload/<?php echo ctetinfo($id,'student_photo'); ?>' alt ='Student photo Not Available' width ='150' height='180' align='right' valign='top' />  
	</td>
</tr>
<tr>
	<td> 2 </td>
	<td> Name of Candidate </td>
	<td> <?php echo ctetinfo($id,'student_name'); ?> </td>
<tr>
<tr>
	<td> 3 </td>
	<td> Father's / Husband's Name  </td>
	<td> <?php echo ctetinfo($id,'student_father'); ?></td>
<tr>
<tr>
	<td> 4 </td>
	<td> Date of Birth *</td>
	<td><?php echo ctetinfo($id,'date_of_birth'); ?>
	</td>
<tr>
<tr>
		<td> 5 </td>
		<td > Select Category   </td>
		<td> <?php echo ctetinfo($id,'student_category'); ?>
		</td>
</tr>
<tr>
		<td> 6 &nbsp; (i) </td>
		<td >  Gender </td>
		<td colspan='2'>
		 <?php echo ctetinfo($id,'student_gender'); ?></td>
</tr>
<tr>
		<td> &nbsp; &nbsp;&nbsp; (ii) </td>
		<td >  Marital Status </td>
		<td colspan='2'>
		 <?php echo ctetinfo($id,'student_marital'); ?>
		</td>
</tr>
<tr>
		<td> 7 </td>
		<td> Nationality </td>
		<td colspan='2'>
		 <?php echo ctetinfo($id,'student_nationality'); ?>	
		</td>
	</tr>
<tr>
	<td> 8 </td>
	<td> Postal Address  </td>
	<td colspan='2'> <?php echo ctetinfo($id,'student_postal'); ?></td>
<tr>

<tr>
	<td> 9 </td>
	<td> Present Address </td>
	<td colspan='2'> <?php echo ctetinfo($id,'student_present'); ?></td>
<tr>

<tr>
	<td> 10 </td>
	<td> Telephone No.</td>
	<td colspan='2'> <?php echo ctetinfo($id,'student_tel'); ?></td>
<tr>

<tr>
	<td> 11 </td>
	<td> Mobile No. </td>
	<td colspan='2'> <?php echo ctetinfo($id,'student_mobile'); ?> </td>
<tr>
<tr>
	<td> 12 </td>
	<td> Email Address </td>
	<td colspan='2'> <?php echo ctetinfo($id,'student_email'); ?></td>
<tr>
<tr>
	<td>13 </td>
	<td>Educational Qualification  </td>
	<td colspan='2'> </td>
</tr>

</tbody>
</table>
<table border='1' >
	<tr>
		<th> </th>
		<th> Exam Passed </th>
		<th> Board /University </th>
		<th >Year </th>
		<th >Total Marks </th>
		<th >Percentage (%)</th>
	</tr>
	<tr> 
		<th> a.</th>
		<td> Matric /10th </td>
		<td> <?php echo ctetinfo($id,'m_board'); ?> </td>
		<td> <?php echo ctetinfo($id,'m_year'); ?> </td>
		<td> <?php echo ctetinfo($id,'m_total'); ?> </td>
		<td> <?php echo ctetinfo($id,'m_percent'); ?> </td>
		
	</tr>
	<tr> 
		<th> b.</th>
		<td> Intermediate / +2 </td>
		<td> <?php echo ctetinfo($id,'i_board'); ?> </td>
		<td> <?php echo ctetinfo($id,'i_year'); ?> </td>
		<td> <?php echo ctetinfo($id,'i_total'); ?> </td>
		<td> <?php echo ctetinfo($id,'i_percent'); ?> </td>
		
	</tr>
	<tr> 
		<th> c.</th>
		<td> Graduation  </td>
		<td> <?php echo ctetinfo($id,'g_board'); ?> </td>
		<td> <?php echo ctetinfo($id,'g_year'); ?> </td>
		<td> <?php echo ctetinfo($id,'g_total'); ?> </td>
		<td> <?php echo ctetinfo($id,'g_percent'); ?> </td>
		
	</tr>
	<tr> 
		<th> d.</th>
		<td> Post Graduation </td>
		<td> <?php echo ctetinfo($id,'p_board'); ?> </td>
		<td> <?php echo ctetinfo($id,'p_year'); ?> </td>
		<td> <?php echo ctetinfo($id,'p_total'); ?> </td>
		<td> <?php echo ctetinfo($id,'p_percent'); ?> </td>
		
	</tr>
</table>
<table>
	<tr>
		<td> 14 </td>
		<td width='350'> Other Qualification </td>
		
		<td> <?php echo ctetinfo($id,'other_qual'); ?>  </td>
	</tr>
	
	
	
	
	<tr>
		<td> </td>
		<td colspan='2'><b> Decleration </b><p> I hereby declared that I have submitted application form and all the informations are correct and true to the best of my knowledge and belief. In case of any descrepancy you are entitled to cancel my candidature at any time. </p> </td>
	</tr>
	<tr>
		
		<td> 
		<td colspan='2' > <img src='upload/<?php echo ctetinfo($id,'student_sign'); ?>'  align='right' alt ='Student Sign Not Available' width ='140' height='60' />  </td>
	</tr>
	<tr> 
		<td colspan='3' >
		<input type='button' onclick='this.hidden=true; window.print()' value=' Print ' > Printed On  <?php echo date('h:m:s:A d-M-Y'); ?>
		 
		</td> 
	</tr>