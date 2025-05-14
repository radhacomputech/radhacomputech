<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<form class="request-info clearfix" id='uploadPhoto'> 
								
								<center><img src='<?php echo base_url();?>uploads/<?php //echo $applicant_photo;?>' style='height:120px;width:110px' id='dmyPhoto'></center>
								<span id='origPhoto'></span>
								<br>
								<label>Upload Photo * (Size:- Min 30Kb. & Max 100kb )
							<input type='file' id='c_photo' name='c_photo' required>
							<br>
							</form>
<script src='<?php echo base_url();?>assets/js/upload.js'></script>