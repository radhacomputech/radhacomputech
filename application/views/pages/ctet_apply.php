
<style>
.text-danger {
    color: #f2184f;
}
</style>
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">CTET Application</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Career</a></li>
                
                <li class="active text-gray-silver">CTET Application</li>
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
               <center> <a href="#" class="active" data-filter="*">Online Application For Computer Teacher</a></center>
                
              </div>
			  <div class='row'>
				<div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
            <h3 class="title-txt">
			<span class='text-danger'>Online </span>Apply </span></h3>
             <?php if ($this->session->flashdata('success_message')) {
							?>
					<center><div class="alert alert-success" style='width:50%;padding:10px'>
					  <strong> <i class='fa fa-check-circle'></i> <?php 
					  echo ucwords($this->session->flashdata('success_message'));
					  $this->session->unset_userdata('success_message');
					  ?>
					  </strong>
					</div>
					<?php }?>
						 </center>
           <h4 class="header-line">Apply For Various Post (Computer Teacher Eligbility Test 2019 / Computer Teacher Training 2019)</h4>
                <p> Candidate may apply more than one post. All field are mendatory. Kindly fill the form carefully.</p>
            </div>

        </div>
             
		<div class="row">
		<div class="col-md-9 col-xs-12">
<style> 
table {width:100%;}
td{padding:5px;border-bottom:dotted 1px gray;text-align:left;}
strong{text-align:center;font-weight:800;color:maroon;font-size:18px;}
.txt {width:350px; height:24px;line-height:30px;font-size:18px;text-transform:capitlize;}
input,textarea{text-transform:capitalize;}
</style>
 
 <table class="table table-bordered table-hover" >
 
<tbody>
<?php echo form_open_multipart(base_url().'save_ctet');?>

<tr>
<td>1 </td>
<td>Select Post <hr> Place of Work/Training</td>
<td>
		 <?php 
						   $options = dropdown('application_post');
						   echo form_dropdown('student_course',$options);
						   echo form_error('student_course');
						   ?>
		<hr>
		<?php
             echo form_input(array('name'=>'place_of_work','id'=>'place_of_work','class'=>'txt'), set_value('place_of_work'));
			  echo form_error('place_of_work');?> 
</td>
</tr>
<tr>
	<td> 2 </td>
	<td> <label>Name of Candidate </lable></td>
	<td> 
			<?php
             echo form_input(array('name'=>'student_name','id'=>'student_name','class'=>'txt'), set_value('student_name'));
			  echo form_error('student_name');?> 
	</td>
<tr>
<tr>
	<td> 3 </td>
	<td> Father's / Husband's Name (In Block  Letters) </td>
	<td> 
	<?php
             echo form_input(array('name'=>'student_father','id'=>'student_father','class'=>'txt'), set_value('student_father'));
			  echo form_error('student_father');?> 
	</td>
<tr>
<tr>
	<td> 4 </td>
	<td> Date of Birth *</td>
	<td>
	<?php
             echo form_input(array('name'=>'date_of_birth','type'=>'date','id'=>'date_of_birth','class'=>'txt'), set_value('date_of_birth'));
			  echo form_error('date_of_birth');?> 
	
	</td>
<tr>
<tr>
		<td> 5 </td>
		<td > Select Category   </td>
		<td> 
			<?php 
			   $cat = dropdown('category');
			   echo form_dropdown('student_category',$cat);
			   echo form_error('student_category');
			 ?>
		</td>
</tr>
<tr>
		<td> 6 &nbsp; (i) </td>
		<td >  Gender </td>
		<td>
		 <?php 
			   $gen = dropdown('gender');
			   echo form_dropdown('student_gender',$gen);
			   echo form_error('student_gender');
			 ?>
		</td>
</tr>
<tr>
		<td> &nbsp; &nbsp;&nbsp;(ii) </td>
		<td >  Marital Status </td>
		<td>
		 <?php 
			   $marit = dropdown('marital');
			   echo form_dropdown('student_marital',$marit);
			   echo form_error('student_marital');
			 ?>
		</td>
</tr>
<tr>
		<td> 7 </td>
		<td> Nationality </td>
		<td>
		<?php 
			   $nation = dropdown('nationality');
			   echo form_dropdown('student_nationality',$nation);
			   echo form_error('student_nationality');
			 ?>
		</td>
	</tr>
<tr>
	<td> 8 </td>
	<td> Postal Address (In Block  Letters) </td>
	<td> 
		<?php 
		 echo form_textarea(array('name'=>'student_postal','id'=>'','rows'=>'3','cols'=>'45','placeholder'=>''),set_value('student_postal'));
		 echo form_error('student_postal');
			?>
	</td>
<tr>

<tr>
	<td> 9 </td>
	<td> Present Address (In Block  Letters) </td>
	<td> <?php 
		 echo form_textarea(array('name'=>'student_present','id'=>'','rows'=>'3','cols'=>'45','placeholder'=>''),set_value('student_present'));
		 echo form_error('student_present');
			?></td>
<tr>

<tr>
	<td> 10 </td>
	<td> Telephone No. with STD Code </td>
	<td> 
		<?php
             echo form_input(array('name'=>'student_tel','type'=>'','id'=>'student_tel','class'=>'txt'), set_value('student_tel'));
			  echo form_error('student_tel');
		?> 
	</td>
<tr>

<tr>
	<td> 11 </td>
	<td> Mobile No. (without 0 or 91) </td>
	<td> 
	<?php
             echo form_input(array('name'=>'student_mobile','type'=>'number','id'=>'student_mobile','class'=>'txt'), set_value('student_mobile'));
			  echo form_error('student_mobile');
		?> 
		</td>
<tr>
<tr>
	<td> 12 </td>
	<td> Email Address </td>
	<td> <?php
             echo form_input(array('name'=>'student_email','type'=>'email','id'=>'student_email','class'=>'txt'), set_value('student_email'));
			  echo form_error('student_email');
		?> 
		</td>
<tr>
<tr>
	<td>13 </td>
	<td>Educational Qualification  </td>
	<td> </td>
</tr>

</tbody>
</table>
<table class="table table-bordered table-hover" >
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
		<td> 
		<?php
             echo form_input(array('name'=>'m_board','type'=>'','size'=>'30'), set_value('m_board'));
			  echo form_error('m_board');
		?> 
		</td>
		<td> 
		<?php
             echo form_input(array('name'=>'m_year','type'=>'','size'=>'8'), set_value('m_year'));
			  echo form_error('m_year');
		?> 
		</td>
		<td> 
		<?php
             echo form_input(array('name'=>'m_total','type'=>'','size'=>'8'), set_value('m_total'));
			  echo form_error('m_total');
		?> 
		</td>
		<td> 
		<?php
             echo form_input(array('name'=>'m_percent','type'=>'','size'=>'8'), set_value('m_percent'));
			  echo form_error('m_percent');
		?> 
		</td>
		
	</tr>
	<tr> 
		<th> b.</th>
		<td> Intermediate / +2 </td>
		<td> 
		<?php
             echo form_input(array('name'=>'i_board','type'=>'','size'=>'30'), set_value('i_board'));
			  echo form_error('i_board');
		?> 
		</td>
		<td> 
		<?php
             echo form_input(array('name'=>'i_year','type'=>'','size'=>'8'), set_value('i_year'));
			  echo form_error('i_year');
		?> 
		</td>
		<td> 
		<?php
             echo form_input(array('name'=>'i_total','type'=>'','size'=>'8'), set_value('i_total'));
			  echo form_error('i_total');
		?> 
		</td>
		<td> 
		<?php
             echo form_input(array('name'=>'i_percent','type'=>'','size'=>'8'), set_value('i_percent'));
			  echo form_error('i_percent');
		?> 
		</td>
	</tr>
	<tr> 
		<th> c.</th>
		<td> Graduation  </td>
		<td> 
		<?php
             echo form_input(array('name'=>'g_board','type'=>'','size'=>'30'), set_value('g_board'));
			  echo form_error('g_board');
		?> 
		</td>
		<td> 
		<?php
             echo form_input(array('name'=>'g_year','type'=>'','size'=>'8'), set_value('g_year'));
			  echo form_error('g_year');
		?> 
		</td>
		<td> 
		<?php
             echo form_input(array('name'=>'g_total','type'=>'','size'=>'8'), set_value('g_total'));
			  echo form_error('g_total');
		?> 
		</td>
		<td> 
		<?php
             echo form_input(array('name'=>'g_percent','type'=>'','size'=>'8'), set_value('g_percent'));
			  echo form_error('g_percent');
		?> 
		</td>
	</tr>
	<tr> 
		<th> d.</th>
		<td> Post Graduation </td>
		<td> 
		<?php
             echo form_input(array('name'=>'p_board','type'=>'','size'=>'30'), set_value('p_board'));
			  echo form_error('p_board');
		?> 
		</td>
		<td> 
		<?php
             echo form_input(array('name'=>'p_year','type'=>'','size'=>'8'), set_value('p_year'));
			  echo form_error('p_year');
		?> 
		</td>
		<td> 
		<?php
             echo form_input(array('name'=>'p_total','type'=>'','size'=>'8'), set_value('p_total'));
			  echo form_error('p_total');
		?> 
		</td>
		<td> 
		<?php
             echo form_input(array('name'=>'p_percent','type'=>'','size'=>'8'), set_value('p_percent'));
			  echo form_error('p_percent');
		?> 
		</td>
	</tr>
</table>
<table class="table table-bordered table-hover" >
	<tr>
		<td> 14 </td>
		<td> Other Qualification </td>
		<td> 
		<?php
             echo form_input(array('name'=>'other_qual','type'=>'','size'=>'60'), set_value('other_qual'));
			  echo form_error('other_qual');
		?>  
		</td>
	</tr>
	<tr>
		<td> 15 </td>
		<td> Work Experince  </td>
		<td> 
		<?php
             echo form_input(array('name'=>'experience','type'=>'','size'=>'60'), set_value('experience'));
			  echo form_error('experience');
		?>  
		</td>
	</tr>
	<tr>
		<td> 16 </td>
		<td> Upload Photograph (< 100 KB) </td>
		<td> 
		<?php
             echo form_input(array('name'=>'student_photo','type'=>'file'), set_value('student_photo'));
			  echo form_error('student_photo');
		?>  
		</td>
	</tr>
	
	<tr>
		<td> 17 </td>
		<td width='350'> Upload Signature ( < 20KB) </td>
		<td colspan='3'> <?php
             echo form_input(array('name'=>'student_sign','type'=>'file'), set_value('student_sign'));
			  echo form_error('student_sign');
		?>  </td>
	</tr
	
	><tr>
		<td> <input type='checkbox'  required ></td>
		<td colspan='3'><b> Decleration </b> I hereby declared that I have submitted application form and all the informations are correct and true to the best of my knowledge and belief. In case of any descrepancy you are entitled to cancel my candidature at any time. </td>
	</tr>
	<tr> 
		<td colspan='3' >
		
		
		<?php 
			echo form_submit(array('name'=>'','value'=>'Apply NOW','class'=>'btn-warning'));
			echo form_close();
		  ?>
		<input type='reset' class='class="btn btn-default' onClick='ctetSubmit()'> 
		</td>  
	</tr>
	
	</tbody>
</table>
<span id='ctetMsg'></span>
</div>
</div>
</div>
</div>
             
               
            </div>
          </div>
        </div>
      </div>
    </section>

  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
  

