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
		}

		public function index()
		{
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='dash_finance';
			$data['isi']='menu/administrator/finance/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function gen_invo()
		{
			$gen = $this->gen->gen_numinvo();
			$data['id'] = $gen['insertId'];
			$data['kode'] = $gen['invo_code'];
			$data['status'] = TRUE;
			echo json_encode($data);
		}

        public function gen_cashin()
		{
			$data['id'] = '9';
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
	}
?>