<?php include "fpdf/fpdf.php";?>
<?php date_default_timezone_set("Mexico/General"); ?>
<?php $nombre_archivo="reservacion_".date('YdmHms').".pdf"; ?>
<?php session_start(); ?>
<?php 

class generarpdf extends FPDF{
		function Header(){
		include "../control/conexion.php";
 		//creamos la orden con el total
 		$consulta="INSERT INTO orden (total_orden) VALUES (".$_GET['t'].")";
		mysqli_query($conexion,$consulta);
		//obtenemos el ID q se genero
		$idOrden=mysqli_insert_id($conexion);
		$_SESSION['orden']=$idOrden;
		//obtenemos el ID del cliente
		$id_cliente=$_SESSION['id_cliente'];

		//ingresamos los datos de la reservacion
		$consulta="INSERT INTO reservacion (id_mesa,id_cliente,id_orden,fecha,hora) 
		VALUES 
		(".$_GET['m'].",
			".$id_cliente.",
			".$idOrden.",
			'".$_GET['f']."',
			'".$_GET['h']."'
		)";
		mysqli_query($conexion,$consulta);
		
		//ingresamos los alimentos de la orden
		//cantidad de alimentos
		$cantidad=$_SESSION['contador'];
		for ($i=1; $i <= $cantidad ; $i++)
		{ 
			$alimento=$_SESSION['alimento'.$i];
			$consulta="INSERT INTO alimento_orden (id_orden,id_alimento) 
			VALUES (".$idOrden.",".$alimento.")";
			mysqli_query($conexion,$consulta);	
		}

		
		$this->Image("../img/logorestaurante1.png",45,10,120);
		

		//QR
		include "qr/qr.php";
		QRcode::png("Folio de orden: ".$idOrden, $filename, $errorCorrectionLevel, $matrixPointSize, 2); 
		$this->Image("qr/".$PNG_WEB_DIR.basename($filename),93,250,25);

 		$this->SetFont("Arial","B",15);
 		$this->Cell(50);
 		$this->SetTextColor(0,0,0);
 		$this->SetFillColor(255,255,255);
 		$this->Ln(50);
 		$this->Cell(185,5,utf8_decode("Reservacion"),0,0,"C",true);
 		$this->Ln(10);
 		//obteniendo datos del cliente y la reservacion
 		$consulta="SELECT * FROM cliente c LEFT JOIN reservacion r 
 		ON c.id_cliente=r.id_cliente LEFT JOIN mesa m 
 		ON r.id_mesa=m.id_mesa LEFT JOIN sucursal s 
 		ON m.id_sucursal=s.id_sucursal 
 		WHERE r.id_orden=".$idOrden;
 		$datos=mysqli_query($conexion,$consulta);

 		if($fila=mysqli_fetch_array($datos))
 		{

 			$this->SetFont("Arial","",10);

 		$this->Cell(0,5,utf8_decode("Cliente: ".$fila['nombre']),0,0,"",true);
 		$this->Ln(10);
		$this->Cell(0,5,utf8_decode("Fecha: ".$fila['fecha']),0,0,"",true);
 		$this->Ln(10);
 		$this->Cell(0,5,utf8_decode("hora: ".$fila['hora']." Hrs."),0,0,"",true);
 		$this->Ln(10);
 		$this->Cell(0,5,utf8_decode("Sucursal: ".$fila['sucursal']),0,0,"",true);
 		$this->Ln(10);
 		$this->Cell(0,5,utf8_decode("Direccion: ".$fila['calle_numero']." ".$fila['colonia']." ".$fila['municipio']." ".$fila['cp']),0,0,"",true);
 		$this->Ln(10);
		$this->Cell(0,5,utf8_decode("Mesa: ".$fila['numero_mesa']),0,0,"",true);
 		$this->Ln(10);
 		}
 		$this->SetFont("Arial","B",15);
 		$this->Cell(185,5,utf8_decode("Pedido"),0,0,"C",true);
 		$this->Ln(10);

 		$this->SetFont("Arial","",8);
 		
 		$this->Cell(0,5,utf8_decode("Producto"),0,0,"",true);
 		$this->Cell(-50,5,utf8_decode("Precio"),0,0,"C",true);
 		$this->Ln(5);
		//consulta del pedido
		$consulta="SELECT * FROM alimento_orden ao LEFT JOIN alimento a
		ON ao.id_alimento=a.id_alimento WHERE ao.id_orden=".$idOrden;
		$datos=mysqli_query($conexion,$consulta);
 		while($fila=mysqli_fetch_array($datos)) { 
 		$this->Cell(0,5,utf8_decode($fila['alimento']),0,0,"",true);
 		$this->Cell(-50,5,utf8_decode("$".$fila['precio']),0,0,"C",true);
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
	    $this->Cell(0,10,utf8_decode($_SESSION['orden']),0,0,'C');
		}
 }


 $pdf=new generarpdf();
 $pdf->OutPut($nombre_archivo,"D");
session_destroy();
 ?>