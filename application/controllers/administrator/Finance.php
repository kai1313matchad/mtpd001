<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Finance extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('CRUD/M_crud','crud');
			$this->load->model('CRUD/M_gen','gen');
			$this->load->model('datatables/Dt_srchcurr','srch_curr');
			$this->load->model('datatables/Dt_srchappr','srch_appr');
			$this->load->model('datatables/Dt_srchsupp','srch_supp');
		    $this->load->model('datatables/Dt_srchbank','srch_bank');
		    $this->load->model('datatables/search/Dt_srchcashin','srch_km');
		    $this->load->model('datatables/search/Dt_srchcashout','srch_kk');
		    $this->load->model('datatables/search/Dt_srchbankin','srch_bm');
		    $this->load->model('datatables/search/Dt_srchbankout','srch_bk');
            $this->load->model('datatables/search/Dt_srchgiroin','srch_gm');
            $this->load->model('datatables/search/Dt_srchgiroinrec','srch_gmrec');
		}

		public function index()
		{
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

		public function gen_invo()
		{
			// $gen = $this->gen->gen_numinvo();
			// $data['id'] = $gen['insertId'];
			// $data['kode'] = $gen['invo_code'];
			$data['id'] = '1';
			$data['kode'] = 'INV/1712/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

        public function gen_cashin()
		{
			$data['id'] = '10';
			$data['kode'] = 'KM/1712/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

        public function gen_cashout()
		{
			$data['id'] = '7';
			$data['kode'] = 'KK/1712/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function gen_bankin()
		{
			$data['id'] = '6';
			$data['kode'] = 'BM/1712/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function gen_bankout()
		{
			$data['id'] = '1';
			$data['kode'] = 'BK/1712/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function gen_giroin()
		{
			$data['id'] = '5';
			$data['kode'] = 'GM/1712/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function gen_giroout()
		{
			$data['id'] = '1';
			$data['kode'] = 'GK/1712/000001';
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function fin_invoice()
		{
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='inv';
			$data['isi']='menu/administrator/finance/trx_fin_invoice';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function cash_in()
		{
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
			$data['title']='Match Terpadu - Dashboard Giro Masuk';
			$data['menu']='finance';
			$data['menulist']='bgin';
			$data['bank'] = $this->crud->get_bank();
			$data['isi']='menu/administrator/finance/fin_/trx_giroin';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function bg_out()
		{
			$data['title']='Match Terpadu - Dashboard Giro Keluar';
			$data['menu']='finance';
			$data['menulist']='bgout';
			$data['bank'] = $this->crud->get_bank();
			$data['isi']='menu/administrator/finance/fin_/trx_giroout';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function report()
		{
			$data['title']='Match Terpadu - Dashboard Report';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			// $data['bank'] = $this->crud->get_bank();
			$data['isi']='menu/administrator/finance/fin_/dash_report';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function print_km()
		{
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_km';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_km($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/km_print',$data);
		}

		public function print_kk()
		{
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_kk';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_kk($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/kk_print',$data);
		}

		public function print_bm()
		{
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bm';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_bm($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bm_print',$data);
		}

		public function print_bk()
		{
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_bk';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_bk($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/bk_print',$data);
		}

        public function print_gm()
		{
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$data['isi']='menu/administrator/Finance/fin_/lgt_print_gm';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_gm($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_finance';
			$this->load->view('menu/administrator/finance/fin_/gm_print',$data);
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
			$data = $this->crud->get_by_id('Approval',array('APPR_ID' => $id));
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
				$row[] = $dat->APPR_PO;
				$row[] = $dat->APPR_DATE;				
				$row[] = $dat->CUST_NAME;
				$row[] = $dat->LOC_NAME;				
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

		public function ajax_simpan_cash_in()
		{
			// $appr = null;
			// if($this->input->post('appr_id') != null)
			// {
			// 	$appr = $this->input->post('appr_id');
			// }
			$data = array(	                
	                // 'user_id' => $this->input->post('user_id'),
	                // 'appr_id' => $appr,
                    'CSH_CODE' => $this->input->post('kas_nomor'),
                    'CUST_ID' => $this->input->post('kas_customer_id'),
	                'COA_ID' => $this->input->post('acc_id'),
	                'CURR_ID' => $this->input->post('curr_id'),
	                'CSH_STS' => '1',
	                'CSH_date' => $this->input->post('kas_tgl'),
	                // 'po_ordnum' => $this->input->post('po_so'),
	                // 'po_term' => $this->input->post('po_term'),
	                'CSH_INFO' => $this->input->post('kas_info')
	                // 'po_sub' => $this->input->post('po_subs'),
	                // 'po_gtotal' => $this->input->post('po_subs')	                
	            );
	        $update = $this->crud->save('trx_cash_in',$data);
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_simpan_cash_in_detail()
		{
            $data = array(
                    'CSH_ID' => $this->input->post('kas_id'),
                    'COA_ID' => $this->input->post('acc_id_detail'),
                    'CSHINDET_REFF' => $this->input->post('no_jual'),
                    'CSHINDET_INFO' => $this->input->post('ket_detail'),
                    'CSHDETIN_AMOUNT' => $this->input->post('nominal')
                );
            $update = $this->crud->save('cashin_det',$data);
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
			$data = array(	                
	                // 'user_id' => $this->input->post('user_id'),
	                // 'appr_id' => $appr,
                    'CSHO_CODE' => $this->input->post('kas_nomor'),
                    'CSHO_APPR' => $this->input->post('kas_approval'),
                    'CSHO_SUPP' => $this->input->post('kas_customer_id'),
                    'DEPT_ID' => $this->input->post('dept_id'),
	                'COA_ID' => $this->input->post('acc_id'),
	                'CURR_ID' => $this->input->post('curr_id'),
	                'CSHO_STS' => '1',
	                'CSHO_date' => $this->input->post('kas_tgl'),
	                // 'po_ordnum' => $this->input->post('po_so'),
	                // 'po_term' => $this->input->post('po_term'),
	                'CSHO_INFO' => $this->input->post('kas_info')
	                // 'po_sub' => $this->input->post('po_subs'),
	                // 'po_gtotal' => $this->input->post('po_subs')	                
	            );
	        $update = $this->crud->save('trx_cash_out',$data);
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_simpan_cash_out_detail()
		{
            $data = array(
                    'CSHO_ID' => $this->input->post('kas_id'),
                    'COA_ID' => $this->input->post('acc_id_detail'),
                    'CSHODET_REFF' => $this->input->post('no_jual'),
                    'CSHODET_INFO' => $this->input->post('ket_detail'),
                    'CSHODET_AMOUNT' => $this->input->post('nominal')
                );
            $update = $this->crud->save('cashout_det',$data);
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
			$data = array(	                
	                // 'user_id' => $this->input->post('user_id'),
	                // 'appr_id' => $appr,
                    'BNK_CODE' => $this->input->post('bank_nomor'),
                    // 'CSHO_APPR' => $this->input->post('kas_approval'),
                    'BANK_ID' => $this->input->post('bank_id'),
                    'COA_ID' => $this->input->post('acc_id'),
                    'CUST_ID' => $this->input->post('bank_cust_id'),
	                
	                'CURR_ID' => $this->input->post('curr_id'),
	                'BNK_STS' => '1',
	                'BNK_DATE' => $this->input->post('bank_tgl'),
	                // 'po_ordnum' => $this->input->post('po_so'),
	                // 'po_term' => $this->input->post('po_term'),
	                'BNK_INFO' => $this->input->post('bank_info')
	                // 'po_sub' => $this->input->post('po_subs'),
	                // 'po_gtotal' => $this->input->post('po_subs')	                
	            );
	        $update = $this->crud->save('trx_bankin',$data);
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_simpan_bank_in_detail1()
		{
            $data = array(
                    'BNK_ID' => $this->input->post('bank_id'),
                    'BNKTRX_TYPE' => $this->input->post('bank_type1'),
                    'BNKTRX_NUM' => $this->input->post('bank_no_giro1'),
                    'BNKTRX_DATE' => $this->input->post('bank_giro_tgl'),
                    'BNKTRX_AMOUNT' => $this->input->post('nominal1')
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
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_simpan_bank_in_detail2()
		{
            $data = array(
                    'BNK_ID' => $this->input->post('bank_id'),
                    'COA_ID' => $this->input->post('acc_id_detail'),
                    'BNKDET_NUM' => $this->input->post('bank_no_giro2'),
                    'BNKDET_TYPE' => $this->input->post('bank_type2'),
                    'BNKDET_REFF' => $this->input->post('no_jual'),
                    'BNKDET_INFO' => $this->input->post('ket_detail'),
                    'BNKDET_AMOUNT' => $this->input->post('nominal2')
                );
            $update = $this->crud->save('bankin_det',$data);
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
			$data = array(	                
	                // 'user_id' => $this->input->post('user_id'),
                    'BNKO_CODE' => $this->input->post('bank_nomor'),
                    'BNKO_ID' => $this->input->post('bank_id'),
                    'COA_ID' => $this->input->post('acc_id'),
                    'BNKO_SUPP' => $this->input->post('supp_id'),
	                'CURR_ID' => $this->input->post('curr_id'),
	                'BNKO_STS' => '1',
	                'BNKO_DATE' => $this->input->post('bank_tgl'),
	                'BNKO_INFO' => $this->input->post('bank_info')               
	            );
	        $update = $this->crud->save('trx_bankout',$data);
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_simpan_bank_out_detail1()
		{
            $data = array(
                    'BNKO_ID' => $this->input->post('bank_id'),
                    'BNKTRXO_TYPE' => $this->input->post('bank_type1'),
                    'BNKTRXO_NUM' => $this->input->post('bank_no_giro1'),
                    'BNKTRXO_DATE' => $this->input->post('bank_giro_tgl'),
                    'BNKTRXO_AMOUNT' => $this->input->post('nominal1')
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
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_simpan_bank_out_detail2()
		{
            $data = array(
                    'BNKO_ID' => $this->input->post('bank_id'),
                    'COA_ID' => $this->input->post('acc_id_detail'),
                    'BNKODET_NUM' => $this->input->post('bank_no_giro2'),
                    'BNKODET_TYPE' => $this->input->post('bank_type2'),
                    'BNKODET_REFF' => $this->input->post('no_jual'),
                    'BNKODET_INFO' => $this->input->post('ket_detail'),
                    'BNKODET_AMOUNT' => $this->input->post('nominal2')
                );
            $update = $this->crud->save('bankout_det',$data);
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
	                // 'user_id' => $this->input->post('user_id'),
	                // 'appr_id' => $appr,
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
	        $update = $this->crud->save('trx_giro_in',$data);
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_simpan_giro_in_detail()
		{
            $data = array(
                    'GRIN_ID' => $this->input->post('giro_id'),
                    // 'COA_ID' => $this->input->post('acc_id_detail'),
                    // 'CSHINDET_REFF' => $this->input->post('no_jual'),
                    'GRINDET_DATE' => $this->input->post('tgl_giro'),
                    'GRINDET_CODE' => $this->input->post('nomor_giro'),
                    'GRINDET_AMOUNT' => $this->input->post('nominal')
                );
            $update = $this->crud->save('giroin_det',$data);
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
	        $update = $this->crud->save('trx_giro_out',$data);
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_simpan_giro_out_detail()
		{
            $data = array(
                    'GROUT_ID' => $this->input->post('giro_id'),
                    // 'COA_ID' => $this->input->post('acc_id_detail'),
                    // 'CSHINDET_REFF' => $this->input->post('no_jual'),
                    'GROUTDET_DATE' => $this->input->post('tgl_giro'),
                    'GROUTDET_CODE' => $this->input->post('giro_nomor'),
                    'GROUTDET_AMOUNT' => $this->input->post('nominal')
                );
            $update = $this->crud->save('giroout_det',$data);
	        echo json_encode(array("status" => TRUE)); 
		}

		public function ajax_hapus_giro_out_detail($id)
		{
            $hapus = $this->crud->delete_by_id('giroout_det',array('groutdet_id'=>$id));
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
			$data = $this->crud->get_by_id('master_customer',array('cust_id' => $id));
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

        public function ajax_pick_giroin_record($id)
		{
			$data = $this->crud->get_by_id('giroin_record',array('GIR_ID' => $id));
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
        }

        //Fungsi Halaman Invoice
		public function get_apprterm($id)
		{
			// $data = $this->crud->get_by_id4('appr_terms_det',array('appr_id'=>$id));
			$this->db->from('appr_terms_det a');			
			$this->db->where('a.appr_id',$id);
			$this->db->where('a.termsdet_id NOT IN (select invdet_termid from inv_details)');
			$res = $this->db->get();
			$data = $res->result();
			echo json_encode($data);
		}

		public function get_apprtermbrc($id)
		{
			// $data = $this->crud->get_by_id4('appr_terms_det',array('appr_id'=>$id));
			$this->db->from('appr_terms_det a');			
			$this->db->where('a.appr_id',$id);
			$this->db->where('a.termsdet_id NOT IN (select invdet_termbrcid from inv_details)');
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
			$this->db->select('a.invdet_amount as Sub1, a.invdet_brcamount as Sub2');			
			$this->db->join('trx_invoice b','b.inv_id = a.inv_id');
			$this->db->where('b.inv_id',$id);
			$que = $this->db->get();
			$res = $que->row();
			$data = array('sub1'=>$res->Sub1,'sub2'=>$res->Sub2);
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
					'invdet_termbrcid'=>$this->input->post('inv_termbrc'),
					'invdet_brcterm'=>$this->input->post('inv_termbrccode'),
					'invdet_brcamount'=>$this->input->post('invdet_brcsub')
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

	        if($this->input->post('inv_term') == '')
	        {
	            $data['inputerror'][] = 'inv_term';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('inv_termbrc') == '')
	        {
	            $data['inputerror'][] = 'inv_termbrc';
	            $data['status'] = FALSE;
	        }

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
	    			'branch_id'=>$this->input->post('inv_branchid'),
	    			'cust_id'=>$this->input->post('inv_custid'),
	    			'inc_id'=>$this->input->post('inv_typeid'),
	    			'inv_info'=>$this->input->post('inv_info'),
	    			'inv_term'=>$this->input->post('inv_term'),
	    			'inv_sts'=>'1'
	    			);
	    	$update = $this->crud->update('trx_invoice',$data,array('inv_id'=>$this->input->post('inv_id')));
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
	}
?>