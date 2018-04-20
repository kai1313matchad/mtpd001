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

		//Fungsi ambil id untuk hapus data buku kas
		public function get_idbukukas($brc,$code,$coa)
		{
			$this->db->where('branch_id',$brc);
			$this->db->where('csh_code',$code);
			$this->db->where('coa_id',$coa);
			$get = $this->db->get('buku_kas')->row();
			return $ret = $get->CSHBOOK_ID;
		}
	}
?>