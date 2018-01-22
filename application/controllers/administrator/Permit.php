<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Permit extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('CRUD/M_crud','crud');
			$this->load->model('CRUD/M_gen','gen');
		}

		public function index()
		{
			$data['title']='Match Terpadu';
			$data['menu']='permit';
			$data['menulist']='dash_permit';
			$data['isi']='menu/administrator/permit/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function gen_permitappr()
		{
			$gen = $this->gen->gen_numpermitappr();
			$data['id'] = $gen['insertId'];
			$data['kode'] = $gen['pappr_code'];
			// $data['id'] = '3';
			// $data['kode'] = 'AB/1712/000003';
			// $data['status'] = TRUE;
			echo json_encode($data);
		}

		public function permit_approval()
		{
			$data['title']='Match Terpadu';
			$data['menu']='permit';
			$data['menulist']='permit_appr';
			$data['isi']='menu/administrator/permit/permit_approval';
			$this->load->view('layout/administrator/wrapper',$data);
		}
	}
?>