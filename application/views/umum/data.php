<?= $this->session->flashdata('pesan'); ?>
<div class="card shadow-sm border-bottom-info">
    <div class="card-header bg-white py-3">
        <div class="row">
            <div class="col">
                <h4 class="h5 align-middle m-0 font-weight-bold text-info">
                    Data Bagian
                </h4>
            </div>
            <div class="col-auto">
                <a href="<?= base_url('umum/add') ?>" class="btn btn-sm btn-info btn-icon-split">
                    <span class="icon">
                        <i class="fa fa-plus"></i>
                    </span>
                    <span class="text">
                        Tambah Bagian
                    </span>
                </a>
            </div>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-striped w-100 dt-responsive nowrap" id="dataTable">
            <thead>
                <tr>
					<th>No.</th>
					<th>Photo</th>
					<th>Nama Bagian</th>
					<th>Kode Kupon</th>
					<th>Catatan</th>
					<th>Tempat Pengambilan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($clas) :
                    $no = 1;
                    foreach ($clas as $s) :
                        ?>
                        <tr>
							<td><?= $no++; ?></td>
							<td>
								<?php if (empty($s['gambar'])){ ?> 
								
                                <img width="50" src="<?= base_url() ?>assets/img/avatar/no-file.png" alt="<?= $s['bagian']; ?>" class="img-thumbnail rounded-circle">
								<?php 
								}
									else
								{ ?>
									<img width="50" src="<?= base_url() ?>assets/img/avatar/<?= $s['gambar'] ?>" alt="<?= $s['bagian']; ?>" class="img-thumbnail rounded-circle">
								<?php 
								} ?>
							</td>
                            <td><?= $s['bagian']; ?></td>
                            <td><?= $s['kode_kupon']; ?></td>
                            <td><?= $s['catatan']; ?></td>
                            <td><?= $s['nama_tempat']; ?></td>
                            <th>
                                <a href="<?= base_url('umum/edit/') . $s['id_umum'] ?>" class="btn btn-circle btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                <a onclick="return confirm('Yakin ingin hapus?')" href="<?= base_url('umum/delete/') . $s['id_umum'] ?>" class="btn btn-circle btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </th>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6" class="text-center">
                            Data Kosong
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
