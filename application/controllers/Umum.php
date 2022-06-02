<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umum extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = "Daftar Bagian";
        $data['clas'] = $this->admin->get('setting_umum');
        $this->template->load('templates/dashboard', 'umum/data', $data);
    }

    private function _validasi()
    {
        $this->form_validation->set_rules('nama_bagian', 'Bagian', 'required|trim');
		
       
    }

    public function add()
    {
        $this->_validasi();
        if ($this->form_validation->run() == false) {
            $data['title'] = "Tambah Bagian";
            $this->template->load('templates/dashboard', 'umum/add', $data);
        } else {
            $input = $this->input->post(null, true);
            $save = $this->admin->insert('setting_umum', $input);
            if ($save) {
                set_pesan('data berhasil disimpan.');
                redirect('umum');
            } else {
                set_pesan('data gagal disimpan', false);
                redirect('umum/add');
            }
        }
    }


    public function edit($getId)
    {
        $id = encode_php_tags($getId);
        $this->_validasi();

        if ($this->form_validation->run() == false) {
            $data['title'] = "Bagian";
            $data['clas'] = $this->admin->get('setting_umum', ['id_umum' => $id]);
            $this->template->load('templates/dashboard', 'umum/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $update = $this->admin->update('setting_umum', 'id_umum', $id, $input);

            if ($update) {
                set_pesan('data berhasil diedit.');
                redirect('umum');
            } else {
                set_pesan('data gagal diedit.');
                redirect('umum/edit/' . $id);
            }
        }
    }

    public function delete($getId)
    {
        $id = encode_php_tags($getId);
        
        if($this->admin->get('setting_umum', ['id_umum' => $getId])){

			set_pesan('data gagal dihapus, karena masih terpakai pada data Kupon.', false);
			redirect('umum');

		}
        
        if ($this->admin->delete('setting_umum', 'id_umum', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('umum');
    }
}
