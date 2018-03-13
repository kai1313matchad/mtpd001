<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class M_gen extends CI_Model
	{
		//Generate Angka to Terbilang
		public function number_conv($value)
		{
			$nilai = abs($value);
			$huruf = array("", "Satu", "Dua", "Tiga", "Empat", "Lima", "Enam", "Tujuh", "Delapan", "Sembilan", "Sepuluh", "Sebelas");
			$temp = "";
			if ($nilai < 12) 
			{
				$temp = " ". $huruf[$nilai];
			} 
			else if ($nilai <20) 
			{
				$temp = $this->number_conv($nilai - 10). " Belas ";
			} 
			else if ($nilai < 100) 
			{
				$temp = $this->number_conv($nilai/10)." Puluh ". $this->number_conv($nilai % 10);
			} 
			else if ($nilai < 200) 
			{
				$temp = " Seratus " . $this->number_conv($nilai - 100);
			} 
			else if ($nilai < 1000) 
			{
				$temp = $this->number_conv($nilai/100) . " Ratus " . $this->number_conv($nilai % 100);
			} 
			else if ($nilai < 2000) 
			{
				$temp = " Seribu " . $this->number_conv($nilai - 1000);
			} 
			else if ($nilai < 1000000) 
			{
				$temp = $this->number_conv($nilai/1000) . " Ribu " . $this->number_conv($nilai % 1000);
			} 
			else if ($nilai < 1000000000) 
			{
				$temp = $this->number_conv($nilai/1000000) . " Juta " . $this->number_conv($nilai % 1000000);
			} 
			else if ($nilai < 1000000000000) 
			{
				$temp = $this->number_conv($nilai/1000000000) . " Milyar " . $this->number_conv(fmod($nilai,1000000000));
			} 
			else if ($nilai < 1000000000000000) 
			{
				$temp = $this->number_conv($nilai/1000000000000) . " Trilyun " . $this->number_conv(fmod($nilai,1000000000000));
			}
			if($value<0) 
			{
				$hasil = "Minus ". trim($temp);
			} 
			else 
			{
				$hasil = trim($temp);
			}
			return $hasil;
		}
		
		//Gen Nomor Transaksi
		public function gen_num_($tb,$col,$affix)
		{
			$this->db->select_max($col,'code');
			$que = $this->db->get($tb);
			$ext = $que->row();
			$max = $ext->code;
			$len = strlen($affix)+1;
			$mon = substr($max,$len,-7);			
			if($max == null || $mon != date('ym'))
			{
				$max = $affix.'/'.date('ym').'/000000';
			}
			// $num = (int) substr($max,8,6);
			$num = (int) substr($max,-6);
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

		//Gen Nomor Kas Keluar
		public function gen_numcashout()
		{
			$res = $this->gen_num_('trx_cash_out','csho_code','KK');
			$check = $this->db->get_where('trx_cash_out',array('csho_code' => $res));
			if($check->row() > 0)
			{
				$res = $this->gen_num_('trx_cash_out','csho_code','KK');
			}
			$data = array(
					'csho_code'=>$res,
					'csho_sts'=>'0'
				);			
			$this->db->insert('trx_cash_out',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['csho_code'] = $res;
			return  $out;
		}

		//Gen Nomor Bank Masuk
		public function gen_numbankin()
		{
			$res = $this->gen_num_('trx_bankin','bnk_code','BM');
			$check = $this->db->get_where('trx_bankin',array('bnk_code' => $res));
			if($check->row() > 0)
			{
				$res = $this->gen_num_('trx_bankin','bnk_code','BM');
			}
			$data = array(
					'bnk_code'=>$res,
					'bnk_sts'=>'0'
				);			
			$this->db->insert('trx_bankin',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['bnk_code'] = $res;
			return  $out;
		}

		//Gen Nomor Bank Keluar
		public function gen_numbankout()
		{
			$res = $this->gen_num_('trx_bankout','bnko_code','BK');
			$check = $this->db->get_where('trx_bankout',array('bnko_code' => $res));
			if($check->row() > 0)
			{
				$res = $this->gen_num_('trx_bankout','bnko_code','BK');
			}
			$data = array(
					'bnko_code'=>$res,
					'bnko_sts'=>'0'
				);			
			$this->db->insert('trx_bankout',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['bnko_code'] = $res;
			return  $out;
		}

		//Gen Nomor Giro Masuk
		public function gen_giroin()
		{
			$res = $this->gen_num_('trx_giro_in','grin_code','GM');
			$check = $this->db->get_where('trx_giro_in',array('grin_code' => $res));
			if($check->row() > 0)
			{
				$res = $this->gen_num_('trx_giro_in','grin_code','GM');
			}
			$data = array(
					'grin_code'=>$res,
					'grin_sts'=>'0'
				);			
			$this->db->insert('trx_giro_in',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['grin_code'] = $res;
			return  $out;
		}

		//Gen Nomor Giro Keluar
		public function gen_giroout()
		{
			$res = $this->gen_num_('trx_giro_out','grout_code','GK');
			$check = $this->db->get_where('trx_giro_out',array('grout_code' => $res));
			if($check->row() > 0)
			{
				$res = $this->gen_num_('trx_giro_out','grout_code','GK');
			}
			$data = array(
					'grout_code'=>$res,
					'grout_sts'=>'0'
				);			
			$this->db->insert('trx_giro_out',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['grout_code'] = $res;
			return  $out;
		}

		//Gen Nomor Anggaran
		public function gen_numbudg()
		{
			$res = $this->gen_num_('trx_budget','bud_code','RA');
			$check = $this->db->get_where('trx_budget',array('bud_code' => $res));
			if($check->row() > 0)
			{
				$res = $this->gen_num_('trx_budget','bud_code','RA');
			}
			$data = array(
					'bud_code'=>$res,
					'bud_dtsts'=>'0'
				);			
			$this->db->insert('trx_budget',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['bud_code'] = $res;
			return  $out;
		}

		//Gen Nomor PO GAgit 
		public function gen_numpoga()
		{
			$res = $this->gen_num_('trx_po_ga','poga_code','POG');
			$check = $this->db->get_where('trx_po_ga',array('poga_code' => $res));
			if($check->row() > 0)
			{
				$res = $this->gen_num_('trx_po_ga','poga_code','POG');
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

		public function gen_numblga()
		{
			$res = $this->gen_num_('trx_prc_ga','prcga_code','BLG');
			$check = $this->db->get_where('trx_prc_ga',array('prcga_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('trx_prc_ga','prcga_code','BLG');
			}
			$data = array(
					'prcga_code'=>$res,
					'prcga_sts'=>'0'
				);			
			$this->db->insert('trx_prc_ga',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['prcga_code'] = $res;
			return  $out;
		}

		public function gen_numretga()
		{
			$res = $this->gen_num_('prcga_ret','rtprcga_code','RBG');
			$check = $this->db->get_where('prcga_ret',array('rtprcga_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('prcga_ret','rtprcga_code','RBG');
			}
			$data = array(
					'rtprcga_code'=>$res,
					'rtprcga_sts'=>'0'
				);			
			$this->db->insert('prcga_ret',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['rtprc_code'] = $res;
			return  $out;
		}

		public function gen_numusagega()
		{
			$res = $this->gen_num_('trx_usage_ga','usgga_code','PKG');
			$check = $this->db->get_where('trx_usage_ga',array('usgga_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('trx_usage_ga','usgga_code','PKG');
			}
			$data = array(
					'usgga_code'=>$res,
					'usgga_sts'=>'0'
				);			
			$this->db->insert('trx_usage_ga',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['usgga_code'] = $res;
			return  $out;
		}

		public function gen_num_retusagega()
		{
			$res = $this->gen_num_('usage_ga_ret','rtusgga_code','RPG');
			$check = $this->db->get_where('usage_ga_ret',array('rtusgga_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('usage_ga_ret','rtusgga_code','RPG');
			}
			$data = array(
					'rtusgga_code'=>$res,
					'rtusgga_sts'=>'0'
				);			
			$this->db->insert('usage_ga_ret',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['rtusgga_code'] = $res;
			return  $out;
		}

		//Gen Logistik
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
			$data2 = array(
					'po_id' => $insID,
					'hispo_sts' => 'Void By System',
					'hispo_old' => 'None',
					'hispo_new' => 'None',
					'hispo_info' => 'Create By System',
					'hispo_date' => date('Y-m-d'),
					'hispo_upcount' => 0
				);
			$this->db->insert('his_po',$data2);
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
			$res = $this->gen_num_('usage_ret','rtusg_code','RPK');
			$check = $this->db->get_where('usage_ret',array('rtusg_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('usage_ret','rtusg_code','RPK');
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

		public function gen_num_adjga()
		{
			$res = $this->gen_num_('trx_adj_ga','adjga_code','PSG');
			$check = $this->db->get_where('trx_adj_ga',array('adjga_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('trx_adj_ga','adjga_code','PSG');
			}
			$data = array(
					'adjga_code'=>$res,
					'adjga_dtsts'=>'0'
				);			
			$this->db->insert('trx_adj_ga',$data);			
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['adjga_code'] = $res;
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
					'hisappr_date' => date('Y-m-d'),
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
			$data2 = array(
					'bapp_id' => $insID,
					'hisbapp_sts' => 'Void By System',
					'hisbapp_old' => 'None',
					'hisbapp_new' => 'None',
					'hisbapp_info' => 'Create By System',
					'hisbapp_date' => date('Y-m-d'),
					'hisbapp_upcount' => 0
				);
			$this->db->insert('his_bapp',$data2);
			return  $out;
		}

		//Gen Nomor Invoice
		public function gen_numinvo()
		{
			$res = $this->gen_num_('trx_invoice','inv_code','INV');			
			$check = $this->db->get_where('trx_invoice',array('inv_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('trx_invoice','inv_code','INV');
			}
			$data = array(
					'inv_code'=>$res,
					'inv_sts'=>'0'
				);			
			$this->db->insert('trx_invoice',$data);
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['invo_code'] = $res;
			return  $out;
		}

		//Gen Nomor Journal
		public function gen_numjou()
		{
			$res = $this->gen_num_('account_journal','jou_code','JOU');
			$check = $this->db->get_where('account_journal',array('jou_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('account_journal','jou_code','JOU');
			}
			$data = array(
					'jou_code'=>$res,
					'jou_sts'=>'0'
				);			
			$this->db->insert('account_journal',$data);
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['jou_code'] = $res;
			return  $out;
		}

		//Gen Nomor Permit Approval
		public function gen_numpermitappr()
		{
			$res = $this->gen_num_('trx_permitappr','pappr_code','PI');			
			$check = $this->db->get_where('trx_permitappr',array('pappr_code' => $res));
			if($check->num_rows() > 0)
			{
				$res = $this->gen_num_('trx_permitappr','pappr_code','PI');
			}
			$data = array(
					'pappr_code'=>$res,
					'pappr_sts'=>'0'
				);			
			$this->db->insert('trx_permitappr',$data);
			$insID = $this->db->insert_id();
			$out['insertId'] = $insID;
			$out['pappr_code'] = $res;
			return  $out;
		}
	}
?>