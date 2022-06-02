<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="icon" href="<?php echo base_url('assets/img/almatuq.ico') ?>" >

    <title><?= $title; ?> | Monitoring Pembagian Daging Qurban</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>assets/css/fonts.min.css" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Datepicker -->
    <link href="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="<?= base_url(); ?>assets/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/gijgo/css/gijgo.min.css" rel="stylesheet">

    <style>
        #accordionSidebar,
        .topbar {
            z-index: 1;
		}

		.carousel-item img {
		border-radius: 15px;
		}

    </style>
</head>

<body id="page-top">

    <!-- Page Wrapper -->
		<div id="wrapper">

        <!-- Sidebar -->
       
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <center><h1 class="h3 pt-4 mb-4 text-gray-800"><?= $title; ?></h1></center>

                    <?= $contents; ?>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-light">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; <script>document.write(new Date().getFullYear());</script> Monitoring Daging Qurban   </span>
						<!--&bull; by <?= anchor('https://www.dysideatech.id', 'TEAM-IT'); ?>-->
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

   

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
	<script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>
	<script src="<?=base_url()?>assets/vendor/sweetalert2/sweetalert2.all.min.js"></script>

	<script type="text/javascript">
		let base_url = '<?=base_url()?>';
	</script>
	
	<script type="text/javascript">
		 setInterval('show()', 5000);

			function show() {
			$.ajax({
				url: '<?= base_url('home/Tampilmonitoring') ?>',
				data: '',
				datatype:"html",
				success: function(respon) {
					document.getElementById("datamonitoring").innerHTML = respon;
				
				},
				error: function() {
					Swal({
					title: "Data" ,
					text: "Data tidak ditemukan",
					type: "error"
					});
				}
				});
			}
	</script>

   <script type="text/javascript">
			$(document).ready(function(){
				$.ajax({
				url: '<?= base_url('home/Tampilmonitoring') ?>',
				data: '',
				datatype:"html",
				success: function(respon) {
					document.getElementById("datamonitoring").innerHTML = respon;
				
				},
				error: function() {
					Swal({
					title: "Data" ,
					text: "Data tidak ditemukan",
					type: "error"
					});
				}
				});
			});
			
			</script>
			<script>
			$(document).ready(function(){
			$("button").click(function(){
				$("p").slideToggle();
			});
			});
	</script>
			
</body>

</html>
