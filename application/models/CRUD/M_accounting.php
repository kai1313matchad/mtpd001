<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_accounting extends CI_Model
	{
		//Fungsi Untuk Laporan Buku Besar
		public function gen_ledger($brc,$coa,$datestr,$dateend)
		{
			if($brc != NULL)
			{
				$this->db->where('b.branch_id',$brc);
			}
			if($coa != NULL)
			{
				$this->db->where('b.coa_id',$coa);
			}
			if ($datestr != NULL AND $dateend != NULL)
			{
				$this->db->where('b.jou_date >=', $datestr);
        		$this->db->where('b.jou_date <=', $dateend);
			}
			$this->db->from('jou_details a');
			$this->db->join('account_journal b','b.jou_id = a.jou_id');
			$this->db->join('chart_of_account c','c.coa_id = a.coa_id');
			$this->db->join('master_branch d','d.branch_id = b.branch_id');
			$que = $this->db->get();
			return $que->result();		
		}

		public function gen_saldostr($brc,$coa,$datestr,$dateend)
		{
			if($brc != NULL)
			{
				$this->db->where('b.branch_id',$brc);
			}
			if($coa != NULL)
			{
				$this->db->where('b.coa_id',$coa);
			}
			if ($datestr != NULL AND $dateend != NULL)
			{
				$this->db->where('b.jou_date >=', $datestr);
        		$this->db->where('b.jou_date <=', $dateend);
			}
			$this->db->select('c.COA_ACC, c.COA_ACCNAME, c.COA_DEBIT, c.COA_CREDIT');
			$this->db->from('jou_details a');
			$this->db->join('account_journal b','b.jou_id = a.jou_id');
			$this->db->join('chart_of_account c','c.coa_id = a.coa_id');
			$this->db->join('master_branch d','d.branch_id = b.branch_id');
			$this->db->group_by('a.coa_id');
			$que = $this->db->get();
			// $res = $que->result();
			// $data = array();
			// foreach ($res as $dat)
			// {
			// 	$this->db->select();
			// 	$this->db->from('jou_details a');
			// 	$this->db->join();
			// 	$data[]=array('a'=>$dat->COA_ID,'b'=>$dat->COA_ACCNAME);
			// }
			// return $data;
			return $que->result();
		}
	}
?>