<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Showdata extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('datatables/showdata/Dt_department','master_dept');
			$this->load->model('datatables/showdata/Dt_cashindet','det_cashin');
		}

		public function index()
		{

		}

		public function showmaster_dept()
		{
			$list = $this->master_dept->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->DEPT_CODE;
				$row[] = $dat->DEPT_NAME;				
				$row[] = $dat->DEPT_INFO;
				$row[] = '<a href="javascript:void(0)" title="Lihat Data" class="btn btn-sm btn-info btn-responsive" onclick="lihat_dept('."'".$dat->DEPT_ID."'".')"><span class="glyphicon glyphicon-eye-open"></span> </a>  <a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit_dept('."'".$dat->DEPT_ID."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_dept('."'".$dat->DEPT_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->master_dept->count_all(),
							"recordsFiltered" => $this->master_dept->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function showdetail_cashin($id)
		{
			$list = $this->det_cashin->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->COA_ACC;
				$row[] = $dat->CSHINDET_REFF;				
				$row[] = $dat->CSHINDET_INFO;
				$row[] = $dat->CSHINDET_AMOUNT;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_cshindet('."'".$dat->CSHINDET_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->det_cashin->count_all(),
							"recordsFiltered" => $this->det_cashin->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}
	}
?>