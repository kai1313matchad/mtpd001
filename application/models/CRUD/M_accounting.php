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
				$this->db->where('a.coa_id',$coa);
			}
			if($datestr != NULL AND $dateend != NULL)
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

		public function gen_ledger2($brc,$coa,$datestr,$dateend)
		{
			if($coa != NULL) 
			{
				$this->db->where('a.coa_id',$coa);
			}
			if($brc != NULL) 
			{
				$this->db->where('b.branch_id',$brc);
			}
			if($datestr != NULL AND $dateend != NULL)
			{
				$this->db->where('b.jou_date >=',$datestr);
        		$this->db->where('b.jou_date <=',$dateend);
			}
			$this->db->select('c.*,b.*,d.*,
				sum(a.joudet_debit) as md,
				sum(a.joudet_credit) as mc
				');
			$this->db->from('jou_details a');
			$this->db->join('account_journal b','b.jou_id = a.jou_id');
			$this->db->join('chart_of_account c','c.coa_id = a.coa_id');
			$this->db->join('master_branch d','d.branch_id = b.branch_id');
			$this->db->group_by('a.coa_id');
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
				$this->db->where('a.coa_id',$coa);
			}
			if ($datestr != NULL AND $dateend != NULL)
			{
				$this->db->where('b.jou_date >=', $datestr);
        		$this->db->where('b.jou_date <=', $dateend);
			}
			$date_ = $datestr;
			$this->db->select('c.COA_ID, c.COA_ACC, c.COA_ACCNAME, c.COA_DEBIT, c.COA_CREDIT');
			$this->db->from('jou_details a');
			$this->db->join('account_journal b','b.jou_id = a.jou_id');
			$this->db->join('chart_of_account c','c.coa_id = a.coa_id');
			$this->db->join('master_branch d','d.branch_id = b.branch_id');
			$this->db->group_by('a.coa_id');
			$que = $this->db->get();
			$res = $que->result();
			$data = array();
			foreach ($res as $dat)
			{
				$get = $this->get_saldostr_($dat->COA_ID,$datestr,$brc);
				$data[]=array(
					'COA_ACC'=>$dat->COA_ACC,
					'COA_ACCNAME'=>$dat->COA_ACCNAME,
					'SUM_DEBIT'=>($get['SUM_DEBIT'] != NULL)?$get['SUM_DEBIT']:'0',
					'SUM_CREDIT'=>($get['SUM_CREDIT'] != NULL)?$get['SUM_CREDIT']:'0',
					'COA_DEBIT'=>$dat->COA_DEBIT,
					'COA_CREDIT'=>$dat->COA_CREDIT
				);
			}
			return $data;
		}

		public function get_saldostr_($coa,$date,$brc)
		{
			if($brc != NULL)
			{
				$this->db->where('b.branch_id',$brc);
			}
			$this->db->select('c.COA_ACC, c.COA_ACCNAME, SUM(a.JOUDET_DEBIT) as SUM_DEBIT, SUM(a.JOUDET_CREDIT) as SUM_CREDIT, c.COA_DEBIT, c.COA_CREDIT');
			$this->db->from('jou_details a');
			$this->db->join('account_journal b','b.jou_id = a.jou_id');
			$this->db->join('chart_of_account c','c.coa_id = a.coa_id');
			$this->db->join('master_branch d','d.branch_id = b.branch_id');
			$this->db->where('b.jou_date <', $date);
			$this->db->where('a.coa_id', $coa);
			$this->db->group_by('a.coa_id');
			$query = $this->db->get();
			$get = $query->row_array();
			return $get;
		}

		public function gen_saldostr2($brc,$coa,$datestr)
		{
			if($coa != NULL) 
			{
				$this->db->where('a.coa_id',$coa);
			}
			if($brc != NULL) 
			{
				$this->db->where('b.branch_id',$brc);
			}
			$this->db->where('b.jou_date <', $datestr);
			$this->db->select('c.*,b.*,
				sum(a.joudet_debit) as ssd,
				sum(a.joudet_credit) as ssc
				');
			$this->db->from('jou_details a');
			$this->db->join('account_journal b','b.jou_id = a.jou_id');
			$this->db->join('chart_of_account c','c.coa_id = a.coa_id');
			$this->db->join('master_branch d','d.branch_id = b.branch_id');
			$this->db->group_by('a.coa_id');
			$que = $this->db->get();
			return $que->result();
		}

		//Fungsi untuk Laba Rugi
		public function gen_income($brc,$coa,$datestr,$dateend)
		{
			if($coa != NULL) 
			{
				$this->db->where('a.coa_id',$coa);
			}
			if ($brc != NULL)
			{
				$this->db->where('b.branch_id',$brc);
			}
			if($datestr != NULL AND $dateend != NULL)
			{
				$this->db->where('b.jou_date >=',$datestr);
        		$this->db->where('b.jou_date <=',$dateend);
			}
			$this->db->select('c.*,sum(a.joudet_debit - a.joudet_credit) as saldo');
			$this->db->from('jou_details a');
			$this->db->join('account_journal b','b.jou_id = a.jou_id');
			$this->db->join('chart_of_account c','c.coa_id = a.coa_id');
			$this->db->join('master_branch d','d.branch_id = b.branch_id');
			$this->db->join('parent_chart e','e.par_id = c.par_id');
			$this->db->join('parent_type f','f.partp_id = e.partp_id');
			$this->db->where('f.partp_sts','4');
			$this->db->group_by('a.coa_id');
			$que = $this->db->get();
			return $que->result();
		}
	}
?>