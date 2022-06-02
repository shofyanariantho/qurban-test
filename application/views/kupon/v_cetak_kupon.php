<?php

    $pdf = new Pdf('P', 'mm', 'A4', true, 'UTF-8', false);
    $pdf->SetTitle('Contoh');
    $pdf->SetTopMargin(20);
    $pdf->setFooterMargin(20);
    $pdf->SetAutoPageBreak(true);
    
 
    $pdf->AddPage();
	
	$html=<<<EOF
<style>
    body{
	 	background:#FFF;
        width: 100%;
        height: 100%;
        margin: 0;
        padding: 0;
        font: 12pt "Tahoma";
    }
    .page {
        width: 210mm;
        min-height: 297mm;
        padding: 0.5mm;
        margin: 1mm auto;
        //background: white;
        //box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }
    .subpage {
        padding: 5mm;
        height: 257mm;
    }
	

	#id {
		width:207px;
		height:321px;
		position:absolute;
		opacity: 0.88;
		font-family: sans-serif;
		transition: 0.4s;
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
	  z-index: -1;
	  text-align:center;
</style>
<body>
		<div class="page">
			<div class="subpage">
				
					<div id="id">
						 <table cellspacing="0" cellpadding="1" border="0">
							<tbody><tr style="margin:auto"> <td style="padding-top:5px;padding-left:10px" >        	<img src="media/almatuq.png" alt="Avatar" width="50px" height="50px">         	</td>
							<td  style="padding-top:5px"align="center" ;><h3 style=" margin: 0;
								padding: 0;color:black;"><b>PESANTREN AL-MA'TUQ</b></h3></td>
							</tr>
							</tbody>
						 </table>    
						  <center>
							<hr align="center" style="border: 1px solid black;width:90%"> 
							<div class="container" align="center">
						  
								<h2 style="margin: 0;padding: 0; color:#00BFFF">KUPON DAGING QURBAN</h2>

								<p style="font-weight: bold;margin-top:2%">Tanggal : 31-juli-2020 </p>
								<p style="font-weight: bold;margin-top:-4%">Jam : 12.00 - 15.00 WIB</p>
								<p style="font-weight: bold;margin-top:-4%"></p>

								<img src="media/qr.png" alt="Avatar" width="70px" height="70px">
							</div>
							<p>Panitia Qurban</p>
					</div>
				
					<div class="id-1">
						<table>
							<tbody><tr style="margin:auto"> <td style="padding-top:5px;padding-left:10px" >        	<img src="media/almatuq.png" alt="Avatar" width="50px" height="50px">         	</td>
							<td  style="padding-top:5px"align="center" ;><h3 style=" margin: 0;
								padding: 0;color:black;"><b>PESANTREN AL-MA'TUQ</b></h3></td>
							</tr>
							</tbody>
						</table> 
						<center>
						<hr align="center" style="border: 1px solid black;width:90%">		
						<div class="container" align="center">
							<h2 style="margin: 0;padding: 0; color:#00BFFF">KUPON DAGING QURBAN</h2>
							<p style="font-weight: bold;margin-top:2%">Tanggal : 31-juli-2020 </p>
							<p style="font-weight: bold;margin-top:-4%">Jam : 12.00 - 15.00 WIB</p>
							<p style="font-weight: bold;margin-top:-4%"></p>
							<img src="media/qr.png" alt="Avatar" width="70px" height="70px">
						</div>
					</div>

					<div class="id-2">
						<table>		 
							<tbody><tr style="margin:auto"> <td style="padding-top:5px;padding-left:10px" >        	<img src="media/almatuq.png" alt="Avatar" width="50px" height="50px">         	</td>
							<td  style="padding-top:5px"align="center" ;><h3 style=" margin: 0;
								padding: 0;color:black;"><b>PESANTREN AL-MA'TUQ</b></h3></td>
							</tr>
							</tbody>
						</table> 
						<center>
						<hr align="center" style="border: 1px solid black;width:90%">
						<div class="container" align="center">
							<h2 style="margin: 0;padding: 0; color:#00BFFF">KUPON DAGING QURBAN</h2>
							<p style="font-weight: bold;margin-top:2%">Tanggal : 31-juli-2020 </p>
							<p style="font-weight: bold;margin-top:-4%">Jam : 12.00 - 15.00 WIB</p>
							<p style="font-weight: bold;margin-top:-4%"></p>
							<img src="media/qr.png" alt="Avatar" width="70px" height="70px">
						</div>
					</div>
			</div>
		</div>
	</body>
EOF;

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -

// add a page
$pdf->AddPage();


$tbl = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3<br />text line<br />text line<br />text line<br />text line<br />text line<br />text line</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    <tr>
        <td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
         <td>COL 3 - ROW 2</td>
    </tr>
    <tr>
       <td>COL 3 - ROW 3</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');

// -----------------------------------------------------------------------------

$html = <<<EOD
<table cellspacing="0" cellpadding="1" border="1">
    <tr>
        <td rowspan="3">COL 1 - ROW 1<br />COLSPAN 3<br />text line<br />text line<br />text line<br />text line<br />text line<br />text line</td>
        <td>COL 2 - ROW 1</td>
        <td>COL 3 - ROW 1</td>
    </tr>
    <tr>
        <td rowspan="2">COL 2 - ROW 2 - COLSPAN 2<br />text line<br />text line<br />text line<br />text line</td>
         <td>COL 3 - ROW 2<br />text line<br />text line</td>
    </tr>
    <tr>
       <td>COL 3 - ROW 3</td>
    </tr>

</table>
EOD;

$pdf->writeHTML($tbl, true, false, false, false, '');


$pdf->AddPage();

$html = '
<h1>HTML TIPS & TRICKS</h1>

<h3>REMOVE CELL PADDING</h3>
<pre>$pdf->SetCellPadding(0);</pre>
This is used to remove any additional vertical space inside a single cell of text.

<h3>REMOVE TAG TOP AND BOTTOM MARGINS</h3>
<pre>$tagvs = array(\'p\' => array(0 => array(\'h\' => 0, \'n\' => 0), 1 => array(\'h\' => 0, \'n\' => 0)));
$pdf->setHtmlVSpace($tagvs);</pre>
Since the CSS margin command is not yet implemented on TCPDF, you need to set the spacing of block tags using the following method.

<h3>SET LINE HEIGHT</h3>
<pre>$pdf->setCellHeightRatio(1.25);</pre>
You can use the following method to fine tune the line height (the number is a percentage relative to font height).

<h3>CHANGE THE PIXEL CONVERSION RATIO</h3>
<pre>$pdf->setImageScale(0.47);</pre>
This is used to adjust the conversion ratio between pixels and document units. Increase the value to get smaller objects.<br />
Since you are using pixel unit, this method is important to set theright zoom factor.<br /><br />
Suppose that you want to print a web page larger 1024 pixels to fill all the available page width.<br />
An A4 page is larger 210mm equivalent to 8.268 inches, if you subtract 13mm (0.512") of margins for each side, the remaining space is 184mm (7.244 inches).<br />
The default resolution for a PDF document is 300 DPI (dots per inch), so you have 7.244 * 300 = 2173.2 dots (this is the maximum number of points you can print at 300 DPI for the given width).<br />
The conversion ratio is approximatively 1024 / 2173.2 = 0.47 px/dots<br />
If the web page is larger 1280 pixels, on the same A4 page the conversion ratio to use is 1280 / 2173.2 = 0.59 pixels/dots';

// output the HTML content
$pdf->writeHTML($html, true, false, true, false, 'Contoh Laporan PDF dengan CodeIgniter + tcpdf');

// reset pointer to the last page
$pdf->lastPage();

// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('example_061.pdf', 'I');
	
	
?>
