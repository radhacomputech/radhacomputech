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
                    <li class="breadcrumb-item active" aria-current="page">Study Material</li>
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
                                                <button type="button" class="btn btn-primary btn-xs  waves-effect waves-light mt-2" onClick='generateNew(this)' data-name='attachment' data-toggle='modal' data-target='#doc-modal' onmouseover="makeDefault(this)" data-modal='doc'>New</button>
                                               <!-- &nbsp;<button type="button" class="btn btn-warning btn-xs  waves-effect waves-light mt-2" onClick='editNow(this)' data-name='fee_type'>Edit</button> -->
                                                &nbsp; <button type="button" class="btn btn-danger btn-xs  waves-effect waves-light mt-2" data-ctrl='delete' onClick='deleteData(this)' value='Delete' data-name='attachment'>Delete</button>

                                                </th>
                                            <tr>
                                                <th></th>
                                                <th>Attahemnt Title</th>
                                                <th style='width:100px'>Uploaded On</th>
                                                <th style='width:300px'>URL</th>
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
        <div class="modal fade" id="doc-modal">
        <div class="modal-dialog modal-sm">
        <div class="modal-content animated zoomInUp">
            <div class="modal-header">
            <span class="modal-title text-primary" id='docTitleNew'>Add New Study Material</span>
            <!-- <span class="modal-title text-warning" id='userTitleUpdate' style='display:none'></span> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form id='docForm'>
                <div class='row'>
                 <div class="col-md-12">
                         <div class="form-group">
                            <label>Uploaded On *</label>
                            <input class="form-control"  type='date' id='mat_date' name='mat_date' autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Title/Name *</label>
                            <input class="form-control" type='text' id='mat_title' name='mat_title'  required>
                        </div>
                        <div class="form-group">
                            <label>Upload Attachment </label>
                            <input type="file" id='mat_url' class='form-control' accept='' data-name='attachment' data-category='documents' display-tag='#dispPhoto' capture='camera'>
                        </div>
                            <center><a  id='dispPhoto' href='#'  style='display:none'><button class='btn btn-xs btn-warning'>Download</button></a></center>
                       
                    <input type='hidden' name='status' value='ACTIVE'>
                 </div>
              </div>
              </form>
              <input type='hidden' id='id'>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-xs" onClick='updateData(this)' data-ctrl='update_me' data-name='attachment' data-frm='#docForm' value='Save Now'><i class="fa fa-check-square-o"></i> Save Now</button>
            </div>
        </div>
        </div>
    </div>
  
    <?php 
    $this->load->view('admin/footer');
    ?>
     <script>
        $(window).on('load', function() {
            loadTable('attachment', '#default-datatable');
        });
    </script>
   
