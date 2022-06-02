<div class="row ">
    <div class="col-md-12">
        <div class="card shadow-sm mb-4 border-bottom-primary">
            <div class="card-header bg-white py-3">
                <div class="row">
                    <div class="col">
                        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                            <?= $title; ?>
                        </h4>
                    </div>
                    <div class="col-auto">
                        <a href="<?= base_url('kupon') ?>" class="btn btn-sm btn-secondary btn-icon-split">
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
                <?= form_open('kupon/generatekupon'); ?>
            
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="kelas_id">Kode Kupon</label>
                    <div class="col-md-8">
                        <div class="input-group">
						<input type='text' name="idbagian" id="idbagian"  class="form-control"></input>
                            <select name="kodekupon" id="kodekupon" class="custom-select">
                                <?php foreach ($datakupon as $b) : ?>
                                    <option  <?= set_select('kodekupon', $b['id_umum']) ?> value="<?= $b['kode_kupon'] ?>"><?= $b['kode_kupon'] ?></option>
                                <?php endforeach; ?>
                            </select>
                          
                        </div>
                    </div>
                </div>
                <div class="row form-group">
                    <label class="col-md-4 text-md-right" for="jmlkupon">Jumlah Kupon</label>
                    <div class="col-md-8">
                        <div class="input-group">
                            <input value="<?= '1'; ?>" name="jmlkupon" id="jmlkupon" type="number" class="form-control" placeholder="Isi Jumlah Kupon...">
                        </div>
                    </div>
				</div>
				

        
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


