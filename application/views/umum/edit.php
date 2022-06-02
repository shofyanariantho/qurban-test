<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card shadow-sm border-bottom-info">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-info">
                            Form Ubah Bagian
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
                <?= form_open('', [], ['id_umum' => $clas['id_umum']]); ?>

			 	<div class="row form-group">
                    <label class="col-md-3 text-md-right" for="nama_kelas">Nama Bagian</label>
                    <div class="col-md-9">
                        <div class="input-group">
                            
                            <input value="<?= set_value('nama_bagian', $clas['bagian']); ?>" name="nama_kelas" id="nama_kelas" type="text" class="form-control" placeholder="Nama Kelas ...">
                        </div>
                        <?= form_error('nama_bagian', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>


                

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
