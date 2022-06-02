<div class="card p-2 shadow-sm border-bottom-primary">
    <div class="card-header bg-white text-center">
        <h4 class="h5 align-middle m-0 font-weight-bold text-primary">
            <?= $user['nama']; ?>
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-2 mb-4 mb-md-0">
                <img src="<?= base_url() ?>assets/img/avatar/<?= $user['foto']; ?>" alt="" class="img-thumbnail rounded mb-2">
                <!--<a href="<?= base_url('profilesiswa/setting'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-edit"></i> Edit Profile</a>-->
                <!--<a href="<?= base_url('profilesiswa/ubahpassword'); ?>" class="btn btn-sm btn-block btn-primary"><i class="fa fa-lock"></i> Ubah Password</a>-->
            </div>
            <div class="col-md-10">
                <table class="table">
					<tr>
                        <th width="200">NIK</th>
                        <td><?= $user['nik']; ?></td>
					</tr>
                    <tr>
                        <th width="200">Nama</th>
                        <td><?= $user['nama']; ?></td>
					</tr>
					 
					<tr>
                        <th width="200">Kelas</th>
                        <td><?= $user['kelas']; ?></td>
                    </tr>
                   
                </table>
            </div>
        </div>
    </div>
</div>
