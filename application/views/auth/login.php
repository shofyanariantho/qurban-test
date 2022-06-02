<!-- Outer Row -->
<div class="row justify-content-center mt-5 pt-lg-5">

    <div class="col-xl-10 col-lg-12 col-md-9">

        <div class="card o-hidden border-0 shadow-lg">
            <div class="card-body p-lg-5 p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                   
                    <div class="col-lg-6">
                        <div class="p-5">
                            <div class="text-center mb-4">
                                <h1 class="h4 text-gray-900">Informasi Monitoring Qurban</h1>
                                <span class="text-muted">Login</span>
                            </div>
							<?= $this->session->flashdata('pesan'); ?>

							<input type="hidden" id="jam" value='<?php echo $tgl ?>' ></input>
							
							<!--<div class="rounded bg-gradient-1 text-white shadow p-2 text-center mb-5" id="hitung">
								<p class="mb-4 font-weight-bold text-uppercase">Pengumuman Raport Online</p>
								<div id="clock-b" class="countdown-circles d-flex flex-wrap justify-content-center "></div>
							</div>-->


							
                            <?= form_open('', ['class' => 'user','id'=>'kotak']); ?>
                            <div class="form-group">
                                <input autofocus="autofocus" autocomplete="off" value="<?= set_value('nik'); ?>" type="text" id="nik" name="nik" class="form-control form-control-user" placeholder="NIK">
                                <?= form_error('nik', '<small class="text-danger">', '</small>'); ?>
							</div>
						

							<div class="form-group">
								<input  readonly name="password" id="password" type="text" class="form-control datepicker" placeholder="Tanggal Lahir (yyyy-mm-dd)" data-date-format="dd-mm-yyyy" >
								<?= form_error('password', '<small class="text-danger">', '</small>'); ?>          
							</div>
                            <button type="submit" class="btn btn-info btn-user btn-block">
                                Login
                            </button>
                           
                            <?= form_close(); ?>
                        </div>
                    </div>
					 <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<div id="modalInfo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
                    <div class="modal-dialog">
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
								<br>
							</div>
							
								<div class="modal-body">
											
								    <img  src="<?php echo base_url().'assets/img/info1.jpg'?>" alt="" class="img-fluid img-responsive">
										
								</div>
						
							<br>
								<div class="modal-footer">
									<button class="btn btn-danger pull-left " data-dismiss="modal" aria-hidden="true">Tutup</button>
								</div>
								</form>
					</div>
				</div>
			</div>
