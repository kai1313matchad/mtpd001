<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dt_srchpobysts extends CI_Model 
	{
		var $table = 'trx_po a';
		var $column_order = array(null,'po_code','appr_code','po_date','loc_name','supp_name');
		var $column_search = array('po_code','appr_code','po_date','loc_name','supp_name');
		var $order = array('a.po_id' => 'desc');
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query($id,$brc)
		{
			$this->db->join('trx_approvalbill b','b.appr_id = a.appr_id','left');
			$this->db->join('master_location c','c.loc_id = a.loc_id','left');
			$this->db->join('master_supplier d','d.supp_id = a.supp_id','left');
			$this->db->join('master_user e','e.user_id = a.user_id','left');
			$this->db->join('master_branch f','f.branch_id = a.branch_id','left');
			$this->db->from($this->table);
			$this->db->where('a.po_sts',$id);
			$this->db->where($brc);
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
		public function get_datatables($id,$brc)
		{
			$this->_get_datatables_query($id,$brc);
			if($_POST['length'] != -1)
			$this->db->limit($_POST['length'], $_POST['start']);
			$query = $this->db->get();
			return $query->result();
		}
		public function count_filtered($id,$brc)
		{
			$this->_get_datatables_query($id,$brc);
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