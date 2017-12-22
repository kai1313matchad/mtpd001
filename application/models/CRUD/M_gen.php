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
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['csh_code'] = $res;
			return  $out;
		}

		//Gen Nomor PO GA
		public function gen_numpoga()
		{
			$res = $this->gen_num_('trx_po_ga','poga_code','PG');
			$check = $this->db->get_where('trx_po_ga',array('poga_code' => $res));
			if($check->row() > 0)
			{
				$res = $this->gen_num_('trx_po_ga','poga_code','PG');
			}
			$data = array(
					'poga_code'=>$res,
					'poga_sts'=>'0'
				);			
			$this->db->insert('trx_po_ga',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['poga_code'] = $res;
			return  $out;
		}

		public function gen_numpolgt()
		{
			$res = $this->gen_num_('trx_po','po_code','PO');
			$check = $this->db->get_where('trx_po',array('po_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('trx_po','po_code','PO');
			}
			$data = array(
					'po_code'=>$res,
					'po_sts'=>'0'
				);			
			$this->db->insert('trx_po',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['po_code'] = $res;
			return  $out;
		}

		public function gen_numbllgt()
		{
			$res = $this->gen_num_('trx_procurement','prc_code','BL');
			$check = $this->db->get_where('trx_procurement',array('prc_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('trx_procurement','prc_code','BL');
			}
			$data = array(
					'prc_code'=>$res,
					'prc_sts'=>'0'
				);			
			$this->db->insert('trx_procurement',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['prc_code'] = $res;
			return  $out;
		}

		public function gen_numretlgt()
		{
			$res = $this->gen_num_('procurement_ret','rtprc_code','RB');
			$check = $this->db->get_where('procurement_ret',array('rtprc_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('procurement_ret','rtprc_code','RB');
			}
			$data = array(
					'rtprc_code'=>$res,
					'rtprc_sts'=>'0'
				);			
			$this->db->insert('procurement_ret',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['rtprc_code'] = $res;
			return  $out;
		}

		public function gen_numusagelgt()
		{
			$res = $this->gen_num_('trx_usage','usg_code','PK');
			$check = $this->db->get_where('trx_usage',array('usg_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('trx_usage','usg_code','PK');
			}
			$data = array(
					'usg_code'=>$res,
					'usg_sts'=>'0'
				);			
			$this->db->insert('trx_usage',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['usg_code'] = $res;
			return  $out;
		}

		public function gen_num_retusagelgt()
		{
			$res = $this->gen_num_('usage_ret','rtusg_code','RP');
			$check = $this->db->get_where('usage_ret',array('rtusg_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('usage_ret','rtusg_code','RP');
			}
			$data = array(
					'rtusg_code'=>$res,
					'rtusg_sts'=>'0'
				);			
			$this->db->insert('usage_ret',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['rtusg_code'] = $res;
			return  $out;
		}

		public function gen_num_adjlgt()
		{
			$res = $this->gen_num_('trx_adjustment','adj_code','PS');
			$check = $this->db->get_where('trx_adjustment',array('adj_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('trx_adjustment','adj_code','PS');
			}
			$data = array(
					'adj_code'=>$res,
					'adj_dtsts'=>'0'
				);			
			$this->db->insert('trx_adjustment',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['adj_code'] = $res;
			return  $out;
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

		//Gen Nomor BAPP
		public function gen_numbapp()
		{
			$res = $this->gen_num_('trx_bapp','bapp_code','BA');			
			$check = $this->db->get_where('trx_bapp',array('bapp_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('trx_bapp','bapp_code','BA');
			}
			$data = array(
					'bapp_code'=>$res,
					'bapp_sts'=>'0'
				);			
			$this->db->insert('trx_bapp',$data);
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['bapp_code'] = $res;
			// $data2 = array(
			// 		'appr_id' => $insID,
			// 		'hisappr_sts' => 'Void By System',
			// 		'hisappr_old' => 'None',
			// 		'hisappr_new' => 'None',
			// 		'hisappr_info' => 'Create By System',
			// 		'hisappr_upcount' => 0
			// 	);
			// $this->db->insert('his_approvalbill',$data2);
			return  $out;
		}
	}
?>