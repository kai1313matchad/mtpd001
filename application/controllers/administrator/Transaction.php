<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Transaction extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//$this->load->model('frontend/M_dashboard','M_dash');
		}

		public function index()
		{
			$data['title']='Match Terpadu';
			$data['menu']='transact';
			$data['menulist']='dash_transact';
			$data['isi']='menu/administrator/transaction/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function login_menu()
		{

		}
	}
?>