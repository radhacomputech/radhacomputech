<?php 
$this->load->view('admin/header');
$this->load->view('admin/menu');
?>
<style>
.no-margin{
    margin-top:2px;
    margin-bottom:0;
}
</style>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Video Class</li>
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
                                                <button type="button" class="btn btn-primary btn-xs  waves-effect waves-light mt-2" onClick='generateNew(this)' data-name='video' data-toggle='modal' data-target='#video-modal' onmouseover="makeDefault(this)" data-modal='video'>New</button>
                                               <!-- &nbsp;<button type="button" class="btn btn-warning btn-xs  waves-effect waves-light mt-2" onClick='editNow(this)' data-name='fee_type'>Edit</button> -->
                                                &nbsp; <button type="button" class="btn btn-danger btn-xs  waves-effect waves-light mt-2" data-ctrl='delete' onClick='deleteData(this)' value='Delete' data-name='video'>Delete</button>

                                                </th>
                                            <tr>
                                                <th></th>
                                                <th>Video Title</th>
                                                <th style='width:100px'>Date</th>
                                                <th style='width:250px'>URL</th>
                                                <th>Type</th>
                                               
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
        <div class="modal fade" id="video-modal">
        <div class="modal-dialog modal-sm">
        <div class="modal-content animated zoomInUp">
            <div class="modal-header">
            <span class="modal-title text-primary" id='videoTitleNew'>Add New Video</span>
            <!-- <span class="modal-title text-warning" id='userTitleUpdate' style='display:none'></span> -->
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <form id='videoForm'>
                <div class='row'>
                 <div class="col-md-12">
                         <div class="form-group">
                            <label>Video Date *</label>
                            <input class="form-control"  type='date' id='video_date' name='video_date' autofocus required>
                        </div>
                        <div class="form-group">
                            <label>Video  Title/Name *</label>
                            <input class="form-control" type='text' id='video_title' name='video_title'  required>
                        </div>
                        <div class="form-group">
                            <label>Video Type *</label>
                            <select class="form-control" onChange='showCourse(this)'  placeholder="" id='video_type' name='video_type'  required>
                            <option value='Gallery'>Gallery</option>
                            <option value='Class'>Class</option>
                            </select>
                        </div>
                    <div class="form-group">
                            <label>Video (Youtube) Url *</label>
                            <input class="form-control" type='url' placeholder="" id='video_url' name='video_url' value='' required>
                        </div>
                        <input type='hidden' name='status' value='ACTIVE'>
                        <input type='hidden' name='topics' id='assigned_courses' value=''>
                        </form>
                      <div id='courseDiv' style='display:none'>
                      <div style='width:100%;border:solid 1px #eee; min-height:120px;max-height:120px;overflow-y:scroll'>
                      <?php 
                     $course_list =  $this->Offer_model->select_all('course_details',"status  in('ACTIVE')");
                     
                     foreach($course_list as $course){
                         
                         echo "<input type='checkbox' class='course_list' onChange='fillCourse()' value='$course->course_name' style='position:inherit;height:15px'>&nbsp &nbsp; &nbsp; $course->course_name <hr class='no-margin'>";
                     }
                      ?>
                      </div>
                   
                 </div>
                
                 </div>
              </div>
              
              <input type='hidden' id='id'>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-primary btn-xs" onClick='updateData(this)' data-ctrl='update_me' data-name='video' data-frm='#videoForm' value='Save Now'><i class="fa fa-check-square-o"></i> Save Now</button>
            </div>
        </div>
        </div>
    </div>
  
    <?php 
    $this->load->view('admin/footer');
    ?>
     <script>
        $(window).on('load', function() {
            loadTable('video', '#default-datatable');
        });
    </script>
   
