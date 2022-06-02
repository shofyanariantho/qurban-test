<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Api extends CI_Controller
{ public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Admin_model', 'admin');
    }
    // fungsi untuk CREATE
    public function Login()
    {
        // deklarasi variable
        $user = $this->input->post('user');
		$pass = $this->input->post('password');

		$cek_username = $this->auth->cek_username(trim($user));
		if ($cek_username > 0) {
    		$password = $this->auth->get_password($user);
    		if (password_verify($pass, $password)) {
				$user_db = $this->auth->userdata($user);
				$this->db->select('username,nama');
				$this->db->where('username',$user);
				$q = $this->db->get('user');
				if ($user_db['is_active'] != 1) {
					$response['pesan'] = 'User belum aktif';
					$response['status'] = 200;
					
				} else {
					$response['pesan'] = 'data ada';
					$response['status'] = 200;
					$response['data'] = $q->row();
					$response['data'] = $q->result();
				}
				echo json_encode($response);	
			} else {
			$response['pesan'] = 'Password Salah';
			$response['status'] = 404;
			echo json_encode($response);
    		}
		} else {
		$response['pesan'] = 'User Belum Terdaftar';
		$response['status'] = 404;
		echo json_encode($response);
		}
	}


	public function scan()
    {
		// deklarasi variable
		//$kode = $_GET['kode'];
		$kode = $this->input->post('kode');
		$user = $this->input->post('user');
		// isikan variabel dengan nama file

		$a  = $this->admin->get('data_kupon', ['kode_kupon' => $kode]);
		if ($a) {
			
			if($a['sts_ambil'] == 'T'){
				$data['user_scan'] = $user;
				$data['sts_ambil'] = 'Y';

				$this->db->where('kode_kupon',$kode);
				$q = $this->db->update('data_kupon',$data);
				if ($q) {
					$response['pesan'] = 'Data Berhasil Discan';
					$response['status'] = 200;

				} else {
					$response['pesan'] = 'Data Gagal Discan';
					$response['status'] = 404;
				
				}
			}
			else{
				$response['pesan'] = 'Kode Sudah Melakukan Pengambilan';
				$response['status'] = 404;
			}
			echo json_encode($response);
		}
		else
		{
			$response['pesan'] = 'Kupon Tidak Terdaftar';
			$response['status'] = 404;
			echo json_encode($response);
		}
	}

	public function dataumum()
    {
		// isikan variabel dengan nama file
		$a  = $this->db->get('setting_umum');
		if ($a) {
			$response['pesan'] = 'Data Ada';
			$response['status'] = 200;
			$response['data'] = $a->row();
			$response['data'] = $a->result();
			echo json_encode($response);
		}	
		else
		{
			$response['pesan'] = 'Data Tidak Ada';
			$response['status'] = 404;
			echo json_encode($response);
		}
	}
}

