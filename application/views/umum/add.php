<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-info">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-info">
                            Form Tambah Bagian
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('umum') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
				<?= form_open_multipart(); ?>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="foto">Foto</label>
                    <div class="col-md-9">
                        <div class="row">
                            <div class="col-3">
                                <img src="<?= base_url() ?>assets/img/avatar/no-file.png" class="rounded-circle shadow-sm img-thumbnail">
                            </div>
                            <div class="col-9">
                                <input type="file" name="foto" id="foto">
                                <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>

				<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="username">Nama Bagian</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            <input value="<?= set_value('namabagian'); ?>" name="namabagian" id="namabagian" type="text" class="form-control" placeholder="Nama Bagian...">
                        </div>
                        <?= form_error('namabagian', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama">Kode Kupon</label>
                    <div class="col-md-9">
                        <div class="input-group">
                           
                            <input value="<?= set_value('kodekupon'); ?>" name="kodekupon" id="nama" type="text" class="form-control" placeholder="Kode kupon...">
                        </div>
                        <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="ket">Keterangan</label>
                    <div class="col-md-9">
                        <div class="input-group">
    
                            <input value="<?= set_value('ket'); ?>" name="ket" id="ket" type="text" class="form-control" placeholder="Keterangan...">
                        </div>
                        <?= form_error('ket', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-3 text-md-right" for="tempat">Tempat</label>
                    <div class="col-md-9">
                        <div class="input-group">

                            <input value="<?= set_value('tempat'); ?>" name="tempat" id="tempat" type="text" class="form-control" placeholder="Tempat...">
                        </div>
                        <?= form_error('no_telp', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                <hr>


				
            
                <div class="row form-group">
                    <div class="col-md-9 offset-md-3">
                        <button type="submit" class="btn btn-info">Simpan</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
