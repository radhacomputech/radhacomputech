<?php 
$this->load->view('admin/header');
$this->load->view('admin/menu');
$token = $this->session->userdata('token_id');
  $login_id = $token['login_id'];
  $login_center = $this->Offer_model->multitableinfo('user',"id='$login_id'","center_id");
?>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Collection</li>
                </ol>
            </nav>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                       
                            <!-- <div class="card-header"><i class="fa fa-table"></i> Data Table Example</div> -->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="collection_table" class="table table-bordered" id='collection_tabled' onClick=fnExcelReport('collection_table')">
                                        <h5 align='center'>Get Your <span class='text-warning'>Collection Report</span></h5>
                                        <div class='row' style='margin-right:0px'>
                                        <form action='' method='post'>
                                            <div class='col-lg-3'></div>
                                            <div class='col-lg-2'>
                                                <div class='form-group'>
                                                    <label>From Date *</label>
                                                    <input type='date' class='form-control' name='from_date' value='<?php echo date('Y-m-d');?>' required>
                                                </div>
                                            </div>
                                            <div class='col-lg-2'>
                                                <div class='form-group'>
                                                <label>To Date *</label>
                                                   <input type='date' class='form-control' name='to_date'  value='<?php echo date('Y-m-d');?>' required>
                                                </div>
                                            </div>
                                            <div class='col-lg-2'>
                                                <div class='form-group' style='padding-top:10px'>
                                                    <button class='class="btn btn-primary btn-sm  waves-effect waves-light mt-2' name='go'>Get Now</button>
                                                    </form>
                                                    <?php if(isset($_POST)) {?>
                                                   <button class='class="btn btn-warning btn-sm  waves-effect waves-light mt-2' onClick="fnExcelReport('collection_table')">Excel</button>
                                                    <?php }?>
                                                </div>
                                            </div>
                                           
                                            </div>
                                        <thead>
                                            <tr>
                                                <th>Sr. No.</th>
                                                <th>Payment Date</th>
                                                <th>Roll No.</th>
                                                <th>Student Name</th>
                                                <th>Fee Name</th>
                                                <th>Fee Amount</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $total=0;
                                        $i=1;
                                        $from_date = $to_date = date('Y-m-d');
                                      
                                        
                                        if(isset($_POST['go']))
                                        {
                                            extract($_POST);
                                        }
                                        else 
                                        {
                                            $from_date = $to_date = date('Y-m-d');
                                        }
                                        $txn_array = $this->Offer_model->select_all('transaction',"txn_date between '$from_date' and '$to_date' and status<>'removed'"); 
                                       foreach($txn_array as $row)
                                       {
                                          
                                          $student_id = $row->student_id;
                                          $student_name = $this->Offer_model->multitableinfo('student',"id='$student_id'","student_name");
                                          $student_roll = $this->Offer_model->multitableinfo('student',"id='$student_id'","stu_roll");
                                          $student_center = $this->Offer_model->multitableinfo('student',"id='$student_id'","center_id");
                                        if($login_center==$student_center)
                                        {
                                             $total =$total+$row->txn_amount;
                                        ?>
                                            <tr>
                                                <td><?php echo $i;?></td>
                                                <td><?php echo nice_date($row->txn_date,"d-M-Y");?></td>
                                                <td><?php echo $student_roll;?></td>
                                                <td><?php echo $student_name;?></td>
                                                <td><?php echo $row->fee_name;?></td>
                                                <td align='right'> &#8377; <?php echo $row->txn_amount;?></td>
                                                <td><?php echo $row->remarks;?></td>
                                            </tr>
                                        <?php 
                                        $i++; 
                                        }}
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td colspan='2'><big>Total collection from <?php echo nice_date($from_date,'d-M-Y');?> to <?php echo nice_date($to_date,'d-M-Y');?> </b></td>
                                                <td align='right'><big> &#8377; <?php echo $total;?></big></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            </tr>
                                        </tfoot>
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
       
    <?php 
    $this->load->view('admin/footer');
    ?>
   
