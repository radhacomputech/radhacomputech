<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// Turn off all error reporting
error_reporting(0);

class Admin extends CI_Controller {
	public $token;
	public $user;
	public $type;
	public $branch;
	public $code;
	public $uri_status;
	public $br_id;
	public $today;
	public function __construct()
	{
		parent::__construct();
		$session_token = $this->session->userdata('token_id');
		$this->token = $session_token;
		$user = $this->user = $this->token['login_id'];
		$type = $this->type = $this->token['user_type'];
		$today = date('d-m-Y');
		// $user_arr ="id=$user"; 
		// $br_id = $this->branch = $this->Offer_model->multitableinfo('user',$user_arr,'branch_id');
		// $br_arr ="id=$br_id";
		// $this->code = $this->Offer_model->multitableinfo('branch',$br_arr,'branch_code');
		// $this->br_id = $br_id;
	}
	
	public function index()
	{
		$this->load->view('login');
	}
	public function dashboard()
	{
		$this->load->view('admin/dashboard');
	}
	public function center()
	{	
		$this->load->view('admin/center');
	}
		
	public function user()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN')
		{	
			$this->load->view('admin/user');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function course()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN')
		{	
			$this->load->view('admin/course');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function student()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN' or $user_type=='CLIENT')
		{	
			$this->load->view('admin/student');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function regular_student()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN' or $user_type=='CLIENT')
		{	
			$this->load->view('admin/regular_student');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function online_student()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN' or $user_type=='CLIENT')
		{	
			$this->load->view('admin/online_student');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function ledger()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN' or $user_type=='CLIENT')
		{	
			$this->load->view('admin/ledger');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function payment_slip()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN' or $user_type=='CLIENT')
		{	
			$this->load->view('admin/payment_slip');
		}
		else 
		{
			//$this->load->view('admin/dashboard');
			echo 1;
		}
	}
	public function registration_slip()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN' or $user_type=='CLIENT')
		{	
			$this->load->view('admin/registration_slip');
		}
		else 
		{
			//$this->load->view('admin/dashboard');
			echo 1;
		}
	}
	
		public function print_certificate()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN' or $user_type=='CLIENT')
		{	
			$this->load->view('admin/print_certificate');
		}
		else 
		{
			//$this->load->view('admin/dashboard');
			echo 1;
		}
	}
	
		public function print_markssheet()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN' or $user_type=='CLIENT')
		{	
			$this->load->view('admin/print_markssheet');
		}
		else 
		{
			//$this->load->view('admin/dashboard');
			echo 1;
		}
	}
	
	public function results()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN' OR $user_type=='CLIENT')
		{	
			$this->load->view('admin/result');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function frenchise_application()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN')
		{	
			$this->load->view('admin/frenchise_application');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function ctet_application()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN')
		{	
			$this->load->view('admin/ctet_application');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function video_class()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN')
		{	
			$this->load->view('admin/video_class');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function study_material()
	{	
		$user_type=$this->type;
		if($user_type=='ADMIN')
		{	
			$this->load->view('admin/study_material');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function admin_gallery()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN')
		{	
			$this->load->view('admin/gallery');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function admin_notice()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN')
		{	
			$this->load->view('admin/notice');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function fee()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN')
		{	
			$this->load->view('admin/fee_list');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function collection()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN' or $user_type=='CLIENT')
		{	
			$this->load->view('admin/collection');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function enquiry()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN')
		{	
			$this->load->view('admin/enquiry');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function facilitators()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN' or $user_type=='CLIENT')
		{	
			$this->load->view('admin/facilitators');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
	public function admission()
	{	
	$user_type=$this->type;
		if($user_type=='ADMIN' or $user_type=='CLIENT')
		{	
			$this->load->view('admin/admission');
		}
		else 
		{
			$this->load->view('admin/dashboard');
		}
	}
public function save_ctet()
	{
			$this->form_validation->set_rules('student_course', 'Course', 'required|trim|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('place_of_work', 'Place Of Work', 'trim|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('student_name', 'Name', 'required|trim|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('student_father', 'Father/Husband Name', 'required|trim|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('student_mobile', 'Mobile No.', 'trim|required|numeric|min_length[10]|max_length[10]');
			// $this->form_validation->set_rules('student_email', 'Email', 'trim|required|valid_email');
			$this->form_validation->set_rules('date_of_birth', 'Date Of Birth', 'required|trim|trim');
			$this->form_validation->set_rules('student_category', 'Category', 'required|trim|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('student_gender', 'Gender', 'required|trim|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('student_marital', 'Marital Status', 'required|trim|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('student_nationality', 'Nationality', 'required|trim|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('student_postal', 'Postal Address', 'required|trim|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('student_present', 'Present Address', 'trim|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('m_board', 'Board/University', 'trim|required|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('m_total', 'Total', 'trim|required|numeric|trim');
			$this->form_validation->set_rules('m_percent', 'Percentage', 'trim|required|numeric|trim');
			$this->form_validation->set_rules('m_year', 'Year', 'trim|numeric|required|trim');
			
			$this->form_validation->set_rules('i_board', 'Board/University', 'trim|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('i_total', 'Total', 'trim|numeric|trim');
			$this->form_validation->set_rules('i_percent', 'Percentage', 'trim|numeric|trim');
			$this->form_validation->set_rules('i_year', 'Year', 'trim|numeric|trim');
			
			$this->form_validation->set_rules('g_board', 'Board/University', 'trim|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('g_total', 'Total', 'trim|numeric|trim');
			$this->form_validation->set_rules('g_percent', 'Percentage', 'trim|numeric|trim');
			$this->form_validation->set_rules('g_year', 'Year', 'trim|numeric|trim');
			
			$this->form_validation->set_rules('p_board', 'Board/University', 'trim|alpha_numeric_spaces|trim');
			$this->form_validation->set_rules('p_total', 'Total', 'trim|numeric|trim');
			$this->form_validation->set_rules('g_percent', 'Percentage', 'trim|numeric|trim');
			$this->form_validation->set_rules('g_year', 'Year', 'trim|numeric|trim');
			if (empty($_FILES['student_photo']['name']))
			{
			$this->form_validation->set_rules('student_photo', 'Photo', 'trim|required|trim');
			}
			if (empty($_FILES['student_sign']['name']))
			{
			$this->form_validation->set_rules('student_sign', 'Signature', 'trim|required|trim');
			}
			$this->form_validation->set_error_delimiters('<div class="text-danger"><small>', '</small></div>');
		if($this->form_validation->run()==false)
		{	
			 $data['success'] = false;
			$data['error'] = validation_errors();
			$this->load->view('pages/header');
			$this->load->view('pages/ctet_apply',$data);
			$this->load->view('pages/footer');
		}
		else	
		{	
			$data = $this->input->post();
			extract($data);
			$this->load->model('Offer_model');
			//print_r($_FILES);
			$res1 = $this->Offer_model->upload_files_only('student_photo',$student_mobile);
			$res2 = $this->Offer_model->upload_files_only('student_sign',$student_mobile);
			//$res2 = $this->Offer_model->upload_only('student_sign');
			if($res1['status']<>1)
			{
				$data['success'] = false;
				$data['error'] = validation_errors();
				//echo $res1;
				// print_r($res1);
				// $this->load->view('pages/header');
				// $this->load->view('pages/ctet_apply',$data);
				// $this->load->view('pages/footer');
			}
			
			else if($res2['status']<>1)
			{
				$data['success'] = false;
				$data['error'] = validation_errors();
				$this->load->view('pages/header');
				$this->load->view('pages/ctet_apply',$data);
				$this->load->view('pages/footer');
			}
			else if($res1['status']==1 and $res2['status']==1) 
			{
				$photo = $_FILES['student_photo']['name'];
				$sign = $_FILES['student_sign']['name'];
				$arr_img = array('student_photo'=>$photo,'student_sign'=>$sign);
				$new_array = array_merge($data,$arr_img);
				$ret = $this->Offer_model->save_data('ctet',$new_array);
				$registration = $this->db->insert_id();
				$mobile = $_POST['student_mobile'];
				$student_email = $_POST['student_email'];
				$name = $_POST['student_name'];
				$inst_name = config('sc_name');
				$noreply = config('noreply');
				$sms = "Dear $name your CTET - 2020 Application  is accepted. Your Application No is $registration. Now make the payment to proceed further. Reegards $inst_name";
				//sendsms($mobile,$sms);
				$this->Offer_model->send_mail($student_email,$noreply,'CTET - 2020-2021 Registration',$sms);
				if($ret)
				{	
					$this->session->set_flashdata('success_message','Application Submitted Successfully.');
					redirect(base_url().'ctet_apply');
					//redirect(base_url().'index.php/pages/view/ctet_apply');
				}
			}
			else
			{	
				if($res1['status']<>1)
				{
					$error = "Photo Error". $res1['message'];
				}
				else if($res2['status']<>1)
				{
					$error = "Signature Error". $res2['message'];
				}
				$data = array('error_message'=>$error);
				$this->load->view('pages/header');
				$this->load->view('pages/ctet_apply',$data);
				$this->load->view('pages/footer');
			}
		}
	}
	public function signout() 
	{
			$token = $this->session->userdata('student_token');
			$id = $token['student_id'];
			$data = array('login_status'=>'LOGOUT','stu_api'=>'');
            $this->session->unset_userdata('student_token');
            $this->session->sess_destroy();
            redirect(site_url().'video_classes');
    }
		public function logout()
{
    $this->session->sess_destroy(); // destroy session
    redirect('admin'); // redirect to login page
}
	
	
}
