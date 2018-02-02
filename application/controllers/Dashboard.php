<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Dashboard extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();			
		}

		public function index()
		{
			redirect('administrator/Dashboard');
		}

		public function login_()
		{
			$data['title']='Match Terpadu';
			$data['menu']='dashboard';
			$data['menulist']='';
			$this->load->view('menu/general/login',$data);
		}

		public function loginauth()
		{
			$user = $this->input->post('username');
			$pass = $this->input->post('password');
			$res = $this->authsys->login($user,$pass);
			if ($res == '1')
			{
				$data['tes'] = 'Sukses Login'.$res.$pass;
				$data['status'] = TRUE;
			}
			else
			{
				$data['tes'] = 'Gagal Login'.$res.$pass;
				$data['status'] = FALSE;
			}
			echo json_encode($data);
		}

		public function tes()
		{
			$data['title']='Match Terpadu';
			$data['menu']='dashboard';
			$data['menulist']='';
			$data['isi']='menu/administrator/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}
	}
?>