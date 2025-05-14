
  <!-- Start main-content -->
  <style>
	.table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th, .table>thead>tr>td, .table>thead>tr>th {
    padding: 8px;
    line-height: 1.42857143;
    vertical-align: top;
    border-top: none;
}
  </style>

  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">Application Status</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                <li><a href="#">Career</a></li>
                
                <li class="active text-gray-silver">Application Status</li>
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
            <div class="content-wrapper">
         <div class="container">
        <div class="row pad-botm">
            <div class="col-md-12">
                <h4 class="header-line">Pay Online Fees Through Paytm- Support Digital India</h4>
				
            </div>

        </div>
             
		<div class="row">
		
		<div class="col-md-4 text-justify"> 
					
						<div class="panel-heading alert-warning">
                           Payment Details
                        </div>
						
                        <div class="panel-body alert-default">
                            <form role="form" id='onLinePay' method='post' >
                                        
										<div class="form-group">
                                            <label>Application No. *</label>
                                            <input class="form-control" onKeyUp='setReg(this)' type="text" id='app_no' required />
                                    
                                        </div>
										
                                        <div class="form-group">
                            <label>Payment Mode *</label>
                            <select Name ='txn_mode' class='form-control' required>
								<option value ='Paytm'>Paytm</option>
                                <option value ='Paphone'> Pephone</option>
								
							</select>
                            
                        </div>
                                        <div class="form-group">
                                            <label> Mobile No. (Paytm / Phonepe) *</label>
                                            
                                            <input class="form-control" type="number" name='txn_mobile' required maxlength='10' minlength='10'  />
                                     
                                        </div>
										<div class="form-group">
                                            <label> Transaction ID *</label>
                                            <input class="form-control"  type="text" name='txn_id' required />
                                    
                                        </div>
										
										<div class="form-group">
                                            <label> Amount *</label>
                                            <input class="form-control"  type="number" name='txn_amount' required />
                                     
                                        </div>
										
                                 
                                       

                                    </form>
									 <button type="button" class="btn btn-warning" id='payTm'>Submit </button>						 <input type='hidden' name='id' id='id' >
                        </div>
						
                        
			
		</div>
            
        <div class="col-md-4 text-justify">  
			
			<img src='<?php echo base_url();?>web/images/paytm.jpg' width='300px' >
			<h3 class="header-line" > Paytm A/c No: 9504491618 </h3>
			<div style="border:1px; background-color: #ccc; width:301px;"><h4 class="header-line" ><img src="<?php echo base_url();?>web/images/phonepe.jpg"  style="width:40px;"/> Phonepe A/c No: 9504491618 </h4></div>
        </div>
		<div class="col-md-4 text-justify">  
		<h4 class="header-line"> Contact Address </h4>
			<h5><b> Office</b> </h5>  
			<p>Budh Bhawan Kachehari station main road, <br>near Yoginiya Kothi mandir, <br>Chapra, Saran </p>
			<p> +91 9504491618 </p>
			<h5><b> Head Office </b></h5>
			<p> Bada Telpa Near Petrol Pmp,<br> Mission Road, Chapra   <br> Saran, Bihar - 841301 </p>
			<h5><b> Contact No.</b> </h5>
			<p> +91 9504491618 </p>
			<h5> <b>Email</b> </h5>
			<p> <a href='mailto:krishnfoundation.com'>info@krishnfoundation.com</a> </p>
        </div>
		</div>
		<br>
		<p>
		<b> Note : </b> Fill correct transaction Id and Application Id. In case of any discrepancy we are entitled to cancel your candidature at any time. 
		</p>
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
   
    
	<script src='<?php echo base_url();?>assets/js/online.js'></script>