

                
  <!-- Start main-content -->
  <div class="main-content">

    <!-- Section: inner-header -->
    <section class="inner-header divider parallax layer-overlay overlay-dark-5" data-bg-img="<?php echo base_url();?>web/images/bg/bg3.jpg">
      <div class="container pt-70 pb-20">
        <!-- Section Content -->
        <div class="section-content">
          <div class="row">
            <div class="col-md-12">
              <h2 class="title text-white">About Us</h2>
              <ol class="breadcrumb text-left text-black mt-10">
                <li><a href="#">Home</a></li>
                
                <li class="active text-gray-silver">Donate Us</li>
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
		 
              <!-- Portfolio Filter -->
              <div class="portfolio-filter">
                  <div class='row'>
                      <div class='col-lg-4'></div>
                      <div class='col-lg-4'>
                      <div class="razorpay-embed-btn" data-url="https://pages.razorpay.com/pl_EYOXmcI4M7Yvsu/view" data-text="Donate Now" data-color="#528FF0" data-size="large">
  <script>
    (function(){
      var d=document; var x=!d.getElementById('razorpay-embed-btn-js')
      if(x){ var s=d.createElement('script'); s.defer=!0;s.id='razorpay-embed-btn-js';
      s.src='https://cdn.razorpay.com/static/embed_btn/bundle.js';d.body.appendChild(s);} else{var rzp=window['_rzp_'];
      rzp && rzp.init && rzp.init()}})();
  </script>
</div>
                    </div></div>
                  <br>
               <center> <a href="#" class="active" data-filter="*">Donation List</a></center>
                
              </div>
			  <div class='row'>
				
			       <!-- <div class='table-responsive'>
			            <table class='table tbale-bordered  table-hover'>
			                <thead>
			                    <tr>
			                        <th>Sr. No.</th>
			                        <th>Name (Person/ Organisation/Committee)</th>
			                        <th>Address</th>
			                        <th>Date </th>
			                        <th>Donation Amount</th>
			                     </tr>
			                     
			                </thead>
			                <tbody>
			                    <?php 
			                        $i=1;
			                        $arr= array('status'=>'payment.authorized');
			                        $pay_array = $this->Offer_model->getarray('payment',$arr);
			                       foreach($pay_array as $row)
			                       {
			                           echo "<tr><td>".$i."</td>";
			                           echo "<td>".$row['name']."</td>";
			                           echo "<td>".$row['address']."</td>";
			                           echo "<td>".nice_date($row['created_at'],'d-M-Y')."</td>";
			                           echo "<td> &#8377; ".$row['amount']."</td></tr>";
			                           
			                           $i++;
			                       }
			                    
			                    ?>
			                </tbody>
			                </table>
			         </div>-->       
    </section>

  </div>
  <!-- end main-content -->
  
  <!-- Footer -->
 
     <div id="donateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Doante Here</h4>
      </div>
      <div class="modal-body">
        <p>Work Is In Progress</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary">Help Now</button>
      </div>
    </div>

  </div>
</div>