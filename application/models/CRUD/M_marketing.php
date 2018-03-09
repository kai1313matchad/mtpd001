<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_marketing extends CI_Model
	{
		//Fungsi untuk cek pemakaian approval di tabel lain
		public function check_appr($tb,$id,$sts)
		{
			$que = ($sts != null)?$this->db->get_where($tb,array('appr_id'=>$id,$sts=>'1')):$this->db->get_where($tb,array('appr_id'=>$id));
			$cou = $que->num_rows();
			return $cou;
		}

		//Funsgi simpan history untuk approval
		public function getlog_appr($id)
		{
			$this->db->where('appr_id',$id);
	    	$this->db->where('hisappr_upcount = (select max(hisappr_upcount) from his_approvalbill where appr_id = '.$id.')');
			$que = $this->db->get('his_approvalbill');
			return $que->row();
		}
	}
?>