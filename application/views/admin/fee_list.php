<?php 
$this->load->view('admin/header');
$this->load->view('admin/menu');
?>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Fee List</li>
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
                                                <button type="button" class="btn btn-primary btn-xs  waves-effect waves-light mt-2" onClick='generateNew(this)' data-name='fee_type' data-toggle='modal' data-target='#fee-modal' onmouseover="makeDefault(this)" data-modal='fee'>New</button>
                                               <!-- &nbsp;<button type="button" class="btn btn-warning btn-xs  waves-effect waves-light mt-2" onClick='editNow(this)' data-name='fee_type'>Edit</button> -->
                                                &nbsp; <button type="button" class="btn btn-danger btn-xs  waves-effect waves-light mt-2" data-ctrl='delete' onClick='deleteData(this)' value='Delete' data-name='fee_type'>Delete</button>

                                                </th>
                                            <tr>
                                                <th></th>
                                                <th>Fee Name</th>
                                                <th>Fee Amount </th>
                                               
                                                <th>Status</th>
                                               
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
        <div class="modal fade" id="fee-modal">
        <div class="modal-dialog modal-sm">
        <div class="modal-content animated zoomInUp">
            <div class="modal-header">
            <span class="modal-title text-primary" id='feeTitleNew'>Add New Notice</span>
            <!-- <span class="modal-title text-warning" id='userTitleUpdate' style='display:none'></span> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form id='feeForm'>
                <div class='row'>
                 <div class="col-md-12">
                   
                        <div class="form-group">
                            <label>Fee Name *</label>
                            <input class="form-control" id='fee_name' name='fee_name' autofocus required>
                        </div>
                    <div class="form-group">
                            <label>Fee Amount *</label>
                            <input class="form-control" type='number' placeholder="" id='fee_value' name='fee_value' value='' required>
                        </div>
                       
                    <input type='hidden' name='status' value='ACTIVE'>
                 </div>
              </div>
              </form>
              <input type='hidden' id='id'>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-xs" onClick='updateData(this)' data-ctrl='update_me' data-name='fee_type' data-frm='#feeForm' value='Save Now'><i class="fa fa-check-square-o"></i> Save Now</button>
            </div>
        </div>
        </div>
    </div>
  
    <?php 
    $this->load->view('admin/footer');
    ?>
     <script>
        $(window).on('load', function() {
            loadTable('fee_type', '#default-datatable');
        });
    </script>
   
