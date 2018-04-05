<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Finance extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('CRUD/M_crud','crud');
			$this->load->model('CRUD/M_gen','gen');
			$this->load->model('CRUD/M_finance','finance');
			$this->load->model('datatables/Dt_coa_parent','srch_acc');
			$this->load->model('datatables/Dt_coa_account','srch_acc2');
			$this->load->model('datatables/Dt_coa','srch_acc3');
			$this->load->model('datatables/Dt_srchcust','srch_cust');
			$this->load->model('datatables/Dt_srchcurr','srch_curr');
			$this->load->model('datatables/Dt_srchappr','srch_appr');
			$this->load->model('datatables/Dt_srchsupp','srch_supp');
		    $this->load->model('datatables/Dt_srchbank','srch_bank');
		    $this->load->model('datatables/search/Dt_srchapprinv','srch_apprinv');
		    $this->load->model('datatables/search/Dt_srchcashin','srch_km');
		    $this->load->model('datatables/search/Dt_srchcashout','srch_kk');
		    $this->load->model('datatables/Dt_srchprc','srch_prc');
		    $this->load->model('datatables/Dt_srchprcbyid','srch_prcbyid');
		    $this->load->model('datatables/search/Dt_srchbudget','srch_ra');
		    $this->load->model('datatables/search/Dt_srchbankin','srch_bm');
		    $this->load->model('datatables/search/Dt_srchbankout','srch_bk');
            $this->load->model('datatables/search/Dt_srchgiroin','srch_gm');
            $this->load->model('datatables/search/Dt_srchgiroinrec','srch_gmrec');
            $this->load->model('datatables/search/Dt_srchgiroout','srch_gk');
            $this->load->model('datatables/search/Dt_srchgirooutrec','srch_gkrec');
            $this->load->model('datatables/search/Dt_srchinvbyid','s_inv');
            $this->load->model('datatables/showdata/Dt_showinvppn','showinvppn');
		}

		public function index()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='dash_finance';
			$data['isi']='menu/administrator/finance/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function get_numbsp($value)
		{
			$data['terbilang'] = $this->gen->number_conv($value);
			echo json_encode($data);
		}

		public function get_printbankinv()
		{
			$data = $this->db->get('other_settings')->row();
			echo json_encode($data);
		}

		public function gen_invo()
		{
			$gen = $this->gen->gen_numinvo();
			$data['id'] = $gen['insertId'];
			$data['kode'] = $gen['invo_code'];
			// $data['id'] = '1';
			// $data['kode'] = 'INV/1712/000001';
			// $data['status'] = TRUE;
			echo json_encode($data);
		}

        public function gen_cashin()
		{
			// $data['id'] = '16';
			$gen = $this->gen->gen_numcashin();
			$data['id'] = $gen['insertId'];
			$data['kode'] = $gen['csh_code'];
			// $data['kode'] = 'KM/1712/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

        public function gen_cashout()
		{
			$gen = $this->gen->gen_numcashout();
			$data['id'] = $gen['insertId'];
			$data['kode'] = $gen['csho_code'];
			// $data['id'] = '8';
			// $data['kode'] = 'KK/1712/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function gen_bankin()
		{
			$gen = $this->gen->gen_numbankin();
			$data['id'] = $gen['insertId'];
			$data['kode'] = $gen['bnk_code'];
			// $data['id'] = '6';
			// $data['kode'] = 'BM/1712/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function gen_bankout()
		{
			$gen = $this->gen->gen_numbankout();
			$data['id'] = $gen['insertId'];
			$data['kode'] = $gen['bnko_code'];
			// $data['id'] = '1';
			// $data['kode'] = 'BK/1712/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function gen_giroin()
		{
			$gen = $this->gen->gen_giroin();
			$data['id'] = $gen['insertId'];
			$data['kode'] = $gen['grin_code'];
			// $data['id'] = '5';
			// $data['kode'] = 'GM/1712/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function gen_giroout()
		{
			$gen = $this->gen->gen_giroout();
			$data['id'] = $gen['insertId'];
			$data['kode'] = $gen['grout_code'];
			// $data['id'] = '1';
			// $data['kode'] = 'GK/1712/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function gen_tax()
		{
			$data['id'] = '7';
			$data['kode'] = 'FP/1801/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function gen_pos_ppn()
		{
			$data['id'] = '1';
			$data['kode'] = 'PC/1802/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function fin_invoice()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='inv';
			$data['isi']='menu/administrator/finance/trx_fin_invoice';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function print_invoice($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_inv';
			$this->load->view('menu/administrator/finance/print_invoice',$data);
		}

		public function print_invoicetax($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_inv';
			$this->load->view('menu/administrator/finance/print_invoicetax',$data);
		}

		public function rpt_invoice()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/finance/report_invoice';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function print_rptinv()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['cust'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['datestart'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['dateend'] = ($this->uri->segment(6) == 'null') ? '' : $this->uri->segment(6);
			$data['appr'] = ($this->uri->segment(7) == 'null') ? '' : $this->uri->segment(7);
			$data['branch'] = ($this->uri->segment(8) == 'null') ? '' : $this->uri->segment(8);
			$data['rpttype'] = ($this->uri->segment(9) == 'null') ? '' : $this->uri->segment(9);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/print_reportinvoice',$data);
		}

		public function gen_rptinv()
		{
			if ($this->input->post('branch'))
			{
				$this->db->where('b.branch_id', $this->input->post('branch') );
			}
			if ($this->input->post('cust_id'))
			{
				$this->db->where('b.cust_id', $this->input->post('cust_id') );
			}
			if ($this->input->post('appr_id'))
			{
				$this->db->where('a.appr_id', $this->input->post('appr_id') );
			}
			if ($this->input->post('date_start') != null AND $this->input->post('date_end') != null ) {
				$this->db->where('b.inv_date >=', $this->input->post('date_start'));
        		$this->db->where('b.inv_date <=', $this->input->post('date_end'));
			}
			$this->db->from('inv_details a');
			$this->db->join('trx_invoice b','b.inv_id = a.inv_id');
			$this->db->join('trx_approvalbill c','c.appr_id = a.appr_id');
			$this->db->join('master_location d','d.loc_id = c.loc_id');
			$this->db->join('master_customer e','e.cust_id = b.cust_id');
			$this->db->join('master_branch f','f.branch_id = b.branch_id');
			$que = $this->db->get();
			$data = $que->result();
			echo json_encode($data);
		}

		public function gen_rptinvtax()
		{
			if ($this->input->post('branch'))
			{
				$this->db->where('b.branch_id', $this->input->post('branch') );
			}
			if ($this->input->post('cust_id'))
			{
				$this->db->where('b.cust_id', $this->input->post('cust_id') );
			}
			if ($this->input->post('appr_id'))
			{
				$this->db->where('a.appr_id', $this->input->post('appr_id') );
			}
			if ($this->input->post('date_start') != null AND $this->input->post('date_end') != null ) {
				$this->db->where('b.inv_date >=', $this->input->post('date_start'));
        		$this->db->where('b.inv_date <=', $this->input->post('date_end'));
			}
			$this->db->where('a.invdet_id NOT IN (select invdet_id from tax_inv_details)');
			$this->db->from('inv_details a');
			$this->db->join('trx_invoice b','b.inv_id = a.inv_id');
			$this->db->join('trx_approvalbill c','c.appr_id = a.appr_id');
			$this->db->join('master_location d','d.loc_id = c.loc_id');
			$this->db->join('master_customer e','e.cust_id = b.cust_id');
			$this->db->join('master_branch f','f.branch_id = b.branch_id');			
			$que = $this->db->get();
			$data = $que->result();
			echo json_encode($data);
		}

		public function cash_in()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Kas Masuk';
			$data['menu']='finance';
			$data['menulist']='cashin';
			$data['account'] = $this->crud->get_coa();
			$data['customer'] = $this->crud->get_cst();
			$data['mu'] = $this->crud->get_mu();
			$data['isi']='menu/administrator/finance/fin_/trx_cashin';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function cash_out()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Kas Keluar';
			$data['menu']='finance';
			$data['menulist']='cashout';
			$data['account'] = $this->crud->get_coa();
			$data['supplier'] = $this->crud->get_supplier();
			$data['mu'] = $this->crud->get_mu();
			$data['isi']='menu/administrator/finance/fin_/trx_cashout';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function bank_in()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Bank Masuk';
			$data['menu']='finance';
			$data['menulist']='bankin';
			$data['account'] = $this->crud->get_coa();
			$data['customer'] = $this->crud->get_cst();
			$data['bank'] = $this->crud->get_bank();
			$data['mu'] = $this->crud->get_mu();
			$data['isi']='menu/administrator/finance/fin_/trx_bankin';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function bank_out()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Bank Keluar';
			$data['menu']='finance';
			$data['menulist']='bankout';
			$data['account'] = $this->crud->get_coa();
			$data['supplier'] = $this->crud->get_supplier();
			$data['bank'] = $this->crud->get_bank();
			$data['mu'] = $this->crud->get_mu();
			$data['isi']='menu/administrator/finance/fin_/trx_bankout';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function bg_in()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Giro Masuk';
			$data['menu']='finance';
			$data['menulist']='bgin';
			$data['bank'] = $this->crud->get_bank();
			$data['isi']='menu/administrator/finance/fin_/trx_giroin';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function bg_out()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Giro Keluar';
			$data['menu']='finance';
			$data['menulist']='bgout';
			$data['bank'] = $this->crud->get_bank();
			$data['isi']='menu/administrator/finance/fin_/trx_giroout';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function f_pjk()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Giro Keluar';
			$data['menu']='finance';
			$data['menulist']='fpjk';
			$data['invoice'] = $this->crud->get_inv();
			$data['isi']='menu/administrator/finance/fin_/trx_taxinvoice';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function branch_ppn()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Posting PPN Cabang';
			$data['menu']='finance';
			$data['menulist']='ppnbrc';
			$data['invoice'] = $this->crud->get_inv();
			$data['isi']='menu/administrator/finance/fin_/trx_posting_ppn_cabang';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function report()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Report';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			// $data['bank'] = $this->crud->get_bank();
			$data['isi']='menu/administrator/finance/fin_/dash_report';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function print_km()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_km';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_km($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/km_print',$data);
		}

		public function print_kk()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_kk';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_kk($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/kk_print',$data);
		}

		public function print_bm()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bm';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_bm($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bm_print',$data);
		}

		public function print_bk()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bk';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_bk($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bk_print',$data);
		}

        public function print_gm()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_gm';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_gm($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/gm_print',$data);
		}

		public function print_gk()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_gk';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_gk($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/gk_print',$data);
		}

		public function print_bkas()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bkas';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_bkas($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bkas_print',$data);
		}

		public function print_bbank()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bbank';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_bbank($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bbank_print',$data);
		}

        public function print_giro_tr()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bgiro';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_giro_tr($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bgiro_print',$data);
		}

		public function print_giro_tgl()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bgiro_tgl';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_giro_tgl($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bgiro_tgl_print',$data);
		}

		public function print_giro_supp()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bgiro_supp';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_giro_supp($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bgiro_supp_print',$data);
		}

		public function print_giro_cust()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bgiro_cust';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_giro_cust($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bgiro_cust_print',$data);
		}

		public function print_giro_blm_cr()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bgiro_belum_cair';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_giro_blm_cr($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bgiro_belum_cair_print',$data);
		}

        public function print_giro_masuk_sdh_cr()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bgiro_masuk_sudah_cair';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function print_giro_keluar_sdh_cr()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bgiro_keluar_sudah_cair';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_giro_masuk_sdh_cr($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bgiro_masuk_sudah_cair_print',$data);
		}

		public function pageprint_giro_keluar_sdh_cr($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bgiro_keluar_sudah_cair_print',$data);
		}

		public function print_giro_in()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bgiro_masuk';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_giro_in($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bgiro_masuk_print',$data);
		}

		public function print_giro_out()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bgiro_keluar';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_giro_out($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bgiro_keluar_print',$data);
		}

		public function pageprint_bfaktur($id)
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			// $data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			// $data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['id'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/faktur_print',$data);
		}

		public function print_FP_Nomor()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_fp_nomor';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_FP_Nomor()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/Finance/fin_/fp_nomor_print',$data);
		}

		public function print_FP_Nomor_Summary()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_fp_nomor_summary';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_FP_Nomor_Summary()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/Finance/fin_/fp_nomor_summary_print',$data);
		}

		public function print_FP_Customer()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_fp_customer';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_FP_Customer()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/Finance/fin_/fp_customer_print',$data);
		}

		public function print_FP_Proyek()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_fp_proyek';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_FP_Proyek()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/Finance/fin_/fp_proyek_print',$data);
		}

		public function print_FP_Invoice()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_fp_invoice';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_FP_Invoice()
		{
			$this->authsys->trx_check_($_SESSION['user_id'],'FIN');
			$data['datestart'] = ($this->uri->segment(4) == 'null') ? '' : $this->uri->segment(4);
			$data['dateend'] = ($this->uri->segment(5) == 'null') ? '' : $this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/Finance/fin_/fp_invoice_print',$data);
		}

		public function ajax_pick_acc($id)
		{
			$data = $this->crud->get_by_id('chart_of_account',array('COA_ID' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_cst($id)
		{
			$data = $this->crud->get_by_id('master_customer',array('CUST_ID' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_curr($id)
		{
			$data = $this->crud->get_by_id('master_currency',array('CURR_ID' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_appr($id)
		{
			$data = $this->crud->get_by_id('trx_approvalbill',array('APPR_ID' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_apprinv($id)
		{
			$data = $this->crud->get_by_id6('inv_details','trx_approvalbill','appr_terms_det','master_location',array('inv_details.INVDET_ID' => $id),'inv_details.appr_id=trx_approvalbill.appr_id','appr_terms_det.appr_id=trx_approvalbill.appr_id','trx_approvalbill.loc_id=master_location.loc_id');
        	echo json_encode($data);
		}

        public function ajax_pick_supp($id)
		{
			$data = $this->crud->get_by_id('master_supplier',array('SUPP_ID' => $id));
        	echo json_encode($data);
		}
		
		 public function ajax_pick_dept($id)
		{
			$data = $this->crud->get_by_id('master_dept',array('DEPT_ID' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_bank($id)
		{
			$data = $this->crud->get_by_id('master_bank',array('BANK_ID' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_branch($id)
		{
			$data = $this->crud->get_by_id('master_branch',array('BRANCH_ID' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_location($id)
		{
			$data = $this->crud->get_by_id('master_location',array('LOC_ID' => $id));
        	echo json_encode($data);
		}

        public function ajax_srch_cust()
		{
			$list = $this->srch_cust->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				// $row[] = $dat->a;
				// $row[] = $dat->b;
				// $row[] = $dat->c;
				$row[] = $dat->CUST_CODE;
				$row[] = $dat->CUST_NAME;
				$row[] = $dat->CUST_ADDRESS;				
				// $row[] = $dat->CUST_CITY;				
				$row[] = '<a href="javascript:void(0)" title="Lihat Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_cust('."'".$dat->CUST_CODE."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_cust->count_all(),
							"recordsFiltered" => $this->srch_cust->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_srch_inv($id)
		{
			$list = $this->s_inv->get_datatables($id);
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
				$row[] = '<a href="javascript:void(0)" title="Lihat Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_inv('."'".$dat->INV_ID."'".')">Pilih</a>';
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

		public function ajax_srch_inv_ppn()
		{
			$list = $this->s_inv->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->INV_CODE;
				$row[] = $dat->CUST_NAME;
				$row[] = $dat->INV_INFO;								
				$row[] = '<input type="checkbox" id="pilih" name="pilih" onclick="pick_inv_ppn('."'".$dat->INV_ID."'".')">';
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

		public function ajax_srch_curr()
		{
			$list = $this->srch_curr->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->CURR_CODE;
				$row[] = $dat->CURR_NAME;
				$row[] = $dat->CURR_RATE;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_curr('."'".$dat->CURR_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_curr->count_all(),
							"recordsFiltered" => $this->srch_curr->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_srch_acc($id)
		{
			$list = $this->srch_acc2->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->COA_ACC;
				$row[] = $dat->COA_ACCNAME;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_acc('."'".$dat->COA_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_acc2->count_all(),
							"recordsFiltered" => $this->srch_acc2->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_srch_acc2()
		{
			$list = $this->srch_acc3->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->COA_ACC;
				$row[] = $dat->COA_ACCNAME;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_acc('."'".$dat->COA_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_acc3->count_all(),
							"recordsFiltered" => $this->srch_acc3->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_srch_anggaran()
		{
			$list = $this->srch_ra->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->BUD_CODE;
				$row[] = $dat->BUD_DATE;	
				$row[] = $dat->APPR_CODE;
				$row[] = $dat->LOC_NAME;
				$row[] = $dat->BUD_ADDRESS;			
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_anggaran('."'".$dat->BUD_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_appr->count_all(),
							"recordsFiltered" => $this->srch_appr->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_srch_appr()
		{
			$list = $this->srch_appr->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->APPR_CODE;
				$row[] = $dat->LOC_NAME;	
				$row[] = $dat->LOC_ADDRESS;			
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_appr('."'".$dat->APPR_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_appr->count_all(),
							"recordsFiltered" => $this->srch_appr->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_srch_apprinv($id)
		{
			$list = $this->srch_apprinv->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->APPR_CODE;
				$row[] = $dat->LOC_NAME;	
				$row[] = $dat->LOC_ADDRESS;			
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_apprinv('."'".$dat->INVDET_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_apprinv->count_all($id),
							"recordsFiltered" => $this->srch_apprinv->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

        public function ajax_srch_supp()
		{
			$list = $this->srch_supp->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->SUPP_CODE;
				$row[] = $dat->SUPP_NAME;
				$row[] = $dat->SUPP_ADDRESS;				
				$row[] = $dat->SUPP_CITY;
				$row[] = $dat->SUPP_PHONE;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_supp('."'".$dat->SUPP_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_supp->count_all(),
							"recordsFiltered" => $this->srch_supp->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

        public function ajax_srch_dept()
		{
			$list = $this->srch_dept->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->DEPT_CODE;
				$row[] = $dat->DEPT_NAME;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_supp('."'".$dat->DEPT_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_supp->count_all(),
							"recordsFiltered" => $this->srch_supp->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_srch_bank()
		{
			$list = $this->srch_bank->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->BANK_CODE;
				$row[] = $dat->BANK_NAME;
				$row[] = $dat->COA_ACC;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_bank('."'".$dat->BANK_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_bank->count_all(),
							"recordsFiltered" => $this->srch_bank->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

        public function ajax_srch_giroin()
		{
			$list = $this->srch_gmrec->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->BNKTRX_NUM;
				$row[] = $dat->BNKTRX_AMOUNT;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_giroin('."'".$dat->BNKTRX_NUM."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_gmrec->count_all(),
							"recordsFiltered" => $this->srch_gmrec->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_srch_giroout()
		{
			$list = $this->srch_gkrec->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->BNKTRXO_NUM;
				$row[] = $dat->BNKTRXO_AMOUNT;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_giroout('."'".$dat->BNKTRXO_NUM."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_gkrec->count_all(),
							"recordsFiltered" => $this->srch_gkrec->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_simpan_cash_in()
		{
			// $appr = null;
			// if($this->input->post('appr_id') != null)
			// {
			// 	$appr = $this->input->post('appr_id');
			// }
			$tgl = date('Y-m-d');
			$data = array(	                
	                // 'user_id' => $this->input->post('user_id'),
	                // 'appr_id' => $appr,
				    'USER_ID' => '1',
                    'CSH_CODE' => $this->input->post('kas_nomor'),
                    'CUST_ID' => $this->input->post('kas_customer_id'),
	                'COA_ID' => $this->input->post('acc_id'),
	                'CURR_ID' => $this->input->post('curr_id'),
	                'CSH_STS' => '1',
	                'CSH_date' => $tgl,
	                // 'po_ordnum' => $this->input->post('po_so'),
	                // 'po_term' => $this->input->post('po_term'),
	                'CSH_INFO' => $this->input->post('kas_info'),
	                'CSH_ACC' => $this->input->post('kas_acc')
	                // 'po_sub' => $this->input->post('po_subs'),
	                // 'po_gtotal' => $this->input->post('po_subs')	                
	            );
	        // $update = $this->crud->save('trx_cash_in',$data);
	        $update = $this->crud->update('trx_cash_in',$data,array('csh_id'=>$this->input->post('kas_id')));
	        //cek jurnal
	    	$this->db->from('account_journal');
	    	$this->db->where('jou_reff',$this->input->post('kas_nomor'));
	    	$que = $this->db->get();
	    	$get = $que->row();
	    	$cou = count($get);
	    	if($cou > 0)
	    	{
	    		$jou = array(
		    			'branch_id'=>$this->input->post('user_branch'),
						'user_id'=>$this->input->post('user_id'),
						'jou_reff'=>$this->input->post('kas_nomor'),
						'jou_date'=>$tgl,
						'jou_info'=>$this->input->post('kas_info'),
						'jou_sts'=>'1'
		    	);
		    	$update = $this->crud->update('account_journal',$jou,array('jou_id'=>$get->JOU_ID));
		    	$this->crud->delete_by_id('jou_details',array('jou_id' => $get->JOU_ID));

		    	$this->db->select('sum(cshdetin_amount) as amount');
		    	$this->db->from('cashin_det');
	    	    $this->db->where('csh_id',$this->input->post('kas_id'));
	    	    $que1 = $this->db->get();
	    	    $get1 = $que1->row();
		    	$joudet1 = array(
						'jou_id'=>$get->JOU_ID,
						'coa_id'=>$this->input->post('acc_id'),
						'joudet_debit'=>$get1->amount,
						'joudet_credit'=>0,
						);
				$insjoudet1 = $this->crud->save('jou_details',$joudet1);

				$this->db->from('cashin_det');
	    	    $this->db->where('csh_id',$this->input->post('kas_id'));
	    	    $que2 = $this->db->get();
	    	    $get2 = $que2->result();
	    	    foreach($get2 as $dat) {
						$joudet2 = array(
								'jou_id'=>$get->JOU_ID,
								'coa_id'=>$dat->COA_ID,
								'joudet_debit'=>0,
								'joudet_credit'=>$dat->CSHDETIN_AMOUNT
								);
						$insjoudet2 = $this->crud->save('jou_details',$joudet2);
			    }
	    	}
	    	else
	    	{
	    		//simpan jurnal
		    	$gen = $this->gen->gen_numjou();
				$jouid = $gen['insertId'];
				$joucode = $gen['jou_code'];
		    	$jou = array(
		    			'branch_id'=>$this->input->post('user_branch'),
						'user_id'=>$this->input->post('user_id'),
						'jou_code'=>$joucode,
						'jou_reff'=>$this->input->post('kas_nomor'),
						'jou_date'=>$tgl,
						'jou_info'=>$this->input->post('kas_info'),
						'jou_sts'=>'1'
		    	);
		    	$update = $this->crud->update('account_journal',$jou,array('jou_id'=>$jouid));

		    	$this->db->select('sum(cshdetin_amount) as amount');
		    	$this->db->from('cashin_det');
	    	    $this->db->where('csh_id',$this->input->post('kas_id'));
	    	    $que1 = $this->db->get();
	    	    $get1 = $que1->row();
		    	$joudet1 = array(
						'jou_id'=>$jouid,
						'coa_id'=>$this->input->post('acc_id'),
						'joudet_debit'=>$get1->amount,
						'joudet_credit'=>0,
						);
				$insjoudet1 = $this->crud->save('jou_details',$joudet1);

				$this->db->from('cashin_det');
	    	    $this->db->where('csh_id',$this->input->post('kas_id'));
	    	    $que2 = $this->db->get();
	    	    $get2 = $que2->result();
	    	    foreach($get2 as $dat) {
					$joudet2 = array(
							'jou_id'=>$jouid,
							'coa_id'=>$dat->COA_ID,
							'joudet_debit'=>0,
							'joudet_credit'=>$dat->CSHDETIN_AMOUNT
							);
					$insjoudet2 = $this->crud->save('jou_details',$joudet2);
				}
	    	}
	        echo json_encode(array("status" => TRUE,"test"=>$get2));
		}

		public function ajax_simpan_cash_in_detail()
		{
			$tgl = date('Y-m-d');
            $data = array(
                    'CSH_ID' => $this->input->post('kas_id'),
                    'COA_ID' => $this->input->post('acc_id_detail'),
                    'CASHINDET_INVID' => $this->input->post('invoice_id'),
                    'CSHINDET_REFF' => $this->input->post('no_jual'),
                    'CSHINDET_INFO' => $this->input->post('ket_detail'),
                    'CSHDETIN_AMOUNT' => $this->input->post('nominal')
                );
            $buku = array(
            	    'USER_ID' => '1',
            	    'CSH_ID' => $this->input->post('kas_id'),
            	    'CSH_CODE' => $this->input->post('kas_nomor'),
            	    'CSH_DATE' => $tgl,
            	    'COA_ID' => $this->input->post('acc_id_detail'),
            	    'ACC' => $this->input->post('acc_detail'),
            	    'CSH_INFO' => $this->input->post('ket_detail'),
            	    'CSH_AMOUNT' => $this->input->post('nominal')
            );
            $update = $this->crud->save('cashin_det',$data);
            $bk = $this->crud->save('buku_kas',$buku);
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_hapus_cash_in_detail($id)
		{
            $hapus = $this->crud->delete_by_id('cashin_det',array('cshindet_id'=>$id));
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_simpan_cash_out()
		{
			// $appr = null;
			// if($this->input->post('appr_id') != null)
			// {
			// 	$appr = $this->input->post('appr_id');
			// }
			$tgl = date('Y-m-d');
			$data = array(	                
	                // 'user_id' => $this->input->post('user_id'),
	                // 'appr_id' => $appr,
				    'USER_ID' => '1',
                    'CSHO_CODE' => $this->input->post('kas_nomor'),
                    'CSHO_APPR' => $this->input->post('appr_id'),
                    'CSHO_SUPP' => $this->input->post('supp_id'),
                    'DEPT_ID' => $this->input->post('dept_id'),
	                'COA_ID' => $this->input->post('acc_id'),
	                'CURR_ID' => $this->input->post('curr_id'),
	                'CSHO_TAXHEADCODE' => $this->input->post('head_taxnumber'),
	                'CSHO_TAXCODE' => $this->input->post('taxnumber'),
	                'CSHO_STS' => '1',
	                'CSHO_date' => $tgl,
	                // 'po_ordnum' => $this->input->post('po_so'),
	                // 'po_term' => $this->input->post('po_term'),
	                'CSHO_INFO' => $this->input->post('kas_info')
	                // 'po_sub' => $this->input->post('po_subs'),
	                // 'po_gtotal' => $this->input->post('po_subs')	                
	            );
	        // $update = $this->crud->save('trx_cash_out',$data);
	        $update = $this->crud->update('trx_cash_out',$data,array('csho_id'=>$this->input->post('kas_id')));
	        //cek jurnal
	    	$this->db->from('account_journal');
	    	$this->db->where('jou_reff',$this->input->post('kas_nomor'));
	    	$que = $this->db->get();
	    	$get = $que->row();
	    	$cou = count($get);
	    	if($cou > 0)
	    	{
	    		$jou = array(
		    			'branch_id'=>$this->input->post('user_branch'),
						'user_id'=>$this->input->post('user_id'),
						'jou_reff'=>$this->input->post('kas_nomor'),
						'jou_date'=>$tgl,
						'jou_info'=>$this->input->post('kas_info'),
						'jou_sts'=>'1'
		    	);
		    	$update = $this->crud->update('account_journal',$jou,array('jou_id'=>$get->JOU_ID));
		    	$this->crud->delete_by_id('jou_details',array('jou_id' => $get->JOU_ID));

		    	$this->db->select('sum(cshodet_amount) as amount');
		    	$this->db->from('cashout_det');
	    	    $this->db->where('csho_id',$this->input->post('kas_id'));
	    	    $que1 = $this->db->get();
	    	    $get1 = $que1->row();
		    	$joudet1 = array(
						'jou_id'=>$get->JOU_ID,
						'coa_id'=>$this->input->post('acc_id'),
						'joudet_debit'=>0,
						'joudet_credit'=>$get1->amount
						);
				$insjoudet1 = $this->crud->save('jou_details',$joudet1);

				$this->db->from('cashout_det');
	    	    $this->db->where('csho_id',$this->input->post('kas_id'));
	    	    $que2 = $this->db->get();
	    	    $get2 = $que2->result();
	    	    foreach($get2 as $dat) {
						$joudet2 = array(
								'jou_id'=>$get->JOU_ID,
								'coa_id'=>$dat->COA_ID,
								'joudet_debit'=>$dat->CSHODET_AMOUNT,
								'joudet_credit'=>0
								);
						$insjoudet2 = $this->crud->save('jou_details',$joudet2);
			    }
	    	}
	    	else
	    	{
	    		//simpan jurnal
		    	$gen = $this->gen->gen_numjou();
				$jouid = $gen['insertId'];
				$joucode = $gen['jou_code'];
		    	$jou = array(
		    			'branch_id'=>$this->input->post('user_branch'),
						'user_id'=>$this->input->post('user_id'),
						'jou_code'=>$joucode,
						'jou_reff'=>$this->input->post('kas_nomor'),
						'jou_date'=>$tgl,
						'jou_info'=>$this->input->post('kas_info'),
						'jou_sts'=>'1'
		    	);
		    	$update = $this->crud->update('account_journal',$jou,array('jou_id'=>$jouid));

		    	$this->db->select('sum(cshodet_amount) as amount');
		    	$this->db->from('cashout_det');
	    	    $this->db->where('csho_id',$this->input->post('kas_id'));
	    	    $que1 = $this->db->get();
	    	    $get1 = $que1->row();
		    	$joudet1 = array(
						'jou_id'=>$jouid,
						'coa_id'=>$this->input->post('acc_id'),
						'joudet_debit'=>0,
						'joudet_credit'=>$get1->amount
						);
				$insjoudet1 = $this->crud->save('jou_details',$joudet1);

				$this->db->from('cashout_det');
	    	    $this->db->where('csho_id',$this->input->post('kas_id'));
	    	    $que2 = $this->db->get();
	    	    $get2 = $que2->result();
	    	    foreach($get2 as $dat) {
					$joudet2 = array(
							'jou_id'=>$jouid,
							'coa_id'=>$dat->COA_ID,
							'joudet_debit'=>$dat->CSHODET_AMOUNT,
							'joudet_credit'=>0
							);
					$insjoudet2 = $this->crud->save('jou_details',$joudet2);
				}
	    	}
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_simpan_cash_out_detail()
		{
			$tgl = date('Y-m-d');
            $data = array(
                    'CSHO_ID' => $this->input->post('kas_id'),
                    'COA_ID' => $this->input->post('acc_id_detail'),
                    'CSHODET_PRCID' => $this->input->post('id_beli'),
                    'CSHODET_REFF' => $this->input->post('no_beli'),
                    'CSHODET_INFO' => $this->input->post('ket_detail'),
                    'CSHODET_AMOUNT' => $this->input->post('nominal')
                );
            $buku = array(
            	    'USER_ID' => '1',
            	    'CSH_ID' => $this->input->post('kas_id'),
            	    'CSH_CODE' => $this->input->post('kas_nomor'),
            	    'CSH_DATE' => $tgl,
            	    'COA_ID' => $this->input->post('acc_id_detail'),
            	    'ACC' => $this->input->post('acc_detail'),
            	    'CSH_INFO' => $this->input->post('ket_detail'),
            	    'CSH_AMOUNT' => $this->input->post('nominal')
            );
            $update = $this->crud->save('cashout_det',$data);
            $bk = $this->crud->save('buku_kas',$buku);
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_hapus_cash_out_detail($id)
		{
            $hapus = $this->crud->delete_by_id('cashout_det',array('cshodet_id'=>$id));
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_simpan_bank_in()
		{
			// $appr = null;
			// if($this->input->post('appr_id') != null)
			// {
			// 	$appr = $this->input->post('appr_id');
			// }
			$tgl = date('Y-m-d');
			$data = array(	                
	                'user_id' => $this->input->post('user_id'),
	                // 'appr_id' => $appr,
				    // 'USER_ID' => '1',
                    'BNK_CODE' => $this->input->post('bank_nomor'),
                    // 'CSHO_APPR' => $this->input->post('kas_approval'),
                    'BANK_ID' => $this->input->post('kode_bank'),
                    'COA_ID' => $this->input->post('acc_id'),
                    'CUST_ID' => $this->input->post('bank_customer_id'),
	                
	                'CURR_ID' => $this->input->post('curr_id'),
	                'BNK_STS' => '1',
	                'BNK_DATE' => $tgl,
	                // 'po_ordnum' => $this->input->post('po_so'),
	                // 'po_term' => $this->input->post('po_term'),
	                'BNK_INFO' => $this->input->post('bank_info')
	                // 'po_sub' => $this->input->post('po_subs'),
	                // 'po_gtotal' => $this->input->post('po_subs')	                
	            );
	        // $update = $this->crud->save('trx_bankin',$data);
	        $update = $this->crud->update('trx_bankin',$data,array('bnk_id'=>$this->input->post('bank_id')));
	        //cek jurnal
	    	$this->db->from('account_journal');
	    	$this->db->where('jou_reff',$this->input->post('bank_nomor'));
	    	$que = $this->db->get();
	    	$get = $que->row();
	    	$cou = count($get);
	    	if($cou > 0)
	    	{
	    		$jou = array(
		    			'branch_id'=>$this->input->post('user_branch'),
						'user_id'=>$this->input->post('user_id'),
						'jou_reff'=>$this->input->post('bank_nomor'),
						'jou_date'=>$tgl,
						'jou_info'=>$this->input->post('bank_info'),
						'jou_sts'=>'1'
		    	);
		    	$update = $this->crud->update('account_journal',$jou,array('jou_id'=>$get->JOU_ID));
		    	$this->crud->delete_by_id('jou_details',array('jou_id' => $get->JOU_ID));

		    	$this->db->select('sum(bnkdet_amount) as amount');
		    	$this->db->from('bankin_det');
	    	    $this->db->where('bnk_id',$this->input->post('bank_id'));
	    	    $que1 = $this->db->get();
	    	    $get1 = $que1->row();
		    	$joudet1 = array(
						'jou_id'=>$get->JOU_ID,
						'coa_id'=>$this->input->post('acc_id'),
						'joudet_debit'=>$get1->amount,
						'joudet_credit'=>0
						);
				$insjoudet1 = $this->crud->save('jou_details',$joudet1);

				$this->db->from('bankin_det');
	    	    $this->db->where('bnk_id',$this->input->post('bank_id'));
	    	    $que2 = $this->db->get();
	    	    $get2 = $que2->result();
	    	    foreach($get2 as $dat) {
						$joudet2 = array(
								'jou_id'=>$get->JOU_ID,
								'coa_id'=>$dat->COA_ID,
								'joudet_debit'=>0,
								'joudet_credit'=>$dat->BNKDET_AMOUNT
								);
						$insjoudet2 = $this->crud->save('jou_details',$joudet2);
			    }
	    	}
	    	else
	    	{
	    		//simpan jurnal
		    	$gen = $this->gen->gen_numjou();
				$jouid = $gen['insertId'];
				$joucode = $gen['jou_code'];
		    	$jou = array(
		    			'branch_id'=>$this->input->post('user_branch'),
						'user_id'=>$this->input->post('user_id'),
						'jou_code'=>$joucode,
						'jou_reff'=>$this->input->post('bank_nomor'),
						'jou_date'=>$tgl,
						'jou_info'=>$this->input->post('bank_info'),
						'jou_sts'=>'1'
		    	);
		    	$update = $this->crud->update('account_journal',$jou,array('jou_id'=>$jouid));

		    	$this->db->select('sum(bnkdet_amount) as amount');
		    	$this->db->from('bankin_det');
	    	    $this->db->where('bnk_id',$this->input->post('bank_id'));
	    	    $que1 = $this->db->get();
	    	    $get1 = $que1->row();
		    	$joudet1 = array(
						'jou_id'=>$jouid,
						'coa_id'=>$this->input->post('acc_id'),
						'joudet_debit'=>$get1->amount,
						'joudet_credit'=>0
						);
				$insjoudet1 = $this->crud->save('jou_details',$joudet1);

				$this->db->from('bankin_det');
	    	    $this->db->where('bnk_id',$this->input->post('bank_id'));
	    	    $que2 = $this->db->get();
	    	    $get2 = $que2->result();
	    	    foreach($get2 as $dat) {
					$joudet2 = array(
							'jou_id'=>$jouid,
							'coa_id'=>$dat->COA_ID,
							'joudet_debit'=>0,
							'joudet_credit'=>$dat->BNKDET_AMOUNT
							);
					$insjoudet2 = $this->crud->save('jou_details',$joudet2);
				}
	    	}
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_simpan_bank_in_detail1()
		{
			$tgl = date('Y-m-d');
            $data = array(
                    'BNK_ID' => $this->input->post('bank_id'),
                    'BNKTRX_TYPE' => $this->input->post('bank_type1'),
                    'BNKTRX_NUM' => $this->input->post('bank_no_giro1'),
                    'BNKTRX_DATE' => $this->input->post('bank_giro_tgl'),
                    'BNKTRX_AMOUNT' => $this->input->post('nominal1')
                );
            $buku = array(
             	    'USER_ID' => '1',
             	    'BANK_ID' => $this->input->post('kode_bank'),
            	    'BNK_CODE' => $this->input->post('bank_nomor'),
            	    'GR_NUMBER' => $this->input->post('bank_no_giro1'),
                    'CUST_SUPP_ID' => $this->input->post('bank_customer_id'),
                    'RECEIVE_DATE' => $tgl,
                    'GR_DATE' => $this->input->post('bank_giro_tgl'),
            	    'GR_AMOUNT' => $this->input->post('nominal1'),
            	    'CAIR_STS' => 0
            );
            $update = $this->crud->save('bankin_trxdet',$data);
            // $id = $this->input->post('bank_id');
            // $dt = $this->crud->get_by_id('bankin_trxdet',array('BNK_ID' => $id));
            $bnktrx= $this->db->insert_id();
            $type = $this->input->post('bank_type1');
            if ($type=='G'){
                $giro = array( 
            	    'BNKTRX_ID' => $bnktrx
                    );
            }
            $simpan_giroin_record = $this->crud->save('giroin_record',$giro);
            $bg = $this->crud->save('buku_giro',$buku);
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_simpan_bank_in_detail2()
		{
			$tgl = date('Y-m-d');
            $data = array(
                    'BNK_ID' => $this->input->post('bank_id'),
                    'COA_ID' => $this->input->post('acc_id_detail'),
                    'BNKDET_INVID' => $this->input->post('invoice_id'),
                    'BNKDET_NUM' => $this->input->post('bank_no_giro2'),
                    'BNKDET_TYPE' => $this->input->post('bank_type2'),
                    'BNKDET_REFF' => $this->input->post('no_jual'),
                    'BNKDET_INFO' => $this->input->post('ket_detail'),
                    'BNKDET_AMOUNT' => $this->input->post('nominal2')
                );
            $buku = array(
             	    'USER_ID' => '1',
            	    'BNK_CODE' => $this->input->post('bank_nomor'),
            	    'BNK_DATE' => $tgl,
            	    'COA_ID' => $this->input->post('acc_id_detail'),
            	    'ACC' => $this->input->post('acc_detail'),
            	    'BNK_INFO' => $this->input->post('ket_detail'),
            	    'BNK_AMOUNT' => $this->input->post('nominal2')
            );

            $update = $this->crud->save('bankin_det',$data);
            $bk = $this->crud->save('buku_bank',$buku);
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_hapus_bank_in_detail1($id)
		{
            $hapus = $this->crud->delete_by_id('bankin_trxdet',array('bnktrx_id'=>$id));
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_hapus_bank_in_detail2($id)
		{
            $hapus = $this->crud->delete_by_id('bankin_det',array('bnkdet_id'=>$id));
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_simpan_bank_out()
		{
			// $appr = null;
			// if($this->input->post('appr_id') != null)
			// {
			// 	$appr = $this->input->post('appr_id');
			// }
			$tgl = date('Y-m-d');
			$data = array(	                
	                'user_id' => $this->input->post('user_id'),
				    // 'USER_ID' => '1',
                    'BNKO_CODE' => $this->input->post('bank_nomor'),
                    'BANK_ID' => $this->input->post('kode_bank'),
                    'COA_ID' => $this->input->post('acc_id'),
                    'BNKO_SUPP' => $this->input->post('supp_id'),
                    'BNKO_APPR' => $this->input->post('bank_nomor_approval'),
                    'BNKO_BUDGET' => $this->input->post('bank_anggaran'),
	                'CURR_ID' => $this->input->post('curr_id'),
	                'BNKO_TAXHEADCODE' => $this->input->post('head_taxnumber'),
	                'BNKO_TAXCODE' => $this->input->post('taxnumber'),
	                'BNKO_STS' => '1',
	                'BNKO_DATE' => $tgl,
	                'BNKO_INFO' => $this->input->post('bank_info')               
	            );
	        // $update = $this->crud->save('trx_bankout',$data);
	        $update = $this->crud->update('trx_bankout',$data,array('bnko_id'=>$this->input->post('bank_id')));
	         //cek jurnal
	    	$this->db->from('account_journal');
	    	$this->db->where('jou_reff',$this->input->post('bank_nomor'));
	    	$que = $this->db->get();
	    	$get = $que->row();
	    	$cou = count($get);
	    	if($cou > 0)
	    	{
	    		$jou = array(
		    			'branch_id'=>$this->input->post('user_branch'),
						'user_id'=>$this->input->post('user_id'),
						'jou_reff'=>$this->input->post('bank_nomor'),
						'jou_date'=>$tgl,
						'jou_info'=>$this->input->post('bank_info'),
						'jou_sts'=>'1'
		    	);
		    	$update = $this->crud->update('account_journal',$jou,array('jou_id'=>$get->JOU_ID));
		    	$this->crud->delete_by_id('jou_details',array('jou_id' => $get->JOU_ID));

		    	$this->db->select('sum(bnkodet_amount) as amount');
		    	$this->db->from('bankout_det');
	    	    $this->db->where('bnko_id',$this->input->post('bank_id'));
	    	    $que1 = $this->db->get();
	    	    $get1 = $que1->row();
		    	$joudet1 = array(
						'jou_id'=>$get->JOU_ID,
						'coa_id'=>$this->input->post('acc_id'),
						'joudet_debit'=>0,
						'joudet_credit'=>$get1->amount
						);
				$insjoudet1 = $this->crud->save('jou_details',$joudet1);

				$this->db->from('bankout_det');
	    	    $this->db->where('bnko_id',$this->input->post('bank_id'));
	    	    $que2 = $this->db->get();
	    	    $get2 = $que2->result();
	    	    foreach($get2 as $dat) {
						$joudet2 = array(
								'jou_id'=>$get->JOU_ID,
								'coa_id'=>$dat->COA_ID,
								'joudet_debit'=>$dat->BNKODET_AMOUNT,
								'joudet_credit'=>0
								);
						$insjoudet2 = $this->crud->save('jou_details',$joudet2);
			    }
	    	}
	    	else
	    	{
	    		//simpan jurnal
		    	$gen = $this->gen->gen_numjou();
				$jouid = $gen['insertId'];
				$joucode = $gen['jou_code'];
		    	$jou = array(
		    			'branch_id'=>$this->input->post('user_branch'),
						'user_id'=>$this->input->post('user_id'),
						'jou_code'=>$joucode,
						'jou_reff'=>$this->input->post('bank_nomor'),
						'jou_date'=>$tgl,
						'jou_info'=>$this->input->post('bank_info'),
						'jou_sts'=>'1'
		    	);
		    	$update = $this->crud->update('account_journal',$jou,array('jou_id'=>$jouid));

		    	$this->db->select('sum(bnkodet_amount) as amount');
		    	$this->db->from('bankout_det');
	    	    $this->db->where('bnko_id',$this->input->post('bank_id'));
	    	    $que1 = $this->db->get();
	    	    $get1 = $que1->row();
		    	$joudet1 = array(
						'jou_id'=>$jouid,
						'coa_id'=>$this->input->post('acc_id'),
						'joudet_debit'=>0,
						'joudet_credit'=>$get1->amount
						);
				$insjoudet1 = $this->crud->save('jou_details',$joudet1);

				$this->db->from('bankout_det');
	    	    $this->db->where('bnko_id',$this->input->post('bank_id'));
	    	    $que2 = $this->db->get();
	    	    $get2 = $que2->result();
	    	    foreach($get2 as $dat) {
					$joudet2 = array(
							'jou_id'=>$jouid,
							'coa_id'=>$dat->COA_ID,
							'joudet_debit'=>$dat->BNKODET_AMOUNT,
							'joudet_credit'=>0
							);
					$insjoudet2 = $this->crud->save('jou_details',$joudet2);
				}
	    	}
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_simpan_bank_out_detail1()
		{
			$tgl = date('Y-m-d');
            $data = array(
                    'BNKO_ID' => $this->input->post('bank_id'),
                    'BNKTRXO_TYPE' => $this->input->post('bank_type1'),
                    'BNKTRXO_NUM' => $this->input->post('bank_no_giro1'),
                    'BNKTRXO_DATE' => $this->input->post('bank_giro_tgl'),
                    'BNKTRXO_AMOUNT' => $this->input->post('nominal1')
                );
            $buku = array(
             	    'USER_ID' => '1',
             	    'BANK_ID' => $this->input->post('kode_bank'),
            	    'BNK_CODE' => $this->input->post('bank_nomor'),
            	    'GR_NUMBER' => $this->input->post('bank_no_giro1'),
                    'CUST_SUPP_ID' => $this->input->post('supp_id'),
                    'RECEIVE_DATE' => $tgl,
                    'GR_DATE' => $this->input->post('bank_giro_tgl'),
            	    'GR_AMOUNT' => $this->input->post('nominal1'),
            	    'CAIR_STS' => 0
            );
            $update = $this->crud->save('bankout_trxdet',$data);
            $bnktrx= $this->db->insert_id();
            $type = $this->input->post('bank_type1');
            if ($type=='G'){
                $giro = array( 
            	    'BNKTRXO_ID' => $bnktrx
                    );
            }
            $simpan_giroin_record = $this->crud->save('giroout_record',$giro);
            $bg = $this->crud->save('buku_giro',$buku);
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_simpan_bank_out_detail2()
		{
			$tgl = date('Y-m-d');
            $data = array(
                    'BNKO_ID' => $this->input->post('bank_id'),
                    'COA_ID' => $this->input->post('acc_id_detail'),
                    'BNKODET_PRCID' => $this->input->post('id_beli'),
                    'BNKODET_NUM' => $this->input->post('bank_no_giro2'),
                    'BNKODET_TYPE' => $this->input->post('bank_type2'),
                    'BNKODET_REFF' => $this->input->post('no_beli'),
                    'BNKODET_INFO' => $this->input->post('ket_detail'),
                    'BNKODET_AMOUNT' => $this->input->post('nominal2')
                );
            $buku = array(
            	    'USER_ID' => '1',
            	    'BNK_CODE' => $this->input->post('bank_nomor'),
            	    'BNK_DATE' => $tgl,
            	    'COA_ID' => $this->input->post('acc_id_detail'),
            	    'ACC' => $this->input->post('acc_detail'),
            	    'BNK_INFO' => $this->input->post('ket_detail'),
            	    'BNK_AMOUNT' => $this->input->post('nominal2')
            );
            $update = $this->crud->save('bankout_det',$data);
            $bk = $this->crud->save('buku_bank',$buku);
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_hapus_bank_out_detail1($id)
		{
            $hapus = $this->crud->delete_by_id('bankout_trxdet',array('bnktrxo_id'=>$id));
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_hapus_bank_out_detail2($id)
		{
            $hapus = $this->crud->delete_by_id('bankout_det',array('bnkodet_id'=>$id));
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_simpan_giro_in()
		{
			// $appr = null;
			// if($this->input->post('appr_id') != null)
			// {
			// 	$appr = $this->input->post('appr_id');
			// }
			$data = array(	                
	                'user_id' => $this->input->post('user_id'),
	                // 'appr_id' => $appr,
				    // 'USER_ID' => '1',
                    'GRIN_CODE' => $this->input->post('giro_nomor'),
                    'BANK_ID' => $this->input->post('giro_bank_id'),
                 //    'CUST_ID' => $this->input->post('kas_customer_id'),
	                // 'COA_ID' => $this->input->post('acc_id'),
	                // 'CURR_ID' => $this->input->post('curr_id'),
	                'GRIN_STS' => '1',
	                'GRIN_DATE' => $this->input->post('giro_tgl'),
	                // 'po_ordnum' => $this->input->post('po_so'),
	                // 'po_term' => $this->input->post('po_term'),
	                'GRIN_INFO' => $this->input->post('giro_info')
	                // 'po_sub' => $this->input->post('po_subs'),
	                // 'po_gtotal' => $this->input->post('po_subs')	                
	            );
	        // $update = $this->crud->save('trx_giro_in',$data);
	        $update = $this->crud->update('trx_giro_in',$data,array('grin_id'=>$this->input->post('giro_id')));
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_simpan_giro_in_detail()
		{
			$tgl = date('Y-m-d');
            $data = array(
                    'GRIN_ID' => $this->input->post('giro_id'),
                    'GIR_ID' => $this->input->post('gir_id'),
                    // 'COA_ID' => $this->input->post('acc_id_detail'),
                    // 'CSHINDET_REFF' => $this->input->post('no_jual'),
                    'GRINDET_DATE' => $this->input->post('tgl_giro'),
                    'GRINDET_CODE' => $this->input->post('nomor_giro'),
                    'GRINDET_AMOUNT' => $this->input->post('nominal')
                );
            $buku = array(
            		'CAIR_DATE' => $tgl,
            		'GR_CODE' => $this->input->post('giro_nomor'),
            		'CAIR_STS' => '1'
            	    );
            $id = array('GR_NUMBER' => $this->input->post('nomor_giro'));
            $update = $this->crud->save('giroin_det',$data);
            $cair = $this->crud->update('buku_giro',$buku,$id);
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_hapus_giro_in_detail($id)
		{
            $hapus = $this->crud->delete_by_id('giroin_det',array('grindet_id'=>$id));
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_simpan_giro_out()
		{
			// $appr = null;
			// if($this->input->post('appr_id') != null)
			// {
			// 	$appr = $this->input->post('appr_id');
			// }
			$data = array(	                
	                // 'user_id' => $this->input->post('user_id'),
	                // 'appr_id' => $appr,
				    'USER_ID' => '1',
                    'GROUT_CODE' => $this->input->post('giro_nomor'),
                    'BANK_ID' => $this->input->post('giro_bank_id'),
                 //    'CUST_ID' => $this->input->post('kas_customer_id'),
	                // 'COA_ID' => $this->input->post('acc_id'),
	                // 'CURR_ID' => $this->input->post('curr_id'),
	                'GROUT_STS' => '1',
	                'GROUT_DATE' => $this->input->post('giro_tgl'),
	                // 'po_ordnum' => $this->input->post('po_so'),
	                // 'po_term' => $this->input->post('po_term'),
	                'GROUT_INFO' => $this->input->post('giro_info')
	                // 'po_sub' => $this->input->post('po_subs'),
	                // 'po_gtotal' => $this->input->post('po_subs')	                
	            );
	        // $update = $this->crud->save('trx_giro_out',$data);
	        $update = $this->crud->update('trx_giro_out',$data,array('grout_id'=>$this->input->post('giro_id')));
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_simpan_giro_out_detail()
		{
			$tgl = date('Y-m-d');
            $data = array(
                    'GROUT_ID' => $this->input->post('giro_id'),
                    'GOR_ID' => $this->input->post('gor_id'),
                    // 'COA_ID' => $this->input->post('acc_id_detail'),
                    // 'CSHINDET_REFF' => $this->input->post('no_jual'),
                    'GROUTDET_DATE' => $this->input->post('tgl_giro'),
                    'GROUTDET_CODE' => $this->input->post('giro_nomor'),
                    'GROUTDET_AMOUNT' => $this->input->post('nominal')
                );
            $buku = array(
            		'CAIR_DATE' => $tgl,
            		'GR_CODE' => $this->input->post('giro_nomor'),
            		'CAIR_STS' => '1'
            	    );
            $id = array('GR_NUMBER' => $this->input->post('nomor_giro'));
            $update = $this->crud->save('giroout_det',$data);
            $cair = $this->crud->update('buku_giro',$buku,$id);
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_hapus_giro_out_detail($id)
		{
            $hapus = $this->crud->delete_by_id('giroout_det',array('groutdet_id'=>$id));
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_simpan_tax()
		{
			// $appr = null;
			// if($this->input->post('appr_id') != null)
			// {
			// 	$appr = $this->input->post('appr_id');
			// }
			$tgl = date('Y-m-d');
			$data = array(	                
	                // 'user_id' => $this->input->post('user_id'),
	                // 'appr_id' => $appr,
				    'USER_ID' => '1',
				    'CUST_ID'  => $this->input->post('cust_id'),
                    'TINV_CODE' => $this->input->post('tax_nomor'),
                    'TINV_TAXHEADCODE' => $this->input->post('head_taxnumber'),
                    'TINV_TAXCODE' => $this->input->post('taxnumber'),
                    'INV_ID' => $this->input->post('invoice_id'),
	                'TINV_STS' => '1',
	                'TINV_DATE' => $tgl               
	            );
	        $update = $this->crud->save('trx_tax_invoice',$data);
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_simpan_tax_detail()
		{
			// $appr = null;
			// if($this->input->post('appr_id') != null)
			// {
			// 	$appr = $this->input->post('appr_id');
			// }
			$tgl = date('Y-m-d');
			echo $this->input->post('tax_id');
			$data = array(	                
	                // 'user_id' => $this->input->post('user_id'),
	                // 'appr_id' => $appr,
				    // 'USER_ID' => '1',
				    // 'CUST_ID'  => $this->input->post('cust_id'),
                    'TINV_ID' => $this->input->post('tax_id'),
                    'TINVDET_SUB' => $this->input->post('nominal'),
                    'TINVDET_PPN' => $this->input->post('ppn'),
                    'TINVDET_PPH' => $this->input->post('pph'),
                    'TINVDET_SUM' => $this->input->post('jumlah'),
                    'TINVDET_INFO' => $this->input->post('keterangan'),
	                'TINVDET_STS' => '1',
	                // 'TINV_DATE' => $tgl               
	            );
	        $update = $this->crud->save('tax_inv_details',$data);
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_hapus_tax_detail($id)
		{
            $hapus = $this->crud->delete_by_id('tax_inv_details',array('tinvdet_id'=>$id));
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_srch_km()
		{
			$list = $this->srch_km->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->CSH_CODE;
				$row[] = $dat->COA_ACCNAME;
				$row[] = $dat->CSH_DATE;				
				$row[] = $dat->CSH_INFO;				
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_km('."'".$dat->CSH_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_km->count_all(),
							"recordsFiltered" => $this->srch_km->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

        public function ajax_pick_km($id)
		{
			$data = $this->crud->get_by_id('trx_cash_in',array('CSH_ID' => $id));
        	echo json_encode($data);
		}

        public function ajax_pick_cust($id)
		{   
			if (substr($id,0,4)!='CSTI'){
			     $data = $this->crud->get_by_id('master_customer',array('CUST_CODE' => $id));
			}
			if (substr($id,0,4)=='CSTI'){
			     $data = $this->crud->get_by_id2('master_cust_intern','master_person',array('master_cust_intern.CSTIN_CODE' => $id),'master_cust_intern.PERSON_ID = master_person.PERSON_ID');
			}
        	echo json_encode($data);
		}

		public function ajax_pick_anggaran($id)
		{
			$data = $this->crud->get_by_id('trx_budget',array('BUD_ID' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_inv($id)
		{
			$data = $this->crud->get_by_id('trx_invoice',array('inv_id' => $id));
        	echo json_encode($data);
		}

		// public function ajax_pick_inv_amount($id)
		// {
		// 	$data = $this->crud->get_by_id('inv_details',array('inv_id' => $id));
        //  echo json_encode($data);
		// }

		public function ajax_pick_inv_ppn($id)
		{
			$data = $this->crud->get_by_id('inv_details',array('inv_id' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_kmdet($id)
		{
			$data = $this->crud->get_by_id3('cashin_det','chart_of_account','trx_cash_in',array('cashin_det.CSH_ID' => $id),'chart_of_account.COA_ID=cashin_det.COA_ID','cashin_det.CSH_ID=trx_cash_in.CSH_ID');
        	echo json_encode($data);
		}

		public function ajax_pick_sum_km($id)
		{
			$data = $this->crud->sub_km($id);
        	echo json_encode($data);
        }

        public function ajax_srch_kk()
		{
			$list = $this->srch_kk->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->CSHO_CODE;
				$row[] = $dat->COA_ACCNAME;
				$row[] = $dat->CSHO_DATE;				
				$row[] = $dat->CSHO_INFO;				
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_kk('."'".$dat->CSHO_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_kk->count_all(),
							"recordsFiltered" => $this->srch_kk->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

        public function ajax_pick_kk($id)
		{
			$data = $this->crud->get_by_id('trx_cash_out',array('CSHO_ID' => $id));
        	echo json_encode($data);
		}

        public function ajax_pick_kkdet($id)
		{
			$data = $this->crud->get_by_id3('cashout_det','chart_of_account','trx_cash_out',array('cashout_det.CSHO_ID' => $id),'chart_of_account.COA_ID=cashout_det.COA_ID','cashout_det.CSHO_ID=trx_cash_out.CSHO_ID');
        	echo json_encode($data);
		}

		public function ajax_pick_sum_kk($id)
		{
			$data = $this->crud->sub_kk($id);
        	echo json_encode($data);
        }

        public function ajax_srch_bm()
		{
			$list = $this->srch_bm->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->BNK_CODE;
				$row[] = $dat->COA_ACCNAME;
				$row[] = $dat->BNK_DATE;				
				$row[] = $dat->BNK_INFO;				
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_bm('."'".$dat->BNK_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_bm->count_all(),
							"recordsFiltered" => $this->srch_bm->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

        public function ajax_pick_bm($id)
		{
			$data = $this->crud->get_by_id('trx_bankin',array('BNK_ID' => $id));
        	echo json_encode($data);
		}
    
        public function ajax_pick_bmdet($id)
		{
			$data = $this->crud->get_by_id3('bankin_det','chart_of_account','trx_bankin',array('bankin_det.BNK_ID' => $id),'chart_of_account.COA_ID=bankin_det.COA_ID','bankin_det.BNK_ID=trx_bankin.BNK_ID');
        	echo json_encode($data);
		}

		public function ajax_pick_bmtrxdet($id)
		{
			$data = $this->crud->get_by_id2('trx_bankin','bankin_trxdet',array('trx_bankin.BNK_ID' => $id),'trx_bankin.BNK_ID = bankin_trxdet.BNK_ID');
        	echo json_encode($data);
		}

		public function ajax_pick_sum_bm($id)
		{
			$data = $this->crud->sub_bm($id);
        	echo json_encode($data);
        }

        public function ajax_srch_bk()
		{
			$list = $this->srch_bk->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->BNKO_CODE;
				$row[] = $dat->COA_ACCNAME;
				$row[] = $dat->BNKO_DATE;				
				$row[] = $dat->BNKO_INFO;				
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_bk('."'".$dat->BNKO_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_bk->count_all(),
							"recordsFiltered" => $this->srch_bk->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

        public function ajax_pick_bk($id)
		{
			$data = $this->crud->get_by_id('trx_bankout',array('BNKO_ID' => $id));
        	echo json_encode($data);
		}
    
        public function ajax_pick_bkdet($id)
		{
			$data = $this->crud->get_by_id3('bankout_det','chart_of_account','trx_bankout',array('bankout_det.BNKO_ID' => $id),'chart_of_account.COA_ID=bankout_det.COA_ID','bankout_det.BNKO_ID=trx_bankout.BNKO_ID');
        	echo json_encode($data);
		}

		public function ajax_pick_bktrxdet($id)
		{
			$data = $this->crud->get_by_id2('trx_bankout','bankout_trxdet',array('trx_bankout.BNKO_ID' => $id),'trx_bankout.BNKO_ID = bankout_trxdet.BNKO_ID');
        	echo json_encode($data);
		}

		public function ajax_pick_sum_bk($id)
		{
			$data = $this->crud->sub_bk($id);
        	echo json_encode($data);
        }

        public function ajax_srch_gm()
		{
			$list = $this->srch_gm->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GRIN_CODE;
				// $row[] = $dat->COA_ACCNAME;
				$row[] = $dat->GRIN_DATE;				
				$row[] = $dat->GRIN_INFO;				
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_gm('."'".$dat->GRIN_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_gm->count_all(),
							"recordsFiltered" => $this->srch_gm->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

        public function ajax_pick_gm($id)
		{
			$data = $this->crud->get_by_id('trx_giro_in',array('GRIN_ID' => $id));
        	echo json_encode($data);
		}
    
        public function ajax_pick_gmdet($id)
		{
			$data = $this->crud->get_by_id3('giroin_det','giroin_record','trx_giro_in',array('giroin_det.GRIN_ID' => $id),'giroin_record.GIR_ID=giroin_det.GIR_ID','giroin_det.GRIN_ID=trx_giro_in.GRIN_ID');
        	echo json_encode($data);
		}

		public function ajax_pick_sum_gm($id)
		{
			$data = $this->crud->sub_gm($id);
        	echo json_encode($data);
        }

        public function ajax_srch_gk()
		{
			$list = $this->srch_gk->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GROUT_CODE;
				// $row[] = $dat->COA_ACCNAME;
				$row[] = $dat->GROUT_DATE;				
				$row[] = $dat->GROUT_INFO;				
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_gk('."'".$dat->GROUT_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_gk->count_all(),
							"recordsFiltered" => $this->srch_gk->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

        public function ajax_pick_gk($id)
		{
			$data = $this->crud->get_by_id('trx_giro_out',array('GROUT_ID' => $id));
        	echo json_encode($data);
		}
    
        public function ajax_pick_gkdet($id)
		{
			$data = $this->crud->get_by_id3('giroout_det','giroout_record','trx_giro_out',array('giroout_det.GROUT_ID' => $id),'giroout_record.GOR_ID=giroout_det.GOR_ID','giroout_det.GROUT_ID=trx_giro_out.GROUT_ID');
        	echo json_encode($data);
		}

		public function ajax_pick_sum_gk($id)
		{
			$data = $this->crud->sub_gk($id);
        	echo json_encode($data);
        }

        public function ajax_pick_giroin_record($id)
		{
			$data = $this->crud->get_by_id('giroin_record',array('GIR_ID' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_giroin($id)
		{
			$data = $this->crud->get_by_id2('bankin_trxdet','giroin_record',array('BNKTRX_NUM' => $id),'giroin_record.BNKTRX_ID=bankin_trxdet.BNKTRX_ID');
        	echo json_encode($data);
		}

		public function ajax_pick_giroout($id)
		{
			$data = $this->crud->get_by_id2('bankout_trxdet','giroout_record',array('BNKTRXO_NUM' => $id),'giroout_record.BNKTRXO_ID=bankout_trxdet.BNKTRXO_ID');
        	echo json_encode($data);
		}

		public function ajax_pick_bankin_trxdet($id)
		{
			$data = $this->crud->get_by_id('bankin_trxdet',array('BNKTRX_ID' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_trx_bankin($id)
		{
			$data = $this->crud->get_by_id('trx_bankin',array('BNK_ID' => $id));
        	echo json_encode($data);
		}

        public function show_gmdet($id)
        {
        	$this->db->from('giroin_det a');
        	$this->db->join('giroin_record b','b.gir_id = a.gir_id');
        	$this->db->join('bankin_trxdet c','c.bnktrx_id = b.bnktrx_id');
        	$this->db->join('trx_bankin d','d.bnk_id = c.bnk_id');
        	$this->db->join('master_customer e','e.cust_id = d.cust_id');
        	$this->db->where('a.grin_id',$id);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

         public function show_gkdet($id)
        {
        	$this->db->from('giroout_det a');
        	$this->db->join('giroout_record b','b.gor_id = a.gor_id');
        	$this->db->join('bankout_trxdet c','c.bnktrxo_id = b.bnktrxo_id');
        	$this->db->join('trx_bankout d','d.bnko_id = c.bnko_id');
        	$this->db->join('master_supplier e','e.supp_id = d.bnko_supp');
        	$this->db->where('a.grout_id',$id);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_awal_kas_debet($acc)
        {
        	$tgl1 = $this->input->post('tgl1');
        	$this->db->select('sum(csh_amount) debet');
        	$this->db->from('buku_kas');
        	$this->db->where('substr(csh_code,1,2)="KM"');
        	$this->db->where('acc="'.$acc.'"');
        	$this->db->where('csh_date <',$tgl1);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_awal_kas_kredit($acc)
        {
        	$tgl1 = $this->input->post('tgl1');
        	$this->db->select('sum(csh_amount) kredit');
        	$this->db->from('buku_kas');
        	$this->db->where('substr(csh_code,1,2)="KK"');
        	$this->db->where('acc="'.$acc.'"');
        	$this->db->where('csh_date <',$tgl1);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function get_accsaldo()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	// $this->db->from('trx_cash_in a');
        	// $this->db->join('cashin_det b','a.csh_id = b.csh_id');
        	// $this->db->join('chart_of_account c','c.coa_id = b.coa_id');
        	// $this->db->select('distinct(d.coa_acc) as acc');
        	$this->db->select('d.coa_acc as acc');
        	$this->db->from('buku_kas a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('chart_of_account d','a.coa_id=d.coa_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.coa_id','desc');
        	$this->db->where('csh_date >=',$tgl1);
        	$this->db->where('csh_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

         public function show_kas()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('buku_kas a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('chart_of_account d','a.coa_id=d.coa_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.coa_id');
        	$this->db->where('a.csh_date >=',$tgl1);
        	$this->db->where('a.csh_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_faktur()
        {
        	$id = $this->input->post('tax_id');
        	$this->db->from('trx_tax_invoice a');
        	$this->db->join('trx_invoice b','a.inv_id=b.inv_id');
        	$this->db->join('master_customer c','b.cust_id=c.cust_id');
        	$this->db->where('a.tinv_id =',$id);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_faktur_details()
        {
        	$id = $this->input->post('tax_id');
        	$this->db->from('tax_inv_details a');
        	$this->db->where('a.tinv_id =',$id);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

         public function show_fp_nomor()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('tax_inv_details a');
        	$this->db->join('trx_tax_invoice b','b.tinv_id=a.tinv_id');
        	$this->db->join('trx_invoice c','c.inv_id=b.inv_id');
        	$this->db->join('inv_details d','d.inv_id=c.inv_id');
        	$this->db->join('trx_approvalbill e','e.appr_id=d.appr_id');
        	$this->db->join('master_customer f','f.cust_id=c.cust_id');
        	$this->db->join('master_user g','g.user_id=b.user_id');
        	$this->db->join('master_branch h','h.branch_id=g.branch_id');
        	$this->db->join('master_location i','i.loc_id=e.loc_id');
        	$this->db->order_by('b.tinv_code');
        	$this->db->order_by('g.branch_id');
        	$this->db->where('b.tinv_date >=',$tgl1);
        	$this->db->where('b.tinv_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_fp_customer()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('tax_inv_details a');
        	$this->db->join('trx_tax_invoice b','b.tinv_id=a.tinv_id');
        	$this->db->join('trx_invoice c','c.inv_id=b.inv_id');
        	$this->db->join('inv_details d','d.inv_id=c.inv_id');
        	$this->db->join('trx_approvalbill e','e.appr_id=d.appr_id');
        	$this->db->join('master_customer f','f.cust_id=c.cust_id');
        	$this->db->join('master_user g','g.user_id=b.user_id');
        	$this->db->join('master_branch h','h.branch_id=g.branch_id');
        	$this->db->join('master_location i','i.loc_id=e.loc_id');
        	$this->db->order_by('c.cust_id');
        	$this->db->order_by('g.branch_id');
        	$this->db->where('b.tinv_date >=',$tgl1);
        	$this->db->where('b.tinv_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_fp_proyek()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('tax_inv_details a');
        	$this->db->join('trx_tax_invoice b','b.tinv_id=a.tinv_id');
        	$this->db->join('trx_invoice c','c.inv_id=b.inv_id');
        	$this->db->join('inv_details d','d.inv_id=c.inv_id');
        	$this->db->join('trx_approvalbill e','e.appr_id=d.appr_id');
        	$this->db->join('master_customer f','f.cust_id=c.cust_id');
        	$this->db->join('master_user g','g.user_id=b.user_id');
        	$this->db->join('master_branch h','h.branch_id=g.branch_id');
        	$this->db->join('master_location i','i.loc_id=e.loc_id');
        	$this->db->order_by('e.appr_id');
        	$this->db->order_by('g.branch_id');
        	$this->db->where('b.tinv_date >=',$tgl1);
        	$this->db->where('b.tinv_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_fp_invoice()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('tax_inv_details a');
        	$this->db->join('trx_tax_invoice b','b.tinv_id=a.tinv_id');
        	$this->db->join('trx_invoice c','c.inv_id=b.inv_id');
        	$this->db->join('inv_details d','d.inv_id=c.inv_id');
        	$this->db->join('trx_approvalbill e','e.appr_id=d.appr_id');
        	$this->db->join('master_customer f','f.cust_id=c.cust_id');
        	$this->db->join('master_user g','g.user_id=b.user_id');
        	$this->db->join('master_branch h','h.branch_id=g.branch_id');
        	$this->db->join('master_location i','i.loc_id=e.loc_id');
        	$this->db->order_by('c.inv_id');
        	$this->db->order_by('g.branch_id');
        	$this->db->where('b.tinv_date >=',$tgl1);
        	$this->db->where('b.tinv_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_kas_awal_debet()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$this->db->select('sum(csh_amount) as debet,acc');
        	$this->db->from('buku_kas a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('chart_of_account d','a.coa_id=d.coa_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.coa_id');
        	$this->db->where('a.csh_date <',$tgl1);
        	$this->db->where('substr(a.csh_code,1,2) ="KM"');
        	$this->db->group_by('a.acc');
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_kas_awal_kredit()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$this->db->select('sum(csh_amount) as kredit,acc');
        	$this->db->from('buku_kas a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('chart_of_account d','a.coa_id=d.coa_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.coa_id');
        	$this->db->where('a.csh_date <',$tgl1);
        	$this->db->where('substr(a.csh_code,1,2) ="KK"');
        	$this->db->group_by('a.acc');
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_kas_awal_total()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$this->db->select('sum(csh_amount) as kredit,acc');
        	$this->db->from('buku_kas a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('chart_of_account d','a.coa_id=d.coa_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.coa_id');
        	$this->db->where('a.csh_date <',$tgl1);
        	// $this->db->where('substr(a.csh_code,1,2) ="KK"');
        	$this->db->group_by('a.acc');
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_kas_total_debet()
        {
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->select('sum(csh_amount) as debet,acc');
        	$this->db->from('buku_kas a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('chart_of_account d','a.coa_id=d.coa_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.coa_id');
        	$this->db->where('a.csh_date <=',$tgl2);
        	$this->db->where('substr(a.csh_code,1,2) ="KM"');
        	$this->db->group_by('a.acc');
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_kas_total_kredit()
        {
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->select('sum(csh_amount) as kredit,acc');
        	$this->db->from('buku_kas a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('chart_of_account d','a.coa_id=d.coa_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.coa_id');
        	$this->db->where('a.csh_date <=',$tgl2);
        	$this->db->where('substr(a.csh_code,1,2) ="KK"');
        	$this->db->group_by('a.acc');
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_kas_total()
        {
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->select('sum(if(substr(a.csh_code,1,2) ="KM",csh_amount,csh_amount * -1)) as total,acc');
        	$this->db->from('buku_kas a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('chart_of_account d','a.coa_id=d.coa_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.coa_id');
        	$this->db->where('a.csh_date <=',$tgl2);
        	// $this->db->where('substr(a.csh_code,1,2) ="KK"');
        	$this->db->group_by('a.acc');
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_giro_tgl_terima()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('buku_giro a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('master_customer d','a.cust_supp_id=d.cust_id');
        	$this->db->join('master_supplier e','a.cust_supp_id=e.supp_id');
        	// $this->db->join('chart_of_account d','a.coa_id=d.coa_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.receive_date');
            $this->db->order_by('a.bnk_code','desc');
        	// $this->db->order_by('a.coa_id');
        	$this->db->where('a.receive_date >=',$tgl1);
        	$this->db->where('a.receive_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

         public function show_giro_tgl_giro()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('buku_giro a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('master_customer d','a.cust_supp_id=d.cust_id');
        	$this->db->join('master_supplier e','a.cust_supp_id=e.supp_id');
        	// $this->db->join('chart_of_account d','a.coa_id=d.coa_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.gr_date');
            $this->db->order_by('a.bnk_code','desc');
        	// $this->db->order_by('a.coa_id');
        	$this->db->where('a.gr_date >=',$tgl1);
        	$this->db->where('a.gr_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

         public function show_giro_supp()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('buku_giro a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('master_customer d','a.cust_supp_id=d.cust_id');
        	$this->db->join('master_supplier e','a.cust_supp_id=e.supp_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.cust_supp_id');
            $this->db->order_by('a.bnk_code','desc');
        	$this->db->where('substr(a.bnk_code,1,2) ="BK"');
        	$this->db->where('a.gr_date >=',$tgl1);
        	$this->db->where('a.gr_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

         public function show_giro_cust()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('buku_giro a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('master_customer d','a.cust_supp_id=d.cust_id');
        	$this->db->join('master_supplier e','a.cust_supp_id=e.supp_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.cust_supp_id');
            $this->db->order_by('a.bnk_code','desc');
        	$this->db->where('substr(a.bnk_code,1,2) ="BM"');
        	$this->db->where('a.gr_date >=',$tgl1);
        	$this->db->where('a.gr_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_giro_blm_cair()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('buku_giro a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_bank c','a.bank_id=c.bank_id');
        	$this->db->join('master_customer d','a.cust_supp_id=d.cust_id');
        	$this->db->join('master_supplier e','a.cust_supp_id=e.supp_id');
        	$this->db->order_by('a.bnk_code');
        	$this->db->order_by('a.bank_id');
        	$this->db->where('a.cair_sts !=1');
        	$this->db->where('a.blokir_sts !=1');
        	$this->db->where('a.gr_date >=',$tgl1);
        	$this->db->where('a.gr_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_giro_sdh_cair()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('buku_giro a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_bank c','a.bank_id=c.bank_id');
        	$this->db->join('master_customer d','a.cust_supp_id=d.cust_id');
        	$this->db->join('master_supplier e','a.cust_supp_id=e.supp_id');
        	$this->db->order_by('a.bnk_code');
        	$this->db->order_by('a.bank_id');
        	$this->db->where('a.cair_sts !=0');
        	$this->db->where('a.blokir_sts !=1');
        	$this->db->where('a.gr_date >=',$tgl1);
        	$this->db->where('a.gr_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_giro_masuk()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('buku_giro a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('master_bank d','a.bank_id=d.bank_id');
        	$this->db->join('master_customer e','a.cust_supp_id=e.cust_id');
        	// $this->db->join('master_supplier e','a.cust_supp_id=e.supp_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.bank_id');
        	$this->db->order_by('a.gr_date');
        	$this->db->where('a.cair_sts !=0');
        	$this->db->where('a.blokir_sts !=1');
        	$this->db->where('substr(a.bnk_code,1,2) ="BM"');
        	$this->db->where('a.gr_date >=',$tgl1);
        	$this->db->where('a.gr_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_giro_keluar()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('buku_giro a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('master_bank d','a.bank_id=d.bank_id');
        	$this->db->join('master_customer e','a.cust_supp_id=e.cust_id');
        	// $this->db->join('master_supplier e','a.cust_supp_id=e.supp_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.bank_id');
        	$this->db->order_by('a.gr_date');
        	$this->db->where('a.cair_sts !=0');
        	$this->db->where('a.blokir_sts !=1');
        	$this->db->where('substr(a.bnk_code,1,2) ="BK"');
        	$this->db->where('a.gr_date >=',$tgl1);
        	$this->db->where('a.gr_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_bank()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('buku_bank a');
        	$this->db->join('master_user b','a.user_id=b.user_id');
        	$this->db->join('master_branch c','b.branch_id=c.branch_id');
        	$this->db->join('chart_of_account d','a.coa_id=d.coa_id');
        	$this->db->order_by('b.branch_id');
        	$this->db->order_by('a.coa_id','desc');
        	$this->db->where('bnk_date >=',$tgl1);
        	$this->db->where('bnk_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        public function show_kas_keluar()
        {
        	$tgl1 = $this->input->post('tgl1');
        	$tgl2 = $this->input->post('tgl2');
        	$this->db->from('trx_cash_out a');
        	$this->db->join('cashout_det b','a.csho_id = b.csho_id');
        	$this->db->join('chart_of_account c','c.coa_id = b.coa_id');
        	$this->db->where('a.csho_date >=',$tgl1);
        	$this->db->where('a.csho_date <=',$tgl2);
        	$res = $this->db->get();
        	$data = $res->result();
        	echo json_encode($data);
        }

        //Fungsi Halaman Invoice
        public function get_inv($id)
        {
        	$data = $this->crud->get_by_id2('trx_invoice a','master_customer b',array('a.inv_id'=>$id),'a.cust_id = b.cust_id');
        	echo json_encode($data);
        }

        public function get_invdet($id)
        {
        	$this->db->from('inv_details a');
        	$this->db->join('trx_invoice b','b.inv_id = a.inv_id');
        	$this->db->join('trx_approvalbill c','c.appr_id = a.appr_id');
        	$this->db->join('master_location d','d.loc_id = c.loc_id');
        	$this->db->where('a.inv_id',$id);
        	$que = $this->db->get();
        	$data = $que->result();
        	echo json_encode($data);
        }

		public function get_apprterm($id)
		{
			// $data = $this->crud->get_by_id4('appr_terms_det',array('appr_id'=>$id));
			$this->db->from('appr_terms_det a');
			$this->db->where('a.appr_id',$id);
			$this->db->where('a.termsdet_id NOT IN (select b.invdet_termid from inv_details b join trx_invoice c on c.inv_id = b.inv_id where c.inv_type = '.$this->input->post('inv_typechk').')');
			$res = $this->db->get();
			$data = $res->result();
			echo json_encode($data);
		}

		public function get_apprtermbrc($id)
		{
			// $data = $this->crud->get_by_id4('appr_terms_det',array('appr_id'=>$id));
			$this->db->from('appr_terms_det a');			
			$this->db->where('a.appr_id',$id);			
			$this->db->where('a.termsdet_id NOT IN (select b.invdet_termbrcid from inv_details b join trx_invoice c on c.inv_id = b.inv_id where c.inv_type = '.$this->input->post('inv_typechk').')');
			$res = $this->db->get();
			$data = $res->result();
			echo json_encode($data);
		}

		public function get_apprtermnom($id)
		{
			$data = $this->crud->get_by_id('appr_terms_det',array('termsdet_id'=>$id));
			echo json_encode($data);
		}

		public function get_subinvdet($id)
		{
			$this->db->from('inv_details a');
			$this->db->select('sum(a.invdet_amount) as gt1, sum(a.invdet_brcamount) as gt2, sum(a.invdet_sub) as sub1, sum(a.invdet_brcsub) as sub2, sum(a.invdet_ppnam) as ppn1, sum(a.invdet_ppnbrcam) as ppn2, sum(a.invdet_ppham) as pph1, sum(a.invdet_pphbrcam) as pph2');
			$this->db->join('trx_invoice b','b.inv_id = a.inv_id');
			$this->db->where('b.inv_id',$id);
			$que = $this->db->get();
			// $res = $que->row();
			$data = $que->row();
			echo json_encode($data);
		}

		public function add_invdet()
		{
			$this->_validate_invdet();
			$data = array(
					'inv_id'=>$this->input->post('inv_id'),
					'appr_id'=>$this->input->post('inv_apprid'),
					'invdet_termid'=>$this->input->post('inv_term'),
					'invdet_term'=>$this->input->post('inv_termcode'),
					'invdet_amount'=>$this->input->post('invdet_sub'),
					'invdet_sub'=>$this->input->post('inv_termsub'),
					'invdet_ppnam'=>$this->input->post('inv_termppn'),
					'invdet_ppham'=>$this->input->post('inv_termpph'),
					'invdet_termbrcid'=>$this->input->post('inv_termbrc'),
					'invdet_brcterm'=>$this->input->post('inv_termbrccode'),
					'invdet_brcsub'=>$this->input->post('inv_termsubbrc'),
					'invdet_brcamount'=>$this->input->post('invdet_brcsub'),
					'invdet_ppnbrcam'=>$this->input->post('inv_termppnbrc'),
					'invdet_pphbrcam'=>$this->input->post('inv_termpphbrc')
					);
			$update = $this->crud->save('inv_details',$data);
			echo json_encode(array('status'=>TRUE));
		}

		public function del_invdet($id)
		{
			$this->crud->delete_by_id('inv_details',array('invdet_id' => $id));
        	echo json_encode(array("status" => TRUE));
		}

		public function _validate_invdet()
	    {
	    	$data = array();
	        $data['error_string'] = array();
	        $data['inputerror'] = array();
	        $data['status'] = TRUE;

	        if($this->input->post('inv_apprcode') == '')
	        {
	            $data['inputerror'][] = 'inv_apprcode';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('inv_curr') == '')
	        {
	            $data['inputerror'][] = 'inv_curr';
	            $data['status'] = FALSE;
	        }

	        // if($this->input->post('inv_term') == '')
	        // {
	        //     $data['inputerror'][] = 'inv_term';
	        //     $data['status'] = FALSE;
	        // }

	        // if($this->input->post('inv_termbrc') == '')
	        // {
	        //     $data['inputerror'][] = 'inv_termbrc';
	        //     $data['status'] = FALSE;
	        // }

	        if($data['status'] === FALSE)
	        {
	            echo json_encode($data);
	            exit();
	        }
	    }

	    public function save_inv()
	    {
	    	$this->_validate_inv();
	    	$data = array(
	    			'inc_id'=>$this->input->post('inv_typeid'),
	    			'user_id'=>$this->input->post('user_id'),
	    			'branch_id'=>$this->input->post('inv_branchid'),
	    			'cust_id'=>$this->input->post('inv_custid'),
	    			'curr_id'=>$this->input->post('inv_currid'),
	    			'inc_id'=>$this->input->post('inv_typeid'),
	    			'inv_info'=>$this->input->post('inv_info'),
	    			'inv_term'=>$this->input->post('inv_terms'),
	    			'inv_date'=>$this->input->post('inv_date'),
	    			'inv_type'=>$this->input->post('inv_typechk'),
	    			'inv_sts'=>'1'
	    			);
	    	$update = $this->crud->update('trx_invoice',$data,array('inv_id'=>$this->input->post('inv_id')));
	    	$this->logupd_inv_save($this->input->post('inv_id'),$this->input->post('user_name'));
	    	//cek jurnal
	    	$this->db->from('account_journal');
	    	$this->db->where('jou_reff',$this->input->post('inv_code'));
	    	$que = $this->db->get();
	    	$get = $que->row();
	    	$cou = count($get);
	    	if($cou > 0)
	    	{
	    		$jou = array(
		    			'branch_id'=>$this->input->post('inv_branchid'),
						'user_id'=>$this->input->post('user_id'),
						'jou_reff'=>$this->input->post('inv_code'),
						'jou_date'=>$this->input->post('inv_date'),
						'jou_info'=>$this->input->post('inv_info'),
						'jou_sts'=>'1'
		    	);
		    	$update = $this->crud->update('account_journal',$jou,array('jou_id'=>$get->JOU_ID));
		    	$this->crud->delete_by_id('jou_details',array('jou_id' => $get->JOU_ID));
		    	$joudet1 = array(
						'jou_id'=>$get->JOU_ID,
						'coa_id'=>$this->input->post('inv_accrcvid'),
						'joudet_debit'=>$this->input->post('inv_gtotappr'),
						'joudet_credit'=>0,
						);
				$insjoudet1 = $this->crud->save('jou_details',$joudet1);
				$joudet2 = array(
						'jou_id'=>$get->JOU_ID,
						'coa_id'=>$this->input->post('inv_accincid'),
						'joudet_debit'=>0,
						'joudet_credit'=>$this->input->post('inv_gtotappr'),
						);
				$insjoudet2 = $this->crud->save('jou_details',$joudet2);
	    	}
	    	else
	    	{
	    		//simpan jurnal
		    	$gen = $this->gen->gen_numjou();
				$jouid = $gen['insertId'];
				$joucode = $gen['jou_code'];
		    	$jou = array(
		    			'branch_id'=>$this->input->post('inv_branchid'),
						'user_id'=>$this->input->post('user_id'),
						'jou_code'=>$joucode,
						'jou_reff'=>$this->input->post('inv_code'),
						'jou_date'=>$this->input->post('inv_date'),
						'jou_info'=>$this->input->post('inv_info'),
						'jou_sts'=>'1'
		    	);
		    	$update = $this->crud->update('account_journal',$jou,array('jou_id'=>$jouid));
		    	$joudet1 = array(
						'jou_id'=>$jouid,
						'coa_id'=>$this->input->post('inv_accrcvid'),
						'joudet_debit'=>$this->input->post('inv_gtotappr'),
						'joudet_credit'=>0,
						);
				$insjoudet1 = $this->crud->save('jou_details',$joudet1);
				$joudet2 = array(
						'jou_id'=>$jouid,
						'coa_id'=>$this->input->post('inv_accincid'),
						'joudet_debit'=>0,
						'joudet_credit'=>$this->input->post('inv_gtotappr'),
						);
				$insjoudet2 = $this->crud->save('jou_details',$joudet2);
	    	}
	    	//Simpan Faktur Pajak
	    	if($this->input->post('inv_taxhead') || $this->input->post('inv_taxcode'))
	    	{
	    		$que2 = $this->db->get_where('trx_tax_invoice',array('inv_id'=>$this->input->post('inv_id')));
	    		if($que2->num_rows() > 0)
	    		{
	    			$invid = $que2->row()->TINV_ID;
	    			$datasv = array(
	    					'user_id'=>$this->input->post('user_id'),
	    					'cust_id'=>$this->input->post('inv_custid'),
	    					'inv_id'=>$this->input->post('inv_id'),
	    					'tinv_date'=>$this->input->post('inv_date'),
	    					'tinv_taxheadcode'=>$this->input->post('inv_taxhead'),
	    					'tinv_taxcode'=>$this->input->post('inv_taxcode'),
	    					'tinv_sts'=>'1',
	    					'tinv_info'=>$this->input->post('inv_info'),
	    					);
	    			$update = $this->crud->update('trx_tax_invoice',$datasv,array('tinv_id'=>$invid));
	    		}
	    		else
	    		{
	    			$datasv = array(
	    					'user_id'=>$this->input->post('user_id'),
	    					'cust_id'=>$this->input->post('inv_custid'),
	    					'inv_id'=>$this->input->post('inv_id'),
	    					'tinv_date'=>$this->input->post('inv_date'),
	    					'tinv_taxheadcode'=>$this->input->post('inv_taxhead'),
	    					'tinv_taxcode'=>$this->input->post('inv_taxcode'),
	    					'tinv_sts'=>'1',
	    					'tinv_info'=>$this->input->post('inv_info'),
	    					);
	    			$savetaxinv = $this->crud->save('trx_tax_invoice',$datasv);
	    		}
	    	}
	    	echo json_encode(array('status'=>TRUE));
	    }

	    public function _validate_inv()
	    {
	    	$data = array();
	        $data['error_string'] = array();
	        $data['inputerror'] = array();
	        $data['status'] = TRUE;

	        if($this->input->post('inv_typename') == '')
	        {
	            $data['inputerror'][] = 'inv_typename';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('inv_code') == '')
	        {
	            $data['inputerror'][] = 'inv_code';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('inv_branch') == '')
	        {
	            $data['inputerror'][] = 'inv_branch';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('inv_cust') == '')
	        {
	            $data['inputerror'][] = 'inv_cust';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('inv_info') == '')
	        {
	            $data['inputerror'][] = 'inv_info';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('inv_terms') == '')
	        {
	            $data['inputerror'][] = 'inv_terms';
	            $data['status'] = FALSE;
	        }

	        if($data['status'] === FALSE)
	        {
	            echo json_encode($data);
	            exit();
	        }
	    }

	    public function ajax_pick_sum_dpp_ppn_pph_total($id)
		{
			$data = $this->crud->sub_dpp_ppn_pph_total($id);
        	echo json_encode($data);
        }
	  
	    public function ajax_srch_prc($id)
		{
			$list = $this->srch_prcbyid->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->PRC_CODE;
				$row[] = $dat->PO_CODE;
				$row[] = $dat->PRC_INVOICE;				
				$row[] = $dat->PRC_DATE;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_prc('."'".$dat->PRC_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_prc->count_all($id),
							"recordsFiltered" => $this->srch_prc->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_pick_prc($id)
		{
			$data = $this->crud->get_by_id2('trx_procurement','trx_po',array('prc_id' => $id),'trx_po.po_id = trx_procurement.po_id');
        	echo json_encode($data);
		}

		//Histori Log Invoice
		public function open_inv($id)
		{
			$user = $this->input->post('user_name');
			$get = $this->db->get_where('trx_invoice',array('inv_id'=>$id));
			$code = $get->row()->INV_CODE;
			$string = array();
			$bnk = $this->finance->check_inv('bankin_det',array('bnkdet_reff'=>$code),null);
			if($bnk > 0)
			{
				$string[] = 'Bank Masuk';
			}
			$csh = $this->finance->check_inv('cashin_det',array('cshindet_reff'=>$code),null);
			if($csh > 0)
			{
				$string[] = 'Kas Masuk';
			}
			if(sizeof($string) > 0)
			{
				$data['status'] = FALSE;
				$data['string'] = implode(', ',$string);
			}
			else
			{
				$dt = array('inv_sts'=>'0');
				$update = $this->crud->update('trx_invoice',$dt,array('inv_id' => $id));
				$his = $this->finance->getlog_inv($id);
				$dthis = array(
						'inv_id' => $id,
						'hisinv_sts' => 'Open by User '.$user,
						'hisinv_old' => $his->HISINV_STS,
						'hisinv_new' => 'Open By User '.$user,
						'hisinv_info' => 'Open Record by Invoice form',
						'hisinv_date' => date('Y-m-d'),
						'hisinv_upcount' => $his->HISINV_UPCOUNT+1
					);
				$this->db->insert('his_inv',$dthis);
				$data['status'] = TRUE;
			}
			echo json_encode($data);
		}

		public function logupd_inv_save($id,$user)
	    {
	    	$his = $this->finance->getlog_inv($id);
	    	if ($his->HISINV_UPCOUNT == '0') 
	    	{
	    		$data = array(
						'inv_id' => $id,
						'hisinv_sts' => 'Posted by User '.$user,
						'hisinv_old' => $his->HISINV_STS,
						'hisinv_new' => 'Posted By User '.$user,
						'hisinv_info' => 'Original Save by Invoice form',
						'hisinv_date' => date('Y-m-d'),
						'hisinv_upcount' => $his->HISINV_UPCOUNT+1
					);
				$this->db->insert('his_inv',$data);
	    	}
	    	else
	    	{
	    		$data = array(
						'inv_id' => $id,
						'hisinv_sts' => 'Posted by User '.$user,
						'hisinv_old' => $his->HISINV_STS,
						'hisinv_new' => 'Posted By User '.$user,
						'hisinv_info' => 'Update by '.$user.' from Invoice form',
						'hisinv_date' => date('Y-m-d'),
						'hisinv_upcount' => $his->HISINV_UPCOUNT
					);
				$this->db->insert('his_inv',$data);
	    	}
	    }

	    public function open_cashin($id)
		{
			$user = $this->input->post('user_name');
			$get = $this->db->get_where('trx_cash_in',array('csh_id'=>$id));
			$code = $get->row()->CSH_CODE;
			$dt = array('csh_sts'=>'0');
			$update = $this->crud->update('trx_cash_in',$dt,array('csh_id' => $id));
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function open_cashout($id)
		{
			$user = $this->input->post('user_name');
			$get = $this->db->get_where('trx_cash_out',array('csho_id'=>$id));
			$code = $get->row()->CSHO_CODE;
			$dt = array('csho_sts'=>'0');
			$update = $this->crud->update('trx_cash_out',$dt,array('csho_id' => $id));
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function open_bankin($id)
		{
			$user = $this->input->post('user_name');
			$get = $this->db->get_where('trx_bankin',array('bnk_id'=>$id));
			$code = $get->row()->BNK_CODE;
			$dt = array('bnk_sts'=>'0');
			$update = $this->crud->update('trx_bankin',$dt,array('bnk_id' => $id));
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function open_bankout($id)
		{
			$user = $this->input->post('user_name');
			$get = $this->db->get_where('trx_bankout',array('bnko_id'=>$id));
			$code = $get->row()->BNK_CODE;
			$dt = array('bnk_sts'=>'0');
			$update = $this->crud->update('trx_bankout',$dt,array('bnko_id' => $id));
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function open_giroin($id)
		{
			$user = $this->input->post('user_name');
			$get = $this->db->get_where('trx_giro_in',array('grin_id'=>$id));
			$code = $get->row()->GRIN_CODE;
			$dt = array('grin_sts'=>'0');
			$update = $this->crud->update('trx_giro_in',$dt,array('grin_id' => $id));
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function open_giroout($id)
		{
			$user = $this->input->post('user_name');
			$get = $this->db->get_where('trx_giro_out',array('grout_id'=>$id));
			$code = $get->row()->GROUT_CODE;
			$dt = array('grout_sts'=>'0');
			$update = $this->crud->update('trx_giro_out',$dt,array('grout_id' => $id));
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function open_taxinvoice($id)
		{
			$user = $this->input->post('user_name');
			$get = $this->db->get_where('trx_tax_invoice',array('tinv'=>$id));
			$code = $get->row()->TINV_CODE;
			$dt = array('tinv_sts'=>'0');
			$update = $this->crud->update('trx_tax_invoice',array('tinv' => $id));
			$data['status'] = TRUE;
			echo json_encode($data);
		}
	}
?>