 <?php
 if(!$this->session->userdata('token_id'))
 {
   redirect(site_url().'logout');
   exit(0);
 }
   $token = $this->session->userdata('token_id');
   $login_id = $token['login_id'];
   $user_type= $token['user_type'];
   $login_api = $this->Offer_model->multitableinfo('user',"id='$login_id'",'my_api');
 
 $strtoken =session_id().$login_id; //.date('ymdhis');
 if($login_api<>$strtoken)
 {
  redirect(site_url().'logout');
  exit(0);
 }
 $app = config_item('app_name');
 $page = $this->uri->segment('1');
 $page_name = $app." | ".$page; 
 $page = $this->uri->segment(1);
 $center_code = $this->Offer_model->multitableinfo('user',"id='$login_id'","user_name");
 $center_id = $this->Offer_model->multitableinfo('user',"id='$login_id'","center_id");
 $center_image = $this->Offer_model->multitableinfo('center_details',"id='$center_id'","center_photo");
 ?>
 <!--Start sidebar-wrapper-->
        <div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
            <div class="brand-logo">
                <a href="<?php echo base_url();?>dashboard">
                    <h5 class="logo-text" align='center'><?php  echo $center_code;?></h5>
                </a>
            </div>
            <ul class="sidebar-menu do-nicescrol">
            <li ><a href="dashboard" class="waves-effect"><i class="fa fa-home text-red"></i> <span>Dashboard</span></a></li>
            <?php if($user_type=='ADMIN') {?>
            <li ><a href="center" class="waves-effect"><i class="fa fa-bank text-red"></i> <span>Center</span></a></li>
            <li ><a href="user" class="waves-effect"><i class="fa fa-user text-red"></i> <span>Users</span></a></li>
            <li ><a href="course" class="waves-effect"><i class="fa fa-book text-red"></i> <span>Course</span></a></li>
            <li>
            <a href="index.html" class="waves-effect">
            <i class="fa fa-child"></i> <span>Students</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
                    <ul class="sidebar-submenu">
                    <li><a href="reg_stu"><i class="fa fa-circle-o"></i>Update Certificate</a></li>
                     <li><a href="liv_stu"><i class="fa fa-circle-o"></i> Online</a></li>
                    
                
                    </ul>
            </li>
            <?php } else {?>
            <li ><a href="student" class="waves-effect"><i class="fa fa-child text-red"></i> <span>Students</span></a></li>
            <?php }?>
            <li ><a href="collection" class="waves-effect"><i class="fa fa-inr text-red"></i> <span>Collection</span></a></li>
            <!-- <li ><a href="query" class="waves-effect"><i class="fa fa-question text-red"></i> <span>Enquiry</span></a></li> -->
            <li ><a href="results" class="waves-effect"><i class="fa fa-file-pdf-o text-red"></i> <span>Print Certificate</span></a></li>
            <?php if($user_type=='ADMIN') {?>
               

            <li>
            <a href="index.html" class="waves-effect">
            <i class="fa fa-desktop"></i> <span>Online Class</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
                    <ul class="sidebar-submenu">
                    <li><a href="videoclass"><i class="fa fa-circle-o"></i> Video Classes</a></li>
                    <li><a href="attachment"><i class="fa fa-circle-o"></i> Attachments</a></li>
                
                    </ul>
            </li>
            <li>
            <a href="index.html" class="waves-effect">
            <i class="fa fa-file"></i> <span>Application</span> <i class="fa fa-angle-left pull-right"></i>
            </a>
                    <ul class="sidebar-submenu">
                    <li><a href="frenchise_app"><i class="fa fa-circle-o"></i> Frenchise Application</a></li>
                    <li><a href="ctet"><i class="fa fa-circle-o"></i> CTET Application</a></li>
                    <li><a href="admission"><i class="fa fa-circle-o"></i> Admission Application</a></li>
                
                    </ul>
            </li>
            <li>
        <a href="index.html" class="waves-effect">
          <i class="fa fa-wrench"></i> <span>Control Panel</span> <i class="fa fa-angle-left pull-right"></i>
        </a>
                <ul class="sidebar-submenu">
                <li><a href="fee"><i class="fa fa-circle-o"></i> Fee List</a></li>
                <li><a href="gallery"><i class="fa fa-circle-o"></i> Gallery</a></li>
                <li><a href="notice"><i class="fa fa-circle-o"></i> Notice</a></li>
                <li><a href="facilitators"><i class="fa fa-circle-o"></i> Facilitators</a></li>
                <li><a href="query"><i class="fa fa-circle-o"></i> Query</a></li>
                </ul>
         </li>
         <?php }?>
            <li data-toggle='modal' onClick='getSmsBal()' data-target='#sms-modal'><a href="#sendsms" class="waves-effect" ><i class="fa fa-envelope text-red"></i> <span>Send SMS</span></a></li>
            <li data-toggle='modal' data-target='#password-modal'><a href="#change_passord" class="waves-effect" ><i class="fa fa-key text-red"></i> <span>Change Password</span></a></li>
            <li onClick='logOut()'><a href="#" class="waves-effect" ><i class="fa fa-sign-out text-red"></i> <span>Logout</span></a></li>
            <li><a href="#null" class="waves-effect" ></a></li>
            </ul>
                    
        </div>
        <!--End sidebar-wrapper-->

        <!--Start topbar header-->
        <header class="topbar-nav">
            <nav class="navbar navbar-expand fixed-top bg-primary">
                <ul class="navbar-nav mr-auto align-items-center">
                    <li class="nav-item">
                        <a class="nav-link toggle-menu" href="javascript:void();">
                            <i class="icon-menu menu-icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <!-- <form class="search-bar">
                            <input type="text" class="form-control" placeholder="Enter keywords">
                            <a href="javascript:void();"><i class="icon-magnifier"></i></a>
                        </form> -->
                    </li>
                </ul>

                <ul class="navbar-nav align-items-center right-nav-link">
                  
                    <li class="nav-item">
                        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
                            <span class="user-profile"><img src="<?php echo base_url();?>uploads/<?php echo $center_image;?>" onerror="this.onerror=null;this.src='<?php echo base_url();?>uploads/no_image.jpg'" class="img-circle" alt="user avatar"></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-right animated fadeIn">
                            <!-- <li class="dropdown-item user-details">
                                <a href="javaScript:void();">
                                    <div class="media">
                                        <div class="avatar"><img class="align-self-start mr-3" src="<?php echo base_url();?>uploads/no_image.jpg" alt="user avatar"></div>
                                        <div class="media-body">
                                            <h6 class="mt-2 user-title">Katrina Mccoy</h6>
                                            <p class="user-subtitle">katrina92@example.com</p>
                                        </div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-envelope mr-2"></i> Inbox</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-wallet mr-2"></i> Account</li>
                            <li class="dropdown-divider"></li>
                            <li class="dropdown-item"><i class="icon-settings mr-2"></i> Setting</li>
                            <li class="dropdown-divider"></li> -->
                            <li class="dropdown-item" onClick='logOut()' style='cursor:pointer'><i class="icon-power mr-2"></i> Logout</li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>
        <!--End topbar header-->
        <div class="modal fade" id="password-modal">
                  <div class="modal-dialog modal-sm">
                    <div class="modal-content animated rollIn">
                      <div class="modal-header">
                        <span class="modal-title text-primary"><i class="fa fa-key"></i> Change Your Password</span>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form id='passForm'>
					<div class='form-group'>
						<label>Current Password * </label>
							<input type='password' name='current_password' id='current_password' class='form-control' required>
					</div>
					<div class='form-group'>
						<label>New Password * </label>
							<input type='password' name='new_password' onKeyUp='confirmPass()' id='new_password' class='form-control' required minlength='8' maxlength='16'>
					</div>
					<div class='form-group'>
						<label>Confirm New Password * &nbsp; &nbsp; <i class='fa fa-eye' title='Check Password' style='color:#b30581;cursor:pointer' onClick='passToggle()'></i></label>
							<input type='password' onKeyUp='confirmPass()' name='confirm_password' id='confirm_password' class='form-control' required minlength='8' maxlength='16'>
					</div>
					<span id='passError' style='font-size:10px;color:red'></span>
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-xs" onClick='changePassword(this)' data-ctrl='change_password' data-name='user' data-frm='#passForm' value='Change Now'><i class="fa fa-check-square-o"></i> Change Now</button>
                </div>
            </div>
            </div>
        </div>
        <!-- send seme modal dialog -->
        <div class="modal fade" id="sms-modal">
                  <div class="modal-dialog">
                    <div class="modal-content animated rollIn">
                      <div class="modal-header">
                        <span class="modal-title text-primary"><i class="fa fa-envelope"></i> Send SMS Here</span>
                        &nbsp; &nbsp; <button class='btn btn-xs btn-danger' id='totalBalance'></button></center>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                      <form id='smsForm'>
                      <div class='form-group'>
						<label>Enter Mobile Number(s) * </label>
							<textarea name='number_list' id='number_list' onKeyUp='numCounter(this)' rows='3' minlength='10' class='form-control' placeholder='1234567890 \n0987654321' required></textarea>
					</div>
                    <span class='error' id='mobileCounter'></span>
					<div class='form-group'>
						<label>Write Your Message Here * </label>
							<textarea name='message_content' onKeyUp='smsCounter(this)' id='message_content' rows='5' placeholder='Write Your Message Here' class='form-control' required></textarea>
					</div>
					&nbsp; <span id='msgCounter' style='font-size:10px;color:red'>0</span> Character(s) [<small>60 characters = 1 Credit</small>]
                </form>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-primary btn-xs" onClick='updateData(this)' data-ctrl='send_sms' data-name='sms' data-frm='#smsForm' value='Change Now'><i class="fa fa-check-square-o"></i> Change Now</button>
                </div>
            </div>
            </div>
        </div>