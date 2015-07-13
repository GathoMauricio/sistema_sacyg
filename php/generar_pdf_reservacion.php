<?php date_default_timezone_set("Mexico/General"); ?>

<?php 

include "fpdf/fpdf.php";
$nombre_archivo="reservacion_".date('YdmHms').".pdf";
?>
<?php 

class generarpdf extends FPDF{
		
		function Header(){
		session_start();
 		include "../control/conexion.php";
 		$consulta="isert a ORDEN CON GET t";
		
		$this->Image("../img/logorestaurante1.png",45,10,120);


		//QR
		include "qr/qr.php";
		QRcode::png('00000', $filename, $errorCorrectionLevel, $matrixPointSize, 2); 

		$this->Image("qr/".$PNG_WEB_DIR.basename($filename),93,250,25);

 		$this->SetFont("Arial","B",15);
 		$this->Cell(50);
 		$this->SetTextColor(0,0,0);
 		$this->SetFillColor(255,255,255);
 		$this->Ln(50);
 		$this->Cell(185,5,utf8_decode("Reservacion"),0,0,"C",true);
 		$this->Ln(10);

 		$this->SetFont("Arial","",10);

 		$this->Cell(0,5,utf8_decode("Cliente: "),0,0,"",true);
 		$this->Ln(10);
		$this->Cell(0,5,utf8_decode("Fecha: "),0,0,"",true);
 		$this->Ln(10);
 		$this->Cell(0,5,utf8_decode("hora: "),0,0,"",true);
 		$this->Ln(10);
 		$this->Cell(0,5,utf8_decode("Sucursal: "),0,0,"",true);
 		$this->Ln(10);
 		$this->Cell(0,5,utf8_decode("Direccion: "),0,0,"",true);
 		$this->Ln(10);
		$this->Cell(0,5,utf8_decode("Mesa: "),0,0,"",true);
 		$this->Ln(10);

 		$this->SetFont("Arial","B",15);
 		$this->Cell(185,5,utf8_decode("Pedido"),0,0,"C",true);
 		$this->Ln(10);

 		$this->SetFont("Arial","",8);
 		
 		$this->Cell(0,5,utf8_decode("Producto"),0,0,"",true);
 		$this->Cell(-50,5,utf8_decode("Precio"),0,0,"C",true);
 		$this->Ln(5);
		//consulta del pedido
 		for ($i=0; $i < 10; $i++) { 
 		$this->Cell(0,5,utf8_decode("---------------------------------------"),0,0,"",true);
 		$this->Cell(-50,5,utf8_decode("$---.--"),0,0,"C",true);
 		$this->Ln(5);
 		}
 		
		//___________________

 		$this->Cell(185,5,utf8_decode("Total: $ ".$_GET['t']),0,0,"C",true);
 		$this->Ln(10);


 		

 	}
 	function Footer()
	{
	    $this->SetY(-15);
	    $this->SetFont('Arial','I',10);
	    $this->Cell(0,10,utf8_decode('N.° de Id. de transacción exclusivo PayPal: ________________________________'),0,0,'R');
		$this->SetY(-25);
	    $this->SetFont('Arial','B',10);
	    $this->Cell(0,10,utf8_decode('Folio: 00000'),0,0,'C');
		}
 }


 $pdf=new generarpdf();
 $pdf->OutPut($nombre_archivo,"I");

 ?>