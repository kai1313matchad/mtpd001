<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Logistik extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('datatables/Dt_srchgd','srch_gd');
			$this->load->model('datatables/Dt_srchgdusg','srch_gdusg');
			$this->load->model('datatables/Dt_srchsupp','srch_supp');
			$this->load->model('datatables/Dt_srchappr','srch_appr');
			$this->load->model('datatables/Dt_srchcurr','srch_curr');
			$this->load->model('datatables/Dt_srchpo','srch_po');
			$this->load->model('datatables/Dt_srchprc','srch_prc');
			$this->load->model('datatables/Dt_srchretprc','srch_retprc');
			$this->load->model('datatables/Dt_srchusage','srch_usage');
			$this->load->model('datatables/Dt_podet','gdpo');
			$this->load->model('datatables/Dt_prcdet','gdprc');
			$this->load->model('datatables/Dt_usgdet','gdusg');
			$this->load->model('datatables/Dt_usgrtdet','gdrtusg');
			$this->load->model('datatables/Dt_retprcdet','gdretprc');
			$this->load->model('CRUD/M_crud','crud');
		}

		//Menu Link
		public function index()
		{
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='dash_logistik';
			$data['isi']='menu/administrator/logistik/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function report()
		{
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='report_logistik';
			$data['isi']='menu/administrator/logistik/dash_report';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function lgt_trx_po()
		{
			$id=$this->crud->gen_ponumber();
			$data['po'] = $this->crud->get_by_id('trx_po',array('po_id' => $id));
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='po';
			$data['isi']='menu/administrator/logistik/lgt_trx_po';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function lgt_trx_prc()
		{
			$id=$this->crud->add_bl();
			$data['prc'] = $this->crud->get_by_id('trx_procurement',array('prc_id' => $id));
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='prc';
			$data['isi']='menu/administrator/logistik/lgt_trx_prc';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function lgt_trx_retprc()
		{
			$id=$this->crud->add_rb();
			$data['rb'] = $this->crud->get_by_id('procurement_ret',array('rtprc_id' => $id));
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='retprc';
			$data['isi']='menu/administrator/logistik/lgt_trx_retprc';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function lgt_trx_usage()
		{
			$id=$this->crud->add_usg();
			// $id = '1';
			$data['usg'] = $this->crud->get_by_id('trx_usage',array('usg_id' => $id));
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='usage';
			$data['isi']='menu/administrator/logistik/lgt_trx_usage';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function lgt_trx_retusage()
		{
			$id=$this->crud->add_retusg();
			// $id = '1';
			$data['usg'] = $this->crud->get_by_id('usage_ret',array('rtusg_id' => $id));
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='retusg';
			$data['isi']='menu/administrator/logistik/lgt_trx_retusg';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function lgt_trx_adjust()
		{
			$id=$this->crud->add_adj();
			// $id = '1';
			$data['adj'] = $this->crud->get_by_id('trx_adjustment',array('adj_id' => $id));
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='adjust';
			$data['isi']='menu/administrator/logistik/lgt_trx_adjust';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function print_po()
		{
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='report_logistik';
			$data['isi']='menu/administrator/logistik/lgt_print_po';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_po($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='report_logistik';
			$this->load->view('menu/administrator/logistik/po_print',$data);
		}

		public function print_prc()
		{
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='report_logistik';
			$data['isi']='menu/administrator/logistik/lgt_print_prc';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_prc($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='report_logistik';
			$this->load->view('menu/administrator/logistik/prc_print',$data);
		}

		public function print_retprc()
		{
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='report_logistik';
			$data['isi']='menu/administrator/logistik/lgt_print_retprc';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_retprc($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Logistik';
			$data['menu']='logistik';
			$data['menulist']='report_logistik';
			$this->load->view('menu/administrator/logistik/retprc_print',$data);
		}

		//Ajax Search
		public function ajax_srch_po()
		{
			$list = $this->srch_po->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->PO_CODE;
				$row[] = $dat->APPR_CODE;
				$row[] = $dat->PO_ORDNUM;				
				$row[] = $dat->PO_DATE;				
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_po('."'".$dat->PO_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_po->count_all(),
							"recordsFiltered" => $this->srch_po->count_filtered(),
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

		public function ajax_srch_brg($suppid)
		{
			$list = $this->srch_gd->get_datatables($suppid);
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
							"recordsTotal" => $this->srch_gd->count_all(),
							"recordsFiltered" => $this->srch_gd->count_filtered($suppid),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_srch_brgusg()
		{
			$list = $this->srch_gdusg->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GD_CODE;
				$row[] = $dat->GD_NAME;
				$row[] = $dat->GD_MEASURE;				
				$row[] = $dat->GD_UNIT;				
				$row[] = $dat->GD_STOCK;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_brg('."'".$dat->GD_ID."'".')">Pilih</a>';
				$row[] = $dat->GD_INFO;
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_gdusg->count_all(),
							"recordsFiltered" => $this->srch_gdusg->count_filtered(),
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

		public function ajax_srch_prc()
		{
			$list = $this->srch_prc->get_datatables();
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
							"recordsTotal" => $this->srch_prc->count_all(),
							"recordsFiltered" => $this->srch_prc->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_srch_retprc()
		{
			$list = $this->srch_retprc->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->RTPRC_CODE;
				$row[] = $dat->PRC_CODE;
				$row[] = $dat->PRC_INVOICE;				
				$row[] = $dat->RTPRC_DATE;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_retprc('."'".$dat->RTPRC_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_retprc->count_all(),
							"recordsFiltered" => $this->srch_retprc->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_srch_usg()
		{
			$list = $this->srch_usage->get_datatables();
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->USG_CODE;
				$row[] = $dat->USG_DATE;
				$row[] = $dat->USG_INFO;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_usage('."'".$dat->USG_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->srch_usage->count_all(),
							"recordsFiltered" => $this->srch_usage->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Ajax Show To Delete
		public function ajax_barang($id)
		{
			$list = $this->gdpo->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GD_NAME;
				$row[] = $dat->GD_PRICE.' / '.$dat->GD_MEASURE.' '.$dat->GD_UNIT;
				$row[] = $dat->PODET_QTYUNIT;
				$row[] = $dat->PODET_SUB;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del_brg('."'".$dat->PODET_ID."'".')"><span class="glyphicon glyphicon-remove"></span></a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->gdpo->count_all(),
							"recordsFiltered" => $this->gdpo->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_brg_prc($id)
		{
			$list = $this->gdprc->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GD_NAME;
				$row[] = $dat->GD_PRICE.' / '.$dat->GD_MEASURE.' '.$dat->GD_UNIT;
				$row[] = $dat->PRCDET_QTY;
				$row[] = $dat->PRCDET_SUB;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del_brg('."'".$dat->PRCDET_ID."'".')"><span class="glyphicon glyphicon-remove"></span></a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->gdprc->count_all(),
							"recordsFiltered" => $this->gdprc->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_brg_retprc($id)
		{
			$list = $this->gdretprc->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GD_NAME;
				$row[] = $dat->GD_PRICE.' / '.$dat->GD_MEASURE.' '.$dat->GD_UNIT;
				$row[] = $dat->RETPRCDET_QTY;
				$row[] = $dat->RETPRCDET_SUB;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del_brg('."'".$dat->RETPRCDET_ID."'".')"><span class="glyphicon glyphicon-remove"></span></a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->gdretprc->count_all(),
							"recordsFiltered" => $this->gdretprc->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_brgusg($id)
		{
			$list = $this->gdusg->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GD_NAME;
				$row[] = $dat->GD_PRICE.' / '.$dat->GD_MEASURE.' '.$dat->GD_UNIT;
				$row[] = $dat->USGDET_QTY;
				$row[] = $dat->GD_UNIT;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del_brg('."'".$dat->USGDET_ID."'".')"><span class="glyphicon glyphicon-remove"></span></a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->gdusg->count_all(),
							"recordsFiltered" => $this->gdusg->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_brgrtusg($id)
		{
			$list = $this->gdrtusg->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GD_NAME;
				$row[] = $dat->GD_PRICE.' / '.$dat->GD_MEASURE.' '.$dat->GD_UNIT;
				$row[] = $dat->RETUSGDET_QTY;
				$row[] = $dat->GD_UNIT;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del_brg('."'".$dat->RETUSGDET_ID."'".')"><span class="glyphicon glyphicon-remove"></span></a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->gdrtusg->count_all(),
							"recordsFiltered" => $this->gdrtusg->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Ajax Show To Pick
		public function ajax_dtpo($id)
		{
			$list = $this->gdpo->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GD_NAME;
				$row[] = $dat->GD_PRICE.' / '.$dat->GD_MEASURE.' '.$dat->GD_UNIT;
				$row[] = $dat->PODET_QTYUNIT;
				$row[] = $dat->PODET_SUB;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_podet('."'".$dat->PODET_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->gdpo->count_all(),
							"recordsFiltered" => $this->gdpo->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		public function ajax_dtprc($id)
		{
			$list = $this->gdprc->get_datatables($id);
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->GD_NAME;
				$row[] = $dat->GD_PRICE.' / '.$dat->GD_MEASURE.' '.$dat->GD_UNIT;
				$row[] = $dat->PRCDET_QTY;
				$row[] = $dat->PRCDET_SUB;
				$row[] = '<a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_retprc('."'".$dat->PRCDET_ID."'".')">Pilih</a>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->gdprc->count_all(),
							"recordsFiltered" => $this->gdprc->count_filtered($id),
							"data" => $data,
					);			
			echo json_encode($output);
		}

		//Ajax CRUD
		public function ajax_simpanpo()
		{
			$appr = null;
			if($this->input->post('appr_id') != null)
			{
				$appr = $this->input->post('appr_id');
			}
			$data = array(	                
	                'user_id' => $this->input->post('user_id'),
	                'curr_id' => $this->input->post('curr_id'),
	                'appr_id' => $appr,
	                'supp_id' => $this->input->post('supp_id'),
	                'po_sts' => '1',
	                'po_date' => $this->input->post('po_tgl'),
	                'po_ordnum' => $this->input->post('po_so'),
	                'po_term' => $this->input->post('po_term'),
	                'po_info' => $this->input->post('po_info'),
	                'po_sub' => $this->input->post('po_subs'),
	                'po_gtotal' => $this->input->post('po_subs')	                
	            );
	        $update = $this->crud->update('trx_po',$data,array('po_id' => $this->input->post('po_id')));
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_add_brg()
	    {	        
	      	$table = 'po_details';
	        $data = array(
	                'po_id' => $this->input->post('po_id'),
	                'gd_id' => $this->input->post('gd_id'),
	                'podet_qtyunit' => $this->input->post('po_qty'),
	                'podet_sub' => $this->input->post('po_sub')
	            );
	        $insert = $this->crud->save($table,$data);
	        echo json_encode(array("status" => TRUE));
	    }

	    public function save_po()
	    {
	    	$get = $this->crud->get_by_id('master_user',array('user_id' => $this->input->post('user_id')));
	    	$get2 = $this->crud->get_by_id('master_branch',array('branch_id' => $get->BRANCH_ID));
	    	$own = $get2->BRANCH_STATUS;
	    	$data = array(
	                'appr_id' => $this->input->post('appr_id'),
	                'curr_id' => $this->input->post('curr_id'),
	                'supp_id' => $this->input->post('supp_id'),
	                'user_id' => $this->input->post('user_id'),
	                'bb_id' => $this->input->post('bb_id'),
	                'loc_id' => $this->input->post('loc_id'),
	                'cust_id' => $this->input->post('cust_id'),
	                'sales_id' => $this->input->post('sales_id'),
	                'curr_id' => $this->input->post('curr_id'),
	                'appr_code' => $this->input->post('appr_code'),
	                'appr_sts' => '1',
	            );
	        $update = $this->crud->update('trx_approvalbill',$data,array('appr_id' => $this->input->post('appr_id')));
	        echo json_encode(array("status" => TRUE));
	    }

	    public function ajax_add_brgprc()
	    {	        
	      	$this->_validate_po();
	      	$table = 'prc_details';
	        $data = array(
	                'prc_id' => $this->input->post('prc_id'),
	                'gd_id' => $this->input->post('gd_id'),
	                'prcdet_qty' => $this->input->post('po_qty'),
	                'prcdet_sub' => $this->input->post('po_sub')
	            );
	        $insert = $this->crud->save($table,$data);
	        $getinv = $this->crud->get_by_id('master_goods',array('gd_id' => $this->input->post('gd_id')));
	        $stock = $getinv->GD_STOCK;
	        $add = $this->input->post('po_qty');
	        $up = $stock + $add; 
	        $data_up = array (
	        		'gd_stock' => $up
	        	);
	        $update = $this->crud->update('master_goods',$data_up,array('gd_id' => $this->input->post('gd_id')));
	        echo json_encode(array("status" => TRUE));	        
	    }

	    public function ajax_del_brgprc($id)
	    {
	    	$getprc = $this->crud->get_by_id('prc_details',array('prcdet_id' => $id));
	    	$gdid = $getprc->GD_ID;
	    	$substract =  $getprc->PRCDET_QTY;
	    	$getinv = $this->crud->get_by_id('master_goods',array('gd_id' => $gdid));
	    	$stock = $getinv->GD_STOCK;
	        $up = $stock - $substract;
	        $data_up = array (
	        		'gd_stock' => $up
	        	);
	        $update = $this->crud->update('master_goods',$data_up,array('gd_id' => $gdid));
	    	$this->crud->delete_by_id('prc_details',array('prcdet_id' => $id));
        	echo json_encode(array("status" => TRUE));        	
	    }

	    public function ajax_simpanprc()
		{
			$data = array(	                
	                'user_id' => $this->input->post('user_id'),
	                'curr_id' => $this->input->post('curr_id'),
	                'po_id' => $this->input->post('po_id'),	                
	                'prc_sts' => '1',
	                'prc_date' => $this->input->post('prc_tgl'),
	                'prc_invoice' => $this->input->post('prc_inv'),	                
	                'prc_info' => $this->input->post('po_info'),
	                'prc_sub' => $this->input->post('po_subs'),
	                'prc_disc' => $this->input->post('prc_disc'),
	                'prc_ppn' => $this->input->post('prc_ppn'),
	                'prc_cost' => $this->input->post('prc_cost'),
	                'prc_gtotal' => $this->input->post('prc_gtotal')	                
	            );
	        $update = $this->crud->update('trx_procurement',$data,array('prc_id' => $this->input->post('prc_id')));
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_add_brgretprc()
	    {	        
	      	$this->_validate_ret();
	      	$table = 'retprc_details';
	        $data = array(
	                'rtprc_id' => $this->input->post('ret_id'),
	                'gd_id' => $this->input->post('gd_id'),
	                'retprcdet_qty' => $this->input->post('ret_qty'),
	                'retprcdet_sub' => $this->input->post('ret_sub')
	            );
	        $insert = $this->crud->save($table,$data);
	        $getinv = $this->crud->get_by_id('master_goods',array('gd_id' => $this->input->post('gd_id')));
	        $stock = $getinv->GD_STOCK;
	        $add = $this->input->post('ret_qty');
	        $up = $stock - $add; 
	        $data_up = array (
	        		'gd_stock' => $up
	        	);
	        $update = $this->crud->update('master_goods',$data_up,array('gd_id' => $this->input->post('gd_id')));
	        echo json_encode(array("status" => TRUE));	        
	    }

	    public function ajax_del_brgretprc($id)
	    {
	    	$getprc = $this->crud->get_by_id('retprc_details',array('retprcdet_id' => $id));
	    	$gdid = $getprc->GD_ID;
	    	$add =  $getprc->RETPRCDET_QTY;
	    	$getinv = $this->crud->get_by_id('master_goods',array('gd_id' => $gdid));
	    	$stock = $getinv->GD_STOCK;
	        $up = $stock + $add;
	        $data_up = array (
	        		'gd_stock' => $up
	        	);
	        $update = $this->crud->update('master_goods',$data_up,array('gd_id' => $gdid));
	    	$this->crud->delete_by_id('retprc_details',array('retprcdet_id' => $id));
        	echo json_encode(array("status" => TRUE));        	
	    }

	    public function ajax_simpanretprc()
		{
			$data = array(	                
	                'user_id' => $this->input->post('user_id'),
	                'curr_id' => $this->input->post('curr_id'),
	                'prc_id' => $this->input->post('prc_id'),	                
	                'rtprc_sts' => '1',
	                'rtprc_date' => $this->input->post('retprc_tgl'),
	                'rtprc_info' => $this->input->post('po_info'),
	                'rtprc_sub' => $this->input->post('po_subs'),
	                'rtprc_disc' => $this->input->post('prc_disc'),
	                'rtprc_ppn' => $this->input->post('prc_ppn'),
	                'rtprc_cost' => $this->input->post('prc_cost'),
	                'rtprc_gtotal' => $this->input->post('prc_gtotal')	                
	            );
	        $update = $this->crud->update('procurement_ret',$data,array('rtprc_id' => $this->input->post('ret_id')));
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_add_brgusg()
	    {	        
	      	$this->_validate_usg();
	      	$table = 'usage_details';
	        $data = array(
	                'usg_id' => $this->input->post('usg_id'),
	                'gd_id' => $this->input->post('gd_id'),
	                'usgdet_qty' => $this->input->post('gd_usg')	                
	            );
	        $insert = $this->crud->save($table,$data);
	        $getinv = $this->crud->get_by_id('master_goods',array('gd_id' => $this->input->post('gd_id')));
	        $stock = $getinv->GD_STOCK;
	        $add = $this->input->post('gd_usg');
	        $up = $stock - $add; 
	        $data_up = array (
	        		'gd_stock' => $up
	        	);
	        $update = $this->crud->update('master_goods',$data_up,array('gd_id' => $this->input->post('gd_id')));
	        echo json_encode(array("status" => TRUE));	        
	    }

	    public function ajax_del_brgusg($id)
	    {
	    	$getusg = $this->crud->get_by_id('usage_details',array('usgdet_id' => $id));
	    	$gdid = $getusg->GD_ID;
	    	$add =  $getusg->USGDET_QTY;
	    	$getinv = $this->crud->get_by_id('master_goods',array('gd_id' => $gdid));
	    	$stock = $getinv->GD_STOCK;
	        $up = $stock + $add;
	        $data_up = array (
	        		'gd_stock' => $up
	        	);
	        $update = $this->crud->update('master_goods',$data_up,array('gd_id' => $gdid));
	    	$this->crud->delete_by_id('usage_details',array('usgdet_id' => $id));
        	echo json_encode(array("status" => TRUE));        	
	    }

	    public function ajax_simpanusg()
		{
			$appr = $this->input->post('appr_id');
			if($appr == '')
			{
				$appr = NULL;
			}
			$data = array(	                
	                'user_id' => $this->input->post('user_id'),
	                // 'appr_id' => $this->input->post('appr_id'),
	                'appr_id' => $appr,	                
	                'usg_date' => $this->input->post('usg_tgl'),
	                'usg_sts' => '1',
	                'usg_info' => $this->input->post('usg_info')

	            );
	        $update = $this->crud->update('trx_usage',$data,array('usg_id' => $this->input->post('usg_id')));
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_add_brgrtusg()
	    {	        
	      	$this->_validate_rtusg();
	      	$table = 'retusg_details';
	        $data = array(
	                'rtusg_id' => $this->input->post('rtusg_id'),
	                'gd_id' => $this->input->post('gd_id'),
	                'retusgdet_qty' => $this->input->post('gd_usg')	                
	            );
	        $insert = $this->crud->save($table,$data);
	        $getinv = $this->crud->get_by_id('master_goods',array('gd_id' => $this->input->post('gd_id')));
	        $stock = $getinv->GD_STOCK;
	        $add = $this->input->post('gd_usg');
	        $up = $stock + $add; 
	        $data_up = array (
	        		'gd_stock' => $up
	        	);
	        $update = $this->crud->update('master_goods',$data_up,array('gd_id' => $this->input->post('gd_id')));
	        echo json_encode(array("status" => TRUE));	        
	    }

	    public function ajax_del_brgrtusg($id)
	    {
	    	$getusg = $this->crud->get_by_id('retusg_details',array('retusgdet_id' => $id));
	    	$gdid = $getusg->GD_ID;
	    	$add =  $getusg->RETUSGDET_QTY;
	    	$getinv = $this->crud->get_by_id('master_goods',array('gd_id' => $gdid));
	    	$stock = $getinv->GD_STOCK;
	        $up = $stock - $add;
	        $data_up = array (
	        		'gd_stock' => $up
	        	);
	        $update = $this->crud->update('master_goods',$data_up,array('gd_id' => $gdid));
	    	$this->crud->delete_by_id('retusg_details',array('retusgdet_id' => $id));
        	echo json_encode(array("status" => TRUE));        	
	    }

		public function ajax_simpanrtusg()
		{
			$data = array(	                
	                'user_id' => $this->input->post('user_id'),
	                'usg_id' => $this->input->post('usg_id'),               
	                'rtusg_date' => $this->input->post('rtusg_tgl'),
	                'rtusg_sts' => '1',
	                'rtusg_info' => $this->input->post('rtusg_info')
	            );
	        $update = $this->crud->update('trx_usage',$data,array('usg_id' => $this->input->post('usg_id')));
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_simpan_adj()
		{
			$data = array(	                
	                'gd_id' => $this->input->post('gd_id'),              
	                'adj_date' => $this->input->post('adj_tgl'),
	                'adj_dtsts' => '1',
	                'adj_info' => $this->input->post('adj_info'),
	                'adj_oldqty' => $this->input->post('gd_stock'),
	                'adj_curqty' => $this->input->post('adj_curr'),
	                'adj_plus' => $this->input->post('adj_plus'),
	                'adj_minus' => $this->input->post('adj_minus'),
	                'adj_diff' => $this->input->post('adj_diff')
	            );
	        $update = $this->crud->update('trx_adjustment',$data,array('adj_id' => $this->input->post('adj_id')));
	        $data2 = array(
	        		'gd_stock' => $this->input->post('adj_curr')
	        	);
	        $update2 = $this->crud->update('master_goods',$data2,array('gd_id' => $this->input->post('gd_id'))); 
	        echo json_encode(array("status" => TRUE));
		}

	    //Ajax Get Data
		public function ajax_pick_po($id)
		{
			$data = $this->crud->get_by_id('trx_po',array('po_id' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_podet($id)
		{
			$data = $this->crud->get_by_id3('po_details','master_goods','trx_po',array('po_details.po_id' => $id),'master_goods.gd_id = po_details.gd_id','trx_po.po_id = po_details.po_id');
        	echo json_encode($data);
		}

		public function ajax_pick_appr($id)
		{
			$data = $this->crud->get_by_id2('trx_approvalbill','master_location',array('appr_id' => $id),'master_location.loc_id = trx_approvalbill.loc_id');
        	echo json_encode($data);
		}

		public function ajax_pick_supp($id)
		{
			$data = $this->crud->get_by_id('master_supplier',array('supp_id' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_brg($id)
		{
			$data = $this->crud->get_by_id('master_goods',array('gd_id' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_curr($id)
		{
			$data = $this->crud->get_by_id('master_currency',array('curr_id' => $id));
        	echo json_encode($data);
		}		

		public function ajax_pick_podet2($id)
		{
			$data = $this->crud->get_by_id3('po_details','master_goods','trx_po',array('po_details.podet_id' => $id),'master_goods.gd_id = po_details.gd_id','trx_po.po_id = po_details.po_id');
        	echo json_encode($data);
		}

	    public function ajax_del_brg($id)
	    {
	    	$this->crud->delete_by_id('po_details',array('podet_id' => $id));
        	echo json_encode(array("status" => TRUE));
	    }

	    public function ajax_sub($id)
	    {
	    	$data = $this->crud->sub_po($id);
        	echo json_encode($data);
	    }

	    public function ajax_subbl($id)
	    {
	    	$data = $this->crud->sub_bl($id);
        	echo json_encode($data);
	    }

		public function ajax_pick_prc($id)
		{
			$data = $this->crud->get_by_id2('trx_procurement','trx_po',array('prc_id' => $id),'trx_po.po_id = trx_procurement.po_id');
        	echo json_encode($data);
		}

		public function ajax_pick_prcdet($id)
		{
			$data = $this->crud->get_by_id3('prc_details','master_goods','trx_procurement',array('prc_details.prc_id' => $id),'master_goods.gd_id = prc_details.gd_id','trx_procurement.prc_id = prc_details.prc_id');
        	echo json_encode($data);
		}

		public function ajax_pick_prc2($id)
		{
			$data = $this->crud->get_by_id('trx_procurement',array('prc_id' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_prcdet2($id)
		{
			$data = $this->crud->get_by_id3('prc_details','master_goods','trx_procurement',array('prc_details.prcdet_id' => $id),'master_goods.gd_id = prc_details.gd_id','trx_procurement.prc_id = prc_details.prc_id');
        	echo json_encode($data);
		}

		public function ajax_subretbl($id)
	    {
	    	$data = $this->crud->sub_retbl($id);
        	echo json_encode($data);
	    }

		public function ajax_pick_retprc($id)
		{
			$data = $this->crud->get_by_id2('procurement_ret','trx_procurement',array('rtprc_id' => $id),'trx_procurement.prc_id = procurement_ret.prc_id');
        	echo json_encode($data);
		}

		public function ajax_pick_retprcdet($id)
		{
			$data = $this->crud->get_by_id3('retprc_details','master_goods','procurement_ret',array('retprc_details.rtprc_id' => $id),'master_goods.gd_id = retprc_details.gd_id','procurement_ret.rtprc_id = retprc_details.rtprc_id');
        	echo json_encode($data);
		}

		public function ajax_pick_usage($id)
		{
			$data = $this->crud->get_by_id('trx_usage',array('usg_id' => $id));
			echo json_encode($data);
		}

	    //Validation Code
	    public function _validate_po()
	    {
	    	$data = array();
	        $data['error_string'] = array();
	        $data['inputerror'] = array();
	        $data['status'] = TRUE;
	 
	        if($this->input->post('po_qty') > $this->input->post('po_qty_old'))
	        {
	            $data['inputerror'][] = 'po_qty';
	            $data['error_string'][] = 'Jumlah Melebihi PO';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('po_qty') == '')
	        {
	            $data['inputerror'][] = 'po_qty';
	            $data['error_string'][] = 'Harus Diisi';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('po_qty') == '0')
	        {
	            $data['inputerror'][] = 'po_qty';
	            $data['error_string'][] = 'Jumlah Minimum 1';
	            $data['status'] = FALSE;
	        }

	        if($data['status'] === FALSE)
	        {
	            echo json_encode($data);
	            exit();
	        }
	    }

	    public function _validate_ret()
	    {
	    	$data = array();
	        $data['error_string'] = array();
	        $data['inputerror'] = array();
	        $data['status'] = TRUE;
	 
	        if($this->input->post('ret_qty') > $this->input->post('ret_qty_old'))
	        {
	            $data['inputerror'][] = 'ret_qty';
	            $data['error_string'][] = 'Jumlah Melebihi Pembelian';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('ret_qty') == '')
	        {
	            $data['inputerror'][] = 'ret_qty';
	            $data['error_string'][] = 'Harus Diisi';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('ret_qty') == '0')
	        {
	            $data['inputerror'][] = 'ret_qty';
	            $data['error_string'][] = 'Jumlah Minimum 1';
	            $data['status'] = FALSE;
	        }

	        if($data['status'] === FALSE)
	        {
	            echo json_encode($data);
	            exit();
	        }
	    }

	    public function _validate_usg()
	    {
	    	$data = array();
	        $data['error_string'] = array();
	        $data['inputerror'] = array();
	        $data['status'] = TRUE;
	 
	        if($this->input->post('gd_usg') > $this->input->post('gd_stock'))
	        {
	            $data['inputerror'][] = 'gd_usg';
	            $data['error_string'][] = 'Jumlah Melebihi Stock';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('gd_usg') == '')
	        {
	            $data['inputerror'][] = 'gd_usg';
	            $data['error_string'][] = 'Harus Diisi';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('gd_usg') == '0')
	        {
	            $data['inputerror'][] = 'gd_usg';
	            $data['error_string'][] = 'Jumlah Minimum 1';
	            $data['status'] = FALSE;
	        }

	        if($data['status'] === FALSE)
	        {
	            echo json_encode($data);
	            exit();
	        }
	    }

	    public function _validate_rtusg()
	    {
	    	$data = array();
	        $data['error_string'] = array();
	        $data['inputerror'] = array();
	        $data['status'] = TRUE;

	        if($this->input->post('gd_usg') == '')
	        {
	            $data['inputerror'][] = 'gd_usg';
	            $data['error_string'][] = 'Harus Diisi';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('gd_usg') == '0')
	        {
	            $data['inputerror'][] = 'gd_usg';
	            $data['error_string'][] = 'Jumlah Minimum 1';
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