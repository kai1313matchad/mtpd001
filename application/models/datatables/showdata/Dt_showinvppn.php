<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dt_showinvppn extends CI_Model 
	{

		var $table = 'inv_details a';
		var $column_order = array(null,'inv_code','cust_name');
		var $column_search = array('inv_code','cust_name');
		var $order = array('a.inv_id' => 'desc');
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query($id)
		{
			$this->db->select('b.*,c.*,sum(a.invdet_amount) as tot,sum(a.invdet_sub) as dpp,sum(a.invdet_ppnam) as ppn')
			$this->db->from($this->table);
			$this->db->join('trx_invoice b','b.inv_id=a.inv_id');
			$this->db->join('master_customer c','c.cust_id=b.cust_id');
			$this->db->where('b.branch_id',$id);
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