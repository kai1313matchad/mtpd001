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
	}
?>