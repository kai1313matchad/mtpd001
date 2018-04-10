<?php
	defined('BASEPATH') OR exit('No direct script access allowed');	
	class Dashboard extends CI_Controller
	{
		public function __construct()
		{
			parent::__construct();
			$this->load->model('CRUD/M_crud','crud');
		}

		public function index()
		{
			redirect('administrator/Dashboard');
		}

		public function login_()
		{
			$data['title']='Match Terpadu';
			$data['menu']='dashboard';
			$data['menulist']='';
			$this->load->view('menu/general/login',$data);
		}

		public function loginauth()
		{
			$user = $this->input->post('username');
			$pass = md5($this->input->post('password'));
			$res = $this->authsys->login($user,$pass);
			if ($res == '1')
			{
				$data['tes'] = 'Sukses Login'.$res.$pass;
				$data['status'] = TRUE;
			}
			else
			{
				$data['tes'] = 'Gagal Login'.$res.$pass;
				$data['status'] = FALSE;
			}
			echo json_encode($data);
		}

		public function logout()
		{
			$this->authsys->logout();
		}

		public function pass_change()
		{
			$id = $this->input->post('user_id');
			$oldpass = md5($this->input->post('old_pass'));
			$newpass = md5($this->input->post('new_pass'));
			$data['error_string'] = array();
	        $data['inputerror'] = array();
			//Cek Password Lama
			$get = $this->db->get_where('master_user',array('user_id'=>$id));
			if($oldpass != $get->row()->USER_PASSWORD)
			{
				$data['inputerror'][] = 'old_pass';
				$data['error_string'][] = 'Password Lama Salah';
				$data['status'] = FALSE;
			}
			else
			{
				$dtup = array('user_password'=>$newpass);
				$update = $this->crud->update('master_user',$dtup,array('user_id' =>$id));
				$data['status'] = TRUE;				
			}
			echo json_encode($data);
		}

		public function menu_trx()
		{
			$get = $this->db->get('master_menutrx');
			$data = $get->result();
			echo json_encode($data);
		}

		public function menu_master()
		{
			$get = $this->db->get('master_menumaster');
			$data = $get->result();
			echo json_encode($data);
		}

		public function get_menulist()
		{
			$getmst = $this->db->get_where('master_menu',array('menu_sts'=>0));
			$data['mst'] = $getmst->result();
			$gettrx = $this->db->get_where('master_menu',array('menu_sts'=>1));
			$data['trx'] = $gettrx->result();
			echo json_encode($data);
		}

		public function get_useraccess($id)
		{
			$get = $this->db->get_where('group_user',array('user_id'=>$id));
			$data = $get->result();
			echo json_encode($data);
		}

		public function get_user()
		{
			$get = $this->db->get_where('master_user',array('user_dtsts'=>'1'));
			$data = $get->result();
			echo json_encode($data);
		}

		public function add_useraccess()
		{
			$user = $this->input->post('user_list');
			$data['arr'] = $this->input->post('trx');
			$data['arr2'] = $this->input->post('mstr');
			$del_acc = $this->crud->delete_by_id('group_user',array('user_id'=>$user));
			if(sizeof($data['arr'])>0)
			{
				foreach($data['arr'] as $trx)
				{
					$dt_trx = array(
							'user_id' => $user,
							'menu_code' => $trx
						);
					$ins_trx = $this->crud->save('group_user',$dt_trx);
				}
			}
			if(sizeof($data['arr2'])>0)
			{
				foreach($data['arr2'] as $mst)
				{
					$dt_mst = array(
							'user_id' => $user,
							'menu_code' => $mst
						);
					$ins_mst = $this->crud->save('group_user',$dt_mst);
				}
			}
			$data['status'] = TRUE;
			echo json_encode($data);
		}

		public function get_appdata()
		{
			$get = $this->db->get_where('other_settings',array('os_id'=>'1'));
			$data = $get->row();
			echo json_encode($data);
		}

		public function test()
		{
			$tb = 'trx_approvalbill';
			$col = 'appr_code';
			$affix = 'AB';
			$brc = '3';
			$this->db->select_max($col,'code');
			$que = $this->db->get_where($tb,array('branch_id'=>$brc));
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
			$data['tes'] = $res;
			echo json_encode($data);
		}

		public function tes()
		{
			$data['title']='Match Terpadu';
			$data['menu']='dashboard';
			$data['menulist']='';
			$data['isi']='menu/administrator/dashboard';
			$this->load->view('layout/administrator/wrapper',$data);
		}
	}
?>