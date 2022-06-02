<?php
    $hasil = $this->db->query('SELECT COUNT(data_kupon.id_kupon) JML,setting_umum.bagian,
            data_kupon.id_umum FROM data_kupon
            JOIN setting_umum ON setting_umum.id_umum = data_kupon.id_umum
            GROUP BY bagian 
            ORDER BY setting_umum.id_umum')->result();
   
?>

<?php 
foreach( $hasil as $row ) : ?>
    <div class="row">
        <div class="col-xl-4 col-lg-6 col-md-6 col-12 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2"><div class="text-md mb-0 font-weight-bold text-warning"><?= $row->bagian; ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row->JML; ?></div>
                            <div class="text-sm font-weight-bold text-primary mb-1">Total Kupon</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-folder fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
            $hasil2 = $this->db->query('SELECT COUNT(data_kupon.id_kupon) JML,setting_umum.bagian,data_kupon.id_umum,sts_ambil 
            FROM data_kupon
            JOIN setting_umum ON setting_umum.id_umum = data_kupon.id_umum
            WHERE setting_umum.id_umum = '.$row->id_umum.'
            GROUP BY bagian,sts_ambil 
            ORDER BY setting_umum.id_umum,data_kupon.sts_ambil asc')->result();
        ?>

        <?php 
        if ($hasil2) :   
        foreach( $hasil2 as $row2 ) :  ?>

        <?php if (trim($row2->sts_ambil) == "Y") 
        { 
            $sts = 'Sudah Menerima' ;
        } 
        else 
        {
             $sts = 'Belum Menerima';
        } 
        ?>


       <div class="col-xl-4 col-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2"><div class="text-md mb-0 font-weight-bold text-warning"><?= $row2->bagian; ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $row2->JML; ?></div>
                            <div class="text-sm font-weight-bold text-primary mb-1"><?= $sts ?></div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach;
              else : ?>
              <div class="col-xl-4 col-6 mb-4">
               <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="col mr-2"><div class="h5 mb-0 font-weight-bold text-warning "><?= $row->bagian; ?></div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= 0 ?></div>
                            
                            <div class="text-sm font-weight-bold text-success  mb-1"><?= "Belum Menerima" ?> </div>
                        
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
          <?php endif; ?>

    </div>
 

    <?php endforeach ?>
  

    

