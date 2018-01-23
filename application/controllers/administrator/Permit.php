<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Permit extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('CRUD/M_crud','crud');
			$this->load->model('CRUD/M_gen','gen');
		}

		public function index()
		{
			$data['title']='Match Terpadu';
			$data['menu']='permit';
			$data['menulist']='dash_permit';
			$data['isi']='menu/administrator/permit/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function gen_permitappr()
		{
			$gen = $this->gen->gen_numpermitappr();
			$data['id'] = $gen['insertId'];
			$data['kode'] = $gen['pappr_code'];
			// $data['id'] = '3';
			// $data['kode'] = 'AB/1712/000003';
			// $data['status'] = TRUE;
			echo json_encode($data);
		}

		public function permit_approval()
		{
			$data['title']='Match Terpadu';
			$data['menu']='permit';
			$data['menulist']='permit_appr';
			$data['isi']='menu/administrator/permit/permit_approval';
			$this->load->view('layout/administrator/wrapper',$data);
		}

		public function print_permitappr($id)
		{
			$data['id']=$id;
			$data['title']='Match Terpadu - Dashboard Finance';
			$data['menu']='finance';
			$data['menulist']='report_inv';
			$this->load->view('menu/administrator/permit/print_permitappr',$data);
		}

		//CRUD
		public function save_permitappr()
		{
			$this->_validate_pi();
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'appr_id' => $this->input->post('appr_id'),
				'gov_id' => $this->input->post('gov_id'),
				'cust_id' => $this->input->post('cust_id'),
				'bb_id' => $this->input->post('bb_id'),
				'loc_id' => $this->input->post('loc_id'),
				'plc_id' => $this->input->post('plc_id'),
				'prmttyp_id' => $this->input->post('prmttyp_id'),
				'pappr_code' => $this->input->post('pi_code'),
				'pappr_urg' => $this->input->post('pi_urg'),
				'pappr_width' => $this->input->post('pi_width'),
				'pappr_length' => $this->input->post('pi_length'),
				'pappr_height' => $this->input->post('pi_height'),
				'pappr_sumsize' => $this->input->post('pi_sumsize'),
				'pappr_plcsum' => $this->input->post('pi_plcsum'),
				'pappr_side' => $this->input->post('pi_side')
			);
			$update = $this->crud->update('trx_permitappr',$data,array('pappr_id' => $this->input->post('pi_id')));
			echo json_encode(array("status"=>TRUE));
		}

		public function add_costpi()
		{
			$this->_validate_costpi();
			$data = array(
				'coa_id' => $this->input->post('pi_accdet'),
				'pappr_id' => $this->input->post('pi_id'),
				'ppay_info' => $this->input->post('pi_costinfo'),
				'ppay_amount' => $this->input->post('pi_costamount')
			);
			$insert = $this->crud->save('permitpay_det',$data);
	        echo json_encode(array("status" => TRUE));
		}

		public function delete_costpi($id)
		{
			$this->crud->delete_by_id('permitpay_det',array('ppay_id' => $id));
        	echo json_encode(array("status" => TRUE));
		}

		public function add_docpi()
		{
			$this->_validate_docpi();
			$data = array(				
				'pappr_id' => $this->input->post('pi_id'),
				'pdoc_datestart' => $this->input->post('pidet_datestart'),
				'pdoc_dateend' => $this->input->post('pidet_dateend'),
				'pdoc_datercv' => $this->input->post('pidet_datercv'),
				'pdoc_rcvnum' => $this->input->post('pidet_rcvnum')
			);
			$insert = $this->crud->save('permitdoc_det',$data);
	        echo json_encode(array("status" => TRUE));
		}

		public function delete_docpi($id)
		{
			$this->crud->delete_by_id('permitdoc_det',array('pdoc_id' => $id));
        	echo json_encode(array("status" => TRUE));
		}

		public function _validate_pi()
	    {
	    	$data = array();
	        $data['error_string'] = array();
	        $data['inputerror'] = array();
	        $data['status'] = TRUE;
	 
	        if($this->input->post('pi_locid') == '')
	        {
	            $data['inputerror'][] = 'pi_loc';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('pi_bbtypeid') == '')
	        {
	            $data['inputerror'][] = 'pi_bbtype';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('pi_plcid') == '')
	        {
	            $data['inputerror'][] = 'pi_plc';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('pi_pattypeid') == '')
	        {
	            $data['inputerror'][] = 'pi_pattype';
	            $data['status'] = FALSE;
	        }

	        if($data['status'] === FALSE)
	        {
	            echo json_encode($data);
	            exit();
	        }
	    }

		public function _validate_costpi()
	    {
	    	$data = array();
	        $data['error_string'] = array();
	        $data['inputerror'] = array();
	        $data['status'] = TRUE;
	 
	        if($this->input->post('pi_accdet') == '')
	        {
	            $data['inputerror'][] = 'pi_accdet';	            
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('pi_costinfo') == '')
	        {
	            $data['inputerror'][] = 'pi_costinfo';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('pi_costamount') == '')
	        {
	            $data['inputerror'][] = 'pi_costamount';
	            $data['status'] = FALSE;
	        }

	        if($data['status'] === FALSE)
	        {
	            echo json_encode($data);
	            exit();
	        }
	    }

		public function _validate_docpi()
	    {
	    	$data = array();
	        $data['error_string'] = array();
	        $data['inputerror'] = array();
	        $data['status'] = TRUE;
	 
	        if($this->input->post('pidet_datestart') == '')
	        {
	            $data['inputerror'][] = 'pidet_datestart';	            
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('pidet_dateend') == '')
	        {
	            $data['inputerror'][] = 'pidet_dateend';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('pidet_datercv') == '')
	        {
	            $data['inputerror'][] = 'pidet_datercv';
	            $data['status'] = FALSE;
	        }

	        if($this->input->post('pidet_rcvnum') == '')
	        {
	            $data['inputerror'][] = 'pidet_rcvnum';
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