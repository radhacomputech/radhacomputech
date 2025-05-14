<?php 
$this->load->view('admin/header');
$this->load->view('admin/menu');
?>
<style>
.course-item{
    font-size:12px;
}
</style>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Center</li>
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
                                                <button type="button" class="btn btn-primary btn-xs  waves-effect waves-light mt-2" onClick='generateNew(this)' data-name='center_details' data-toggle='modal' data-target='#center-modal' onmouseover="makeDefault(this)" data-modal='center'>New</button>
                                               &nbsp;<button type="button" class="btn btn-warning btn-xs  waves-effect waves-light mt-2" onClick='editNow(this)' data-name='center'>Edit</button>
                                                &nbsp; <button type="button" class="btn btn-danger btn-xs  waves-effect waves-light mt-2" data-ctrl='delete' onClick='deleteData(this)' value='Delete' data-name='center_details'>Delete</button>

                                                </th>
                                            <tr>
                                                <th></th>
                                                <th>Center_Code</th>
                                                <th>Name</th> 
                                                <th>Director's Name</th>
                                                <th>Mobile_No</th>
                                                <th style='width:200px'>Address</th>
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
        <div class="modal fade" id="center-modal">
        <div class="modal-dialog">
        <div class="modal-content animated zoomInUp">
            <div class="modal-header">
            <span class="modal-title text-primary" id='centerTitleNew'>Add New Center</span>
            <span class="modal-title text-warning" id='centerTitleUpdate' style='display:none'></span>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <form id='centerForm' enctype="multipart/form-data">
                <div class="modal-body">
                    <div class='row'>
                        <div class="col-md-6">
                                <div class="form-group">
                                    <label>Date of Registration *</label>
                                    <input class="form-control"  type='date' id='center_dos' name='center_dos' value='<?php echo date('Y-m-d');?>' >
                                </div>
                                <div class="form-group">
                                    <label> Center Code *</label>
                                    <input class="form-control" id='center_code' placeholder="" name='center_code' data-error='#errorMsg' data-name='center_details' onKeyUp='checkDuplicate(this)' autofocus required>
                                    <span class='error' id='errorMsg'></span>
                                </div>	
                                <div class="form-group">
                                    <label> Center Name *</label>
                                    <input class="form-control" placeholder="Full Name of Center" id='center_name' name='center_name' required>
                                </div>											
                                <div class="form-group">
                                    <label> Director Name *</label>
                                    <input class="form-control" placeholder="Director Name Here" id='center_director' name='center_director' required>
                                </div>
                                
                                <div class="form-group">
                                    <label> Mobile No. <small>(Center/ Director)</small> *</label>
                                    <input class="form-control" type='number' placeholder="" id='center_mobile' name='center_mobile' maxlength='10' minlength='10' required>
                                </div>
                                <div class="form-group">
                                    <label> Email Id.  <small>(Center/ Director)</small>  </label>
                                    <input class="form-control" placeholder="someone@email.com" id='center_email' name='center_email' type='email' >
                                </div>
                                <!-- <div class="form-group">
                                    <label> Father's Name *</label>
                                    <input class="form-control" placeholder="Father's Name" name='center_father' id='center_father' required>
                                </div> -->
                            
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Address (center) *</label>
                                <textarea class="form-control" rows="2" id='center_address' name='center_address'></textarea>
                            </div>
                            <div class='form-group'>
                                <label>Sender Id *</label>
                                <input type='text' name='sender_id' id='sender_id' class='form-control' required maxlength='6' minlength='6'>
                            </div>
                            <div class='form-group'>
                                <label>SMS API</label>
                                <input type='text' name='auth_key' id='auth_key' class='form-control' required>
                            </div>
                            <input type='hidden' name='status' value='ACTIVE'>
                            <div class='form-group'>
                                <label>  Date Permission * </label>
                                <select name='date_permission' class='form-control' id='date_permission'>
                                    <?php 
                                    $permission_list = dropdown('permission');
                                    foreach($permission_list as $permission)
                                    {
                                        echo "<option value='$permission'>$permission</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </form>
                            <input type='hidden' id='assigned_courses' name='assigned_courses'>
                            <div class="form-group">
                                <label>Director's Photograph </label>
                                <input type="file" name="director_photo" id='director_photo' class='form-control' accept='image/*' data-name='center_details' data-category='photo' display-tag='#dispPhoto'>
                            </div>
                            <center><img  id='dispPhoto' src='#' height='50px' style='display:none'></span></center>
                            
                        </div>
                        
                    </div>
                    <div class="form-group">
                                <label>Assign Courses [ <input type='checkbox'id='total' onChange='assignTotal(this)'>  &nbsp; &nbsp;  All ] </small> *</label>
                                <div style='border:solid 1px #eee; padding:5px; max-height:100px; min-height:50px;overflow-y:scroll'>
                                    <?php 
                                    $course_list = $this->Offer_model->getarray('course_details',"status='ACTIVE'");
                                        foreach($course_list as $course_data)
                                        {
                                    ?>
                                    <input type='checkbox' onChange='fillCourse()' id='course_item<?php echo $course_data['id'];?>'  class='course_list' value="<?php echo $course_data['id'];?>" style='position:relative;height:15px'>&nbsp;  &nbsp;&nbsp;<span class='course-item'><?php echo $course_data['course_name']?></span><br> <hr style='margin-bottom:1px;margin-top:1px'>
                                        <?php }?>
                                </div>
                    </div>
                            
                    <input type='hidden' id='id'>
                    <input type='hidden' id='event' >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-xs" onClick='updateData(this)' data-ctrl='save_center' data-name='center_details' data-frm='#centerForm' value='Save Now'><i class="fa fa-check-square-o"></i> Save Now</button>
                </div>
        </div>
        </div>
    </div>
    </div>
    </div>
  
    <?php 
    $this->load->view('admin/footer');
    ?>
     <script>
     
        $(window).on('load', function() {
            loadTable('center_details', '#default-datatable');
        });
    </script>
   
