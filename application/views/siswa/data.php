<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm mb-4 border-bottom-primary">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
                    Data Siswa
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('siswa/add') ?>" class="btn btn-sm btn-primary btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-user-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Siswa
                    </span>
                </a>
				<a href="<?= base_url('siswa/import') ?>" class="btn btn-sm btn-success btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-download"></i>
                    </span>
                    <span class="text">
                        Import Siswa
                    </span>
                </a>


				<button type="button"  onclick="bulk_delete()" class="btn btn-sm btn-danger btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-trash"></i>
                    </span>
                    <span class="text">
                        Bulk Delete
                    </span>
				</button>

				
				<?php if (is_admin()) : ?>
				<button type="button"  onclick="aktifkan()" class="btn btn-sm btn-success btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-power-off"></i>
                    </span>
                    <span class="text">
                        Aktikan Raport
                    </span>
				</button>

				<button type="button"  onclick="nonaktifkan()" class="btn btn-sm btn-danger btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-power-off"></i>
                    </span>
                    <span class="text">
                        Non Aktikan Raport
                    </span>
				</button>

				 <?php endif; ?>



            </div>
        </div>
    </div>
	<?=form_open('', array('id'=>'bulk'))?>
    <div class="table-responsive">
        <table class="table table-striped dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
				    <th>
					<input type="checkbox" class="select_all">
					</th>
                    <th width="30">No.</th>
                    <th>NIK</th>
                    <th>Nama</th>
					<th>Jenjang</th>
					<th>Kelas</th>
					<th>Status Lulus</th></th>
					<th>File Upload</th></th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                if ($siswa) :
					foreach ($siswa as $siswa) :
						$fileupload = $siswa['fileupload'];
                        ?>
                        <tr>
						   <td><div class="text-center">
									<input id="checked[]"  name="checked[]" class="check" value="<?= $siswa['id_siswa']; ?>" type="checkbox">
								</div></td>
							<td><?= $no++; ?></td>
							<td><?= $siswa['nik']; ?></td>
                            
                            <td><?= $siswa['nama']; ?></>
							<td><?= $siswa['jenjang']; ?></td>
							<td><?= $siswa['kelas']; ?></td>
							<?php 
							if ($siswa['stslulus'] == 'Y'){ ?>
							<td>
								<ul class="navbar-nav ml-auto">

											<!-- Nav Item - User Information -->
											<li class="nav-item dropdown no-arrow">
												<a class="nav-link dropdown-toggle btn-success btn-icon-split btn-sm" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												
														<span class="icon text-white-50">
														<i class="fas fa-check"></i>
														</span>
														<span class="text">Naik Kelas</span>
														
													</a>
													
												</a>
												<!-- Dropdown - User Information -->
												<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
													<a class="btn-warning btn-icon-split btn-sm" href="<?= base_url('siswa/toggle/').$siswa['id_siswa'].'/B'  ; ?>">
														<span class="icon text-white-50">
														<i class="fas fa-exclamation-triangle"></i>
														</span>
														<span class="text">Naik Kelas Bersyarat</span>
													</a>
													<div class="dropdown-divider"></div>
													<a class="btn btn-danger btn-icon-split btn-sm" href="<?= base_url('siswa/toggle/').$siswa['id_siswa'].'/T'  ; ?>">
														<span class="icon text-white-50">
														<i class="fas fa-times-circle"></i>
														</span>
														<span class="text">Tinggal Kelas</span>
													</a>
													
	
												</div>
											</li>

                    			</ul>
												
								<?php

							}
							elseif ($siswa['stslulus'] == 'T')
							{ ?>
								<td>
													<ul class="navbar-nav ml-auto">

											<!-- Nav Item - User Information -->
											<li class="nav-item dropdown no-arrow">
												<a class="nav-link dropdown-toggle btn-danger btn-icon-split btn-sm" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												
														<span class="icon text-white-50">
														<i class="fas fa-times-circle"></i>
														</span>
														<span class="text">Tinggal Kelas</span>
														
													</a>
													
												</a>
												<!-- Dropdown - User Information -->
												<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
													<a class="btn-warning btn-icon-split btn-sm" href="<?= base_url('siswa/toggle/').$siswa['id_siswa'].'/B'  ; ?>">
														<span class="icon text-white-50">
														<i class="fas fa-exclamation-triangle"></i>
														</span>
														<span class="text">Naik Kelas Bersyarat</span>
													</a>
													<div class="dropdown-divider"></div>
													<a class="btn btn-success btn-icon-split btn-sm" href="<?= base_url('siswa/toggle/').$siswa['id_siswa'].'/Y'  ; ?>">
														<span class="icon text-white-50">
														<i class="fas fa-check"></i>
														</span>
														<span class="text">Naik Kelas</span>
													</a>
													
		
												</div>
											</li>

                    			</ul>
							   </td>
								<?php


							}
							else 
							{ ?>
								<td>
											<ul class="navbar-nav ml-auto">

											<!-- Nav Item - User Information -->
											<li class="nav-item dropdown no-arrow">
												<a class="nav-link dropdown-toggle btn-warning btn-icon-split btn-sm" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
												
														<span class="icon text-white-50">
														<i class="fas fa-exclamation-triangle"></i>
														</span>
														<span class="text">Naik Bersyarat</span>
														
													</a>
													
												</a>
												<!-- Dropdown - User Information -->
												<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
													<a class="btn-success btn-icon-split btn-sm" href="<?= base_url('siswa/toggle/').$siswa['id_siswa'].'/Y'  ; ?>">
														<span class="icon text-white-50">
														<i class="fas fa-check"></i>
														</span>
														<span class="text">Naik Kelas</span>
													</a>
													<div class="dropdown-divider"></div>
													<a class="btn btn-danger btn-icon-split btn-sm" href="<?= base_url('siswa/toggle/').$siswa['id_siswa'].'/T'  ; ?>">
														<span class="icon text-white-50">
														<i class="fas fa-times-circle"></i>
														</span>
														<span class="text">Tinggal Kelas</span>
													</a>
													
		
												</div>
											</li>

                    			</ul>
							   </td>
								<?php


							}
							?>
						
							
		
							

								<?php
						if ($fileupload) {?>

													<td>
													<a href="<?php echo base_url() . 'assets/berkas/' . $fileupload ?>" download class="btn btn-success btn-icon-split btn-sm">
														<span class="icon text-white-50">
														<i class="fas fa-check"></i>
														</span>
														<span class="text">Sudah Upload</span>
													</a>
													</td>
													<?php
						} else {
							?>
							<td><a href="#" class="btn btn-warning btn-icon-split btn-sm">
								<span class="icon text-white-50">
								<i class="fas fa-exclamation-triangle"></i>
								</span>
								<span class="text">Belum Upload</span>
							</a>
							</td>

							<?php
}
?>
                            <td>
							    <?php if($siswa['fileupload'] != null){ ?>
							    <a title="Lihat Raport" target="_blank" href="<?= base_url('assets/berkas/') . $siswa['fileupload'] ?>" class="btn btn-circle btn-sm btn-info"><i class="fa fa-fw fa-search"></i></a>
                           		<?php
								}
								?>
								<a href="<?= base_url('siswa/toggleraport/') . $siswa['id_siswa'] ?>" class="btn btn-circle btn-sm <?= $siswa['stsbayar']=='Y' ?  'btn-success' :'btn-secondary' ?>" title="<?= $siswa['stsbayar']=='Y' ? 'Nonaktifkan Cetak Raport' : 'Aktifkan Cetak Raport' ?>"><i class="fa fa-fw fa-power-off"></i></a>
								<a title="Upload Raport" href="<?= base_url('siswa/upload/') . $siswa['id_siswa'] ?>" class="btn btn-circle btn-sm btn-success"><i class="fa fa-fw fa-upload"></i></a>
								<a title="Edit Siswa" href="<?= base_url('siswa/edit/') . $siswa['id_siswa'] ?>" class="btn btn-circle btn-sm btn-warning"><i class="fa fa-fw fa-edit"></i></a>
								<a title="Ubah Password" href="<?= base_url('siswa/ubahpassword/') . $siswa['id_siswa'] ?>" class="btn btn-circle btn-sm btn-info"><i class="fa fa-fw fa-key"></i></a>
                                <a title="Hapus Siswa" onclick="return confirm('Yakin ingin menghapus data?')" href="<?= base_url('siswa/delete/') . $siswa['id_siswa'] ?>" class="btn btn-circle btn-sm btn-danger"><i class="fa fa-fw fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach;
                    else : ?>
                    <tr>
                        <td colspan="8" class="text-center">Silahkan tambahkan user baru</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
	<?=form_close();?>
</div>
