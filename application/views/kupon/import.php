<div class="row ">
    <div class="col-sm-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Form Import
                </h4>
			</div>
			
            <div class="card-body">
					<ul class="alert alert-info" style="padding-left: 40px">
						<li>Silahkan import data dari excel, menggunakan format yang sudah disediakan <a href="<?= base_url('uploads/import/format/formatkupon.xlsx') ?>" class="btn btn-sm btn-success">Download Format</a> </li> 
						<li>Data tidak boleh ada yang kosong, harus terisi semua.</li>
						<li>Untuk data Id Umum, hanya bisa diisi menggunakan ID Umum. <a data-toggle="modal" href="#stsumum" style="text-decoration:none" class="btn btn-sm btn-primary btn-sm">Lihat ID</a>.</li>
					</ul>
					<br>
					  <div class="row form-group">
					  
						<?= form_open_multipart('kupon/preview'); ?>
						<label for="file" class="col-sm-offset-1 col-sm-3 text-right">Pilih File</label>
						<div class="col-sm-4">
							<div class="form-group">
								<input type="file" name="upload_file">
							</div>
						</div>
						<div class="col-sm-3">
							<button name="preview" type="submit" class="btn btn-sm btn-success">Preview</button>
						</div>
						<?= form_close(); ?>
					</div>
					
						<div class="col-sm-6 col-sm-offset-3">
							<?php if (isset($_POST['preview'])) : ?>
								<br>
								<h4>Preview Data</h4>
								<table class="table table-bordered">
									<thead>
										<tr>
											<td>No</td>
											<td>Kode Kupon</td>
											<td>Nama</td>
											<td>Jumlah</td>
											<td>Id Bagian</td>
											
											

									
										</tr>
									</thead>
									<tbody>
										<?php
											$status = true;
											if (empty($import)) {
												echo '<tr><td colspan="9" class="text-center">Data kosong! pastikan anda menggunakan format yang telah disediakan.</td></tr>';
											} else {
												$no = 1;
												foreach ($import as $data) :
													?>
												<tr>
													<td><?= $no++; ?></td>
													<td class="<?= $data['kode_kupon'] == null ? 'bg-danger' : ''; ?>">
														<?= $data['kode_kupon'] == null ? 'BELUM DIISI' : $data['kode_kupon']; ?>
													</td>
													<td class="<?= $data['nama'] == null ? 'bg-danger' : ''; ?>">
														<?= $data['nama'] == null ? 'BELUM DIISI' : $data['nama']; ?>
													</td>
													<td class="<?= $data['jumlah'] == null ? 'bg-danger' : ''; ?>">
														<?= $data['jumlah'] == null ? 'BELUM DIISI' : $data['jumlah']; ?>
													</td>
													<td class="<?= $data['id_umum'] == null ? 'bg-danger' : ''; ?>">
														<?= $data['id_umum'] == null ? 'BELUM DIISI' : $data['id_umum']; ?>
													</td>
													
												</tr>
										<?php
													if ($data['kode_kupon'] == null || $data['nama'] == null || $data['jumlah'] == null ||  $data['id_umum'] == null ) {
														$status = false;
													}
												endforeach;
											}
											
											?>
											
									</tbody>
								</table>
								
								<?php if ($status) : ?>
									<?= form_open('kupon/do_import', null, ['data' => json_encode($import)]); ?>
									<button name="Import" type="submit" class="btn btn-sm btn-info">Import</button>
									<?= form_close(); ?>
								<?php endif; ?>
								<br>
							<?php endif; ?>
						</div>
					</div>
				 
				
				</div>
			</div>
		</div>
	
<div class="modal fade" id="kelasId">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			<h4 class="modal-title">Data Kelas</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                
            </div>
            <div class="modal-body">
                <table id="kelas" class="table table-bordered table-condensed table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Kelas</th>
                    </thead>
                    <tbody>
                        <?php foreach ($kelas as $k) : ?>
                            <tr>
                                <td><?= $k['id_kelas']; ?></td>
                                <td><?= $k['nama_kelas']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="jenjangId">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			<h4 class="modal-title">Data Jenjang</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                
            </div>
            <div class="modal-body">
                <table id="kelas" class="table table-bordered table-condensed table-striped">
                    <thead>
                        <th>ID</th>
                        <th>Jenjang</th>
                    </thead>
                    <tbody>
                        <?php foreach ($jenjang as $k) : ?>
                            <tr>
                                <td><?= $k['id_jenjang']; ?></td>
                                <td><?= $k['nama_jenjang']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="stsumum">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
			<h4 class="modal-title">ID Bagian</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                
            </div>
            <div class="modal-body">
                <table id="kelas" class="table table-bordered table-condensed table-striped">
                    <thead>
						<th>ID umum</th>
						<th>Kode Kupon</th>
                        <th>Bagian </th>
                    </thead>
                   <tbody>
                        <?php foreach ($kupon as $k) : ?>
                            <tr>
								<td><?= $k['id_umum']; ?></td>
								<td><?= $k['kode_kupon']; ?></td>
                                <td><?= $k['bagian']; ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
