<div class="row justify-content-center">
    <div class="col-lg-8">
        <div class="card shadow-sm border-bottom-primary">
            <div class="card-header bg-white py-3">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Form Laporan
                </h4>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('pesan'); ?>
                <?= form_open(); ?>
                <div class="row form-group">
                    <label class="col-lg-3 text-md-right" for="transaksi">Jenjang</label>
                    <div class="col-lg-5">
                        <div class="input-group">
                            <select name="id_kelas" id="id_kelas" class="custom-select">
                                
                                <?php foreach ($kelas as $b) : ?>
                                    <option  <?= set_select('id_kelas', $b['id_kelas']) ?> value="<?= $b['id_kelas'] ?>"><?= $b['nama_kelas'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            
                        </div>
                        <?= form_error('id_kelas', '<small class="text-danger">', '</small>'); ?>
                    </div>
                </div>
                  
              
                
                <div class="row form-group">
                    <div class="col-lg-9 offset-lg-3">
                        <button type="submit" class="btn btn-primary btn-icon-split">
                            <span class="icon">
                                <i class="fa fa-print"></i>
                            </span>
                            <span class="text">
                                Cetak
                            </span>
                        </button>
                    </div>
                </div>
                <?= form_close(); ?>
            </div>
        </div>
    </div>
</div>
