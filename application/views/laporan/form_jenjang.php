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
                            <select name="id_jenjang" id="id_jenjang" class="custom-select">
                                
                                <?php foreach ($jenjang as $b) : ?>
                                    <option  <?= set_select('id_jenjang', $b['id_jenjang']) ?> value="<?= $b['id_jenjang'] ?>"><?= $b['nama_jenjang'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            
                        </div>
                        <?= form_error('id_jenjang', '<small class="text-danger">', '</small>'); ?>
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
