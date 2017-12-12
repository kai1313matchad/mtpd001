<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Marketing extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('datatables/Dt_srchcust','srch_cust');
			$this->load->model('datatables/Dt_srchmkt','srch_mkt');
			$this->load->model('datatables/Dt_srchbb','srch_bb');
			$this->load->model('datatables/Dt_srchcurr','srch_curr');
			$this->load->model('datatables/Dt_srchloc','srch_loc');
			$this->load->model('datatables/Dt_srchplc','srch_plc');
			$this->load->model('datatables/Dt_srchbapp','srch_bapp');
			$this->load->model('datatables/Dt_ijinapp','ijinapp');
			$this->load->model('datatables/Dt_termapp','termapp');
			$this->load->model('datatables/Dt_costapp','costapp');
			$this->load->model('CRUD/M_crud','crud');
			$this->load->model('CRUD/M_gen','gen');
		}

		public function index()
		{
			$data['title']='Match Terpadu - Dashboard Marketing';
			$data['menu']='marketing';
			$data['menulist']='dash_marketing';
			$data['isi']='menu/administrator/marketing/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function gen_apprcode()
		{
			$nomor = $this->db->count_all_results('trx_approvalbill') + 1;
			$kode = 'AB/'.date('dm').'/';
			$res = $kode . sprintf('%05s',$nomor);			
			$check = $this->db->get_where('trx_approvalbill',array('appr_code' => $res));
	        if($check->num_rows()>0)
	        {
	        	$nomor = $this->db->count_all_results('trx_approvalbill') + 1;
				$kode = 'AB/'.date('dm').'/';
				$res = $kode . sprintf('%05s',$nomor);				
	        }
			$data['kode'] = $res;
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function mkt_trx_approval()
		{
			// $id=$this->crud->gen_appr();
			$id=$this->gen->gen_numappr();
			// $id = '1';
			$data['appr'] = $this->crud->get_by_id('trx_approvalbill',array('appr_id' => $id));
			$data['pattyp'] = $this->crud->get_pattyp();
			$data['loc'] = $this->crud->get_loc();
			$data['title']='Match Terpadu - Dashboard Marketing';
			$data['menu']='marketing';
			$data['menulist']='approval';
			$data['isi']='menu/administrator/marketing/mkt_trx_approval2';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function mkt_trx_bapp()
		{
			$id=$this->crud->add_bapp();
			// $id = '1';
			$data['bapp'] = $this->crud->get_by_id('trx_bapp',array('bapp_id' => $id));
			$data['title']='Match Terpadu - Dashboard Marketing';
			$data['menu']='marketing';
			$data['menulist']='bapp';
			$data['isi']='menu/administrator/marketing/mkt_trx_bapp';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function report()
		{
			$data['title']='Match Terpadu - Dashboard Marketing';
			$data['menu']='marketing';
			$data['menulist']='report_marketing';
			$data['isi']='menu/administrator/marketing/dash_report';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function print_approval()
		{
			$data['title']='Match Terpadu - Dashboard Marketing';
			$data['menu']='marketing';
			$data['menulist']='report_marketing';
			$data['isi']='menu/administrator/marketing/mkt_print_approval';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_approval($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Marketing';
			$data['menu']='marketing';
			$data['menulist']='report_marketing';
			$this->load->view('menu/administrator/marketing/print_approval',$data);
		}

		public function print_bapp()
		{
			$data['title']='Match Terpadu - Dashboard Marketing';
			$data['menu']='marketing';
			$data['menulist']='report_marketing';
			$data['isi']='menu/administrator/marketing/mkt_print_bapp';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_bapp($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Marketing';
			$data['menu']='marketing';
			$data['menulist']='report_marketing';
			$this->load->view('menu/administrator/marketing/print_bapp',$data);
		}

		public function pageprint_bappimg()
		{
			$data['img_siang']=$this->uri->segment(4);
			$data['img_malam']=$this->uri->segment(5);
			$data['title']='Match Terpadu - Dashboard Marketing';
			$data['menu']='marketing';
			$data['menulist']='report_marketing';
			$this->load->view('menu/administrator/marketing/print_bappimg',$data);
		}

		//ajax transaksi approval
		public function ajax_srch_cust()
		{
			$list = $this->srch_cust->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->CUST_CODE;
				$row[] = $dat->CUST_NAME;
				$row[] = $dat->CUST_ADDRESS;				
				$row[] = $dat->CUST_CITY;				
				$row[] = '<a href="javascript:void(0)" title="Lihat Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_cust('."'".$dat->CUST_ID."'".')">Pilih</a>';
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

		public function ajax_pick_cust($id)
		{
			$data = $this->crud->get_by_id('master_customer',array('cust_id' => $id));
        	echo json_encode($data);
		}

		public function ajax_srch_mkt()
		{
			$list = $this->srch_mkt->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->SALES_CODE;
				$row[] = $dat->PERSON_NAME;
				$row[] = $dat->SALES_PHONE;				
				$row[] = $dat->SALES_EMAIL;				
				$row[] = '<a href="javascript:void(0)" title="Lihat Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_mkt('."'".$dat->SALES_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_mkt->count_all(),
							"recordsFiltered" => $this->srch_mkt->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_pick_mkt($id)
		{
			$this->db->from('master_sales');
			$this->db->join('master_person','master_person.person_id = master_sales.person_id');
	        $this->db->where(array('sales_id' => $id));
	        $query = $this->db->get();
	        $data = $query->row();
        	echo json_encode($data);
		}

		public function ajax_srch_bb()
		{
			$list = $this->srch_bb->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->BB_CODE;
				$row[] = $dat->BB_NAME;
				$row[] = $dat->BB_INFO;
				$row[] = '<a href="javascript:void(0)" title="Lihat Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_bb('."'".$dat->BB_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_bb->count_all(),
							"recordsFiltered" => $this->srch_bb->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_pick_bb($id)
		{
			$data = $this->crud->get_by_id('master_bboard',array('bb_id' => $id));
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
				$row[] = '<a href="javascript:void(0)" title="Lihat Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_curr('."'".$dat->CURR_ID."'".')">Pilih</a>';
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

		public function ajax_pick_curr($id)
		{
			$data = $this->crud->get_by_id('master_currency',array('curr_id' => $id));
        	echo json_encode($data);
		}

		public function ajax_srch_loc()
		{
			$list = $this->srch_loc->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->LOC_CODE;
				$row[] = $dat->LOC_NAME;
				$row[] = $dat->LOC_ADDRESS;
				$row[] = $dat->LOC_CITY;
				$row[] = $dat->LOC_INFO;
				$row[] = '<a href="javascript:void(0)" title="Lihat Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_loc('."'".$dat->LOC_ID."'".')">Pilih</a>';
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

		public function ajax_pick_loc($id)
		{
			$data = $this->crud->get_by_id('master_location',array('loc_id' => $id));
        	echo json_encode($data);
		}

		public function ajax_srch_plc()
		{
			$list = $this->srch_plc->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->PLC_CODE;
				$row[] = $dat->PLC_NAME;				
				$row[] = '<a href="javascript:void(0)" title="Lihat Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_plc('."'".$dat->PLC_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_plc->count_all(),
							"recordsFiltered" => $this->srch_plc->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_pick_plc($id)
		{
			$data = $this->crud->get_by_id('master_placement',array('plc_id' => $id));
        	echo json_encode($data);
		}

		public function ajax_ijinapp($id)
		{
			$list = $this->ijinapp->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->PRMTTYP_CODE;
				$row[] = $dat->PRMTTYP_NAME;				
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del_ijinapp('."'".$dat->APPRPRMT_ID."'".')"><span class="glyphicon glyphicon-remove"></span></a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->ijinapp->count_all(),
							"recordsFiltered" => $this->ijinapp->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_add_ijinapp()
	    {	        
	        $table = 'appr_permit_det';
	        $data = array(
	                'appr_id' => $this->input->post('appr_id'),
	                'prmttyp_id' => $this->input->post('pat_id')
	            );
	        $insert = $this->crud->save($table,$data);
	        echo json_encode(array("status" => TRUE));
	    }

	    public function ajax_del_ijinapp($id)
	    {
	    	$this->crud->delete_by_id('appr_permit_det',array('apprprmt_id' => $id));
        	echo json_encode(array("status" => TRUE));
	    }

	    public function ajax_termapp($id)
		{
			$list = $this->termapp->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->TERMSDET_CODE;
				$row[] = $dat->TERMSDET_PERC.'%';
				$row[] = $dat->TERMSDET_SUM;
				$row[] = $dat->TERMSDET_DPP;
				$row[] = $dat->TERMSDET_PPN_PERC.'%';
				$row[] = $dat->TERMSDET_PPH_PERC.'%';
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del_termapp('."'".$dat->TERMSDET_ID."'".')"><span class="glyphicon glyphicon-remove"></span></a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->termapp->count_all(),
							"recordsFiltered" => $this->termapp->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_add_termapp()
	    {	        
	        $table = 'appr_terms_det';
	        $data = array(
	                'appr_id' => $this->input->post('appr_id'),
	                'termsdet_code' => $this->input->post('termcode'),
	                'termsdet_info' => $this->input->post('terminfo'),
	                'termsdet_date' => $this->input->post('tgl_term'),
	                'termsdet_perc' => $this->input->post('termperc'),
	                'termsdet_dpp' => $this->input->post('termdpp'),
	                'termsdet_sub' => $this->input->post('termsub'),
	                'termsdet_sum' => $this->input->post('termsum'),	                
	                'termsdet_ppn_perc' => $this->input->post('termppnp'),
	                'termsdet_pph_perc' => $this->input->post('termpphp'),
	                'termsdet_ppn_sum' => $this->input->post('termppnn'),
	                'termsdet_pph_sum' => $this->input->post('termpphn')
	            );
	        $insert = $this->crud->save($table,$data);
	        echo json_encode(array("status" => TRUE));
	    }

	    public function ajax_del_termapp($id)
	    {
	    	$this->crud->delete_by_id('appr_terms_det',array('termsdet_id' => $id));
        	echo json_encode(array("status" => TRUE));
	    }

	    public function ajax_costapp($id)
		{
			$list = $this->costapp->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->CSTDT_CODE;
				$row[] = $dat->CSTDT_AMOUNT;				
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del_costapp('."'".$dat->CSTDT_ID."'".')"><span class="glyphicon glyphicon-remove"></span></a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->costapp->count_all(),
							"recordsFiltered" => $this->costapp->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_add_costapp()
	    {
	    	$this->_validate_costapp();
	        $table = 'appr_cost_det';
	        $data = array(
	                'appr_id' => $this->input->post('appr_id'),
	                'cstdt_code' => $this->input->post('cost_code'),
	                'cstdt_amount' => $this->input->post('cost_amount')	                
	            );
	        $insert = $this->crud->save($table,$data);
	        echo json_encode(array("status" => TRUE));
	    }

	    public function ajax_del_costapp($id)
	    {
	    	$this->crud->delete_by_id('appr_cost_det',array('cstdt_id' => $id));
        	echo json_encode(array("status" => TRUE));
	    }

	    public function _validate_costapp()
	    {
	    	$data = array();
	        $data['error_string'] = array();
	        $data['inputerror'] = array();
	        $data['status'] = TRUE;
	 
	        if($this->input->post('cost_code') == '')
	        {
	            $data['inputerror'][] = 'cost_code';	            
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('cost_amount') == '')
	        {
	            $data['inputerror'][] = 'cost_amount';	            
	            $data['status'] = FALSE;
	        }

	        if($data['status'] === FALSE)
	        {
	            echo json_encode($data);
	            exit();
	        }
	    }

	    public function ajax_simpanapp()
	    {
	    	$this->_validate_appr();
	    	$get = $this->crud->get_by_id('master_user',array('user_id' => $this->input->post('user_id')));
	    	$get2 = $this->crud->get_by_id('master_branch',array('branch_id' => $get->BRANCH_ID));
	    	$own = $get2->BRANCH_CODE;
	    	$data = array(
	    			// Kumpulan Key
	                'user_id' => $this->input->post('user_id'),
	                'bb_id' => $this->input->post('bb_id'),
	                'loc_id' => $this->input->post('loc_id'),
	                'cust_id' => $this->input->post('cust_id'),
	                'sales_id' => $this->input->post('sales_id'),
	                'curr_id' => $this->input->post('curr_id'),
	                'plc_id' => $this->input->post('plc_id'),
	                // Data Tabel
	                'appr_sts' => '1', //Ubah status jadi posted
	                'appr_own' => $own,	                
	                'appr_po' => $this->input->post('appr_po'),
	                'appr_date' => $this->input->post('tgl'),
	                'appr_contract_start' => $this->input->post('tgl_awal'),
	                'appr_contract_end' => $this->input->post('tgl_akhir'),
	                'appr_recov' => $this->input->post('appr_rec'),
	                'appr_info' => $this->input->post('appr_info'),
	                'appr_height' => $this->input->post('appr_height'),
	                'appr_width' => $this->input->post('appr_width'),
	                'appr_length' => $this->input->post('appr_length'),
	                'appr_sumsize' => $this->input->post('appr_sumsize'),
	                'appr_side' => $this->input->post('appr_side'),
	                'appr_plcsum' => $this->input->post('appr_plcsum'),	                
	                'appr_visual' => $this->input->post('appr_vis'),	                
	                'appr_dpp_income' => $this->input->post('dpp'),
	                'appr_disc_perc1' => $this->input->post('discp1'),
	                'appr_disc_perc2' => $this->input->post('discp2'),
	                'appr_disc_sum1' => $this->input->post('discn1'),
	                'appr_disc_sum2' => $this->input->post('discn2'),
	                'appr_sub_dsc' => $this->input->post('subtotal1'),
	                'appr_ppn_perc' => $this->input->post('ppnp'),
	                'appr_ppn_sum' => $this->input->post('ppnn'),
	                'appr_bbtax' => $this->input->post('appr_bbtax'),
	                'appr_sub_ppn' => $this->input->post('subtotal2'),	                
	                'appr_pph_perc' => $this->input->post('pphp'),	                
	                'appr_pph_sum' => $this->input->post('pphn'),
	                'appr_tot_income' => $this->input->post('gtotal'),
	                // 'appr_branch' => $this->input->post('appr_brc'),
	                // 'appr_placement' => $this->input->post('appr_plc'),
	                // 'appr_payment_type' => $this->input->post('appr_pay'),
	                // 'appr_branch_income' => $this->input->post('brc_nom'),
	                // 'appr_jobdesc' => $this->input->post('jobdesc')
	            );
	        $update = $this->crud->update('trx_approvalbill',$data,array('appr_id' => $this->input->post('appr_id')));
	        $this->uphis_appr($this->input->post('appr_id'),$get->USER_NAME);
	        echo json_encode(array("status" => TRUE));
	    }

	    public function uphis_appr($id,$user)
	    {
	    	$this->db->where('appr_id',$id);
	    	$this->db->where('hisappr_id = (select max(hisappr_id) from his_approvalbill)');
			$que = $this->db->get('his_approvalbill');
			$get = $que->row();
	    	$data = array(
					'appr_id' => $id,
					'hisappr_sts' => 'Posted by User '.$user,
					'hisappr_old' => $get->HISAPPR_STS,
					'hisappr_new' => 'Posted By User '.$user,
					'hisappr_info' => 'Update by appr form',
					'hisappr_upcount' => $get->HISAPPR_UPCOUNT+1
				);
			$this->db->insert('his_approvalbill',$data);
	    }

	    public function _validate_appr()
	    {
	    	$data = array();
	        $data['error_string'] = array();
	        $data['inputerror'] = array();
	        $data['status'] = TRUE;

	        if($this->input->post('bb_id') == '')
	        {
	            $data['inputerror'][] = 'jnsbb';	            
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('loc_id') == '')
	        {
	            $data['inputerror'][] = 'loc_name';	            
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('cust_id') == '')
	        {
	            $data['inputerror'][] = 'cust_code';
	            $data['inputerror'][] = 'cust_name';	            
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('sales_id') == '')
	        {
	            $data['inputerror'][] = 'sales_code';
	            $data['inputerror'][] = 'sales_name';	            
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('plc_id') == '')
	        {
	            $data['inputerror'][] = 'plc_name';	            
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('curr_id') == '')
	        {
	            $data['inputerror'][] = 'curr_name';	            
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('tgl') == '')
	        {
	            $data['inputerror'][] = 'tgl';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('tgl_awal') == '')
	        {
	            $data['inputerror'][] = 'tgl_awal';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('tgl_akhir') == '')
	        {
	            $data['inputerror'][] = 'tgl_akhir';
	            $data['status'] = FALSE;
	        }

	        if($data['status'] === FALSE)
	        {
	            echo json_encode($data);
	            exit();
	        }
	    }

	    //ajax transaksi bapp
	    public function ajax_srch_bapp()
		{
			$list = $this->srch_bapp->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->BAPP_CODE;
				$row[] = $dat->APPR_CODE;
				$row[] = $dat->APPR_DATE;				
				$row[] = $dat->CUST_NAME;
				$row[] = $dat->BAPP_DATE;
				$row[] = '<a href="javascript:void(0)" title="Lihat Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_bapp('."'".$dat->BAPP_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_bapp->count_all(),
							"recordsFiltered" => $this->srch_bapp->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_pick_bapp($id)
		{
			$data = $this->crud->get_by_id('trx_bapp',array('bapp_id' => $id));
        	echo json_encode($data);
		}

	    public function simpan_bapp()
	    {
	    	$data = array (
	    		'appr_id' => $this->input->post('appr_id'),
	    		'user_id' => $this->input->post('user_id'),
	    		'bapp_date' => $this->input->post('bapp_date'),
	    		'bapp_datestart' => $this->input->post('bapp_startdate'),
	    		'bapp_dateend' => $this->input->post('bapp_enddate'),
	    		'bapp_sts' => '1',
	    		'bapp_doc' => $this->input->post('bapp_doc'),
	    		'bapp_oldtxt' => $this->input->post('bapp_oldtxt'),
	    		'bapp_newtxt' => $this->input->post('bapp_newtxt'),
	    		'bapp_findate' => $this->input->post('bapp_finishdate'),
	    		'bapp_periodstart' => $this->input->post('bapp_startper'),
	    		'bapp_periodend' => $this->input->post('bapp_endper'),
	    		'bapp_info' => $this->input->post('bapp_info')
	    	);
	    	$update = $this->crud->update('trx_bapp',$data,array('bapp_id' => $this->input->post('bapp_id')));
	        echo json_encode(array("status" => TRUE));
	    }

	    public function bapp_delimg($id)
	    {	    	
	    	$get = $this->crud->get_by_id('bapp_details',array('detbapp_id' => $id));
	    	$imgpath = $get->DETBAPP_IMGPATH;
	    	$imgthumbs = $get->DETBAPP_THUMBS;
	    	@unlink($imgpath);
	    	@unlink($imgthumbs);
	    	$this->crud->delete_by_id('bapp_details',array('detbapp_id' => $id));
        	echo json_encode(array("status" => TRUE,"img" => $imgpath, "thumbs" => $imgthumbs));
	    }

	    //image configuration
	    public function img_conf($name,$path)
		{
			$nmfile='img_'.time().'_'.$name;
			$config['upload_path']='./assets/img/'.$path.'/';
			$config['allowed_types']='jpg|jpeg';
			$config['max_size']='500';
			$config['file_name']=$nmfile;
			$this->upload->initialize($config);
		}

		public function img_resize($name,$path)
		{
			$config['source_image']='./assets/img/'.$path.'/'.$name;
			$config['new_image']='./assets/img/'.$path.'/thumbs/'.$name;
			$config['maintain_ratio']=TRUE;
			$config['width']=800;
			$config['height']=450;
			$this->image_lib->initialize($config);
			if(!$this->image_lib->resize())
			{
				echo $this->image_lib->display_errors();
			}
		}

		public function upload_bapp()
		{
			if (!empty($_FILES)) 
			{
				$name = $this->input->post('bapp_code');
				$id = $this->input->post('bapp_id');
				$path = 'bapp';
				$this->img_conf($name,$path);
				if ($this->upload->do_upload('file'))
				{
					$fileData = $this->upload->data();
					$imgname = $fileData['file_name'];
					$imgpath = './assets/img/'.$path.'/'.$imgname;
					$thumbs = './assets/img/'.$path.'/thumbs/'.$imgname;

					$this->img_resize($imgname,$path);

					$table = 'bapp_details';
			        $data = array(
			                'bapp_id' => $id,
			                'detbapp_imgname' => $imgname,
			                'detbapp_imgpath' => $imgpath,
			                'detbapp_thumbs' => $thumbs,
			            );
			        $insert = $this->crud->save($table,$data);
				}
			}
		}

		//get image
		public function temp_gallery($id)
		{
			$list = $this->crud->get_images($id);
			echo json_encode($list);
		}

		public function getimgbapp($id)
		{
			$data = $this->crud->get_by_id('bapp_details',array('detbapp_id' => $id));
        	echo json_encode($data);
		}

		//get approval for print
		public function pick_appcost($id)
		{
			// $data = $this->crud->get_by_id4('appr_cost_det',array('appr_id' => $id));
			$this->db->where('appr_id',$id);
			$this->db->where('cstdt_code','Pajak Reklame');
			$data = $this->db->get('appr_cost_det')->row();
        	echo json_encode($data);
		}

		public function get_appcost($id)
		{			
			$data = $this->crud->get_by_id4('appr_cost_det',array('appr_id' => $id));
			echo json_encode($data);
		}

		public function get_appterm($id)
		{			
			$data = $this->crud->get_by_id4('appr_terms_det',array('appr_id' => $id));
			echo json_encode($data);
		}

		//Get DPP
		public function get_subcost($id)
		{
			$this->db->select_sum('a.cstdt_amount', 'subtotal');
			$this->db->join('trx_approvalbill b','b.appr_id = a.appr_id');
			$this->db->where('a.appr_id',$id);
			$query = $this->db->get('appr_cost_det a');
	        $data = $query->row();
	        echo json_encode($data);
		}
	}
?>