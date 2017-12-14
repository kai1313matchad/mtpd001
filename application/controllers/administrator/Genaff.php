<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Genaff extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//$this->load->model('frontend/M_dashboard','M_dash');
			$this->load->model('CRUD/M_crud','crud');
		}

		//menu link
		public function index()
		{
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='dash_ga';
			$data['isi']='menu/administrator/ga/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function report()
		{
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$data['isi']='menu/administrator/ga/dash_report';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function ga_trx_po()
		{
			$id=$this->crud->add_po();
			$data['po'] = $this->crud->get_by_id('trx_po',array('po_id' => $id));
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='po';
			$data['isi']='menu/administrator/ga/ga_trx_po';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function ga_trx_prc()
		{
			$id=$this->crud->add_bl();
			$data['prc'] = $this->crud->get_by_id('trx_procurement',array('prc_id' => $id));
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='prc';
			$data['isi']='menu/administrator/ga/lgt_trx_prc';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function ga_trx_retprc()
		{
			$id=$this->crud->add_rb();
			$data['rb'] = $this->crud->get_by_id('procurement_ret',array('rtprc_id' => $id));
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='retprc';
			$data['isi']='menu/administrator/ga/lgt_trx_retprc';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function ga_trx_usage()
		{
			$id=$this->crud->add_usg();
			// $id = '1';
			$data['usg'] = $this->crud->get_by_id('trx_usage',array('usg_id' => $id));
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='usage';
			$data['isi']='menu/administrator/ga/lgt_trx_usage';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function ga_trx_retusage()
		{
			$id=$this->crud->add_retusg();
			// $id = '1';
			$data['usg'] = $this->crud->get_by_id('usage_ret',array('rtusg_id' => $id));
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='retusg';
			$data['isi']='menu/administrator/ga/lgt_trx_retusg';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function ga_trx_adjust()
		{
			$id=$this->crud->add_adj();
			// $id = '1';
			$data['adj'] = $this->crud->get_by_id('trx_adjustment',array('adj_id' => $id));
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='adjust';
			$data['isi']='menu/administrator/ga/lgt_trx_adjust';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function print_po()
		{
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$data['isi']='menu/administrator/ga/lgt_print_po';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_po($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$this->load->view('menu/administrator/ga/po_print',$data);
		}

		public function print_prc()
		{
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$data['isi']='menu/administrator/ga/lgt_print_prc';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_prc($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$this->load->view('menu/administrator/ga/prc_print',$data);
		}

		public function print_retprc()
		{
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$data['isi']='menu/administrator/ga/lgt_print_retprc';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_retprc($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$this->load->view('menu/administrator/ga/retprc_print',$data);
		}
	}
?>