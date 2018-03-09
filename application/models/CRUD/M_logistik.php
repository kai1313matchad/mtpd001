<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_logistik extends CI_Model
	{
		//Fungsi untuk laporan stock
		public function get_allgd()
		{
			if ($this->input->post('branch')) 
			{
				$this->db->like('a.branch_id',$this->input->post('branch'));
			}
			$this->db->from('master_goods a');
			$this->db->join('master_branch b','b.branch_id = a.branch_id');
			$this->db->where('a.gd_dtsts','1');
			$this->db->where('a.gd_typestock','0');
			$que = $this->db->get();
			return $que->result();
		}

		public function get_prcgd()
		{
			if ($this->input->post('branch')) 
			{
				$this->db->like('c.branch_id',$this->input->post('branch'));
			}
			if ($this->input->post('date_start') != null AND $this->input->post('date_end') != null ) {
				$this->db->where('b.prc_date >=', $this->input->post('date_start'));
        		$this->db->where('b.prc_date <=', $this->input->post('date_end'));  
			}
			$this->db->select('c.gd_id, c.gd_name, sum(a.prcdet_qty) as sub');
			$this->db->from('prc_details a');
			$this->db->join('trx_procurement b','b.prc_id = a.prc_id');
			$this->db->join('master_goods c','c.gd_id = a.gd_id');
			$this->db->where('c.gd_typestock','0');
			$this->db->group_by('a.gd_id');
			$que = $this->db->get();
			return $que->result();
		}

		public function get_retprcgd()
		{
			if ($this->input->post('branch')) 
			{
				$this->db->like('c.branch_id',$this->input->post('branch'));
			}
			if ($this->input->post('date_start') != null AND $this->input->post('date_end') != null ) {
				$this->db->where('b.rtprc_date >=', $this->input->post('date_start'));
        		$this->db->where('b.rtprc_date <=', $this->input->post('date_end'));  
			}
			$this->db->select('c.gd_id, c.gd_name, sum(a.retprcdet_qty) as sub');
			$this->db->from('retprc_details a');
			$this->db->join('procurement_ret b','b.rtprc_id = a.rtprc_id');
			$this->db->join('master_goods c','c.gd_id = a.gd_id');
			$this->db->where('c.gd_typestock','0');
			$this->db->group_by('a.gd_id');
			$que = $this->db->get();
			return $que->result();
		}

		public function get_usggd()
		{
			if ($this->input->post('branch')) 
			{
				$this->db->like('c.branch_id',$this->input->post('branch'));
			}
			if ($this->input->post('date_start') != null AND $this->input->post('date_end') != null ) {
				$this->db->where('b.usg_date >=', $this->input->post('date_start'));
        		$this->db->where('b.usg_date <=', $this->input->post('date_end'));  
			}
			$this->db->select('c.gd_id, c.gd_name, sum(a.usgdet_qty) as sub');
			$this->db->from('usage_details a');
			$this->db->join('trx_usage b','b.usg_id = a.usg_id');
			$this->db->join('master_goods c','c.gd_id = a.gd_id');
			$this->db->where('c.gd_typestock','0');
			$this->db->group_by('a.gd_id');
			$que = $this->db->get();
			return $que->result();
		}

		public function get_retusggd()
		{
			if ($this->input->post('branch')) 
			{
				$this->db->like('c.branch_id',$this->input->post('branch'));
			}
			if ($this->input->post('date_start') != null AND $this->input->post('date_end') != null ) {
				$this->db->where('b.rtusg_date >=', $this->input->post('date_start'));
        		$this->db->where('b.rtusg_date <=', $this->input->post('date_end'));  
			}
			$this->db->select('c.gd_id, c.gd_name, sum(a.retusgdet_qty) as sub');
			$this->db->from('retusg_details a');
			$this->db->join('usage_ret b','b.rtusg_id = a.rtusg_id');
			$this->db->join('master_goods c','c.gd_id = a.gd_id');
			$this->db->where('c.gd_typestock','0');
			$this->db->group_by('a.gd_id');
			$que = $this->db->get();
			return $que->result();
		}
	}
?>