<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Genaff extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			//$this->load->model('frontend/M_dashboard','M_dash');
			$this->load->model('CRUD/M_crud','crud');
			$this->load->model('CRUD/M_gen','gen');
			$this->load->model('datatables/Dt_pogadet','gdpo');
			
			$this->load->model('datatables/Dt_srchgd','srch_gd');
			$this->load->model('datatables/Dt_srchgdusg','srch_gdusg');
			$this->load->model('datatables/Dt_srchsupp','srch_supp');
			$this->load->model('datatables/Dt_srchappr','srch_appr');
			$this->load->model('datatables/Dt_srchcurr','srch_curr');
			$this->load->model('datatables/Dt_srchpo','srch_po');
			$this->load->model('datatables/Dt_srchprc','srch_prc');
			$this->load->model('datatables/Dt_srchretprc','srch_retprc');
			$this->load->model('datatables/Dt_srchusage','srch_usage');
			$this->load->model('datatables/Dt_prcdet','gdprc');
			$this->load->model('datatables/Dt_usgdet','gdusg');
			$this->load->model('datatables/Dt_usgrtdet','gdrtusg');
			$this->load->model('datatables/Dt_retprcdet','gdretprc');
			$this->load->model('datatables/Dt_lap_po_ga','lap_po');
			$this->load->model('datatables/Dt_lap_prc','lap_prc');
		}

		//menu link
		public function index()
		{
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='dash_ga';
			$data['isi']='menu/administrator/ga/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function lap_po()
	    {
	    	$data['title']='Match Terpadu - Laporan PO GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$data['isi']='menu/administrator/ga/lap_po';
			$this->load->view('layout/administrator/wrapper',$data);
	    }

		public function report()
		{
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$data['isi']='menu/administrator/ga/dash_report';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function gen_po_ga()
		{
			$gen = $this->gen->gen_numpoga();
			$data['id'] = $gen['insertId'];
			$data['kode'] = $gen['poga_code'];
			$data['status'] = TRUE;
			echo json_encode($data);


		}

		public function ga_trx_po()
		{
			// $id=$this->crud->add_po();
			// $data['po'] = $this->crud->get_by_id('trx_po',array('po_id' => $id));
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='po_ga';
			$data['isi']='menu/administrator/ga/ga_trx_po';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function ga_trx_prc()
		{
			$id=$this->crud->add_bl();
			$data['prc'] = $this->crud->get_by_id('trx_procurement',array('prc_id' => $id));
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='prc';
			$data['isi']='menu/administrator/ga/lgt_trx_prc';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function ga_trx_retprc()
		{
			$id=$this->crud->add_rb();
			$data['rb'] = $this->crud->get_by_id('procurement_ret',array('rtprc_id' => $id));
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='retprc';
			$data['isi']='menu/administrator/ga/lgt_trx_retprc';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function ga_trx_usage()
		{
			$id=$this->crud->add_usg();
			// $id = '1';
			$data['usg'] = $this->crud->get_by_id('trx_usage',array('usg_id' => $id));
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='usage';
			$data['isi']='menu/administrator/ga/lgt_trx_usage';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function ga_trx_retusage()
		{
			$id=$this->crud->add_retusg();
			// $id = '1';
			$data['usg'] = $this->crud->get_by_id('usage_ret',array('rtusg_id' => $id));
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='retusg';
			$data['isi']='menu/administrator/ga/lgt_trx_retusg';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function ga_trx_adjust()
		{
			$id=$this->crud->add_adj();
			// $id = '1';
			$data['adj'] = $this->crud->get_by_id('trx_adjustment',array('adj_id' => $id));
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='adjust';
			$data['isi']='menu/administrator/ga/lgt_trx_adjust';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function print_po()
		{
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$data['isi']='menu/administrator/ga/lgt_print_po';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_po($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$this->load->view('menu/administrator/ga/po_print',$data);
		}

		public function print_prc()
		{
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$data['isi']='menu/administrator/ga/lgt_print_prc';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_prc($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$this->load->view('menu/administrator/ga/prc_print',$data);
		}

		public function print_retprc()
		{
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$data['isi']='menu/administrator/ga/lgt_print_retprc';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function pageprint_retprc($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard GA';
			$data['menu']='ga';
			$data['menulist']='report_ga';
			$this->load->view('menu/administrator/ga/retprc_print',$data);
		}

		//Ajax CRUD
		public function ajax_filter_po()
		{

			$list = $this->lap_po->get_datatables();
			
			$data = array();
			$no = $_POST['start'];
			foreach ($list as $dat) {
				$no++;
				$row = array();
				$row[] = $no;
				$row[] = $dat->POGA_CODE;
				// $row[] = $dat->APPR_CODE;
				$row[] = $dat->SUPP_NAME;
				$row[] = $dat->POGA_ORDNUM;				
				$row[] = $dat->POGA_DATE;				
				$row[] = '<center><a href="javascript:void(0)" title="Pilih Data" class="btn btn-sm btn-info btn-responsive" onclick="pick_po('."'".$dat->POGA_ID."'".')"><span class="glyphicon glyphicon-print"></span> Print</a></center>';
				$data[] = $row;
			}
			$output = array(
							"draw" => $_POST['draw'],
							"recordsTotal" => $this->lap_po->count_all(),
							"recordsFiltered" => $this->lap_po->count_filtered(),
							"data" => $data,
					);			
			echo json_encode($output);
		}


		public function ajax_simpanpo()
		{			
			$data = array(	                
	                'user_id' => $this->input->post('user_id'),
	                'curr_id' => $this->input->post('curr_id'),
	                'supp_id' => $this->input->post('supp_id'),
	                'poga_sts' => '1',
	                'poga_date' => $this->input->post('po_tgl'),
	                'poga_ordnum' => $this->input->post('po_so'),
	                'poga_term' => $this->input->post('po_term'),
	                'poga_info' => $this->input->post('po_info'),
	                'poga_sub' => $this->input->post('po_subs'),
	                'poga_gtotal' => $this->input->post('po_subs')	                
	            );
	        $update = $this->crud->update('trx_po_ga',$data,array('poga_id' => $this->input->post('po_id')));
	        echo json_encode(array("status" => TRUE));
		}

		public function ajax_add_brg()
	    {	        
	      	$table = 'poga_details';
	        $data = array(
	                'poga_id' => $this->input->post('po_id'),
	                'gd_id' => $this->input->post('gd_id'),
	                'pgdet_qtyunit' => $this->input->post('po_qty'),
	                'pgdet_sub' => $this->input->post('po_sub')
	            );
	        $insert = $this->crud->save($table,$data);
	        echo json_encode(array("status" => TRUE));
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
				$row[] = $dat->PGDET_QTYUNIT;
				$row[] = $dat->PGDET_SUB;
				$row[] = '<a href="javascript:void(0)" title="Hapus Data" class="btn btn-sm btn-danger btn-responsive" onclick="del_brg('."'".$dat->PGDET_ID."'".')"><span class="glyphicon glyphicon-remove"></span></a>';
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

		public function ajax_sub_ga($id)
	    {
	    	$data = $this->crud->sub_po_ga($id);
        	echo json_encode($data);
	    }

	    public function ajax_pick_po($id)
		{
			$data = $this->crud->get_by_id('trx_po_ga',array('poga_id' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_supp($id)
		{
			$data = $this->crud->get_by_id('master_supplier',array('supp_id' => $id));
        	echo json_encode($data);
		}

		public function ajax_pick_podet($id)
		{
			$data = $this->crud->get_by_id3('poga_details','master_goods','trx_po_ga',array('poga_details.poga_id' => $id),'master_goods.gd_id = poga_details.gd_id','trx_po_ga.poga_id = poga_details.poga_id');
        	echo json_encode($data);
		}
	}
?>