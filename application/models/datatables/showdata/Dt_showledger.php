<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dt_showledger extends CI_Model 
	{

		var $table = 'jou_details a';
		var $column_order = array(null,'jou_code','jou_date','jou_reff','coa_acc','joudet_debit','joudet_credit');
		var $column_search = array('jou_code','jou_date','jou_reff','coa_acc','joudet_debit','joudet_credit');
		var $order = array('a.jou_id' => 'asc');
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query()
		{
			if ($this->input->post('coaid')) 
			{
				$this->db->where('a.coa_id', $this->input->post('coaid') );
			}
			if ($this->input->post('date_start') != null AND $this->input->post('date_end') != null ) {
				$this->db->where('b.jou_date >=', $this->input->post('date_start'));
        		$this->db->where('b.jou_date <=', $this->input->post('date_end'));
			}

			$this->db->from($this->table);
			$this->db->join('account_journal b','b.jou_id = a.jou_id');
			$this->db->join('chart_of_account c','c.coa_id = a.coa_id');
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