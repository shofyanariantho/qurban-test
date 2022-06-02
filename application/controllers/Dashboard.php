<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		//cek_login();
		if (!$this->session->has_userdata('login_session')) {
		set_pesan('silahkan login.');
		redirect('admin');
	}
        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
		$data['kupon'] = $this->admin->count('data_kupon');
		$data['kuponyes'] = $this->admin->countkondisi('data_kupon', 'sts_ambil', 'Y');
		$data['kuponno'] = $this->admin->countkondisi('data_kupon', 'sts_ambil', 'T');
        $data['user'] = $this->admin->count('user');
        $this->template->load('templates/dashboard', 'dashboard', $data);
    }
}
