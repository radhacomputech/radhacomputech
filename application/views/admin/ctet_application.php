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
                    <li class="breadcrumb-item active" aria-current="page">CTET Application</li>
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
                                                <!-- <button type="button" class="btn btn-primary btn-xs  waves-effect waves-light mt-2" onClick='generateNew(this)' data-name='student' data-toggle='modal' data-target='#student-modal' onmouseover="makeDefault(this)" data-modal='student'>New</button> -->
                                               <!-- &nbsp;<button type="button" class="btn btn-warning btn-xs  waves-effect waves-light mt-2" onClick='editNow(this)' data-name='ctet'>Edit</button> -->
                                             &nbsp;<button type="button" class="btn btn-info btn-xs  waves-effect waves-light mt-2" onClick='payNow(this)' data-name='ctet' data-modal='confirm'>Confirm</button>
                                              <!-- &nbsp;<button type="button" class="btn btn-success btn-xs  waves-effect waves-light mt-2" onClick='sessionGen(this)' data-location='student_ledger'  data-id_name='ledger_dataId' data-name='ledger_session'>Ledger</button>
                                                &nbsp; <button type="button" class="btn btn-dark btn-xs  waves-effect waves-light mt-2"  onClick='sessionGen(this)' data-location='registration_receipt' value='Reg. Slip' data-name='registration_session' data-id_name='registration_id'>Reg. Slip</button>
                                                <?php if($user_type=='ADMIN'){?>
                                                &nbsp; <button type="button" class="btn btn-info btn-xs  waves-effect waves-light mt-2"  onClick='updateResult(this)' value='Result' data-modal='result'>Result</button>
                                                <?php }?> -->
                                                &nbsp; <button type="button" class="btn btn-danger btn-xs  waves-effect waves-light mt-2" data-ctrl='delete' onClick='deleteData(this)' value='Delete' data-name='ctet'>Delete</button>

                                                </th>
                                            <tr>
                                                <th></th>
                                                <!-- <th>Study Center</th>
                                                <th>Course Code</th>
                                                <th>Reg. No.</th> -->
                                                <th>Student Name</th>
                                                <th>Father's Name</th>
                                                <th>Mobile NO.</th>
                                                <th>Date Of Birth</th>
                                                <th>Gender</th>
                                                <th>Txn. </th>
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
      
    <!-- ---------------------input id -------------------------- -->

    <input type='hidden' id='id'>

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
                                <label> Assignment / Project </label>
                                <textarea name='remarks' class='form-control' id='remarks'></textarea>
                            </div>
                           &nbsp;  <input type='checkbox' name='send_sms' checked> &nbsp; &nbsp;  Send Confirmation SMS.
                            <input type='hidden' name='student_id' id='student_id'>
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
                                            <label>Certificate Si. No.</label>
                                            <input class="form-control" name='si_no' id='si_no' data-error='#certError' data-name='student' onKeyUp='checkDuplicate(this)' autofocus required >
                                            <span id='certError' class='error'></span>
                                      
                                        </div>
                        <div class="form-group">
                            <label>Enter Grade </label>
                            <input class="form-control" name='grade' id='grade' required>
                        </div>
              				
                        <div class="form-group">
                            <label>Date of Issue</label>
                            <input class="form-control"  type='date' name='cer_date' id='cer_date' required>
                        </div>
                        
                        <!-- <div class="form-group">
                            <label> Percentage </label>
                            <input class="form-control" name='finalpercentage' id='finalpercentage' required >
                        </div>
                        
                        <div class="form-group">
                            <label>Comment (Pass/ Fail) </label>
                            <input class="form-control" name='comment' id='comment' required>
                        </div> -->
                    
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
            loadTable('ctet', '#default-datatable');
        });
    </script>
   
