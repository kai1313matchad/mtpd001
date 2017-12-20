<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Accounting extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			
		}

		public function index()
		{
			$data['title']='Match Terpadu - Dashboard Accounting';
			$data['menu']='accounting';
			$data['menulist']='dash_account';
			$data['isi']='menu/administrator/accounting/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}
	}
?>