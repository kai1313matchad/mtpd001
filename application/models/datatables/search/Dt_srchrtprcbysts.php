<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Dt_srchrtprcbysts extends CI_Model 
	{
		var $table = 'procurement_ret a';
		var $column_order = array(null,'rtprc_id','prc_code','po_code','rtprc_date','appr_code');
		var $column_search = array('rtprc_id','prc_code','po_code','rtprc_date','appr_code');
		var $order = array('a.rtprc_id' => 'desc');
		public function __construct()
		{
			parent::__construct();		
		}
		private function _get_datatables_query($id,$brc)
		{
			$this->db->join('trx_procurement b','b.prc_id = a.prc_id','left');
			$this->db->join('trx_po c','c.po_id = b.po_id','left');
			$this->db->join('trx_approvalbill d','d.appr_id = c.appr_id','left');
			$this->db->join('master_user e','e.user_id = a.user_id','left');
			$this->db->join('master_branch f','f.branch_id = a.branch_id','left');
			$this->db->from($this->table);
			$this->db->where('a.rtprc_sts',$id);
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