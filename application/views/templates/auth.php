<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title; ?></title>
	<link rel="icon" href="<?php echo base_url('assets/img/almatuq.ico') ?>" >

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->

    <link href="<?= base_url(); ?>assets/css/sb-admin-2.min.css" rel="stylesheet">

	<link href="<?= base_url(); ?>assets/vendor/daterangepicker/daterangepicker.css" rel="stylesheet">

    <!-- DataTables -->
    <link href="<?= base_url(); ?>assets/vendor/datatables/buttons/css/buttons.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/datatables/responsive/css/responsive.bootstrap4.min.css" rel="stylesheet">
    <link href="<?= base_url(); ?>assets/vendor/gijgo/css/gijgo.min.css" rel="stylesheet">

    <style>
        .bg-login-image {
            background-image: url("<?= base_url('assets/img/qurban1.png'); ?>");
            background-repeat: no-repeat;
            background-size:100%;
        }

		.countdown {
    text-transform: uppercase;
    font-weight: bold;
}

.countdown span {
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
    font-size: 3rem;
    margin-left: 0.8rem;
}

.countdown span:first-of-type {
    margin-left: 0;
}

.countdown-circles {
    text-transform: uppercase;
    font-weight: bold;
}

.countdown-circles span {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
}

.countdown-circles span:first-of-type {
    margin-left: 0;
}

.bg-gradient-1 {
    background: #1cc88a;
    background: -webkit-linear-gradient(to right, #1cc88a, #86a8e7, #91eae4);
    background: linear-gradient(to right, #1cc88a, #86a8e7, #91eae4);
}




    </style>
</head>


<body class="bg-gradient-success">

    <div class="container">

        <?= $contents; ?>

    </div>

    <!-- Bootstrap core JavaScript-->
	<script src="<?= base_url(); ?>assets/vendor/jquery/jquery.min.js"></script>
	    <script src="<?= base_url(); ?>assets/vendor/jquery/jquery.countdown.js"></script>
    <script src="<?= base_url(); ?>assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>assets/js/sb-admin-2.min.js"></script>

	 <!-- Datepicker -->



	<script src="<?= base_url(); ?>assets/vendor/gijgo/js/gijgo.min.js"></script>
	





    <script type="text/javascript">
       
$('#tanggal').datepicker({
		uiLibrary: 'bootstrap4',
		format: 'yyyy-mm-dd'
			});
		$('#password').datepicker({
		uiLibrary: 'bootstrap4',
		format: 'yyyy-mm-dd'
			});
	
</script>

<script type="text/javascript">
       
		
        $('#modalInfo').modal('show');
		
		
		
		
</script>

<script>
/*$(document).ready(function () {

document.getElementById("kotak").style.display = "none";

var jam = $('#jam').val();

$('#clock-b').countdown(jam).on('update.countdown', function(event) {
      var $this = $(this).html(event.strftime(''
        + '<div class="row"><div style=font-size:16px; class="holder m-2"><span  font-weight-bold">%D</span> Hari%!d</div>'
        + '<div  style=font-size:16px; class="holder m-2"><span font-weight-bold">%H</span> Jam</div>'
        + '<div  style=font-size:16px; class="holder m-2"><span font-weight-bold">%M</span> Menit</div>'
		+ '<div style=font-size:16px; class="holder m-2"><span font-weight-bold">%S</span> Detik</div> </div>'));
		
	}).on('finish.countdown', function() {
		   document.getElementById("hitung").style.display = "none";
		   document.getElementById("kotak").style.display = "block";
	});
	
});*/
</script>

</body>

</html>
