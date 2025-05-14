<?php 
$this->load->view('admin/header');
$this->load->view('admin/menu');
$ledger_array = $_SESSION['ledger_session'];
extract($ledger_array);
?>
        <!--End topbar header-->

        <div class="clearfix"></div>

        <div class="content-wrapper">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Student Ledger</li>
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
                                        <h5 align='center'>Ledger Of <span class='text-warning'><?php echo $this->Offer_model->multitableinfo("student","id='$ledger_dataId'","student_name");?></span></h5>
                                        <thead>
                                            <tr>
                                                <th colspan='8' class='text-center'>
                                                <button type="button" class="btn btn-success btn-xs  waves-effect waves-light mt-2" style='float:left' onClick='toggleCheck()'>  <input type="checkbox" id='masterCheckBox' onClick='checkIdAll(this)'>&nbsp; &nbsp; All</button>
                                                <!-- <button type="button" class="btn btn-primary btn-xs  waves-effect waves-light mt-2" onClick='generateNew(this)' data-name='user' data-toggle='modal' data-target='#user-modal' onmouseover="makeDefault(this)" data-modal='center'>New</button> -->
                                               &nbsp;<button type="button" class="btn btn-warning btn-xs  waves-effect waves-light mt-2" onClick='sessionGen(this)' data-location='payment_receipt' data-id_name='receipt_id' data-name='receipt'>Print</button>
                                                &nbsp; <button type="button" class="btn btn-danger btn-xs  waves-effect waves-light mt-2" data-ctrl='delete' onClick='deleteData(this)' value='Delete' data-name='transaction'>Delete</button>
                                                </th>
                                            <tr>
                                                <th></th>
                                                <th>Date</th>
                                                <th>Fee Name</th>
                                                <th>Fee Amount</th>
                                                <th>Remarks</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $total=0;
                                        $txn_array = $this->Offer_model->select_all('transaction',"student_id='$ledger_dataId' and status<>'removed'"); 
                                       foreach($txn_array as $row)
                                       {
                                           $total =$total+$row->txn_amount;
                                        ?>
                                            <tr>
                                                <td><input type='checkbox' class='my-id' value="<?php echo $row->id;?>" data-row="<?php echo json_encode($row);?>"></td>
                                                <td><?php echo nice_date($row->txn_date,"d-M-Y");?></td>
                                                <td><?php echo $row->fee_name;?></td>
                                                <td align='right'> &#8377; <?php echo $row->txn_amount;?></td>
                                                <td><?php echo $row->remarks;?></td>
                                            </tr>
                                        <?php 
                                       }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td></td>
                                                <td colspan='2'>Total</td>
                                                <td align='right'> &#8377; <?php echo $total;?></td>
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
   
