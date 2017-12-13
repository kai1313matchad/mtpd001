<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_gen extends CI_Model
	{
		//Gen Nomor Transaksi
		public function gen_num_($tb,$col,$affix)
		{
			$this->db->select_max($col,'code');
			$que = $this->db->get($tb);
			$ext = $que->row();
			$max = $ext->code;
			$mon = substr($max,3,4);			
			if($max == null || $mon != date('ym'))
			{
				$max = $affix.'/'.date('ym').'/000000';
			}
			$num = (int) substr($max,8,6);
			$num++;
			$kode = $affix.'/'.date('ym').'/';
			$res = $kode . sprintf('%06s',$num);
			return $res;
		}

		//Gen Nomor Kas Masuk
		public function gen_numcashin()
		{
			$res = $this->gen_num_('trx_cash_in','csh_code','KM');
			$check = $this->db->get_where('trx_cash_in',array('csh_code' => $res));
			if($check->row() > 0)
			{
				$res = $this->gen_num_('trx_cash_in','csh_code','KM');
			}
			$data = array(
					'csh_code'=>$res,
					'csh_sts'=>'0'
				);			
			$this->db->insert('trx_cash_in',$data);
			$insertId = $this->db->insert_id();
			return  $insertId;
		}

		//Gen Nomor Approval
		public function gen_numappr()
		{
			$res = $this->gen_num_('trx_approvalbill','appr_code','AB');			
			$check = $this->db->get_where('trx_approvalbill',array('appr_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('trx_approvalbill','appr_code','AB');
			}
			$data = array(
					'appr_code'=>$res,
					'appr_sts'=>'0'
				);			
			$this->db->insert('trx_approvalbill',$data);
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['appr_code'] = $res;
			$data2 = array(
					'appr_id' => $insID,
					'hisappr_sts' => 'Void By System',
					'hisappr_old' => 'None',
					'hisappr_new' => 'None',
					'hisappr_info' => 'Create By System',
					'hisappr_upcount' => 0
				);
			$this->db->insert('his_approvalbill',$data2);
			return  $out;
		}
	}
?>