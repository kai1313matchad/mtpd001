<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dt_showrptappr extends CI_Model 
	{

		var $table = 'trx_approvalbill a';
		var $column_order = array(null,'appr_code','appr_contract_end','loc_name','cust_name','appr_branch','appr_tot_income');
		var $column_search = array('appr_code','appr_contract_end','loc_name','cust_name','appr_branch','appr_tot_income');
		var $order = array('appr_date' => 'desc');
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query()
		{	
			if ($this->input->post('cust_name')) 
			{
				$this->db->like('cust_name', $this->input->post('cust_name') );
			}
			if ($this->input->post('loc_name')) 
			{
				$this->db->like('loc_name', $this->input->post('loc_name') );
			}
			if ($this->input->post('appr_branch')) 
			{
				$this->db->like('appr_branch', $this->input->post('appr_branch') );
			}
			if ($this->input->post('tgl_start') != null AND $this->input->post('tgl_end') != null ) {
				$this->db->where('appr_date >=', $this->input->post('tgl_start'));
        		$this->db->where('appr_date <=', $this->input->post('tgl_end'));  
			}

			$this->db->from($this->table);
			$this->db->join('master_location b','b.loc_id = a.loc_id');			
			$this->db->join('master_customer c','c.cust_id = a.cust_id');
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