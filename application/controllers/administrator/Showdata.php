<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Showdata extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('datatables/showdata/Dt_department','master_dept');
			$this->load->model('datatables/showdata/Dt_bank','master_bank');
			$this->load->model('datatables/showdata/Dt_cashindet','det_cashin');
			$this->load->model('datatables/showdata/Dt_cashoutdet','det_cashout');
			$this->load->model('datatables/showdata/Dt_showrptappr','showrptappr');
			$this->load->model('datatables/showdata/Dt_bankintrxdet','bankin_trxdet');
			$this->load->model('datatables/showdata/Dt_bankindet','bankin_det');
			$this->load->model('datatables/showdata/Dt_bankouttrxdet','bankout_trxdet');
			$this->load->model('datatables/showdata/Dt_bankoutdet','bankout_det');
			$this->load->model('datatables/showdata/Dt_giroindet','giroin_det');
			$this->load->model('datatables/showdata/Dt_girooutdet','giroout_det');
			$this->load->model('datatables/showdata/Dt_invdet','invoice_det');
			$this->load->model('datatables/showdata/Dt_journaldet','jou_det');
		}

		public function index()
		{

		}

		//Tampil Master Departemen
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

		//Tampil Master Bank
		public function showmaster_bank()
		{
			$list = $this->master_bank->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->BANK_CODE;
				$row[] = $dat->BANK_NAME;				
				$row[] = $dat->BANK_INFO;
				$row[] = '<a href="javascript:void(0)" title="Lihat Data" class="btn btn-sm btn-info btn-responsive" onclick="lihat_bank('."'".$dat->BANK_ID."'".')"><span class="glyphicon glyphicon-eye-open"></span> </a>  <a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="edit_bank('."'".$dat->BANK_ID."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>  <a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_bank('."'".$dat->BANK_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->master_bank->count_all(),
							"recordsFiltered" => $this->master_bank->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Tampil Laporan Approval
		public function showrpt_appr()
		{
			$list = $this->showrptappr->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->APPR_CODE;
				$row[] = $dat->APPR_CONTRACT_END;
				$row[] = $dat->LOC_NAME.' - '.$dat->LOC_ADDRESS.', '.$dat->LOC_CITY;
				$row[] = $dat->CUST_NAME;
				$row[] = $dat->APPR_BRANCH;
				$row[] = 'Rp '.$dat->APPR_TOT_INCOME;
				$row[] = '<a href="javascript:void(0)" title="Edit Data" class="btn btn-sm btn-primary btn-responsive" onclick="pilih_appr('."'".$dat->APPR_ID."'".')"><span class="glyphicon glyphicon-pencil"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->showrptappr->count_all(),
							"recordsFiltered" => $this->showrptappr->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Tampil Detail Kas Masuk
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
				$row[] = $dat->CSHDETIN_AMOUNT;
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

		//Tampil Detail Kas Keluar
		public function showdetail_cashout($id)
		{
			$list = $this->det_cashout->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->COA_ACC;
				$row[] = $dat->CSHODET_REFF;				
				$row[] = $dat->CSHODET_INFO;
				$row[] = $dat->CSHODET_AMOUNT;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_cshodet('."'".$dat->CSHODET_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->det_cashout->count_all(),
							"recordsFiltered" => $this->det_cashout->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Tampil Detail Giro Bank Masuk
		public function showdetail_trxbankin($id)
		{
			$list = $this->bankin_trxdet->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->BNKTRX_TYPE;
				$row[] = $dat->BNKTRX_NUM;
				$row[] = $dat->BNKTRX_DATE;
				$row[] = $dat->BNKTRX_AMOUNT;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_bankintrxdet('."'".$dat->BNKTRX_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->bankin_trxdet->count_all(),
							"recordsFiltered" => $this->bankin_trxdet->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Tampil Detail Bank Masuk
		public function showdetail_bankin($id)
		{
			$list = $this->bankin_det->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->COA_ACC;
				$row[] = $dat->BNKDET_TYPE;
				$row[] = $dat->BNKDET_NUM;
				$row[] = $dat->BNKDET_REFF;
				$row[] = $dat->BNKDET_INFO;
				$row[] = $dat->BNKDET_AMOUNT;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_bankindet('."'".$dat->BNKDET_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->bankin_det->count_all(),
							"recordsFiltered" => $this->bankin_det->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Tampil Detail Giro Bank Keluar
		public function showdetail_trxbankout($id)
		{
			$list = $this->bankout_trxdet->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->BNKTRXO_TYPE;
				$row[] = $dat->BNKTRXO_NUM;
				$row[] = $dat->BNKTRXO_DATE;
				$row[] = $dat->BNKTRXO_AMOUNT;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_bankouttrxdet('."'".$dat->BNKTRXO_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->bankout_trxdet->count_all(),
							"recordsFiltered" => $this->bankout_trxdet->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Tampil Detail Bank Keluar
		public function showdetail_bankout($id)
		{
			$list = $this->bankout_det->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->COA_ACC;
				$row[] = $dat->BNKODET_TYPE;
				$row[] = $dat->BNKODET_NUM;
				$row[] = $dat->BNKODET_REFF;
				$row[] = $dat->BNKODET_INFO;
				$row[] = $dat->BNKODET_AMOUNT;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_bankoutdet('."'".$dat->BNKODET_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->bankout_det->count_all(),
							"recordsFiltered" => $this->bankout_det->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Tampil Detail Giro Masuk
		public function showdetail_giroin($id)
		{
			$list = $this->giroin_det->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GRINDET_CODE;
				$row[] = $dat->GRINDET_DATE;
				$row[] = $dat->GRINDET_AMOUNT;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_grindet('."'".$dat->GRINDET_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->giroin_det->count_all(),
							"recordsFiltered" => $this->giroin_det->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Tampil Detail Giro Keluar
		public function showdetail_giroout($id)
		{
			$list = $this->giroout_det->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GROUTDET_CODE;
				$row[] = $dat->GROUTDET_DATE;
				$row[] = $dat->GROUTDET_AMOUNT;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_groutdet('."'".$dat->GROUTDET_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->giroout_det->count_all(),
							"recordsFiltered" => $this->giroout_det->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Tampil Detail Invoice
		public function showdetail_invoice($id)
		{
			$list = $this->invoice_det->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->APPR_CODE;
				$row[] = $dat->LOC_NAME;
				$row[] = $dat->APPR_PO;
				$row[] = $dat->INVDET_TERM;
				$row[] = $dat->INVDET_AMOUNT;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_invdet('."'".$dat->INVDET_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->invoice_det->count_all(),
							"recordsFiltered" => $this->invoice_det->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Tampil Detail Journal
		public function showdetail_journal($id)
		{
			$list = $this->jou_det->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->COA_ACC;
				$row[] = $dat->COA_ACCNAME;
				$row[] = $dat->JOU_INFO;
				$row[] = $dat->JOUDET_DEBIT;
				$row[] = $dat->JOUDET_CREDIT;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="delete_joudet('."'".$dat->JOUDET_ID."'".')"><span class="glyphicon glyphicon-trash"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->jou_det->count_all(),
							"recordsFiltered" => $this->jou_det->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}
	}
?>