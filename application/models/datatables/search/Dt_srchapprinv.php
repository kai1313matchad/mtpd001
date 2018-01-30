<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dt_srchapprinv extends CI_Model 
	{

		var $table = 'inv_details a';
		var $column_order = array(null,'appr_code','appr_date','cust_name','loc_name');
		var $column_search = array('appr_code','appr_date','cust_name','loc_name');
		var $order = array('a.inv_id' => 'desc');
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query($id)
		{
			$this->db->from($this->table);
			$this->db->join('trx_invoice b','b.inv_id = a.inv_id');
			$this->db->join('appr_terms_det c','c.termsdet_id = a.invdet_termid');
			$this->db->join('trx_approvalbill d','d.appr_id = c.appr_id');
			$this->db->join('master_customer e','e.cust_id = d.cust_id');	
			$this->db->join('master_location f','f.loc_id = d.loc_id');
			$this->db->where('a.inv_id',$id);
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
		public function get_datatables($id)
		{
			$this->_get_datatables_query($id);
			if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
			return $query->result();
		}
		public function count_filtered($id)
		{
			$this->_get_datatables_query($id);
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