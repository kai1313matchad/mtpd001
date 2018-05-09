<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_finance extends CI_Model
	{
		//Fungsi untuk cek pemakaian Invoice di tabel lain
		public function check_inv($tb,$id,$sts)
		{
			$que = ($sts != null)?$this->db->get_where($tb,array('inv_id'=>$id,$sts=>'1')):$this->db->get_where($tb,$id);
			$cou = $que->num_rows();
			return $cou;
		}

		//Funsgi ambil log history untuk Invoice
		public function getlog_inv($id)
		{
			$this->db->where('inv_id',$id);
	    	$this->db->where('hisinv_upcount = (select max(hisinv_upcount) from his_inv where inv_id = '.$id.')');
			$que = $this->db->get('his_inv');
			return $que->row();
		}

		//Fungsi ambil log histori untuk Kas Masuk
		public function getlog_cashin($id)
		{
			$this->db->where('csh_id',$id);
			$this->db->where('hischin_upcount = (select max(hischin_upcount) from his_cashin where csh_id = '.$id.')');
			$que = $this->db->get('his_cashin');
			return $que->row();
		}

		//Fungsi ambil log histori untuk Kas Masuk
		public function getlog_cashout($id)
		{
			$this->db->where('csho_id',$id);
			$this->db->where('hiscsho_upcount = (select max(hiscsho_upcount) from his_cashout where csho_id = '.$id.')');
			$que = $this->db->get('his_cashout');
			return $que->row();
		}

		//Fungsi ambil log histori untuk Bank Masuk
		public function getlog_bankin($id)
		{
			$this->db->where('bnk_id',$id);
			$this->db->where('hisbnk_upcount = (select max(hisbnk_upcount) from his_bankin where bnk_id = '.$id.')');
			$que = $this->db->get('his_bankin');
			return $que->row();
		}

		//Fungsi ambil log histori untuk Bank keluar
		public function getlog_bankout($id)
		{
			$this->db->where('bnko_id',$id);
			$this->db->where('hisbnko_upcount = (select max(hisbnko_upcount) from his_bankout where bnko_id = '.$id.')');
			$que = $this->db->get('his_bankout');
			return $que->row();
		}

		//Fungsi ambil nilai jumlah detail kas masuk
		public function get_sumcashindet($id)
		{
			$this->db->select('sum(cshdetin_amount) as amount');
		    $this->db->from('cashin_det');
	    	$this->db->where('csh_id',$id);
	    	$get = $this->db->get()->row();
	    	return $get->amount;
		}

		//Fungsi ambil nilai jumlah detail kas keluar
		public function get_sumcashoutdet($id)
		{
			$this->db->select('sum(cshodet_amount) as amount');
		    $this->db->from('cashout_det');
	    	$this->db->where('csho_id',$id);
	    	$get = $this->db->get()->row();
	    	return $get->amount;
		}

		//Fungsi ambil nilai jumlah detail bank masuk
		public function get_sumbankindet($id)
		{
			$this->db->select('sum(bnkdet_amount) as amount');
		    $this->db->from('bankin_det');
	    	$this->db->where('bnk_id',$id);
	    	$get = $this->db->get()->row();
	    	return $get->amount;
		}

		//Fungsi ambil nilai jumlah detail bank keluar
		public function get_sumbankoutdet($id)
		{
			$this->db->select('sum(bnkodet_amount) as amount');
		    $this->db->from('bankout_det');
	    	$this->db->where('bnko_id',$id);
	    	$get = $this->db->get()->row();
	    	return $get->amount;
		}

		//Fungsi ambil id untuk hapus data buku kas
		public function get_idbukukas($brc,$code,$coa)
		{
			$this->db->where('branch_id',$brc);
			$this->db->where('csh_code',$code);
			$this->db->where('coa_id',$coa);
			$get = $this->db->get('buku_kas')->row();
			return $ret = $get->CSHBOOK_ID;
		}

		//Fungsi ambil id untuk hapus data buku bank
		public function get_idbukubank($brc,$code,$coa)
		{
			$this->db->where('branch_id',$brc);
			$this->db->where('bnk_code',$code);
			$this->db->where('coa_id',$coa);
			$get = $this->db->get('buku_bank')->row();
			return $ret = $get->BNKBOOK_ID;
		}

		//Fungsi ambil id untuk hapus data buku giro
		public function get_idbukugiro($brc,$code,$gr)
		{
			$this->db->where('branch_id',$brc);
			$this->db->where('bnk_code',$code);
			$this->db->where('gr_number',$gr);
			$get = $this->db->get('buku_giro')->row();
			return $ret = $get->GRBOOK_ID;
		}

		//Fungsi ambil id untuk hapus data record giro masuk
		public function get_idgiroinrc($code,$gr)
		{
			$this->db->where('bnktrx_id',$code);
			$this->db->where('gir_reffcode',$gr);
			$get = $this->db->get('giroin_record')->row();
			return $ret = $get->GIR_ID;
		}

		//Fungsi ambil id untuk hapus data record giro keluar
		public function get_idgirooutrc($code,$gr)
		{
			$this->db->where('bnktrxo_id',$code);
			$this->db->where('gor_reffcode',$gr);
			$get = $this->db->get('giroout_record')->row();
			return $ret = $get->GOR_ID;
		}

		public function get_cashsaldosum($table,$sumfield,$tabledet,$idjoin,$datefield,$brc,$coa,$date)
		{
			$this->db->select($sumfield);
			$this->db->from($table);
			$this->db->join('master_branch b','b.branch_id = a.branch_id');
			$this->db->join('chart_of_account c','c.coa_id = a.coa_id');
			$this->db->join($tabledet,$idjoin);
			$this->db->where('b.branch_id', $brc);
			$this->db->where('a.coa_id', $coa);
			$this->db->where($datefield, $date);
			$this->db->group_by('a.coa_id');
			$que = $this->db->get();
			$data = ($que->num_rows() != NULL)?$que->row()->SUM:0;
			return $data;
		}

		public function get_notafinsum($table,$sumfield,$tabledet,$idjoin,$datefield,$brc,$coa,$date)
		{
			$this->db->select($sumfield);
			$this->db->from($table);
			$this->db->join('master_branch b','b.branch_id = a.branch_id');
			$this->db->join('chart_of_account c','c.coa_id = a.coa_id');
			$this->db->join($tabledet,$idjoin);
			$this->db->where('b.branch_id', $brc);
			$this->db->where('d.coa_id', $coa);
			$this->db->where($datefield, $date);
			$this->db->group_by('a.coa_id');
			$que = $this->db->get();
			$data = ($que->num_rows() != NULL)?$que->row()->SUM:0;
			return $data;
		}
	}
?>