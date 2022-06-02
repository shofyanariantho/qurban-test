<div class="row ">
    <div class="col-md-12">
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            Form <?= $title; ?>
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('siswa') ?>" class="btn btn-sm btn-secondary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-arrow-left"></i>
                            </span>
                            <span class="text">
                                Kembali
                            </span>
                        </a>
                    </div>
                </div>
            </div>
			 <div class="card-body pb-2">
				<?= $this->session->flashdata('pesan'); ?>
                <?= form_open(); ?>
            
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="nik">NIK</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('nik'); ?>"  type="text" id="nik" name="nik" class="form-control" placeholder="NIK">
                        <?= form_error('nik', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>
                <hr>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="nama">Nama</label>
                    <div class="col-md-6">
                        <input value="<?= set_value('nama'); ?>"  type="text" id="nama" name="nama" class="form-control" placeholder="Nama">
                        <?= form_error('nama', '<span class="text-danger small">', '</span>'); ?>
                    </div>
                </div>

				<div class="row form-group">
                    <label class="col-md-4 text-md-right" for="kelas_id">Jenis Kelamin</label>
                    <div class="col-md-5">
                        <div class="input-group">
                           
                    		<select name="jenis_kelamin" class="form-control select2">
                           
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                                
                            
                        </div>
                        <?= form_error('jenis_kelamin', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>

				<div class="row form-group">
                    <label class="col-lg-4 text-lg-right" for="tanggal">Tanggal Lahir</label>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <input  name="tanggal" id="tanggal" type="text" class="form-control datepicker" placeholder="yyyy-mm-dd" data-date-format="dd-mm-yyyy" >
                            
                        </div>
						<?= form_error('tanggal', '<small class="text-danger">', '</small>'); ?>
                      </div>                     
                </div>


				<div class="row form-group">
                    <label class="col-md-4 text-md-right" for="id_jenjang">Jenjang</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="id_jenjang" id="id_jenjang" class="custom-select">
                                
                                <?php foreach ($jenjang as $b) : ?>
                                    <option  <?= set_select('id_jenjang', $b['id_jenjang']) ?> value="<?= $b['id_jenjang'] ?>"><?= $b['nama_jenjang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            
                        </div>
                        <?= form_error('id_jenjang', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				

               <?php if (is_admin()){ ?>
						<div class="row form-group">
                    <label class="col-md-4 text-md-right" for="kelas_id">Kelas</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="kelas_id" id="kelas_id" class="custom-select">
                                <option value="" selected disabled>Pilih Kelas</option>
                                <?php foreach ($kelas as $b) : ?>
                                    <option  <?= set_select('kelas_id', $b['id_kelas']) ?> value="<?= $b['id_kelas'] ?>"><?= $b['nama_kelas'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('kelas/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('kelas_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
			<?php
			   }
			   else
			   {
				   ?>
				   <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="kelas_id">Kelas</label>
                    <div class="col-md-5">
                        <div class="input-group">
                            <select name="kelas_id" id="kelas_id" class="custom-select">
                                <?php foreach ($kelas as $b) : ?>
                                    <option <?= userdata('id_kelas') == $b['id_kelas'] ? 'selected' : 'disabled';  ?> <?= set_select('kelas_id', $b['id_kelas']) ?> value="<?= $b['id_kelas'] ?>"><?= $b['nama_kelas'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <div class="input-group-append">
                                <a class="btn btn-primary" href="<?= base_url('kelas/add'); ?>"><i class="fa fa-plus"></i></a>
                            </div>
                        </div>
                        <?= form_error('kelas_id', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
				<?php
			   } 
			   ?>
			   

        
                <br>
                <div class="row form-group justify-content-end">
                    <div class="col-md-8">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon"><i class="fa fa-save"></i></span>
                            <span class="text">Simpan</span>
                        </button>
                        <button type="reset" class="btn btn-secondary">
                            Reset
                        </button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
            </div>
		 </div>
        </div>
    </div>
</div>


