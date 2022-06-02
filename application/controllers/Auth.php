<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Auth_model', 'auth');
        $this->load->model('Admin_model', 'admin');
    }

    private function _has_login()
    {
		 if ($this->session->has_userdata('loginsiswa_session')) {
            redirect('dashboard');
        }
	}
	

    public function index()
    {
      
		$tglumum = $this->admin->getpara();
		$tglumum = substr($tglumum['tgl'], 0, 4) .'/'. substr($tglumum['tgl'], 5, 2) .'/'. substr($tglumum['tgl'], 8, 2) .' '. substr($tglumum['tgl'], 11, 2).':'.substr($tglumum['tgl'], 14, 2) .':'.substr($tglumum['tgl'], 17, 2);
	  
		$this->_has_login();

        $this->form_validation->set_rules('nik', 'NIK', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == false) {
			$data['title'] = 'Login Aplikasi';
			$data['tgl'] = $tglumum;

            $this->template->load('templates/auth', 'auth/login', $data);
        } else {
            $input = $this->input->post(null, true);

            $cek_username = $this->admin->cek_username($input['nik']);
            if ($cek_username > 0) {
				$password = $this->admin->userdata($input['nik']);

				  if ($input['password'] == $password['tgl_lahir']) {
                    $user_db = $this->admin->userdata($input['nik']);
                    
                        $userdata = [
							'idsiswa'  => $user_db['id_siswa'],
							'foto'  => $user_db['foto'],
                            'nama'  => $user_db['nama']
						];

					
						
						if (trim($user_db['stsbayar'])=='T'){
							set_pesan2('Afwan!,Anda belum bisa login sebelum pembayaran administrasi selesai.');
							redirect('auth',);
						}
						else
						
						{
							$this->session->set_userdata('loginsiswa_session', $userdata);
							redirect('dashboardsiswa');
						}
					
					
                       
                    
                } else {
                    set_pesan('tanggal lahir salah', false);
                    redirect('auth');
                }
				
                /*if (password_verify($input['password'], $password)) {
                    $user_db = $this->admin->userdata($input['nik']);
                    
                        $userdata = [
							'idsiswa'  => $user_db['id_siswa'],
							'foto'  => $user_db['foto'],
                            'nama'  => $user_db['nama']
						];

					
						
						$this->session->set_userdata('login_session', $userdata);
						
					
					
                        redirect('dashboardsiswa');
                    
                } else {
                    set_pesan('tanggal lahir salah', false);
                    redirect('auth');
                }/*/
            } else {
                set_pesan('Nik belum terdaftar', false);
                redirect('auth');
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('loginsiswa_session');

        set_pesan('anda telah berhasil logout');
        redirect('auth');
	}
	
	  public function hal()
    {
        
        redirect('hal');
    }


    
}
