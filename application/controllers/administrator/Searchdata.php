<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Searchdata extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('CRUD/M_crud','crud');
			$this->load->model('datatables/search/Dt_srchdept','s_dept');
			$this->load->model('datatables/search/Dt_srchbank','s_bank');
			$this->load->model('datatables/search/Dt_srchbranch','s_branch');
			$this->load->model('datatables/search/Dt_srchinvtype','s_invtype');
			$this->load->model('datatables/search/Dt_srchapprbranch','s_apprbranch');			
		}

		public function index()
		{

		}

		//Search Approval Cabang
		public function srch_apprbranch()
		{
			$list = $this->s_apprbranch->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->APPR_CODE;
				$row[] = $dat->APPR_BRANCH;				
				$row[] = $dat->APPR_DATE;
				$row[] = $dat->CUST_NAME;
				$row[] = $dat->LOC_NAME;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_apprbranch('."'".$dat->APPR_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_apprbranch->count_all(),
							"recordsFiltered" => $this->s_apprbranch->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Master Departemen
		public function srch_dept()
		{
			$list = $this->s_dept->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->DEPT_CODE;
				$row[] = $dat->DEPT_NAME;				
				$row[] = $dat->DEPT_INFO;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_dept('."'".$dat->DEPT_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_dept->count_all(),
							"recordsFiltered" => $this->s_dept->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Master Bank
		public function srch_bank()
		{
			$list = $this->s_bank->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->BANK_CODE;
				$row[] = $dat->BANK_NAME;				
				$row[] = $dat->BANK_INFO;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_bank('."'".$dat->BANK_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_bank->count_all(),
							"recordsFiltered" => $this->s_bank->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Master Cabang
		public function srch_branch()
		{
			$list = $this->s_branch->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->BRANCH_CODE;
				$row[] = $dat->BRANCH_NAME;				
				$row[] = $dat->BRANCH_ADDRESS.', '.$dat->BRANCH_CITY;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_branch('."'".$dat->BRANCH_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_branch->count_all(),
							"recordsFiltered" => $this->s_branch->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function pick_branch($id)
		{
			$data = $this->crud->get_by_id('master_branch',array('branch_id' => $id));
			echo json_encode($data);
		}

		//Search Jenis Invoice
		public function srch_invtype()
		{
			$list = $this->s_invtype->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->INC_CODE;
				$row[] = $dat->INC_NAME;				
				$row[] = $dat->INC_ACCRCVNAME;
				$row[] = $dat->INC_ACCINCNAME;;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_invtype('."'".$dat->INC_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_invtype->count_all(),
							"recordsFiltered" => $this->s_invtype->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function pick_invtype($id)
		{
			$data = $this->crud->get_by_id('invoice_type',array('inc_id' => $id));
			echo json_encode($data);
		}
	}
?>