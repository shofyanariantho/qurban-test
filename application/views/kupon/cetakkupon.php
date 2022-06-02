<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
	<head>
		<title>card</title>
<style type="text/css">
/* Kode CSS Untuk PAGE ini dibuat oleh http://jsfiddle.net/2wk6Q/1/ */
    body {
	 		  	
				background:#FFF;
		
        width: 100%;
        height: 100%;
        margin: 5;
        padding: 5;
        font: 12pt "Tahoma";
    }
    * {
        box-sizing: border-box;
        -moz-box-sizing: border-box;
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 0.5mm;
        margin: 1mm auto;
       
    }
    .subpage {
        padding: 5mm;
        height: 257mm;
    }
	
    
    @page {
        size: A4;
        margin: 0;
		border-style: solid;
    }
    @media print {
        html, body {
            width: 210mm;
            height: 297mm;        
        }
        .page {
            margin: 0;
            border: initial;
            border-radius: initial;
            width: initial;
            min-height: initial;
            box-shadow: initial;
            background: initial;
            page-break-after: always;
        }
    }
	
#bg {
 
  height: 330px;
margin:20px;
 	float: left; 
 		
}

#id {
  width:207px;
  height:321px;
  position:absolute;
  opacity: 0.88;
font-family: sans-serif;

		  	transition: 0.4s;
		  	/* background-color: #FFFFFF; */
		  		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.6);
		  	transition: 0.4s;
		}

#id::before {
  content: "";
  position: absolute;
  width: 100%;
  height: 100%;
 
  background-repeat:repeat-x;
  background-size: 250px 450px;
  /* opacity: 0.2; */
  border-radius: 2%;
  z-index: -1;
  text-align:center;
  
 
}
 .container{
		  	font-size: 12px;
		  	font-family: sans-serif;
		    
		  }
		 .id-1{
		  	transition: 0.4s;
			width:207px;
			height:321px;
		  	background: #FFFFFF;
			border-radius: 2%;
		  	text-align:center;
		  	font-size: 16px;
		  	font-family: sans-serif;
		  	float: left;
		  	margin:auto;		  	
		  	margin-left:250px;
		  		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.6);
		  	transition: 0.4s;

		  	
		  }
		  .id-2{
		  	transition: 0.4s;
			width:207px;
			height:321px;
		  	background: #FFFFFF;
			border-radius: 2%;
		  	text-align:center;
		  	font-size: 16px;
		  	font-family: sans-serif;
		  	float: left;
		  	margin:auto;		  	
		  	margin-left:40px;
		  		box-shadow: 0 4px 8px 0 rgba(0,0,0,0.6);
		  	transition: 0.4s;

		  	
		  }
  
 
</style>
<head>

	<body>
	<script type="text/javascript">	
 		window.print();
	</script>
	
	            <?php 
				$this->db->Select('b.catatan,b.gambar,a.id_kupon,a.kode_kupon,a.nama,a.jumlah,b.bagian,b.tanggal,b.waktu');
				$this->db->join('setting_umum b', 'b.id_umum = a.id_umum');
				$this->db->where('sts_ambil', 'T');
				$this->db->where('a.id_umum', '2');
				$data = $this->db->get('data_kupon a');

				$i = 1;
				foreach($data->result_array() as $kupon) {
				
				?>
			
				
				
				    <?php if($i == 1) { ?>
					<div id="bg">
					<div id="id">
						 <table>
							<tbody><tr style="margin:auto"> <td style="padding-top:5px;padding-left:10px" >
							<img src="<?= base_url('assets/img/'.trim($kupon['gambar']));?>" alt="Avatar" width="50px" height="50px">         	</td>
							<td  style="padding-top:5px"align="center" ;><h5 style=" margin: 0;
								padding: 0;color:black;"><b><?= $kupon['bagian'] ?></b></h5>
							</td>
							</tbody>
						 </table>    
						  <center>
							<hr align="center" style="border: 1px solid black;width:90%"> 
							<div class="container" align="center">
						  
								<h3 style="margin: 0;padding: 0; color:#00BFFF">KUPON DAGING QURBAN</h3>
								
								<h3 style="margin: 0;padding: 0; color:#00BFFF"><?=$kupon['catatan']?></h3>
							    <!--<p style="font-weight: bold;margin-top:-2%"><?= $kupon['nama']; ?></p>
								<p style="font-weight: bold;margin-top:-2%"><?= $kupon['jumlah']; ?></p>
								<p style="font-weight: bold;margin-top:-2%"><?=$kupon['tanggal']?> </p>
								<p style="font-weight: bold;margin-top:-2%">Jam : <?=$kupon['waktu']?></p>-->
								<p style="font-weight: bold;margin-top:-2%"></p>
								<p style="font-weight: bold;margin-top:-2%"><?= $kupon['kode_kupon']; ?></p>

								<img src="<?= base_url('assets/img/qrcode/'.trim($kupon['kode_kupon']).'.png');?>" alt="Avatar" width="70px" height="70px">
							</div>
							<p>Panitia Qurban</p>
					</div>
					
					<?php } ?>
					
					<?php if($i == 2) { ?>
				
					<div class="id-1">
						<table>
							<tbody><tr style="margin:auto"> <td style="padding-top:5px;padding-left:10px" >        	
							<img src="<?= base_url('assets/img/'.$kupon['gambar']); ?>" alt="Avatar" width="50px" height="50px">         	</td>
							<td  style="padding-top:5px"align="center" ;><h5 style=" margin: 0;
								padding: 0;color:black;"><b><?= $kupon['bagian'] ?></b></h5></td>
							</tr>
							</tbody>
						</table> 
						<center>
						<hr align="center" style="border: 1px solid black;width:90%">		
						<div class="container" align="center">
							<h3 style="margin: 0;padding: 0; color:#00BFFF">KUPON DAGING QURBAN</h3>
								<h3 style="margin: 0;padding: 0; color:#00BFFF"><?=$kupon['catatan']?></h3>
							     <!--<p style="font-weight: bold;margin-top:-2%"><?= $kupon['nama']; ?></p>
								<p style="font-weight: bold;margin-top:-2%"><?= $kupon['jumlah']; ?></p>
								<p style="font-weight: bold;margin-top:-2%"><?=$kupon['tanggal']?> </p>
								<p style="font-weight: bold;margin-top:-2%">Jam : <?=$kupon['waktu']?></p>-->
								<p style="font-weight: bold;margin-top:-2%"></p>
								<p style="font-weight: bold;margin-top:-2%"><?= $kupon['kode_kupon']; ?></p>
								
							<img src="<?= base_url('assets/img/qrcode/'.trim($kupon['kode_kupon']).'.png');?>" alt="Avatar" width="70px" height="70px">
						</div>
						<p>Panitia Qurban</p>
					</div>
					
					<?php } ?>
					
					<?php if($i == 3) {
						$i=0;?>
					
					<div class="id-2">
						<table>		 
							<tbody><tr style="margin:auto"> <td style="padding-top:5px;padding-left:10px" >        	
							<img src="<?= base_url('assets/img/'.$kupon['gambar']); ?>" alt="Avatar" width="50px" height="50px">         	</td>
							<td  style="padding-top:5px"align="center" ;><h5 style=" margin: 0;
								padding: 0;color:black;"><b><?= $kupon['bagian'] ?></b></h5></td>
							</tr>
							</tbody>
						</table> 
						<center>
						<hr align="center" style="border: 1px solid black;width:90%">
						<div class="container" align="center">
							<h3 style="margin: 0;padding: 0; color:#00BFFF">KUPON DAGING QURBAN</h3>
								<h3 style="margin: 0;padding: 0; color:#00BFFF"><?=$kupon['catatan']?></h3>
							     <!--<p style="font-weight: bold;margin-top:-2%"><?= $kupon['nama']; ?></p>
								<p style="font-weight: bold;margin-top:-2%"><?= $kupon['jumlah']; ?></p>
								<p style="font-weight: bold;margin-top:-2%"><?=$kupon['tanggal']?> </p>
								<p style="font-weight: bold;margin-top:-2%">Jam : <?=$kupon['waktu']?></p>-->
								<p style="font-weight: bold;margin-top:-2%"></p>
								<p style="font-weight: bold;margin-top:-2%"><?= $kupon['kode_kupon']; ?></p>
								
							<img src="<?= base_url('assets/img/qrcode/'.trim($kupon['kode_kupon']).'.png');?>" alt="Avatar" width="70px" height="70px">
						</div>
						<p>Panitia Qurban</p>
					</div>
					
					</div>
					<?php } ?>
				
				
				<?php  
				 $i++;} ?>
		
		 
	</body>
</html>


