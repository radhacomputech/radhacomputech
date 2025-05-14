<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Api extends CI_Controller {
	public function __construct()
	{
			header('Access-Control-Allow-Origin: *');
			header('Access-Control-Allow-Methods: GET, POST, OPTIONS');

			if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
					exit(0);
			}

			parent::__construct();
	}
	
	public function index()
	{
		if($this->input->post())
		{
			$data = $this->input->post();
			extract($data);
			switch($action)
			{
				case 'login':
				$this->login();
				break;
				case 'student_login':
				$this->student_login();
				break;
				case 'load_table':
				$this->load_table();
				break;
				case 'generate_row':
				$this->generate_row();
				break;
				case 'save_center':
				$this->save_center();
				break;
				case 'update_user':
				$this->update_user();
				break;
				case 'save_me':
				$this->save_me();
				break;
				case 'update_me':
				$this->update_me();
				break;
				case 'upload_images':
				$this->upload_images();
				break;
				case 'delete_data':
				$this->delete_data();
				break;
				case 'get_result':
				$this->get_result();
				break;
				case 'get_roll':
				$this->get_roll();
				break;
				case 'check_duplicate':
				$this->check_duplicate();
				break;
				case 'accept_frenchise':
				$this->accept_frenchise();
				break;
				case 'mark_online':
				$this->mark_online();
				break;
				case 'session_gen':
				$this->session_gen();
				break;
				case 'select_district':
				$this->select_district();
				break;
				case 'save_external':
				$this->save_external();
				break;
				case 'online_admission':
				$this->online_admission();
				break;
				case'count_sms':
				$this->count_sms();
				break;
				case 'send_sms':
				$this->send_sms();
				break;
				case 'change_password':
				$this->change_password();
				break;
				case 'reset_password':
				$this->reset_password();
				break;
				case 'forgot_password':
				$this->forgot_password();
				break;
				case 'logout':
				$this->logout();
				break;
				case 'signout':
					$this->signout();
					break;
				default:
				echo json_encode(array('status'=>'error','message'=>'Sorry! Action Not Found'));
				
			}
		}
		else 
		{
			echo "Access Denied";
		 }
	}
	private function login()
	{
		$res = $this->Offer_model->login();
		if($res==1)
		{
			$token = $this->session->userdata('token_id')['my_api'];
			$user_id = $this->session->userdata('token_id')['login_id'];
			$user_type = $this->session->userdata('token_id')['user_type'];
			echo json_encode(array('status'=>'success','message'=>'Wow! Login Success','user_id'=>$user_id,'user_type'=>$user_type,'token'=>$token));
			exit();
		}
		else if($res==2)
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Your ID has been blocked'));
		}
		else 
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry!  Please Check Your Mobile No. & Password'));
		}
	}
	private function student_login()
	{
		$res = $this->Offer_model->student_login();
		if($res==1)
		{
			$token = $this->session->userdata('student_token')['stu_api'];
			$user_id = $this->session->userdata('student_token')['student_id'];
			echo json_encode(array('status'=>'success','message'=>'Wow! Login Success','student_id'=>$user_id,'token'=>$token));
		}
		else if($res==2)
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Your ID has been blocked'));
		}
		else 
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry!  Please Check Your Mobile No. & &&& Password'));
		}
	}
	private function generate_row()
	{
		extract($this->input->post());
		$res = $this->Offer_model->check_api();
		if($res)
		{	
			$id = $res['id'];
			$val = $this->Offer_model->check_empty($table);
			if($val)
			{
				echo json_encode(array('status'=>'success','id'=>$val));
			}
			else 
			{
				$dt = date('Y-m-d h:i:s');
				$resp = $this->Offer_model->save_data($table,array('status'=>'EMPTY','created_by'=>$id,'created_at'=>$dt));
				if($resp==1)
				{
					$last_id = $this->db->insert_id();
					echo json_encode(array('status'=>'success','id'=>$last_id));
				}
				else {
					echo json_encode(array('status'=>'error','message'=>$resp['message']));
				}
			}
			
		}
		else {
			echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
		}
	}
	// private function save_center()
	// {
	// 	extract($this->input->post());
	// 	$event ='';
	// 	$res = $this->Offer_model->check_api();
	// 	if($res)
	// 	{	
	// 		$user_type = $res['user_type'];	
	// 		$id = $res['id'];
	// 		$event_name =  $_POST['event'];
	// 		$clean_data = $this->Offer_model->clean_data();
	// 		$save_res = $this->Offer_model->update_data($table,$clean_data,$dataId);
	// 		if($save_res==1)
	// 		{
	// 			echo $event;		
	// 			if($event_name=='NEW')
	// 					{
	// 						$password = rand(100000,1000000);
	// 						extract($clean_data);
	// 						$user_arr = array('user_mobile'=>$center_mobile,'user_name'=>$center_code,'user_email'=>$center_email,'user_type'=>'CLIENT','status'=>'ACTIVE','user_pass'=>$password,'created_by'=>$created_by,'created_at'=>$updated_at,'center_id'=>$dataId);
	// 						$resp = $this->Offer_model->save_data('user',$user_arr,$dataId);
	// 						$inst_name = config_item('sc_name');
	// 						$url = base_url().'admin';
	// 						$sms_data = $this->Offer_model->user_sms_api($id);
	// 						extract($sms_data);
	// 						$message = "Thank you for joining with us. Your center is successfully registered with $inst_name. Your Center Code is :- $center_code & Password is $password visit:- $url to login ";
	// 						sendsms($center_mobile,$message,$sms_api,$sender_id);
						
	// 					}
	// 					$last_row = $this->Offer_model->data_table_json($table,'center_code','status',"id='$dataId'");
	// 				echo json_encode(array('status'=>'success','message'=>'Data Saved Successfully','data'=>$last_row,'location'=>'NA'));
	// 		}
	// 		else 
	// 		{
	// 			echo json_encode(array('status'=>'error','message'=>$save_res['message']));
	// 		}
	// 	}
	// 	else 
	// 	{
	// 		echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
	// 	}
	// }
	
	private function save_center()
	{
			$post = $this->input->post(null, true); // safer extraction
			$event_name = $post['event'] ?? '';
			$table = $post['table'] ?? 'center_details';
			$dataId = $post['dataId'] ?? null;

			$res = $this->Offer_model->check_api();
			if (!$res) {
					echo json_encode(['status' => 'error', 'message' => 'Sorry! Unauthorized Access Found.']);
					return;
			}

			$user_id = $res['id'];
			$timestamp = date('Y-m-d H:i:s');

			// Collect data matching the DB columns
			$clean_data = [
					'center_code'        => $post['center_code'] ?? '',
					'center_name'        => $post['center_name'] ?? '',
					'center_director'    => $post['center_director'] ?? '',
					'center_mobile'      => $post['center_mobile'] ?? '',
					'center_email'       => $post['center_email'] ?? '',
					'center_address'     => $post['center_address'] ?? '',
					'center_dos'         => $post['center_dos'] ?? '0000-00-00',
					'status'             => $post['status'] ?? 'ACTIVE',
					'assigned_courses'   => $post['assigned_courses'] ?? '',
					'auth_key'           => $post['auth_key'] ?? '',
					'sender_id'          => $post['sender_id'] ?? '',
					'center_pass'        => $post['center_pass'] ?? '',
					'agreement_date'     => $post['agreement_date'] ?? '0000-00-00',
					'center_father'      => $post['center_father'] ?? '',
					'center_district'    => $post['center_district'] ?? '',
					'center_state'       => $post['center_state'] ?? '',
					'center_photo'       => $post['center_photo'] ?? 'no_center.jpg',
					'director_photo'     => $post['director_photo'] ?? 'no_dir.jpg',
					'center_document'    => $post['center_document'] ?? '',
					'date_permission'    => $post['date_permission'] ?? 'NO',
					'created_by'         => $post['created_by'] ?? $user_id,
					'created_at'         => $post['created_at'] ?? $timestamp,
					'updated_by'         => $user_id,
					'updated_at'         => $timestamp,
			];

			// Save/update logic
			$save_res = $this->Offer_model->update_data($table, $clean_data, $dataId);

			if ($save_res == 1) {
					// If it's a new center, also create login
					if ($event_name == 'NEW') {
							$password = rand(100000, 999999);
							$user_arr = [
									'user_mobile' => $clean_data['center_mobile'],
									'user_name'   => $clean_data['center_code'],
									'user_email'  => $clean_data['center_email'],
									'user_type'   => 'CLIENT',
									'status'      => 'ACTIVE',
									'user_pass'   => $password,
									'created_by'  => $clean_data['created_by'],
									'created_at'  => $clean_data['created_at'],
									'center_id'   => $dataId,
							];
							$this->Offer_model->save_data('user', $user_arr, $dataId);

							// Send SMS
							$sms_data = $this->Offer_model->user_sms_api($user_id);
							extract($sms_data);
							$inst_name = config_item('sc_name');
							$url = base_url('admin');
							$message = "Thank you for joining $inst_name. Center Code: $clean_data[center_code], Password: $password. Visit: $url";
							sendsms($clean_data['center_mobile'], $message, $sms_api, $sender_id);
					}

					$last_row = $this->Offer_model->data_table_json($table, 'center_code', 'status', "id='$dataId'");
					echo json_encode(['status' => 'success', 'message' => 'Data Saved Successfully', 'data' => $last_row, 'location' => 'NA']);
			} else {
					echo json_encode(['status' => 'error', 'message' => $save_res['message'] ?? 'Save Failed']);
			}
	}

/*-----------------------------------------------Saving any Data------------------*/
	
	private function update_me()
	{
		extract($this->input->post());
		$res = $this->Offer_model->check_api();
		if($res)
		{	
			$login_id = $res['id'];
			$event_name =  $_POST['event'];
			$clean_data = post_clean($this->Offer_model->clean_data());
			$update_res = $this->Offer_model->update_data($table,$clean_data,$dataId);
			if($update_res==1)
			{
				if($send_sms==1 and $event_name=='NEW')
				{
					$sms_resp = $this->Offer_model->fire_sms($table,$dataId,$login_id);
				}
				echo json_encode(array('status'=>'success','message'=>'Data Saved Successfully','data'=>'','location'=>'/dashboard'));
			}
			else 
			{
				echo json_encode(array('status'=>'error','message'=>$update_res['message'],'location'=>'NA'));
			}
		}
		else 
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
		}
	}
	/*-----------------------------------------------End Saving any Data------------------*/

	private function load_table()
	{
		extract($this->input->post());
		$res = $this->Offer_model->check_api();
		if($res)
		{	
			$user_type = $res['user_type'];	
			$id = $res['id'];
			$login_id = $id;
			switch($table)
			{
			 case 'center_details':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json($table,"center_code","status","status NOT IN('removed','EMPTY','NEW')");	
					}
					else 
					{
						echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
					}
					echo json_encode(array('status'=>'success','data'=>$records));
				break;
				case 'user':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json($table,"user_name","status","status NOT IN('removed','EMPTY')");	
					}
					else 
					{
						echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
						//$records = $this->Offer_model->data_table_json($table,"center_code","status", "status NOT IN('EMPTY','removed')");	
					}
					echo json_encode(array('status'=>'success','data'=>$records));
				break;
				case 'course_details':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json($table,"course_name","status","status NOT IN('removed','EMPTY')");	
					}
					else 
					{
						echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
						//$records = $this->Offer_model->data_table_json($table,"center_code","status", "status NOT IN('EMPTY','removed')");	
					}
					echo json_encode(array('status'=>'success','data'=>$records));
				break;
				case 'student':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json($table,"stu_roll","stu_dob","status  IN('ACTIVE','CONFIRMED')");	
					}
					else 
					{
						$center_id = $this->Offer_model->multitableinfo('user',"id='$login_id'",'center_id');
						$records = $this->Offer_model->data_table_json($table,"stu_roll","stu_dob", "center_id='$center_id' and status IN('ACTIVE','CONFIRMED')");	
					}
					// $records = $this->Offer_model->data_table_json('student',"center_id","grade","status NOT IN('removed','EMPTY')");
					$rep_arr = [array('table'=>'course_details','rep_index'=>2,'field'=>'course_name')];
			
					$replaced_records = $this->Offer_model-> replace_arr($records,$rep_arr);
					echo json_encode(array('status'=>'success','data'=>$replaced_records));
				break;
				case 'regular_student':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json('student',"stu_roll","stu_dob","stu_type='REGULAR' and status  IN('ACTIVE','CONFIRMED')");	
					}
					else 
					{
						$center_id = $this->Offer_model->multitableinfo('user',"id='$login_id'",'center_id');
						$records = $this->Offer_model->data_table_json($table,"stu_roll","stu_dob", "center_id='$center_id' and status IN('ACTIVE','CONFIRMED') and stu_type='REGULAR'");	
					}
					// $records = $this->Offer_model->data_table_json('student',"center_id","grade","status NOT IN('removed','EMPTY')");
					$rep_arr = [array('table'=>'course_details','rep_index'=>2,'field'=>'course_name')];
			
					$replaced_records = $this->Offer_model-> replace_arr($records,$rep_arr);
					echo json_encode(array('status'=>'success','data'=>$replaced_records));
				break;
				case 'online_student':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json('student',"stu_roll","stu_dob","stu_type='ONLINE' and status  IN('ACTIVE','CONFIRMED')");	
					}
					else 
					{
						$center_id = $this->Offer_model->multitableinfo('user',"id='$login_id'",'center_id');
						$records = $this->Offer_model->data_table_json($table,"stu_roll","stu_dob", "center_id='$center_id' and stu_type='ONLINE' and and status IN('ACTIVE','CONFIRMED')");	
					}
					// $records = $this->Offer_model->data_table_json('student',"center_id","grade","status NOT IN('removed','EMPTY')");
					$rep_arr = [array('table'=>'course_details','rep_index'=>2,'field'=>'course_name')];
			
					$replaced_records = $this->Offer_model-> replace_arr($records,$rep_arr);
					echo json_encode(array('status'=>'success','data'=>$replaced_records));
				break;
				case 'admission':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN' and $user_type='STAFF')
					{	
						$records = $this->Offer_model->data_table_json('student',"stu_course","stu_dob"," status  IN('UNPAID')");	
					}
					
					$rep_arr = [array('table'=>'course_details','rep_index'=>1,'field'=>'course_name')];
			
					$replaced_records = $this->Offer_model-> replace_arr($records,$rep_arr);
					echo json_encode(array('status'=>'success','data'=>$replaced_records));
				break;
				case 'result':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json('student',"stu_roll","grade","status IN('RESULT OUT','UPDATED')");	
					}
					else 
					{
						$center_id = $this->Offer_model->multitableinfo('user',"id='$login_id'",'center_id');
						$records = $this->Offer_model->data_table_json('student',"stu_roll","grade", "center_id='$center_id' and status IN('RESULT OUT','UPDATED')");	
					}
					// $records = $this->Offer_model->data_table_json('student',"center_id","grade","status NOT IN('removed','EMPTY')");
					$rep_arr = [array('table'=>'course_details','rep_index'=>2,'field'=>'course_name')];
			
					$replaced_records = $this->Offer_model-> replace_arr($records,$rep_arr);
					echo json_encode(array('status'=>'success','data'=>$replaced_records));
				break;

				case 'ctet':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json($table,"student_name","pay_status","status NOT IN('removed','EMPTY')");	
					}
					else 
					{
						echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
					}
					
					echo json_encode(array('status'=>'success','data'=>$records));
				break;
				case 'frenchise':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json('center_details',"center_name","created_at","status IN('NEW')");	
					}
					else 
					{
						echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
					}
					echo json_encode(array('status'=>'success','data'=>$records));
				break;
				case 'gallery':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json($table,"image_title","status","status NOT IN('removed','EMPTY')");	
					}
					else 
					{
						echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
					}
				
					echo json_encode(array('status'=>'success','data'=>$records));
				break;
				case 'notice':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json($table,"notice_title","status","status NOT IN('removed','EMPTY')");	
					}
					else 
					{
						echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
					}
				
					echo json_encode(array('status'=>'success','data'=>$records));
				break;
				case 'fee_type':				 /*------------------------------------------------------*/
						if($user_type=='ADMIN')
						{	
							$records = $this->Offer_model->data_table_json($table,"notice_title","status","status NOT IN('removed','EMPTY')");	
						}
						else 
						{
							echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
						}
					
						echo json_encode(array('status'=>'success','data'=>$records));
				break;
				case 'video':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json($table,"video_title","status","status NOT IN('removed','EMPTY')");	
					}
					else 
					{
						echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
					}
				
					echo json_encode(array('status'=>'success','data'=>$records));
			break;
			case 'attachment':				 /*------------------------------------------------------*/
				if($user_type=='ADMIN')
				{	
					$records = $this->Offer_model->data_table_json($table,"mat_title","status","status NOT IN('removed','EMPTY')");	
				}
				else 
				{
					echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
				}
			
				echo json_encode(array('status'=>'success','data'=>$records));
		break;
				case 'enquiry':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json($table,"e_name","e_datetime","status NOT IN('removed','EMPTY')");	
					}
					else 
					{
						$records = $this->Offer_model->data_table_json($table,"e_name","e_datetime","status NOT IN('removed','EMPTY')");	
					}
					echo json_encode(array('status'=>'success','data'=>$records));
				break;
                case 'facilitators':				 /*------------------------------------------------------*/
					if($user_type=='ADMIN')
					{	
						$records = $this->Offer_model->data_table_json($table,"facilitators","status","status NOT IN('removed','EMPTY')");	
					}
					else 
					{
						$records = $this->Offer_model->data_table_json($table,"facilitators","status","status NOT IN('removed','EMPTY')");	
					}
					echo json_encode(array('status'=>'success','data'=>$records));
				break;
				default:
				echo json_encode(array('status'=>'error','message'=>$table .' not listes'));
			}
		}
		else
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
		}
	}
	
	private function upload_images()
	{
		extract($this->input->post());
		$res = $this->Offer_model->check_api();
		if($res)
		{	
			$data = extract(post_clean($this->input->post()));
			$clean_data = $this->Offer_model->clean_data($data);
			$clean_file = post_clean($_FILES);
			$file_name =  array_keys($clean_file)[0];
			$res = $this->Offer_model->upload_files_only($file_name,$dataId);
				if($res['status']==1)
				{
					$array_data = array($file_name=>$res['file_name']);
					$this->Offer_model->update_data($table,array($file_name=>''),$dataId);
					$resp = $this->Offer_model->update_data($table,$array_data,$dataId);
					if($resp==1)
					{
						echo json_encode(array('status'=>'success','message'=>ucwords($category).' Uploaded Successfully.','data'=>$res['file_name']));
					}
					else {
						echo json_encode(array('status'=>'error','message'=>$resp['message']));
					}

				}
			
		}
		else
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
		}
	}

	// private function upload_images()
	// {
	// 		$post = post_clean($this->input->post());
	// 		echo json_encode(['status' => 'error', 'message' => $post]);
	// 		$table = isset($post['table']) ? $post['table'] : null;
	// 		$category = isset($post['category']) ? $post['category'] : null;
	// 		$dataId = isset($post['dataId']) ? $post['dataId'] : null;


	// 		if (!$table || !$dataId || !$category) {
	// 				echo json_encode(['status' => 'error', 'message' => 'Missing required parameters.']);
	// 				return;
	// 		}

	// 		$res = $this->Offer_model->check_api();
	// 		if (!$res) {
	// 				echo json_encode(['status' => 'error', 'message' => 'Sorry! Unauthorized Access Found.']);
	// 				return;
	// 		}

	// 		$fileData = post_clean($_FILES);
	// 		if (empty($fileData)) {
	// 				echo json_encode(['status' => 'error', 'message' => 'No file uploaded.']);
	// 				return;
	// 		}

	// 		$file_name = array_keys($fileData)[0];

	// 		$uploadRes = $this->Offer_model->upload_files_only($file_name, $dataId);
	// 		if (!$uploadRes['status']) {
	// 				echo json_encode(['status' => 'error', 'message' => $uploadRes['error']]);
	// 				return;
	// 		}

	// 		$uploadedFile = $uploadRes['file_name'];

	// 		// Update DB with new file
	// 		$this->Offer_model->update_data($table, [$file_name => ''], $dataId);
	// 		$updateResp = $this->Offer_model->update_data($table, [$file_name => $uploadedFile], $dataId);

	// 		if ($updateResp == 1) {
	// 				echo json_encode(['status' => 'success', 'message' => ucwords($category) . ' Uploaded Successfully.', 'data' => $uploadedFile]);
	// 		} else {
	// 				echo json_encode(['status' => 'error', 'message' => 'Failed to update the database.']);
	// 		}
	// }






	private function delete_data()
	{
		extract($this->input->post());
		$res = $this->Offer_model->check_api();
		if($res)
		{	
			foreach($dataId as $id)
			{
				$res = $this->Offer_model->delete_really($table,$id);
			}
			if($res==1)
			{
				echo json_encode(array('status'=>'success','message'=>'Data Deleted Successfully'));
			}
			else
			{
				echo json_encode(array('status'=>'error','message'=>$res['message']));
			}
		}
		else 
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
		}
	}
	private function get_roll()
	{
		extract(post_clean($this->input->post()));
		$res = $this->Offer_model->check_api();
		if($res)
		{
			// $dt= date('Y-m-d');
			$data = $this->Offer_model->select_all('student',"stu_reg_date='$dt' and status<>'removed'",'id');
			if($data)
			{
				$count = count($data);
				$dt = date('ymd',strtotime($dt)).'0000';
				$roll = $dt+$count+1;
				echo json_encode(array('status'=>'success','roll'=>$roll));
			}
			else 
			{
				$roll = date('ymd',strtotime($dt)).'0001';
				echo json_encode(array('status'=>'success','roll'=>$roll));
			}
		}
		else 
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
		}
	}
	private function get_result()
	{
		extract(post_clean($this->input->post()));
		$res = $this->Offer_model->check_api();
		if($res)
		{
			$result_data = $this->Offer_model->select_all('result',"student_id='$dataId' and exam_name='$exam_name'");
			if(count($result_data)>0)
			{
				echo json_encode(array('status'=>'success','data'=>$result_data[0]));
			}
			else {
				$dt = date('Y-m-d');
				$new_arr = array('student_id'=>$dataId,'exam_name'=>$exam_name,'status'=>'EMPTY','created_by'=>$res['id'],'created_at'=>$dt);
				$resp = $this->Offer_model->save_data('result',$new_arr);
				if($resp==1)
				{
					$id = $this->db->insert_id();
					$result_data = $this->Offer_model->select_all('result',"id='$id' and student_id='$dataId' and exam_name='$exam_name'");
					echo json_encode(array('status'=>'success','data'=>array('id'=>$result_data[0])));
				}
				else {
					echo json_encode(array('status'=>'error','message'=>$resp['message']));
				}
			}
			
			
		}
		else 
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
		}	
	}
	private function check_duplicate()
	{
		extract($this->input->post());
		$res1 = $this->Offer_model->check_api();
		if($res1)
		{
			
			 $res = $this->Offer_model->getarray($table,array($field_name=>$value));
			 if($res)
			 {
				if($res[0]['id']<>$dataId)
				{
					echo json_encode(array('status'=>'error','message'=>'Duplicate entry found'));
				}
				else 
				{
					echo json_encode(array('status'=>'success','message'=>'No duplicate entry found'));
				}
			 }
			 else {
				echo json_encode(array('status'=>'success','message'=>'No duplicate entry found'));
			 }
		}
	}
	private function session_gen()
	{
		extract($this->input->post());
		$res1 = $this->Offer_model->check_api();
		if($res1)
		{
			$_SESSION[$dataName]=array($idName=>$dataId,'data_token'=>$token);
			
			if(($_SESSION[$dataName])<>'')
			{
				echo json_encode(array('status'=>'success','message'=>$dataName.' session generated successfully'));
			}
			else 
			{
				echo json_encode(array('status'=>'error','message'=>$dataName.' session generation error'));
			}
		}
	}
	private function accept_frenchise()
	{
		extract(post_clean($this->input->post()));
		
		$res = $this->Offer_model->check_api();
		if($res)
		{
				$clean_data = $this->Offer_model->clean_data();
				extract($clean_data);
				$resp = $this->Offer_model->update_data('center_details',$clean_data,$dataId);
				if($resp==1)
				{
					echo json_encode(array('status'=>'success','message'=>'Data Saved Successfully','data'=>'','location'=>'center'));
				}
				else {
					echo json_encode(array('status'=>'error','message'=>$resp['message']));
				}
			
		}
		else 
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
		}	
	}
	private function mark_online()
	{
		extract(post_clean($this->input->post()));
		
		$res = $this->Offer_model->check_api();
		if($res)
		{
				$data_list = $this->input->post();
				foreach($data_list['dataId'] as $student_id)
				{
					$password = (123);
					$arr = array('stu_type'=>'ONLINE','stu_pass'=>($password));
					 $resp = $this->Offer_model->update_data('student',$arr,$student_id);
					 $student_name = $this->Offer_model->multitableinfo("student","id='$student_id'","student_name");
					 $stu_mobile = $this->Offer_model->multitableinfo("student","id='$student_id'","stu_mobile");
					 $student_email = $this->Offer_model->multitableinfo("student","id='$student_id'","stu_email");
					 extract($this->Offer_model->user_sms_api($res['id']));
					 $inst_name = config('sc_name');
					 $message = "Dear $student_name Your Online Class Registration at $inst_name is successful. You user Id is $stu_mobile and  password is $password.";
						sendsms($stu_mobile,$message,$sms_api);
				}
				if($resp==1)
				{
					echo json_encode(array('status'=>'success','message'=>'Marked  Successfully','data'=>'','location'=>'center'));
				}
				else {
					echo json_encode(array('status'=>'error','message'=>$resp['message']));
				}
			
		}
		else 
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
		}	
	}
	private function select_district()
	{	
		extract(post_clean($this->input->post()));
		$data = $this->Offer_model->select_district($dataId);

		foreach($data as $val)
		{
		?>		
		<option value='<?php echo $val->id;?>'><?php echo $val->dist_name;?></option> 
		<?php
		}
	}
	private function save_external()
	{	
		extract(post_clean($this->input->post()));
		unset($_POST['table']);
		unset($_POST['action']);
		$field_name = array_key_first($_FILES);
		$file_name = $_FILES[$field_name]['name'];
		$res2 = $this->Offer_model->upload_files_only($field_name,$center_name);
			if($res2['status']==1)
			{
				$all_data = array_merge($_POST,array($field_name=>$res2['file_name']));
				$res1 = $this->Offer_model->save_data($table,$all_data);
				if($res1==1)
				{
					echo json_encode(array('status'=>'success','message'=>'Data Saved Successfully.'));
				}
				else 
				{
					echo json_encode(array('status'=>'error','message'=>$res1['message']));
				}
			}
			else 
			{
				$message = substr(substr($res2['error'],0,-4),3);
				echo json_encode(array('status'=>'error','message'=>$message));
			}
	}
	private function online_admission()
	{	
		extract(post_clean($this->input->post()));
		unset($_POST['table']);
		unset($_POST['action']);
		$field_name = array_key_first($_FILES);
		$file_name = $_FILES[$field_name]['name'];
		$rnd = rand(6666,66666);
		$res2 = $this->Offer_model->upload_files_only($field_name,$student_name.$rnd);
			if($res2['status']==1)
			{
				$all_data = array_merge($_POST,array($field_name=>$res2['file_name']));
				$res1 = $this->Offer_model->save_data($table,$all_data);
				if($res1==1)
				{
					echo json_encode(array('status'=>'success','message'=>'Your online Admission Successfully.'));
				}
				else 
				{
					echo json_encode(array('status'=>'error','message'=>$res1['message']));
				}
			}
			else 
			{
				$message = substr(substr($res2['error'],0,-4),3);
				echo json_encode(array('status'=>'error','message'=>$message));
			}
	}
	/*----------------------------------Send Sms------------------------*/
	private function count_sms()
	{
		$data = extract(post_clean($this->input->post()));
		$res = $this->Offer_model->check_api();
		if($res)
		{	
			$sms_data = $this->Offer_model->user_sms_api($res['id']);
				extract($sms_data);
			$total = get_bal_msg91($sms_api);
			echo json_encode(array('status'=>'success','total'=>$total));
		}
		else 
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
		}	
	}
	private function send_sms()
	{
		$data = extract(post_clean($this->input->post()));
		$res = $this->Offer_model->check_api();
		if($res)
		{	
			$number_list;
			$number_arr = explode(",",str_replace(array("\r\n", "\r\n"), ",",$number_list));
			
			foreach($number_arr as $mobile_no)
			{
				$sms_data = $this->Offer_model->user_sms_api($res['id']);
				extract($sms_data);
				sendsms($mobile_no,$message_content,$sms_api,$sender_id);
			}
			echo json_encode(array('status'=>'success','message'=>'Message Will Be Sent Quickly','location'=>'NA'));
		}
		else 
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
		}	
	}
	/*----------------------------------------Changing Password-------------------------*/
	private function change_password()
	{
		extract($this->input->post());
		$res = $this->Offer_model->check_api();
		if($res)
		{	
			$dataId = $res['id'];
			$prev_password = $this->Offer_model->multitableinfo('user',"id='$dataId'",'user_pass');

			if($current_password==$prev_password)
			{
					$update_res = $this->Offer_model->update_data($table,array('user_pass'=>$confirm_password),$dataId);
					if($update_res==1)
					{
						echo json_encode(array('status'=>'success','message'=>'Wow! Password Changed Successfully','location'=>'NA'));
					}
					else 
					{
						echo json_encode(array('status'=>'error','message'=>$update_res['message'],'location'=>'NA'));
					}
			}
			else 
			{
				echo json_encode(array('status'=>'error','message'=>'Sorry! Current Password is incorrect'));
			}
		}
		else 
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Found.'));
		}	
	}
	private function reset_password()
	{
		$data = post_clean($this->input->post());
		extract($data);
		$res = $this->Offer_model->check_user('user',$user_mobile);
		if($res==1)
		{
			$resp = $this->Offer_model->select_all('user',"user_mobile='$user_mobile'");
			if($resp)
			{
				$row = $resp[0];
				if(($row->status)=='BLOCKED')
				{
					echo json_encode(array('status'=>'error','message'=>'Sorry! Your ID has been blocked by Admin'));
				}
				else 
				{
					$message =$row->user_password.' is your login password for '.config('sc_code');
					//sendsms($user_mobile,$message);
					$noreply = config('noreply');
					$user_email = $row->user_email;
					//mail($user_email,'Reset Password For Brainware Login',$message,$noreply);
					echo json_encode(array('status'=>'success','message'=>'Kindly check your mobile & email for password'));
				}
			}
		
		}
		else 
		{
			echo json_encode(array('status'=>'error','message'=>'Sorry! No record found. Check your mobile no.'));
		}
	}
	private function forgot_password()
	{
		$data = post_clean($this->input->post());
		extract($data);
		
			$resp = $this->Offer_model->select_all('student',"stu_mobile='$stu_mobile'");
			if($resp)
			{
				$row = $resp[0];
				if(($row->login_status)=='BLOCKED')
				{
					echo json_encode(array('status'=>'error','message'=>'Sorry! Your ID has been blocked by Admin'));
				}
				else 
				{
					$new_password = rand(100000,1000000);
					$this->Offer_model->update_data('student',array('stu_pass'=>md5($new_password)),$row->id);
					$message =$new_password.' is your login password for '.config('sc_code');
					//sendsms($stu_mobile,$message);
					$noreply = config('noreply');
					$student_email = $row->stu_email;
					//mail($user_email,'Reset Password For Brainware Login',$message,$noreply);
					echo json_encode(array('status'=>'success','new_pass'=>$new_password,'message'=>'Kindly check your mobile & email for password'));
				}
			}
	}
	private function logout()
	{
		extract($this->input->post());
		$res = $this->Offer_model->check_api();
		if($res)
		{
			$res = $this->Offer_model->update_data('user',array('my_api'=>'','status'=>'LOGOUT','updated_at'=>date('Y-m-d h:i:s'),'updated_by'=>$res['id']),$res['id']);
			if($res==1)
			{
				$token = $this->session->userdata('token_id');
				$id = $token['login_id'];
				$data = array('status'=>'LOGOUT','login_token'=>'');
				$this->Offer_model->update_data('branch',$data,$id);
				$this->session->unset_userdata('login_token');
				$this->session->sess_destroy();
				echo json_encode(array('status'=>'success','message'=>'Wow! Logged Out Successfully'));
			}
			else 
			{
				echo json_encode(array('status'=>'error','message'=>'Sorry! Something Went Wrong. Try Again'));
			}
		}
		else{
			echo json_encode(array('status'=>'error','message'=>'Sorry! Unauthorized Access Foundor Token Expired'));
		}
	}
	private function signout()
	{
		extract($this->input->post());
		$token = $this->session->userdata('student_token');
				$id = $token['student_id'];
			$res = $this->Offer_model->update_data('student',array('stu_api'=>'','login_status'=>'LOGOUT','updated_at'=>date('Y-m-d h:i:s'),'updated_by'=>$id),$id);
			if($res==1)
			{
				
				$this->session->unset_userdata('student_token');
				$this->session->sess_destroy();
				echo json_encode(array('status'=>'success','message'=>'Wow! Logged Out Successfully'));
			}
			else 
			{
				echo json_encode(array('status'=>'error','message'=>'Sorry! Something Went Wrong. Try Again'));
			}
	}
	public function check_this()
	{
		
				
	}
}