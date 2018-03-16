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
			$this->load->model('datatables/search/Dt_srchsupp','s_supp');
			$this->load->model('datatables/search/Dt_srchgovsts','s_govsts');
			$this->load->model('datatables/search/Dt_srchpermittype','s_permittype');
			$this->load->model('datatables/search/Dt_srchbranch','s_branch');
			$this->load->model('datatables/search/Dt_srchinvtype','s_invtype');
			$this->load->model('datatables/search/Dt_srchinv','s_inv');
			$this->load->model('datatables/search/Dt_srchappr','s_appr');
			$this->load->model('datatables/search/Dt_srchgdforlgt','s_gdforlgt');
			$this->load->model('datatables/search/Dt_srchgdbybrc','s_gdbybrc');
			$this->load->model('datatables/search/Dt_srchapprbranch','s_apprbranch');
			$this->load->model('datatables/search/Dt_srchapprbyclient','s_apprbyclient');
			$this->load->model('datatables/search/Dt_srchapprbysts','s_apprbysts');
			$this->load->model('datatables/search/Dt_srchbappbysts','s_bappbysts');
			$this->load->model('datatables/search/Dt_srchpobysts','s_pobysts');
			$this->load->model('datatables/search/Dt_srchprcbysts','s_prcbysts');
			$this->load->model('datatables/search/Dt_srchrtprcbysts','s_rtprcbysts');
			$this->load->model('datatables/search/Dt_srchcashin','s_cashin');
			$this->load->model('datatables/search/Dt_srchcashout','s_cashout');
			$this->load->model('datatables/search/Dt_srchbankin','s_bankin');
			$this->load->model('datatables/search/Dt_srchbankout','s_bankout');
			$this->load->model('datatables/search/Dt_srchgiroin','s_giroin');
			$this->load->model('datatables/search/Dt_srchgiroout','s_giroout');
			$this->load->model('datatables/search/Dt_srchgiroinrec','s_giroinrec');
			$this->load->model('datatables/search/Dt_srchgirooutrec','s_girooutrec');
		}

		//Search Approval Cabang
		public function srch_appr()
		{
			$list = $this->s_appr->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->APPR_CODE;
				$row[] = $dat->APPR_BRCNAME;				
				$row[] = $dat->APPR_DATE;
				$row[] = $dat->CUST_NAME;
				$row[] = $dat->LOC_NAME;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_apprgb('."'".$dat->APPR_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_appr->count_all(),
							"recordsFiltered" => $this->s_appr->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
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
				$row[] = $dat->APPR_CODE.' '.$dat->BRANCH_INIT;
				$row[] = $dat->APPR_BRCNAME;				
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

		public function pick_apprbranch($id)
		{
			$this->db->from('trx_approvalbill a');
			$this->db->join('master_user b','b.user_id = a.user_id');
			$this->db->join('master_branch c','c.branch_id = b.branch_id');
			$this->db->where('a.appr_id',$id);
			$que = $this->db->get();
			$data = $que->row();
			echo json_encode($data);
		}

		//Search Approval Global
		public function srch_apprglobal()
		{
			$id = '1';
			$br = $this->input->post('brch');
			$brc = 'd.branch_id = '.$br;
			$list = $this->s_apprbysts->get_datatables($id,$brc);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->APPR_CODE;
				$row[] = $dat->APPR_PO;
				$row[] = $dat->APPR_DATE;
				$row[] = $dat->CUST_NAME;
				$row[] = $dat->LOC_NAME;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_apprgb('."'".$dat->APPR_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_apprbysts->count_all(),
							"recordsFiltered" => $this->s_apprbysts->count_filtered($id,$brc),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Approval Berdasarkan Client
		public function srch_apprbyclient($id)
		{
			$list = $this->s_apprbyclient->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->APPR_CODE;
				$row[] = $dat->APPR_BRCNAME;				
				$row[] = $dat->APPR_DATE;
				$row[] = $dat->CUST_NAME;
				$row[] = $dat->LOC_NAME;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_apprbyclient('."'".$dat->APPR_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_apprbyclient->count_all(),
							"recordsFiltered" => $this->s_apprbyclient->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Approval Berdasarkan Status Untuk Edit dan Buka Record di halaman approval
		public function srch_apprbysts()
		{
			$id = $this->input->post('sts');
			$br = $this->input->post('brch');
			$brc = ($this->input->post('chk') != '0')? 'd.branch_id = '.$br : 'd.branch_id = '.$br.' OR d.branch_id IS null';
			$list = $this->s_apprbysts->get_datatables($id,$brc);
			$data = array();
			$no = $_POST['start'];
			if($this->input->post('chk') != '0')
			{
				foreach ($list as $dat) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $dat->APPR_CODE;
					$row[] = $dat->APPR_BRCNAME;
					$row[] = $dat->APPR_DATE;
					$row[] = $dat->CUST_NAME;
					$row[] = $dat->LOC_NAME;
					$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_appropen('."'".$dat->APPR_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
					$data[] = $row;
				}
			}
			else
			{
				foreach ($list as $dat) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $dat->APPR_CODE;
					$row[] = $dat->APPR_BRCNAME;
					$row[] = $dat->APPR_DATE;
					$row[] = $dat->CUST_NAME;
					$row[] = $dat->LOC_NAME;
					$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_appredit('."'".$dat->APPR_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
					$data[] = $row;
				}
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_apprbysts->count_all(),
							"recordsFiltered" => $this->s_apprbysts->count_filtered($id,$brc),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Approval Berdasarkan Status Untuk halaman bapp
		public function srch_apprforbapp()
		{
			$id = '1';
			$br = $this->input->post('brch');
			$brc = 'd.branch_id = '.$br;
			$list = $this->s_apprbysts->get_datatables($id,$brc);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->APPR_CODE;
				$row[] = $dat->APPR_DATE;
				$row[] = $dat->CUST_NAME;
				$row[] = $dat->LOC_NAME;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_apprgb('."'".$dat->APPR_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_apprbysts->count_all(),
							"recordsFiltered" => $this->s_apprbysts->count_filtered($id,$brc),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function pick_apprgb($id)
		{
			$data = $this->crud->get_by_id('trx_approvalbill',array('appr_id' => $id));
			echo json_encode($data);
		}

		//Search BAPP Berdasarkan Status Untuk Edit dan Buka Record di halaman BAPP
		public function srch_bappbysts()
		{
			$id = $this->input->post('sts');
			$br = $this->input->post('brch');
			$brc = ($this->input->post('chk') != '0')? 'e.branch_id = '.$br : 'e.branch_id = '.$br.' OR e.branch_id IS null';
			$list = $this->s_bappbysts->get_datatables($id,$brc);
			$data = array();
			$no = $_POST['start'];
			if($this->input->post('chk') != '0')
			{
				foreach ($list as $dat) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $dat->BAPP_CODE;
					$row[] = $dat->APPR_CODE;
					$row[] = $dat->BAPP_DATE;
					$row[] = $dat->CUST_NAME;
					$row[] = $dat->LOC_NAME;
					$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_bappopen('."'".$dat->BAPP_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
					$data[] = $row;
				}
			}
			else
			{
				foreach ($list as $dat) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $dat->BAPP_CODE;
					$row[] = $dat->APPR_CODE;
					$row[] = $dat->BAPP_DATE;
					$row[] = $dat->CUST_NAME;
					$row[] = $dat->LOC_NAME;
					$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_bappedit('."'".$dat->BAPP_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
					$data[] = $row;
				}
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_bappbysts->count_all(),
							"recordsFiltered" => $this->s_bappbysts->count_filtered($id,$brc),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function pick_bappgb($id)
		{
			$data = $this->crud->get_by_id('trx_bapp',array('bapp_id' => $id));
			echo json_encode($data);
		}

		//Search PO Berdasarkan Status Untuk Edit dan Buka Record di halaman PO Logistik
		public function srch_pobysts()
		{
			$id = $this->input->post('sts');
			$br = $this->input->post('brch');
			$brc = ($this->input->post('chk') != '0')? 'e.branch_id = '.$br : 'e.branch_id = '.$br.' OR e.branch_id IS null';
			$list = $this->s_pobysts->get_datatables($id,$brc);
			$data = array();
			$no = $_POST['start'];
			if($this->input->post('chk') != '0')
			{
				foreach ($list as $dat) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $dat->PO_CODE;
					$row[] = $dat->APPR_CODE;
					$row[] = $dat->PO_DATE;
					$row[] = $dat->LOC_NAME;
					$row[] = $dat->SUPP_NAME;
					$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_polgtopen('."'".$dat->PO_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
					$data[] = $row;
				}
			}
			else
			{
				foreach ($list as $dat) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $dat->PO_CODE;
					$row[] = $dat->APPR_CODE;
					$row[] = $dat->PO_DATE;
					$row[] = $dat->LOC_NAME;
					$row[] = $dat->SUPP_NAME;
					$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_polgtedit('."'".$dat->PO_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
					$data[] = $row;
				}
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_pobysts->count_all(),
							"recordsFiltered" => $this->s_pobysts->count_filtered($id,$brc),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function pick_polgtgb($id)
		{
			$data = $this->crud->get_by_id('trx_po',array('po_id' => $id));
			echo json_encode($data);
		}

		//Search Pembelian Berdasarkan Status Untuk Edit dan Buka Record di halaman Pembelian Logistik
		public function srch_prcbysts()
		{
			$id = $this->input->post('sts');
			$br = $this->input->post('brch');
			$brc = ($this->input->post('chk') != '0')? 'e.branch_id = '.$br : 'e.branch_id = '.$br.' OR e.branch_id IS null';
			$list = $this->s_prcbysts->get_datatables($id,$brc);
			$data = array();
			$no = $_POST['start'];
			if($this->input->post('chk') != '0')
			{
				foreach ($list as $dat) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $dat->PRC_CODE;
					$row[] = $dat->PO_CODE;
					$row[] = $dat->APPR_CODE;
					$row[] = $dat->PRC_DATE;
					$row[] = $dat->LOC_NAME;
					$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_prclgtopen('."'".$dat->PRC_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
					$data[] = $row;
				}
			}
			else
			{
				foreach ($list as $dat) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $dat->PRC_CODE;
					$row[] = $dat->PO_CODE;
					$row[] = $dat->APPR_CODE;
					$row[] = $dat->PRC_DATE;
					$row[] = $dat->LOC_NAME;
					$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_prclgtedit('."'".$dat->PRC_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
					$data[] = $row;
				}
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_prcbysts->count_all(),
							"recordsFiltered" => $this->s_prcbysts->count_filtered($id,$brc),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function pick_prclgtgb($id)
		{
			$data = $this->crud->get_by_id('trx_procurement',array('prc_id' => $id));
			echo json_encode($data);
		}

		//Search Retur Pembelian Berdasarkan Status Untuk Edit dan Buka Record di halaman Retur Pembelian Logistik
		public function srch_rtprcbysts()
		{
			$id = $this->input->post('sts');
			$br = $this->input->post('brch');
			$brc = ($this->input->post('chk') != '0')? 'e.branch_id = '.$br : 'e.branch_id = '.$br.' OR e.branch_id IS null';
			$list = $this->s_rtprcbysts->get_datatables($id,$brc);
			$data = array();
			$no = $_POST['start'];
			if($this->input->post('chk') != '0')
			{
				foreach ($list as $dat) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $dat->RTPRC_CODE;
					$row[] = $dat->PRC_CODE;
					$row[] = $dat->PO_CODE;
					$row[] = $dat->RTPRC_DATE;
					$row[] = $dat->APPR_CODE;
					$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_rtprclgtopen('."'".$dat->RTPRC_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
					$data[] = $row;
				}
			}
			else
			{
				foreach ($list as $dat) {
					$no++;
					$row = array();
					$row[] = $no;
					$row[] = $dat->RTPRC_CODE;
					$row[] = $dat->PRC_CODE;
					$row[] = $dat->PO_CODE;
					$row[] = $dat->RTPRC_DATE;
					$row[] = $dat->APPR_CODE;
					$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_rtprclgtedit('."'".$dat->RTPRC_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
					$data[] = $row;
				}
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_rtprcbysts->count_all(),
							"recordsFiltered" => $this->s_rtprcbysts->count_filtered($id,$brc),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function pick_rtprclgtgb($id)
		{
			$data = $this->crud->get_by_id('procurement_ret',array('rtprc_id' => $id));
			echo json_encode($data);
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

		//Search Master Jenis Pemerintahan
		public function srch_govsts()
		{
			$list = $this->s_govsts->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->GOV_CODE;
				$row[] = $dat->GOV_NAME;
				$row[] = $dat->GOV_INFO;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_govsts('."'".$dat->GOV_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_govsts->count_all(),
							"recordsFiltered" => $this->s_govsts->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function pick_govsts($id)
		{
			$data = $this->crud->get_by_id('master_gov_type',array('gov_id' => $id));
			echo json_encode($data);
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

		//Search Master Supplier
		public function srch_supp()
		{
			$list = $this->s_supp->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->SUPP_CODE;
				$row[] = $dat->SUPP_NAME;				
				$row[] = $dat->SUPP_ADDRESS.','.$dat->SUPP_CITY;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_supp('."'".$dat->SUPP_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_supp->count_all(),
							"recordsFiltered" => $this->s_supp->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function pick_supp($id)
		{
			$data = $this->crud->get_by_id('master_supplier',array('supp_id' => $id));
			echo json_encode($data);
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

		//Search Transaksi Invoice
		public function srch_inv()
		{
			$list = $this->s_inv->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->INV_CODE;
				$row[] = $dat->INV_DATE;
				$row[] = $dat->CUST_NAME;
				$row[] = $dat->INV_INFO;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_inv('."'".$dat->INV_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_inv->count_all(),
							"recordsFiltered" => $this->s_inv->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function pick_invoice($id)
		{
			$data = $this->crud->get_by_id('trx_invoice',array('inv_id' => $id));
			echo json_encode($data);
		}

		public function pick_inv($id)
		{
			$data = $this->crud->get_by_id('trx_invoice',array('inv_id' => $id));
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

		//Search Master Permit Type
		public function srch_permittype()
		{
			$list = $this->s_permittype->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->PRMTTYP_CODE;
				$row[] = $dat->PRMTTYP_NAME;				
				$row[] = $dat->PRMTTYP_INFO;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_permittype('."'".$dat->PRMTTYP_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_permittype->count_all(),
							"recordsFiltered" => $this->s_permittype->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function pick_permittype($id)
		{
			$data = $this->crud->get_by_id('master_permit_type',array('prmttyp_id' => $id));
			echo json_encode($data);
		}

		//Search Kas Masuk
		public function srch_cashin()
		{
			$list = $this->s_cashin->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->CSH_CODE;
				$row[] = $dat->CSH_DATE;
				$row[] = $dat->COA_ACC.' - '.$dat->COA_ACCNAME;
				$row[] = $dat->CSH_INFO;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_cashin('."'".$dat->CSH_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_cashin->count_all(),
							"recordsFiltered" => $this->s_cashin->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Kas Keluar
		public function srch_cashout()
		{
			$list = $this->s_cashout->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->CSHO_CODE;
				$row[] = $dat->CSHO_DATE;
				$row[] = $dat->COA_ACC.' - '.$dat->COA_ACCNAME;
				$row[] = $dat->CSHO_INFO;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_cashout('."'".$dat->CSHO_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_cashout->count_all(),
							"recordsFiltered" => $this->s_cashout->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Bank Masuk
		public function srch_bankin()
		{
			$list = $this->s_bankin->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->BNK_CODE;
				$row[] = $dat->BNK_DATE;
				$row[] = $dat->COA_ACC.' - '.$dat->COA_ACCNAME;
				$row[] = $dat->BNK_INFO;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_bankin('."'".$dat->BNK_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_bankin->count_all(),
							"recordsFiltered" => $this->s_bankin->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Bank Keluar
		public function srch_bankout()
		{
			$list = $this->s_bankout->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->BNKO_CODE;
				$row[] = $dat->BNKO_DATE;
				$row[] = $dat->COA_ACC.' - '.$dat->COA_ACCNAME;
				$row[] = $dat->BNKO_INFO;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_bankout('."'".$dat->BNKO_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_bankout->count_all(),
							"recordsFiltered" => $this->s_bankout->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Giro Masuk
		public function srch_giroin()
		{
			$list = $this->s_giroin->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->GRIN_CODE;
				$row[] = $dat->GRIN_DATE;
				$row[] = $dat->BANK_NAME;
				$row[] = $dat->GRIN_INFO;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_giroin('."'".$dat->GRIN_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_giroin->count_all(),
							"recordsFiltered" => $this->s_giroin->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Giro Keluar
		public function srch_giroout()
		{
			$list = $this->s_giroout->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;				
				$row[] = $dat->GROUT_CODE;
				$row[] = $dat->GROUT_DATE;
				$row[] = $dat->BANK_NAME;
				$row[] = $dat->GROUT_INFO;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_giroout('."'".$dat->GROUT_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_giroout->count_all(),
							"recordsFiltered" => $this->s_giroout->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Record Giro Masuk
		public function srch_giroinrec()
		{
			$list = $this->s_giroinrec->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->BNKTRX_CODE;
				$row[] = $dat->BNKTRX_DATE;
				$row[] = $dat->GIR_LIQSTS;
				$row[] = $dat->GIR_BLCSTS;
				$row[] = $dat->BNKTRX_AMOUNT;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_giroinrec('."'".$dat->GIR_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_giroinrec->count_all(),
							"recordsFiltered" => $this->s_giroinrec->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Record Giro Keluar
		public function srch_girooutrec()
		{
			$list = $this->s_girooutrec->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->BNKTRXO_CODE;
				$row[] = $dat->BNKTRXO_DATE;
				$row[] = $dat->GIR_LIQSTS;
				$row[] = $dat->GIR_BLCSTS;
				$row[] = $dat->BNKTRXO_AMOUNT;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_girooutrec('."'".$dat->GOR_ID."'".')"><span class="glyphicon glyphicon-check"></span> </a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_girooutrec->count_all(),
							"recordsFiltered" => $this->s_girooutrec->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Persetujuan Ijin
		public function pick_permitappr($id)
		{
			$data = $this->crud->get_by_id('trx_permitappr',array('pappr_id' => $id));
			echo json_encode($data);
		}

		//Search Barang Untuk Logistik
		public function srch_gdforlgt($suppid,$brcid)
		{
			$list = $this->s_gdforlgt->get_datatables($suppid,$brcid);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GD_NAME;
				$row[] = $dat->GD_UNIT;
				$row[] = $dat->GD_MEASURE;
				$row[] = $dat->GD_INFO;
				$row[] = $dat->GD_PRICE.' / '.$dat->GD_MEASURE.' '.$dat->GD_UNIT;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_brg('."'".$dat->GD_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_gdforlgt->count_all(),
							"recordsFiltered" => $this->s_gdforlgt->count_filtered($suppid,$brcid),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Search Barang Berdasarkan Cabang
		public function srch_gdbybrc($brcid)
		{
			$list = $this->s_gdbybrc->get_datatables($brcid);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GD_CODE;
				$row[] = $dat->GD_NAME;
				$row[] = 'Per '.$dat->GD_UNIT.' '.$dat->GD_MEASURE;
				$row[] = $dat->GD_STOCK;
				$row[] = $dat->GD_INFO;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_brg('."'".$dat->GD_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->s_gdbybrc->count_all(),
							"recordsFiltered" => $this->s_gdbybrc->count_filtered($brcid),
							"data" => $data,
					);			
			echo json_encode($output);
		}
	}
?>