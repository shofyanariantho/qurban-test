<div class="row ">
    <div class="col-md-12">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Form Upload
                </h4>
			</div>
			
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
				<?= form_open_multipart( base_url().'siswa/do_upload', [], ['id_siswa' => $siswa['id_siswa'],'nik' =>$siswa['nik']], 'onsubmit=""'); ?>
				<h2>Ketentuan Upload Berkas</h2>
				<p style="text-align:justify;text-indent:0em;">Berkas Yang diupload berupa file dokumen dalam bentuk *.pdf dan maksimal ukuran yang diupload &lt;= 1MB </p>
		
				<div class="row form-group">
							<div class="input-group">
								<div class="input-group-btn">
									<label class="btn btn-danger">Pilih Berkas
									<input enctype="multipart/form-data" type="file" style="width:150px;display:none;" name="file_nya" id="urlfile" accept="application/pdf" onchange="readURLberkas()">
									</label>
								</div>
								

								<input type="text" id="urlberkas" class="form-control">
								
							</div>
							<button type="submit"  class="btn btn-success btn-icon-split">
									<span class="icon text-white-50">
									<i class="fas fa-upload"></i>
									</span>
									<span class="text">Upload</span>
								</button>
							
				</div>

                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>

