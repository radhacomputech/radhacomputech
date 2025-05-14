<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Offer_model extends CI_Model {
	public function __construct()
	{
		parent::__construct();
	}
	function check_api()
	{
		$api = $this->input->post('token');
		$this->db->where(array('my_api'=>$api));
		$query = $this->db->get('user');
		$query->num_rows();
			if($query->num_rows()==1)
			{
				$row = $query->row();
				$id = $row->id;
				$user_type = $row->user_type;
				return array('id'=>$id,'user_type'=>$user_type);
			}
			else 
			{
				return false;
			}
	}
	function login()
	{
		$data = $this->input->post();
		$user_mobile = $this->input->post('user_mobile');
		$user_password = $this->input->post('user_password');
		//$token = $this->input->post('token');
		$this->db->where(array('user_mobile'=>$user_mobile,'user_pass'=>$user_password));
		$query = $this->db->get('user');
			if($query->num_rows()==1)
			{
				
				$row = $query->row();
				$id = $row->id;
				$user_type = $row->user_type;
				$user_status = $row->status;
				if($user_status=='BLOCKED')
				{
					return 2;
				}
				else 
				{
				$token='';
				if($token=='')
				{
				$token = session_id().$id; //.date('ymdhis');
				}
				$new_token = array('login_id'=>$id,'my_api'=>$token,'user_type'=>$user_type);
				$this->session->set_userdata('token_id',$new_token);
				$status = 'ACTIVE';
				$arr = array('my_api'=>$token,'status'=>$status);
				$msg = $this->update_data('user',array('my_api'=>''),$id);
				$res_data = $this->Offer_model->update_data('user',$arr,$id);
				if($res_data==1)
				{
					return true;
				}
				else {
					return $res_data;
				}
				
			}
		}
		else
		{
			return false;
		}
	}
	function student_login()
	{
		$data = $this->input->post();
		$stu_mobile = $this->input->post('stu_mobile');
		$stu_password = ($this->input->post('stu_pass'));
		//$token = $this->input->post('token');
		$this->db->where(array('stu_mobile'=>$stu_mobile,'stu_pass'=>$stu_password));
		$query = $this->db->get('student');
		//print_r($this->db->last_query());
			if($query->num_rows()==1)
			{
				
				$row = $query->row();
				$id = $row->id;
				$user_status = $row->status;
				if($user_status=='BLOCKED')
				{
					return 2;
				}
				else 
				{
				$token='';
				if($token=='')
				{
				$token = session_id().$id; //.date('ymdhis');
				}
				$new_token = array('student_id'=>$id,'stu_api'=>$token);
				$this->session->set_userdata('student_token',$new_token);
				$status = 'ACTIVE';
				$arr = array('stu_api'=>$token,'login_status'=>$status);
				$msg = $this->update_data('student',array('stu_api'=>''),$id);
				$res_data = $this->Offer_model->update_data('student',$arr,$id);
				if($res_data==1)
				{
					return true;
				}
				else {
					return $res_data;
				}
				
			}
		}
		else
		{
			return false;
		}
	}
	public function clean_data()
	{
		$data = post_clean($this->input->post());
		$res = $this->Offer_model->check_api();
		if($res)
		{	
		$dataId = $data['dataId'];
			unset($data['table']);
			unset($data['action']);
			unset($data['token']);
			if(isset($data['dataId']))
			{
				unset($data['dataId']);
			}
			if(isset($data['event']))
			{
				unset($data['event']);
			}
			if(isset($data['send_sms']))
			{
				unset($data['send_sms']);
			}
			$dt=date('Y-m-d h:i:s');
			$array1 = array('created_by'=>$res['id'],'updated_by'=>$res['id'],'updated_at'=>$dt);
			$new_data = array_merge($array1,$data);
		return $new_data;
		}
	}

	public function save_data($table,$data)
	{
		$res = $this->db->insert($table,$data);
		$error = $this->db->error();
		if($res)
		{	
			return true;
		}
		else 
		{
			return $error;
		}
	}
	
	public function update_data($tbl,$data,$id)
	{
		$this->db->set($data);
		$this->db->where('id='.$id);
		$this->db->update($tbl,$data);
		$error = $this->db->error();
		if($this->db->affected_rows()>0)
		{
		return  true;
		}
		else if($error['code']==0)
		{
			return array('code'=>0,'message'=>'Sorry! No Update Found');
		}
		else 
		{
			return $error;
		}
	}
	// public function upload_files_only($file,$id)
  // {
	// 		$config['upload_path']          = './uploads/';
	// 		$config['allowed_types']        = 'jpg|jpeg|png|gif|pdf';
	// 		$config['max_size']             = 5000;
	// 		$config['file_name']         	= $id.$file;
	// 		$config['remove_spaces']        = false;
	// 		$config['overwrite']         	= true;
	// 		$config['file_ext_tolower']   	= true;
	// 		$this->load->library('upload', $config);

	// 		if ( ! $this->upload->do_upload($file))
	// 		{
	// 		return    array('status'=>'fail','error' => $this->upload->display_errors());
	// 		}
	// 		else
	// 		{
	// 		 $file_name = $this->upload->data('file_name');
	// 		 return array('status'=>true,'file_name'=>$file_name);
	// 		}
	// }


	public function upload_files_only($file, $id)
	{
			// Ensure the upload directory exists
			$upload_path = './uploads/';
			if (!is_dir($upload_path)) {
					mkdir($upload_path, 0755, true);
			}
			
			// Configure upload settings
			$config['upload_path']      = $upload_path;
			$config['allowed_types']    = 'jpg|jpeg|png|gif|pdf';
			$config['max_size']         = 5000; // in KB

			// Get file extension for a better file name
			$fileExt = pathinfo($_FILES[$file]['name'], PATHINFO_EXTENSION);
			
			// Generate unique file name: userID_timestamp.extension
			$config['file_name']        = $file . '_' . time() . '.' . $fileExt;
			$config['remove_spaces']    = true;
			$config['overwrite']        = true;
			$config['file_ext_tolower'] = true;
			
			// Load the upload library with the configuration
			$this->load->library('upload', $config);

			// Attempt the upload
			if (!$this->upload->do_upload($file)) {
					// Return errors (strip HTML tags if needed)
					return array('status' => false, 'error' => strip_tags($this->upload->display_errors()));
			} else {
					// Return success response with the uploaded file name
					$uploadedData = $this->upload->data();
					$file_name = $uploadedData['file_name'];
					return array('status' => true, 'file_name' => $file_name);
			}
	}

	public function getarray($table,$arr)
	{
		$this->db->where($arr);
		$query = $this->db->get($table);
		$error = $this->db->error();
		if($error['code']==0)
		{
			return $data = $query->result_array();
		}
		else{
			return $error;
		}
	}
	public function getlimitarray($table,$arr,$limit=6)
	{
		$this->db->where($arr);
		$this->db->limit($limit);
		$query = $this->db->get($table);
		return $query->result_array();
	}
	public function select_all($table,$arr,$group_by='id',$order_by='id')
	{	
		$this->db->where($arr);
		$this->db->where('status<>','removed');
		$this->db->group_by($group_by);
		$this->db->order_by($order_by,'DESC');
		$query = $this->db->get($table);
		$error = $this->db->error();
		if($error['code']==0)
		{
			return $query->result();
		}
		else 
		{
			return $error;
		}
	}
	function get_fields_name($table,$from=0,$to=0)
	{
		$fields = $this->db->list_fields($table);
		if($from==0 and $to==0)
		{
			return $fields;
		}
		else 
		{
			return array_slice($fields,$from,$to,true);
		}
	}
	public function range_fields($table,$field1=null,$field2=null)
	{
		$fields = $this->Offer_model->get_fields_name($table,0,0);
		$key1 =  array_search($field1,$fields);
		$key2 = array_search($field2,$fields);
		if($field1==null and $field2==null)
		{
			return $fields;
		}
		if($field2==null)
		{
			return $field1;
		}
	   
		foreach($fields as $key=>$val)
		{
			if($key>=$key1 and $key<=$key2)
			{
				$val; 
				$desire_arr[] =$val; 
			}
		}
		return $desire_arr;
	}
	
	public function select_by_fields($table,$fields_no,$arr)
	{
		$fields = $this->Offer_model->get_fields_name($table,$fields_no);
		$this->db->select($fields);
		$this->db->where($arr);
		$query = $this->db->get($table);
		$data = $query->result_array();
		foreach($data as $row) 
		{
			$rows[] = array_values($row);
		}
		return $rows;
		//$row_data =  array_values($row[0]);
		//return  json_encode($row_data,JSON_FORCE_OBJECT);
		//return  json_encode($row,JSON_FORCE_OBJECT);
		
	}
	public function select_all_by_field_range($table,$field1,$field2,$arr="status<>'remoded'",$given_order='DESC')
	{
		$fields = $this->Offer_model->range_fields($table,$field1,$field2);
		$field_str = implode(",",$fields);
		$this->db->select('id,'.$field_str);
		$this->db->order_by('id',$given_order);
		$this->db->where($arr);
		$query = $this->db->get($table);
		$error = $this->db->error();
		if($error['code']==0)
		{
			return $data = $query->result_array();
		}
		else{
			return $error;
		}
		
	}
	public function make_indexed($array_data)
	{
		foreach($array_data as $array) 
		{
			$rows[] = array_values($array);
		}
		return $rows;
	}
	public function data_table_json($table,$field1,$field2,$arr)
	{
		$desired_data = $this->Offer_model->select_all_by_field_range($table,$field1,$field2,$arr);
		//print_r($this->db->last_query());
		if(count($desired_data)>0)
		{
			foreach($desired_data as $array) 
			{
				$id =  $array['id'];
				unset($array['id']);
				$json_data = json_encode($this->Offer_model->getarray($table,"id='$id'"));
				array_unshift($array,"<input type='checkbox' class='my-id' value='".$id."' data-row='".$json_data."'>");
				$rows[] = array_values($array);
			}
			return $rows;
		}
		else 
		{
			return array();
		}
	}
	public function get_result_data($table,$field1,$field2,$arr)
	{
		$desired_data = $this->Offer_model->select_all_by_field_range($table,$field1,$field2,$arr);
		foreach($desired_data as $array) 
		{
			$id =  $array['id'];
			unset($array['id']);
			$row_data = $this->Offer_model->getarray($table,"id='$id'");
			$student_id = $row_data[0]['student_id'];
			$student_name = $this->Offer_model->multitableinfo('student',"id='$student_id'",'student_name');
			$new_data = array_merge($row_data[0],array('student_name'=>$student_name));
			$json_data = json_encode($new_data);
			array_unshift($array,"<input type='checkbox' class='my-id' value='".$id."' data-row='".$json_data."'>");
			$rows[] = array_values($array);
		}
		return $rows;
	}
	public function get_student()
	{
		$this->db->select('student_roll,center_code,course_code,student_name,student_mobile,certificate_no,grade');    
		$this->db->from('student');
		$this->db->join('course_details', 'student.course_id = course_details.id');
		$this->db->join('center_details', 'student.center_id = center_details.id');
		$query = $this->db->get();
		return $data = $query->result_array();
	}
	public function replace_arr($records,$rep_arr) // $rep_arr contains two dimensional array in which second array contains table,replacing index and field name for value
	{
			$total = count($records);
			if($total>0)
			{
			for($i=0;$i<$total;$i++)
			{
				$rep_count = count($rep_arr);
				for($j=0;$j<$rep_count;$j++)
				{
					$table = $rep_arr[$j]['table'];
					$replacemnet_index = $rep_arr[$j]['rep_index'];
					$field_name = $rep_arr[$j]['field'];
					$main_id = $records[$i][$replacemnet_index];
					$row_val = $this->Offer_model->multitableinfo($table,"id='$main_id'",$field_name);
					$replace_with = array($replacemnet_index=>$row_val);
					$base_array = $records[$i];
					//print_r($base_array);
					$records[$i] =  array_replace($base_array, $replace_with);
					
				}
				$final_records[] = $records[$i];	
			}
			return $final_records;
			}
			else
			{
			  return $records;  
			}
	}
	
	public function signle_data_update($tbl,$col_name,$data,$id)
	{
		$this->db->set($col_name, $data); 
		$this->db->where('id', $id); 
		$this->db->update($tbl); 
		if($this->db->affected_rows()>0)
		{
		return  true;
		}
	}
	public function update_with_array($table,$data,$array)
	{
		$this->db->set($data); 
		$this->db->where($array); 
		$this->db->update($table,$data);
		$error = $this->db->error();
		if($this->db->affected_rows()>0)
		{
		return  1;
		}
		else 
		{
			return $error;
		}
		
	}
	public function save_as($tbl,$id,$column,$value)
	{
		$this->db->set($column, $value); 
		$this->db->where('id', $id); 
		$this->db->update($tbl); 
		$error = $this->db->error();
		if($error['code']==0)
		{
			return true;
		}
		{
			return $error;
		}
	}

	public function block($tbl,$id,$status)
	{
		$this->db->set('status', $status); 
		$this->db->where('id', $id); 
		$this->db->update($tbl); 
		return true;
	}
	public function delete_really($tbl,$dataId)
	{
		$res = $this->db->delete($tbl,'id='.$dataId);
		$error = $this->db->error();
		if($res)
		{
			return true;
		}
		else {
			return $error;
		}
	}
	public function delete_all($tbl,$arr)
	{
		$this -> db -> where($arr);
		$res = $this->db->delete($tbl);
		if($res)
		{
			return true;
		}
		else 
		{
			return false;
		}
	}
	public function multitableinfo($tbl,$arr,$value)
	{	
		$this->db->where($arr);
		$query = $this->db->get($tbl);
		$error = $this->db->error();
		if($error['code']==0)
		{
			$data = $query->result_array();
			if($query->num_rows()>0)
			{
			return ($data[0][$value]);
			}
		}
		else{
			return $error['message'];
		}
	}
	public function tableinfo($tbl,$id,$value)
	{	
		$this->db->where('id',$id);
		$this->db->where('status','ACTIVE');
		$query = $this->db->get($tbl);
		$data = $query->result_array();
		if($query->num_rows()>0)
		{
			return ($data[0][$value]);
		}
		else
		{
			return false;
		}
	}
	public function user_type($user_name)
	{	
		$this->db->where('user_email',$user_name);
		$this->db->where('status','ACTIVE');
		$query = $this->db->get('user');
		$data = $query->result_array();
		if($query->num_rows()>0)
		{
		return ($data[0]['user_type']);
		}
	}
	public function user_sms_api($login_id)
	{
		$center_id = $this->Offer_model->multitableinfo('user',"id='$login_id'","center_id");
		$sender_id = $this->Offer_model->multitableinfo('center_details',"id='$center_id'",'sender_id');
		$sms_api = $this->Offer_model->multitableinfo('center_details',"id='$center_id'",'auth_key');
		return array('sender_id'=>$sender_id,'sms_api'=>$sms_api);
	}
	public function fire_sms($table,$dataId,$login_id)
	{
			if($table)
			{
				
				$sms_data = $this->Offer_model->user_sms_api($login_id);
				extract($sms_data);
				$center_id = $this->Offer_model->multitableinfo('user',"id='$login_id'","center_id");
				$inst_name = $this->Offer_model->multitableinfo('center_details',"id='$center_id'","center_name");
				switch($table)
				{
					case 'student':
						$student_name = $this->Offer_model->multitableinfo("student","id='$dataId'","student_name");
						$roll = $this->Offer_model->multitableinfo("student","id='$dataId'","stu_roll");
						$mobile_no = $this->Offer_model->multitableinfo("student","id='$dataId'","stu_mobile");
						$course_id = $this->Offer_model->multitableinfo("student","id='$dataId'","stu_course");
						$course_name = $this->Offer_model->tableinfo('course_details',$course_id,'course_name');
						$message = "Dear $student_name your registration is completed successfully for  $course_name at  $inst_name. Your Reg. No. is :- $roll";
						
						sendsms($mobile_no,$message,$sms_api,$sender_id);
					break;
					case'transaction':
						$student_id = $this->Offer_model->multitableinfo("transaction","id='$dataId'","student_id");
						$fee_name = $this->Offer_model->multitableinfo("transaction","id='$dataId'","fee_name");
						$student_name = $this->Offer_model->multitableinfo("student","id='$student_id'","student_name");
						$mobile_no = $this->Offer_model->multitableinfo("student","id='$student_id'","stu_mobile");	
						
						$txn_amount = $this->Offer_model->multitableinfo("transaction","id='$dataId'","txn_amount");
						
						
						$message = "Dear $student_name thank you for  paying Rs $txn_amount at $inst_name for $fee_name.";
						sendsms($mobile_no,$message,$sms_api);
					break;
					}
			}
	}
	public function select_user()
	{	
		$this->db->where('status','ACTIVE');
		$query = $this->db->get('user');
		return  $query->result();
		
	}
	
	public function select_all_data($table,$status)
	{	
		$this->db->where('status',$status);
		$query = $this->db->get($table);
		return  $query->result();
	}
	public function select_all_data_by_column($table,$col,$col_value,$status)
	{	
		$this->db->where('status',$status);
		$this->db->where($col,$col_value);
		$this->db->or_where('status','BLOCKED');
		$query = $this->db->get($table);
		return  $query->result();
	}
	public function select_state()
	{	
		$query = $this->db->get('state');
		return  $query->result();
	}
	public function select_district($id)
	{	
		$this->db->where('st_code',$id);
		$query = $this->db->get('district');
		return  $query->result();
	}
	public function send_mail($to,$from,$subject,$msg)
	{	
		$this->email->to($to);
		$this->email->from($from);
		$this->email->subject($subject);
		$this->email->message($msg);
		if($this->email->send()) //sending mail
		{			
		return true;
		}
	}
	public function table_dropdown($tbl,$status='ACTIVE',$by='id',$order='ASC')
	{
		$this->db->where('status',$status='ACTIVE');
		$this->db->order_by($by,$order);
		$query = $this->db->get($tbl);
		return  $query->result();
		
	}
	public function get_like($table,$arr,$field,$like)
	{
		$this->db->where($arr);
		$this->db->like($field,$like);
		$query = $this->db->get($table);
		return  $query->result();
		//return $this->db->last_query();
	}
	public function check_empty($table)
	{
		$this->db->where(array('status'=>'EMPTY'));
		$this->db->order_by('id','DESC');
		$this->db->limit('1');
		$query = $this->db->get($table);
		 if($query->num_rows()>0)
		 {
			$data = $query->result_array();
			return ($data[0]['id']);
		 }
		 else 
		 {
			return false;
		 }		
	}
	function count_all($table,$arr)
	{
			$this->db->where($arr);
			$query = $this->db->get($table);
		 	return  $query->num_rows();
	}
	function get_sum($table,$column,$arr)
	{
		$this->db->where($arr);
		$this->db->select_sum($column); 
		$query =  $this->db->get($table); 
		$error = $this->db->error();
		if($error['code']==0)
		{
			$result = $query->result();
			$sum =  $result[0]->$column;
			return  $sum+0;
		}
		else 
		{
			return $error;
		}
	}
	function group_sum($invoice_id)
	{
		$this->db->where("invoice_id='$invoice_id' and status<>'removed'");
		$this->db->group_by('test_id');
		$query = $this->db->get('report');
		$data = $query->result();
		$sum=0;
		foreach($data as $row)
		{
			$total =  $row->group_total;
			$sum = $sum+$total;	
		}
		
		return $sum;
	}
	public function  check_user($table,$val)
	{
		 $this->db->where($table.'_email',$val);
		 $this->db->or_where($table.'_mobile',$val);
		 $query = $this->db->get($table);
		 $error = $this->db->error();
		 if($query->num_rows()>0)
		 {
			 return  true;
		 }
		 else 
		 {
			 return $error;
		 }
	}
	public function dashboard_student($login_id,$arr)
	{
		$center_id = $this->Offer_model->multitableinfo('user',"id='$login_id' and status<>'removed'",'center_id');
		$records = $this->Offer_model->select_all('student',$arr);
		$i=0;
		foreach($records as $row)
		{
			$student_id = $row->id;
			$student_center = $this->Offer_model->multitableinfo('student',"id='$student_id'",'center_id');
			if($center_id==$student_center)
			{
				$i++;
			}
		}
		return $i;
	}
	
}
?>