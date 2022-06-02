  
<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">

<div class="card shadow mb-4">
		<div class="card-header py-3">
			<div class="row form-group mr-auto">
				<label class="col-md-2" for="kelas_id">BAGIAN</label>
				<div class="col-md-4 ml-auto">
					<div class="input-group">
						<select name="kodekupon" id="kodekupon" class="custom-select">
							<option  <?= set_select('kodekupon','') ?> value="">SEMUA</option>
							<?php foreach ($datakupon as $b) : ?>
								<option  <?= set_select('kodekupon', $b['id_umum']) ?> value="<?= $b['id_umum'] ?>"><?= $b['bagian'] ?></option>
							<?php endforeach; ?>
						</select>
						<div class="input-group-append">
							<button class="btn btn-primary" type="submit">
								<i class="fas fa-search fa-sm"></i>
							</button>
						</div>
					</div>
				</div>
				<div class="col md-4 ml-auto py-2">
					<a href="<?= base_url('/kupon/cetak_kuponall') ?>" class="btn btn-sm btn-primary btn-icon-split float-right" >
						<span class="icon">
							<i class="fa fa-user-plus"></i>
						</span>
						<span class="text">
							Cetak Kupon
						</span>
					</a>
				</div>
            
			</div>
			
           
  
        
		
    </div>
	<?=form_open('', array('id'=>'bulk'))?>
    <div class="table-responsive">
        <table class="table table-striped " id="dataTable">
            <thead>
                <tr>
				    <th width="30">
					<input type="checkbox" class="select_all">
					</th>
                    <th width="30">No.</th>
                    <th>Kode Kupon</th>
					<th>Nama</th>
					<th>Jumlah</th>
					<th>Qr Code</th>
					<th>Aksi</th>
				
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($kupon):
					foreach ($kupon as $kupon):
					
					//isi QRCode saat discan
					/*$isi_teks = "With Image";
					//direktori dan nama logo
					$logopath = 'dk.png';
					//namafile setelah jadi qrcode
					$namafile = "dewan-komputer.png";
					//kualitas dan ukuran qrcode
					$quality = 'H';
					$ukuran = 8;
					$padding = 0;

					QRCode::png($isi_teks, $tempdir . $namafile, QR_ECLEVEL_H, $ukuran, $padding);
					$filepath = $tempdir . $namafile;
					$QR = imagecreatefrompng($filepath);

					$logo = imagecreatefromstring(file_get_contents($logopath));
					$QR_width = imagesx($QR);
					$QR_height = imagesy($QR);

					$logo_width = imagesx($logo);
					$logo_height = imagesy($logo);

					//besar logo
					$logo_qr_width = $QR_width / 2.5;
					$scale = $logo_width / $logo_qr_width;
					$logo_qr_height = $logo_height / $scale;

					//posisi logo
					imagecopyresampled($QR, $logo, $QR_width / 3.3, $QR_height / 2.5, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height);

					imagepng($QR, $filepath);*/


					/*$config['cacheable'] = true;
					$config['cachedir'] = './assets/'; //string, the default is application/cache/
					$config['errorlog'] = './assets/'; //string, the default is application/logs/
					$config['imagedir'] = './assets/img/qrcode/'; //direktori penyimpanan qr code
					$config['quality'] = true; //boolean, the default is true
					$config['size'] = '1024'; //interger, the default is 1024
					$config['black'] = array(224, 255, 255); // array, default is array(255,255,255)
					$config['white'] = array(70, 130, 180); // array, default is array(0,0,0)
					$this->ciqrcode->initialize($config);


					//Hasil Selseksi
					$params['data'] = $kupon['kode_kupon']; //data yang akan di jadikan QR CODE
					$params['level'] = 'H'; //H=High
					$params['size'] = 2;
					$params['savename'] = FCPATH.$config['imagedir'].$kupon['kode_kupon'].'.png';
					$this->ciqrcode->generate($params);

					/*$backColor = 0xFFFFFF;
					$foreColor = 0x000066;
					//header("Content-Type: image/png");
					$quality = 'H';
					$ukuran = 2;
					$padding = 0;

				    QRcode::png($kupon['kode_kupon'], $kupon['kode_kupon'].'png', $quality, $ukuran, $padding, false, $backColor, $foreColor);*/

	

		
                        ?>
                        <tr>
						   <td><div class="text-center">
									<input id="checked[]"  name="checked[]" class="check" value="<?= $kupon['id_kupon']; ?>" type="checkbox">
						   	</div>
						   </td>
							<td><?= $no++; ?></td>
							<td><?= $kupon['kode_kupon']; ?></>
							<td><?= $kupon['nama']; ?></>
							<td><?= $kupon['jumlah']; ?></>
							<td><img src="<?= base_url('assets/img/qrcode/').$kupon['kode_kupon'].'.png';?>"></td>
							
							<td>
                                <a title="Hapus Kupon" onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('kupon/delete/') . $kupon['id_kupon'].'/'. $kupon['kode_kupon'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;
                    else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Silahkan tambahkan kupon baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
	<?=form_close();?>
</div>




