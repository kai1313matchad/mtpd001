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
			// $data['kode'] = 'JOU/1801/000001';
			$data['status'] = TRUE;
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

		//CRUD
		public function add_joudet()
		{
			$this->_validate_joudet();
			$data = array(
					'branch_id'=>$this->input->post('jou_branchid'),
					'user_id'=>$this->input->post('user_id'),
					'jou_code'=>$this->input->post('jou_code'),
					'jou_reff'=>$this->input->post('jou_reff'),
					'jou_date'=>$this->input->post('jou_date'),
					'jou_info'=>$this->input->post('jou_info'),
					'jou_sts'=>'1'
					);
			$update = $this->crud->update('account_journal',$data,array('jou_id'=>$this->input->post('jou_id')));
			$datadet = array(
					'jou_id'=>$this->input->post('jou_id'),
					'coa_id'=>$this->input->post('jou_accdet'),
					'joudet_debit'=>$this->input->post('jou_accdebetsum'),
					'joudet_credit'=>$this->input->post('jou_acccreditsum'),
					);
			$insertdet = $this->crud->save('jou_details',$datadet);
			echo json_encode(array("status" => TRUE));
		}

		public function delete_joudet($id)
		{
			$this->crud->delete_by_id('jou_details',array('joudet_id' => $id));
        	echo json_encode(array("status" => TRUE));
		}

		public function _validate_joudet()
		{
			$data = array();
	        $data['error_string'] = array();
	        $data['inputerror'] = array();
	        $data['status'] = TRUE;
	 
	        if($this->input->post('jou_code') == '')
	        {
	            $data['inputerror'][] = 'jou_code';
	            $data['error_string'][] = 'Nomor Jurnal Tidak Boleh Kosong';
	            $data['status'] = FALSE;
	        }
	        if($this->input->post('jou_branch') == '')
	        {
	            $data['inputerror'][] = 'jou_branch';
	            $data['error_string'][] = 'Cabang Tidak Boleh Kosong';
	            $data['status'] = FALSE;
	        }
	        if($this->input->post('jou_info') == '')
	        {
	            $data['inputerror'][] = 'jou_info';
	            $data['error_string'][] = 'Keterangan Jurnal Tidak Boleh Kosong';
	            $data['status'] = FALSE;
	        }
	        if($this->input->post('jou_accdet') == '')
	        {
	            $data['inputerror'][] = 'jou_accdet';
	            $data['error_string'][] = 'Nomor Rekening Tidak Boleh Kosong';
	            $data['status'] = FALSE;
	        }
	        if($this->input->post('jou_accdebetsum') == '')
	        {
	            $data['inputerror'][] = 'jou_accdebetsum';
	            $data['error_string'][] = 'Debet Tidak Boleh Kosong';
	            $data['status'] = FALSE;
	        }
	        if($this->input->post('jou_acccreditsum') == '')
	        {
	            $data['inputerror'][] = 'jou_acccreditsum';
	            $data['error_string'][] = 'Kredit Tidak Boleh Kosong';
	            $data['status'] = FALSE;
	        }
	        if($data['status'] === FALSE)
	        {
	            echo json_encode($data);
	            exit();
	        }
		}
	}
?>