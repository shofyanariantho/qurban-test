<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Hal extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Admin_model', 'admin');
    }
    public function index()
    {
			$this->template->load('templates/auth', 'auth/hal'); 
    }
 
}
