<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dt_lap_retprc_ga extends CI_Model 
	{

		var $table = 'prcga_ret';
		var $column_order = array(null,'rtprcga_code','prcga_date');
		var $column_search = array('rtprcga_code', 'prcga_code', 'rtprcga_date');
		var $order = array('prcga_ret.rtprcga_id' => 'desc');
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query()
		{	
			if ($this->input->post('nopem')) {
				$this->db->like('RTPRCGA_CODE', $this->input->post('nopem') );
			}

			if ($this->input->post('tgl1') != null AND $this->input->post('tgl2') != null ) {
				$this->db->where('RTPRCGA_DATE >=', $this->input->post('tgl1'));
        		$this->db->where('RTPRCGA_DATE <=', $this->input->post('tgl2'));  
			}

			
			$this->db->from($this->table);
			$this->db->join('trx_prc_ga','trx_prc_ga.prcga_id = prcga_ret.prcga_id');			
			// $this->db->join('trx_approvalbill','trx_approvalbill.appr_id = trx_po_ga.appr_id');
			// $this->db->join('master_customer','master_customer.cust_id = trx_approvalbill.cust_id');

			// $tampilkan = array('PO_ORDNUM' => $isi);
   //      	$this->db->where($tampilkan);	
			$i = 0;
			foreach ($this->column_search as $item)
			{
				if($_POST['search']['value'])
				{			
					if($i===0)
					{
						$this->db->group_start();
						$this->db->like($item, $_POST['search']['value']);
					}
					else
					{
						$this->db->or_like($item, $_POST['search']['value']);
					}

					if(count($this->column_search) - 1 == $i)
						$this->db->group_end();
				}
				$i++;
			}		
			if(isset($_POST['order']))
			{
				$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
			} 
			else if(isset($this->order))
			{
				$order = $this->order;
				$this->db->order_by(key($order), $order[key($order)]);
			}
		}

		public function get_datatables()
		{
			$this->_get_datatables_query();
			if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
			return $query->result();
		}
		public function count_filtered()
		{
			$this->_get_datatables_query();
			$query = $this->db->get();
			return $query->num_rows();
		}
		public function count_all()
		{
			$this->db->from($this->table);
			return $this->db->count_all_results();
		}
	}
?>