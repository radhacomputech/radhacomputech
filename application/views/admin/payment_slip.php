<?php 

$token = $this->session->userdata('token_id');
  $login_id = $token['login_id'];
  $user_type= $token['user_type'];
?>
<script src="<?php echo base_url();?>assets/js/jquery.min.js"></script>
 <script src="<?php echo base_url();?>/assets/js/towords.js"></script>
<style>
body{
	margin-left:15px;
}
.main{
	width:100%;
}
.left-box
{
	border:solid 1px #ccc;
	float:left;
	margin-bottom:0px;
	width:520px;
	background: #e8e4f51f;
}
/*.right-box{
	border:solid 1px #ccc;
	margin-left:2%;
	float:right;
	margin-bottom:20px; 
	width:520px;
	background: #e8e4f51f;
}*/
.bill-height{
	height:374px;
}
table{
	border :solid 1px #ddd;
}
th{
	letter-spacing:0.6px;
}
td{
	font-size:14px;
	letter-spacing:0.9px;
	font-weight:500;
}
.label{
	font-size:15px;
	line-height:20px;
	float:left;
	font-weight:500;
}
</style>

<?php 
// if ( ! empty( $_COOKIE['dataId'] ) ) {
// 	$main_data= $_COOKIE['dataId']; // Outputs : Hi sonu
// 	//print_r($main_data);
// 	$main_array = explode(',',$main_data);
	
// }
	?> 
        <?php 
        $arr = $_SESSION['receipt'];
        extract($arr);
			$student_id = $this->Offer_model->multitableinfo("transaction","id='$receipt_id'","student_id");
			$receipt_date = $this->Offer_model->multitableinfo("transaction","id='$receipt_id'","txn_date");
            $center_id = $this->Offer_model->multitableinfo('student',"id='$student_id'","center_id");
            $inst_name = $this->Offer_model->multitableinfo('center_details',"id='$center_id'","center_name");
            $inst_address = $this->Offer_model->multitableinfo('center_details',"id='$center_id'","center_address");
            $center_code = $this->Offer_model->multitableinfo('center_details',"id='$center_id'","center_code");
            $inst_mobile = $this->Offer_model->multitableinfo('center_details',"id='$center_id'","center_mobile");
            $inst_email = $this->Offer_model->multitableinfo('center_details',"id='$center_id'","center_email");
				 $txn_date = date('Y-m-d');
			$d = date('d',strtotime($txn_date));
			
			$arr1 = array('student_id'=>$student_id,'txn_date'=>$txn_date);
			for($sonu=1;$sonu<=2;$sonu++)
			{
				
		?>
		<div class='left-box'>
			<div class='bill-height'>
				
				<div class='right-box'>
					<div class='bill-height'>
				<!----------------------------------------------->
				<!--<div style='height:15px;background-color:#fff;width:515px'>
				</div>	-->
<table rules='all' cellpadding='5px'>
	<tbody>
		<tr>
			<th colspan='3' ><span style='font-size:20px;float:left'><!--<img src="<?php echo base_url();?>assets/img/logo.jpg" height='15%'>--></span>
<span style='font-size:20px;letter-spacing:1.8'><?php echo $inst_name;?></span>
			<br>
			<i><span style='font-size:12px;margin-top:-10px'><?php echo ucwords($inst_address);?></span></i><br>
			<!--<hr style='margin-top:3px;margin-bottom:3px'>-->
		<tt>Study Center Code:- <strong><?php echo $center_code;?></strong> | Mob:- <?php echo $inst_mobile;?></tt>
			<!--<hr style='margin-top:3px;margin-bottom:3px'>--><br>
			<tt>E-mail:- <?php $inst_email;?></tt>
			<hr>
			<span style='float:left'>Si. No. <?php echo $student_id.$d; ?>
			</span><u> ( Payment Slip ) </u><span style='float:right'>Date:- <?php echo date('d-M-Y',strtotime($receipt_date));?></span>
			<hr style='margin-top: 1px;'>
			<h4 style='margin-top:3px'>
			<div style='line-height:20px'>
			<span class='label'>Student's Name:-&nbsp;&nbsp;<b><?php 
			$arr =array('id'=>$student_id);
			echo ucwords($this->Offer_model->multitableinfo('student',$arr,'student_name'));
			?><b>
			</span><br>
			<span class='label'>Father's/Husband's Name:- &nbsp;&nbsp; <b><?php 
			
			echo ucwords($this->Offer_model->multitableinfo('student',$arr,'stu_father'));
			?>
			</span>
			<span class='label' style='float:right'>Reg. No.:- <b><?php 
			
			echo ucwords($this->Offer_model->multitableinfo('student',$arr,'stu_roll'));
			?></b>
			</span>
			</div>
			</h4>
			</th>
		</tr><tr>
		<td width='20px'>Fee Name
			</td>
			<td align='right'>Amount in Rupees
			</td>
		</tr>
		<tr style='height:100px;' valign='top'>
		<td width='70%'>
            <?php 
            echo $this->Offer_model->multitableinfo('transaction',"id='$receipt_id'","fee_name");
			?>
		</td>
		<td align='right'>
			 <?php 
			echo $amount = $this->Offer_model->multitableinfo('transaction',"id='$receipt_id'","txn_amount");
			?>
		</td>
		</tr>
		
		<tr>
			<td align='right' colspan='2'> Total Amount &nbsp; <b>&#8377; <?php echo  number_format($amount,2)?></b></td>
		</tr>	
		<tr> 
		<td colspan='2' align='left' >
			<b><small><script> var words =toWords('<?php echo $amount;?>'); document.write("<div class='t'><b>In Words : </b>"+words+" rupees only </div>"); </script></small></b>
			</td> 
			</tr>
			<tr>
			<td colspan='2' align='right'><i><small>Sign & Stamp</small></i></td>
			</tr>
	</tbody>
	</table>
				<!----------------------------------------------->
		</div>
</div>
<?php if($sonu==1){?>
<div style='background-color:#fff;height:15px;border:solid 1px #eee'></div>
		
		<?php 
			}}
?>
<script>
window.print();
</script>


       