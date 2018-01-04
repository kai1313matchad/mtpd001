<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Accounting extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('CRUD/M_crud','crud');
			$this->load->model('CRUD/M_gen','gen');
		}

		public function index()
		{
			$data['title']='Match Terpadu - Dashboard Accounting';
			$data['menu']='accounting';
			$data['menulist']='dash_account';
			$data['isi']='menu/administrator/accounting/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function gen_journal()		
		{
			$gen = $this->gen->gen_numjou();
			$data['id'] = $gen['insertId'];
			$data['kode'] = $gen['jou_code'];
			// $data['id'] = '1';
			// $data['kode'] = 'JOU/1712/000001';
			// $data['status'] = TRUE;
			echo json_encode($data);
		}

		public function journal_acc()
		{
			$data['title']='Match Terpadu - Dashboard Accounting';
			$data['menu']='accounting';
			$data['menulist']='journal';
			$data['isi']='menu/administrator/accounting/acc_journal';
			$this->load->view('layout/administrator/wrapper',$data);
		}
	}
?>