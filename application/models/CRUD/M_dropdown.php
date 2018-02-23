<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_dropdown extends CI_Model
	{
		//Dropdown Global
		public function getdrop_branch()
		{
			$this->db->where('branch_dtsts','1');
			$que = $this->db->get('master_branch');
			return $que->result();
		}
	}
?>