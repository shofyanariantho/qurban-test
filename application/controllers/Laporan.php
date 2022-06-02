<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();

        $this->load->model('Admin_model', 'admin');
        $this->load->library('form_validation');
    }

    public function kelas()
    {
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
       

        if ($this->form_validation->run() == false) {
			$data['title'] = "Laporan Siswa";
			$data['kelas'] = $this->admin->getKelas();
			$data['jenjang'] = $this->admin->getJenjang();
            $this->template->load('templates/dashboard', 'laporan/form_kelas', $data);
        } else {
            $input = $this->input->post(null, true);
           
			$kelas = $input['id_kelas'];

           
        
			$query = $this->admin->getSiswaKelas($kelas);

			$data = $this->admin->getNamaKelas($kelas);

			$namakelas = $data['nama_kelas'];


           $this->_cetak($query, $namakelas, 'Kelas', 'Laporan Kenaikan Kelas Santri/Santriwati');


        }
	}
	

	public function Jenjang()
    {
        $this->form_validation->set_rules('id_jenjang', 'Jenjang', 'required');
       

        if ($this->form_validation->run() == false) {
			$data['title'] = "Laporan Siswa";
			$data['kelas'] = $this->admin->getKelas();
			$data['jenjang'] = $this->admin->getJenjang();
            $this->template->load('templates/dashboard', 'laporan/form_jenjang', $data);
        } else {
            $input = $this->input->post(null, true);
           
			$jenjang = $input['id_jenjang'];

           
        
			$query = $this->admin->getSiswaJenjang($jenjang);
			
			$data = $this->admin->getNamaJenjang($jenjang);

		    $namajenjang = $data['nama_jenjang'] ;
			


            $this->_cetak($query, $namajenjang,'Jenjang','Laporan Kenaikan Kelas Santri/Santriwati');
        }
	}
	


    private function _cetak($data, $kelas,$grp,$judul)
    {
		
        $this->load->library('CustomPDF');
        

        $pdf = new FPDF();
        $pdf->AddPage('L', 'Letter');
        $pdf->SetFont('Times', 'B', 16);
        $pdf->Cell(280, 7, $judul, 0, 1, 'C');
        $pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(280, 7, $grp.' : ' . $kelas, 0, 1, 'C');
		$pdf->SetFont('Times', 'B', 14);
		$pdf->Cell(280, 7, 'Tahun Pelajaran 2019/2020', 0, 1, 'C');

        $pdf->Ln(2);

        $pdf->SetFont('Arial', 'B', 10);

       
            $pdf->Cell(10, 7, 'No.', 1, 0, 'C');
            $pdf->Cell(60, 7, 'NIK', 1, 0, 'C');
            $pdf->Cell(60, 7, 'Nama', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Tanggal Lahir', 1, 0, 'C');
            $pdf->Cell(30, 7, 'Jenis Kelamin', 1, 0, 'C');
			$pdf->Cell(20, 7, 'Jenjang', 1, 0, 'C');
			$pdf->Cell(20, 7, 'Kelas', 1, 0, 'C');
			$pdf->Cell(30, 7, 'Status', 1, 0, 'C');


            $pdf->Ln();

            $no = 1;
            foreach ($data as $d) {
				if($d['stslulus']=='T'){
					$status = 'Tinggal Kelas';
				}
				elseif ($d['stslulus'] == 'Y') {
						$status = 'Naik Kelas';
					}
				else{
					$status = 'Naik Bersyarat';
				}

				if($d['jenis_kelamin']=='L'){
					$jk = 'Laki-laki';
				}
				elseif ($d['jenis_kelamin'] == 'P') {
						$jk = 'Perempuan';
				}
				

                $pdf->SetFont('Arial', '', 10);
                $pdf->Cell(10, 7, $no++ . '.', 1, 0, 'C');
                $pdf->Cell(60, 7, $d['nik'], 1, 0, 'C');
                $pdf->Cell(60, 7, $d['nama'], 1, 0, 'C');
                $pdf->Cell(30, 7, $d['tgl_lahir'], 1, 0, 'C');
                $pdf->Cell(30, 7, $jk, 1, 0, 'C');
				$pdf->Cell(20, 7, $d['jenjang'], 1, 0, 'C');
				$pdf->Cell(20, 7, $d['kelas'], 1, 0, 'C');
				$pdf->Cell(30, 7, $status, 1, 0, 'C');
                $pdf->Ln();
            } 
       

        $file_name = $judul . ' ' . $kelas;
        $pdf->Output('I', $file_name);
    }
}
