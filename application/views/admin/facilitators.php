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
                    <li class="breadcrumb-item active" aria-current="page">Admission Application</li>
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
                                               <button type="button" class="btn btn-primary btn-xs  waves-effect waves-light mt-2" onClick='generateNew(this)' data-name='facilitators' data-toggle='modal' data-target='#facilitators-modal' onmouseover="makeDefault(this)" data-modal='facilitators'>New</button>

                                               &nbsp;<button type="button" class="btn btn-warning btn-xs  waves-effect waves-light mt-2" onClick='editNow(this)' data-name='facilitators'>Edit</button>
                                             
                                                &nbsp; <button type="button" class="btn btn-danger btn-xs  waves-effect waves-light mt-2" data-ctrl='delete' onClick='deleteData(this)' value='Delete' data-name='facilitators'>Delete</button>

                                                <!--  &nbsp; <button type="button" class="btn btn-success btn-xs  waves-effect waves-light mt-2" data-ctrl='delete' onClick='fnExcelReport(default-datatable)'>Excel</button>
 -->
                                                </th>
                                            <tr>
                                                <th></th>
                                               <th>Name</th>
                                                <th>Father's Name</th>
                                                <th>Date Of Joining</th>
                                                <th>Period Of Serving</th>
                                                <th>Designation</th>
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
        <div class="modal fade" id="facilitators-modal">
        <div class="modal-dialog">
        <div class="modal-content animated zoomInUp">
            <div class="modal-header">
            <span class="modal-title text-primary" id='studentTitleNew'>Add New Facilitator</span>
            <span class="modal-title text-warning" id='studentTitleUpdate' style='display:none'></span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form id='facilitatorsForm'>
                <div class='row'>
                <div class="col-md-12">
                                        
										<div class="form-group">
                                            <label>Facilitator's Name *</label>
                                            <input class="form-control" placeholder="Student Name Here" id='facilitator_name' name='facilitator_name' required>
                                        </div>
                                        <div class="form-group">
                                            <label>Father's Name *</label>
                                            <input class="form-control" placeholder="Father's Name" id='father' name='father' required>
                                        </div>  
						
				
                                        <div class="form-group">
                                            <label>Date of Joining *</label>
                                            <input class="form-control"  type='date' name='doj' id='doj'  required>
                                        </div>
                                         <div class="form-group">
                                            <label> Period Of Serving </label>
                                            <input class="form-control" placeholder="" id='period' name='period' >
                                             
                                        </div>
                                        <div class="form-group">
                                            <label> Designation * </label>
                                            <input class="form-control" placeholder="" id='designation' name='designation' >
                                             
                                        </div>
                                     <input type="hidden" name="status" value="ACTIVE">
              </form>
             <input type='hidden' id='id'>
            </div>
            </div>  
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-xs" onClick='updateData(this)' data-ctrl='update_me' data-name='facilitators'  data-frm='#facilitatorsForm' value='Save Now'><i class="fa fa-check-square-o"></i> Save Now</button>
            </div>
        </div>
        </div>
    </div>
    <!-- ---------------------input id -------------------------- -->

   
 
    <?php 
    $this->load->view('admin/footer');
    ?>
     <script>
        $(window).on('load', function() {
            loadTable('facilitators', '#default-datatable');
        });
    </script>
   
