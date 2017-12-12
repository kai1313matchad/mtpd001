<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Finance extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('CRUD/M_crud','crud');
			$this->load->model('datatables/Dt_srchcurr','srch_curr');
		}

		public function index()
		{
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='dash_finance';
			$data['isi']='menu/administrator/finance/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
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
	}
?>