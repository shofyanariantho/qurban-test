<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
		//cek_login();


        $this->load->model('Admin_model', 'admin');
    }

    public function index()
    {
        $data['title'] = "MONITORING PEMBAGIAN DAGING QURBAN";
		$data['kupon'] = $this->admin->count('data_kupon');
		$data['kuponyes'] = $this->admin->countkondisi('data_kupon','sts_ambil','Y');
		$data['kuponyes'] = $this->admin->countkondisi('data_kupon','sts_ambil','T');
        $data['user'] = $this->admin->count('user');
      
        $this->template->load('templates/home', 'home', $data);
	}
	
	public function Tampilmonitoring()
	{
		$data['title'] = "MONITORING PEMBAGIAN DAGING QURBAN";
		//$data['kupon'] = $this->admin->count('data_kupon');
		//$data['kuponyes'] = $this->admin->countkondisi('data_kupon', 'sts_ambil', 'Y');
		//$data['kuponno'] = $this->admin->countkondisi('data_kupon', 'sts_ambil', 'T');
		//$data['user'] = $this->admin->count('user');

		$this->load->view('homeajax');
	}



}
