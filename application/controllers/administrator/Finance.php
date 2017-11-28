<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Finance extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function index()
		{
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='dash_finance';
			$data['isi']='menu/administrator/finance/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function fin_invoice()
		{
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='inv';
			$data['isi']='menu/administrator/finance/trx_fin_invoice';
			$this->load->view('layout/administrator/wrapper',$data);
		}
	}
?>