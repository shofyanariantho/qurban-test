<?php
defined('BASEPATH') or exit('No direct script access allowed');
	use PhpOffice\PhpSpreadsheet\Helper\Sample;
	use PhpOffice\PhpSpreadsheet\IOFactory;
	use PhpOffice\PhpSpreadsheet\Spreadsheet;
class Test extends CI_Controller
{
    public function __construct()
    {
		parent::__construct();
		
        cek_login();
        $this->load->model('Test_model', 'admin');
		$this->load->library('form_validation');
		$this->load->library('ciqrcode');
		$this->load->library('Pdf');
		
 //pemanggilan library QR CODE
    }

	

    public function index()
    {
		$data['title'] = "Daftar Kupon";
		$data['kupon'] = $this->admin->get('data_kupon');
		$data['datakupon'] = $this->admin->getKodeKupon();
        $this->template->load('templates/dashboard', 'kupon/data', $data);
	}

	public function datakupon($kondisi)
    {
		if($kondisi=='Y'){
			$data['title'] = "Daftar Kupon Sudah Ambil";
		}
		else
		{
			$data['title'] = "Daftar Kupon Belum Ambil";
		}
		
		
		$data['kupon'] = $this->db->get_where('data_kupon', ['sts_ambil' => $kondisi])->result_array();

		$this->template->load('templates/dashboard', 'kupon/datakupon', $data);
	}

	
	public function lihat($data)
    {
        $this->load->view('kupon/lihat', $data);
    }

    public function add()
    {
			$data['title'] = "Tambah Kupon";
			$data['datakupon'] = $this->admin->getKodeKupon();
            $this->template->load('templates/dashboard', 'kupon/add', $data);
	}
	
	

    public function edit($getId)
    {
		$data['kelas'] = $this->admin->getKelas();
		$data['jenjang'] = $this->admin->getJenjang();
		$id = encode_php_tags($getId);
        $this->_validasi('edit',$getId);

        if ($this->form_validation->run() == false) {
            $data['title'] = "Edit Siswa";
            $data['user'] = $this->admin->get('siswa', ['id_siswa' => $id]);
            $this->template->load('templates/dashboard', 'siswa/edit', $data);
        } else {
            $input = $this->input->post(null, true);
            $input_data = [
				'nik'              => $input['nik'],
				'nama'             => $input['nama'],
				'jenis_kelamin'    => $input['jenis_kelamin'],
				'tgl_lahir'        => $input['tanggal'],
				'id_kelas'         => $input['kelas_id'],
				'id_jenjang'       => $input['id_jenjang'],
            ];

            if ($this->admin->update('siswa', 'id_siswa', $id, $input_data)) {
                set_pesan('data berhasil diubah.');
                redirect('siswa');
            } else {
                set_pesan('data gagal diubah.', false);
                redirect('siswa/edit/' . $id);
            }
        }
    }

    public function delete($getId,$kupon)
    {
		$id = encode_php_tags($getId);
		@unlink('./assets/img/qrcode/'.trim($kupon).'.png');
		@unlink('./assets/img/barcode/'.trim($kupon).'.jpg');

        if ($this->admin->delete('data_kupon', 'id_kupon', $id)) {
            set_pesan('data berhasil dihapus.');
        } else {
            set_pesan('data gagal dihapus.', false);
        }
        redirect('kupon');
	}

	public function output_json($data, $encode = true)
	{
        if($encode) $data = json_encode($data);
        $this->output->set_content_type('application/json')->set_output($data);
	}
	
	public function deleteall()
	{
		
		$chk = $this->input->post('checked', true);
        if(!$chk){
			$this->output_json(['status'=>false]);
		
			
        }else{
            if($this->admin->deletesemua('data_kupon', $chk, 'id_kupon')){
				$this->output_json(['status'=>true]);
				
            }
        }
	}
	public function aktif()
	{
		$chk = $this->input->post('checked', true);
        if(!$chk){
			$this->output_json(['status'=>false]);
        }else{
            if($this->admin->aktifkansemua('kupon', $chk, 'id_kupon')){
				$this->output_json(['status'=>true]);	
			}
        }
	}
	public function nonaktifkan()
	{
		
		$chk = $this->input->post('checked', true);
        if(!$chk){
			$this->output_json(['status'=>false]);	
        }else{
          if($this->admin->nonaktifkansemua('kupon', $chk, 'id_kupon')){
				$this->output_json(['status'=>true]);
				
            }
        }
	}

	public function generatekupon()
	{
		
		$kode = $this->input->post('kodekupon');
		$jumlah = $this->input->post('jmlkupon');
		$maxjml = $this->admin->get_max(trim($kode));	
		
		
		
		for ($i = 1 ; $i <= $jumlah ; $i++){
			
			//QRCODE
			$kodekupon = $kode.'-'.sprintf("%04d", $maxjml);
			$config['cacheable'] = true;
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/img/qrcode/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			//Hasil Selseksi
			$params['data'] = $kodekupon; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 2;
			$params['savename'] = FCPATH . $config['imagedir'].$kodekupon.'.png';
			$this->ciqrcode->generate($params);

			
			//$this->load->library('zend');
			//$this->zend->load('Zend/Barcode');
			//$image_resource = Zend_Barcode::draw('code128', 'image', array('text' => $kodekupon), array());


			//$image_name = $kodekupon.'.jpg';
		    //$image_dir = './assets/img/barcode/'; // penyimpanan file barcode
			//imagejpeg($image_resource, $image_dir.$image_name);
  
		
			$input_data = [
					'kode_kupon' => $kodekupon
					];
			if ($this->admin->insert('data_kupon',$input_data)) 
			{
				$maxjml++;
				$status = true;
			} else {
				$status = false;
				set_pesan('Data gagal disimpan.', false);
				redirect('kupon');
			}
		
		}
		if ($status) {
			set_pesan('Data berhasil disimpan.', true);
			redirect('kupon');
		} else {
			set_pesan('Data gagal disimpan.', false);
			redirect('kupon');

		}


		
	}
	
	 public function cetak_kuponall()
        {
			
			$data['kupon'] = $this->admin->get('data_kupon',['sts_ambil' => 'T']);
			$this->load->view('kupon/cetakkupon', $data);
		}
		

		public function import($import_data = null)
	{
	
		if ($import_data != null) $data['import'] = $import_data;

			$data['title'] = "Import Data Kupon";
			$data['kupon'] = $this->admin->getKodeKupon();
            $this->template->load('templates/dashboard', 'kupon/import', $data);
	}

	public function preview()
	{
		$config['upload_path']		= './uploads/import/';
		$config['allowed_types']	= 'xls|xlsx|csv';
		$config['max_size']			= 2048;
		$config['encrypt_name']		= true;
		
	

		$this->load->library('upload', $config);

		

		if (!$this->upload->do_upload('upload_file')) {
			$error = $this->upload->display_errors();
			echo $error;
			die;
		} else {
			$file = $this->upload->data('full_path');
			$ext = $this->upload->data('file_ext');

			switch ($ext) {
				case '.xlsx':
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
					break;
				case '.xls':
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
					break;
				case '.csv':
					$reader = new \PhpOffice\PhpSpreadsheet\Reader\Csv();
					break;
				default:
					echo "unknown file ext";
					die;
			}

			
			$spreadsheet = $reader->load($file);
			$sheetData = $spreadsheet->getActiveSheet()->toArray();
			$data = [];
			for ($i = 1; $i < count($sheetData); $i++) {
				$data[] = [
					'kode_kupon' => $sheetData[$i][0],
					'nama' => $sheetData[$i][1],
					'jumlah' => $sheetData[$i][2],
					'id_umum' => $sheetData[$i][3],
				];
			}

			unlink($file);

			$this->import($data);
		}
	}

	public function do_import()
	{
		$input = json_decode($this->input->post('data', true));
		$data = [];
		foreach ($input as $d) {
			$kodekupon = $d->kode_kupon;
			$config['cacheable'] = true;
			$config['cachedir'] = './assets/'; //string, the default is application/cache/
			$config['errorlog'] = './assets/'; //string, the default is application/logs/
			$config['imagedir'] = './assets/img/qrcode/'; //direktori penyimpanan qr code
			$config['quality'] = true; //boolean, the default is true
			$config['size'] = '1024'; //interger, the default is 1024
			$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
			$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
			$this->ciqrcode->initialize($config);
			//Hasil Selseksi
			$params['data'] = $kodekupon; //data yang akan di jadikan QR CODE
			$params['level'] = 'H'; //H=High
			$params['size'] = 2;
			$params['savename'] = FCPATH . $config['imagedir'] . $kodekupon . '.png';
			$this->ciqrcode->generate($params);

			$data[] = [
				'kode_kupon' => $d->kode_kupon,
				'nama' => $d->nama,
				'jumlah' => $d->jumlah,
				'id_umum' => $d->id_umum,
			];
		}

		$save = $this->admin->import('data_kupon', $data, true);
		if ($save) {
			redirect('kupon');
		} else {
			redirect('kupon/import');
		}
	}
    

	
	/*public function QRcode($kodenya)
	{
		QRcode::png(
		$kodenya,
		$outfile = false,
		$level = QR_ECLEVEL_H,
		$size  = 2,
		$margin = 2,
		);
	}

	public function Barcode($kodenya)
	{
		$this->zend->load('Zend/Barcode');
		Zend_Barcode::render('code128', 'image', array('text' => $kodenya));
	}*/


}
