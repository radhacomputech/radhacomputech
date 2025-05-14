<?php 
$this->load->view('admin/header');
$this->load->view('admin/menu');
$token = $this->session->userdata('token_id');
  $login_id = $token['login_id'];
  $user_type= $token['user_type'];
?>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Students(R)</li>
                </ol>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                       
                            <!-- <div class="card-header"><i class="fa fa-table"></i> Data Table Example</div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="default-datatable" class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th colspan='8' class='text-center'>
                                                <button type="button" class="btn btn-success btn-xs  waves-effect waves-light mt-2" style='float:left' onClick='toggleCheck()'>  <input type="checkbox" id='masterCheckBox' onClick='checkIdAll(this)'>&nbsp; &nbsp; All</button>
                                                
                                               
                                               
                                               
                                                &nbsp; <button type="button" class="btn btn-info btn-xs  waves-effect waves-light mt-2"  onClick='updateResult(this)' value='Result' data-modal='result'>Update Certificate Details</button>
                                                
                                                &nbsp; <button type="button" class="btn btn-pink btn-xs  waves-effect waves-light mt-2"  onClick='markOnline(this)' title='Mark As Online' value='Online' >Online</button>
                                                
                                                
                                                
                                               
                                                </th>
                                            <tr>
                                                <th></th>
                                                <th>Roll No.</th>
                                                <th>Course </th>
                                                <th>Student Name</th>
                                                <th>Father's Name.</th>
                                                <th>Address</th>
                                                <th>Mobile No.</th>
                                                <th>DOB.</th>
                                                <!-- <th>Status</th> -->
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Row-->
            </div>
            <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
        </div>
        <!--End wrapper-->
        <div class="modal fade" id="student-modal">
        <div class="modal-dialog modal-lg">
        <div class="modal-content animated zoomInUp">
            <div class="modal-header">
            <span class="modal-title text-primary" id='studentTitleNew'>Add New Student Here</span>
            <span class="modal-title text-warning" id='studentTitleUpdate' style='display:none'></span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form id='studentForm'>
                <div class='row'>
                <div class="col-md-4">
                                        <div class='form-group'>
                                            <label>Reg. Date *</label>
                                            <?php 
                                            $center_id = $this->Offer_model->multitableinfo('user',"id='$login_id'","center_id");
                                            $permission = $this->Offer_model->multitableinfo('center_details',"id='$center_id'","date_permission");
                                            ?>
                                            <input type='date' name='stu_reg_date' id='stu_reg_date' onChange='fillRegNo()' class='form-control' value='<?php echo date('Y-m-d');?>' <?php if($permission!="YES") {echo "readonly";}?> required  >
                                        </div>
                                        <div class="form-group">
                                            <label>Select Center Code </label>
											 <select class="form-control" name='center_id' id='center_id'  required>
                                               <option value=''>---- Select One ----</option>
                                               <?php 
                                                 if($user_type=='ADMIN') 
                                                 {  
                                                    $cent_list =  $this->Offer_model->select_all('center_details',"status not in('removed','EMPTY')");
                                                    foreach($cent_list as $center)
                                                    {
                                                    
                                                    ?> 
                                                    <option value='<?php echo $center->id;?>' <?php if($center_id==($center->id)) echo "selected";?>> <?php echo $center->center_name;?></option>
                                                    <?php 
                                                    }
                                               
                                               }
                                               else 
                                               {
                                                   ?> 
                                                   <option value='<?php echo $center_id;?>' selected> <?php echo $this->Offer_model->multitableinfo('center_details',"id='$center_id'","center_name");?></option>
                                                   <?php  
                                               }
                                                ?>
                                            </select>
                                        </div>	
										<div class="form-group">
                                            <label>Select Course Name </label>
                                            <select class="form-control" name='stu_course' onChange='fillRegNo()' id='stu_course' required>
                                            <option value=''>---- Select One ----</option>
                                               <?php 
                                               $course_string = $this->Offer_model->multitableinfo('center_details',"id='$center_id' and status not in('removed','EMPTY')","assigned_courses");
                                               if($course_string<>'')
                                               {
                                                   $course_list = explode(",",$course_string);
                                            
                                                    foreach($course_list as $course_id)
                                                    {
                                                            echo "<option value='$course_id'>".$this->Offer_model->multitableinfo('course_details',"id='$course_id'","course_name")."</option>";
                                                    }
                                                }
                                                ?>
                                            </select>
											<info style='color:red'> </info>
                                        </div>	
										
										<div class="form-group">
                                            <label>Student Name</label>
                                            <input class="form-control" placeholder="Student Name Here" id='student_name' name='student_name' required>
                                        </div>
                                        <div class="form-group">
                                            <label>Father's Name</label>
                                            <input class="form-control" placeholder="Father's Name" id='stu_father' name='stu_father' required>
                                        </div>  
										
										
										
					</div>	
					<div class="col-md-4">
                                        <div class="form-group">
                                            <label>Date of Birth</label>
                                            <input class="form-control"  type='date' name='stu_dob' id='stu_dob' max='2015-01-01' onKeyUp='fillRegNo()' required>
                                        </div>
                                         <div class="form-group">
                                            <label> Reg. No.</label>
                                            <input class="form-control" placeholder="Reg No Here" id='stu_roll'  data-error='#errorMsg'  data-name='student' name='stu_roll' readonly>
                                               <span class='error' id='errorMsg'></span>
                                      
                                        </div>
										<!-- <div class="form-group">
                                            <label>Enter Mother's Name</label>
                                            <input class="form-control" placeholder="Mother's Name" id='student_mother' name='student_mother'>
                                        </div> -->
                                        
						
										<div class="form-group">
                                            <label>Select Sex</label>
                                            <select class="form-control" name='stu_gender' id='stu_gender' required>
                                                <!-- <option value=''>Select A Value</option> -->
                                                <?php 
                                                $sex_list = dropdown('gender');
                                                foreach($sex_list as $gen_key=>$gen_val)
                                                {
                                                    echo "<option value='$gen_key'>$gen_val</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Category</label>
                                            <select class="form-control" name='stu_category' id='stu_category' required>
                                                <!-- <option value=''>Select A Value</option> -->
                                                <?php 
                                                $category_list = dropdown('category');
                                                foreach($category_list as $cat_key=>$cat_val)
                                                {
                                                    echo "<option value='$cat_key'>$cat_val</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>	
                                        <div class="form-group">
                                            <label>Select Religion</label>
                                            <select class="form-control" name='stu_religion' id='stu_religion' required>
                                                <!-- <option value=''>Select A Value</option> -->
                                                <?php 
                                                $religion_list = dropdown('religion');
                                                foreach($religion_list as $rel_key=>$rel_val)
                                                {
                                                
                                                    echo "<option value='$rel_key'>$rel_val</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>	
										
                                      
						</div>	
						<div class="col-md-4">
                                        <div class="form-group">
                                            <label>Enter Mobile No.  </label>
                                            <input type='number' class="form-control" placeholder="" id='stu_mobile' name='stu_mobile' maxlength='10' minlength='10' required>
                                        </div>
                                        <div class="form-group">
                                            <label>Enter Email Id. </label>
                                            <input class="form-control" placeholder="someone@email.com" id='stu_email' name='stu_email' type='email' >
                                        </div>
										<div class="form-group">
                                            <label>Address </label>
                                            <textarea class="form-control" rows="2" id='stu_address' name='stu_address'></textarea>
                                        </div>
                                        
                                        <div>
                                        <input type='hidden' name='status' value='ACTIVE'>
                                        <input type='checkbox'id='confirmSms' checked> &nbsp; &nbsp; <span class='text-warning'>Send SMS.</span>
                                        <div class="form-group">
                                            <label>Upload Photograph </label>
                                            <input type="file" id='student_photo' class='form-control' accept='image/*' data-name='student' data-category='photo' display-tag='#dispPhoto'>
                                        </div>
                                            <center><img  id='dispPhoto' src='#' height='50px' style='display:none'></span></center>
                                        </div>
                                     
              </form>
            
            </div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-xs" onClick='updateData(this)' data-ctrl='update_me' data-name='student' data-load='regular_student' data-frm='#studentForm' value='Save Now'><i class="fa fa-check-square-o"></i> Save Now</button>
            </div>
        </div>
        </div>
    </div>
    <!-- ---------------------input id -------------------------- -->

    <input type='hidden' id='id'>
    <input type='hidden' id='event'>

  <!-- -----------------------------------------Modal Dialog 2------------------------------------ -->
  <div class="modal fade" id="transaction-modal">
        <div class="modal-dialog modal-sm">
        <div class="modal-content animated zoomInUp">
            <div class="modal-header">
            <span class="modal-title text-warning" id='transactionTitleUpdate'></span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form id='paymentForm'>
                <div class='row'>
                        <div class='col-lg-12'>
                            <div class="form-group">
                                <label>Payment Date * </label>
                                <input type='date' name='txn_date' class='form-control' id='txn_date' value='<?php echo date('Y-m-d');?>'>
                            </div>
                            
                                                                    
                            <div class="form-group">
                                <label> Fee Name *  </label>
                                <input class="form-control"  name='fee_name'  type='text' id='fee_name'  required>
                            </div>
                            
                            <div class="form-group">
                                <label> Paid Amount * </label>
                                <input  class="form-control" name='txn_amount'  type='txn_amount' id='txn_amount' ' minlength='0' required>
                            </div>
                            <div class="form-group">
                                <label> Remarks  </label>
                                <textarea name='remarks' class='form-control' id='remarks'></textarea>
                            </div>
                           &nbsp;  <input type='checkbox' name='send_sms' id='paySms' checked > &nbsp; &nbsp;  Send Confirmation SMS.
                            <input type='hidden' name='student_id' id='student_id'>
                            <input type='hidden' name='status' value='ACTIVE'>
        </form>  
                          
            </div>
            </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-xs" onClick='updateMarks(this)' data-ctrl='update_me' data-name='transaction' data-frm='#paymentForm' value='Pay Now'><i class="fa fa-check-square-o"></i> Pay Now</button>
            </div>
        </div>
        </div>
    </div>
    <!-- -----------------------------------------------------certificate Modal------------------------ -->
    <div class="modal fade" id="result-modal">
        <div class="modal-dialog modal-sm">
        <div class="modal-content animated zoomInUp">
            <div class="modal-header">
            <span class="modal-title text-warning" id='resultTitleUpdate'></span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
           
            <form id='resultForm'>
                        <div class="form-group">
                            <label>Center Name </label>
                            <input class="form-control" name='stu_pass' id='stu_pass' required>
                        </div>
                        <div class="form-group">
                            <label>Mother Name </label>
                            <input class="form-control" name='mother' id='mother' required>
                        </div>
           
                     <div class="form-group">
                            <label>Course Duration</label>
                            <input class="form-control" name='ms_no' id='ms_no' required>
                        </div>
                        
                        <div class="form-group">
                                            <label>Certificate Si. No.</label>
                                            <input class="form-control" name='si_no' id='si_no' data-error='#certError' data-name='student' onKeyUp='checkDuplicate(this)' autofocus required >
                                            <span id='certError' class='error'></span>
                                      
                                        </div>
                                        
                        <div class="form-group">
                            <label>Date of Issue</label>
                            <input class="form-control"  type='date' name='cer_date' id='cer_date' required>
                        </div>
                                        
                                 <b><u> Marks Detais</b></u>
                        <div class="form-group">
                            <label>Written </label>
                            <input class="form-control" name='written' id='written' >
                        </div>
                        
                         <div class="form-group">
                            <label>Practicle </label>
                            <input class="form-control" name='practicle' id='practicle' >
                        </div>
                        
                         <div class="form-group">
                            <label>Viva </label>
                            <input class="form-control" name='viva' id='viva' >
                        </div>
                        
                        <div class="form-group">
                            <label>Assignment/Projects </label>
                            <input class="form-control" name='project' id='project' >
                        </div>
                        
                         <div class="form-group">
                            <label>Total obtain Marks</label>
                            <input class="form-control" name='total_marks' id='total_marks' >
                        </div>
                        
                        
              				
                        <div class="form-group">
                            <label>Enter Grade/Per%/Speed</label>
                            <input class="form-control" name='grade' id='grade' >
                        </div>
                        <!-- <div class="form-group">
                            <label> Percentage </label>
                            <input class="form-control" name='finalpercentage' id='finalpercentage' required >
                        </div>
                        
                        <div class="form-group">
                            <label>Comment (Pass/ Fail) </label>
                            <input class="form-control" name='comment' id='comment' required>
                        </div> -->
                    <input type='hidden' name='status' value='RESULT OUT'>
                    </form>
          
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-xs" onClick='updateData(this)' data-ctrl='update_me' data-name='student' data-frm='#resultForm' value='Save Now'><i class="fa fa-check-square-o"></i> Save Now</button>
            </div>
        </div>
        </div>
    </div>
    <?php 
    $this->load->view('admin/footer');
    ?>
     <script>
        $(window).on('load', function() {
            loadTable('student', '#default-datatable');
        });
    </script>
   
