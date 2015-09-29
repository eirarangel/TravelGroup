<?php
	$to = "mpicazo@travelgroup-holidays.com"; /*Your Email*/
	$subject = "Reserve Now"; /*Issue*/
	$date = date ("l, F jS, Y"); 
	$time = date ("h:i A"); 	
	$Email=$_REQUEST['Email'];

	$msg="
	Name: 				$_REQUEST[name]
	Ciudadano: 			$_REQUEST[ciudadano]
	Cumpleaños: 		$_REQUEST[cumple]
	Email:				$_REQUEST[Email]
	Telefono: 			$_REQUEST[telephone]
	Movil: 				$_REQUEST[movil]
	Ciudad y Pais: 		$_REQUEST[citycountry]
	Fecha de salida:	$_REQUEST[fechain]
	Fecha de entrada:	$_REQUEST[fechaout]
	Nombre del Paquete: $_REQUEST[package_name]
	Num. de noches: 	$_REQUEST[quantity]
	Presupuesto:		$_REQUEST[budget]
	Numero de adultos: 	$_REQUEST[adultos]
	Comentarios: 		$_REQUEST[descripcion]
		
	Message sent from website on date  $date, hour: $time.";

		mail($to, $subject, $msg, "From: $_REQUEST[Email]");
	
?>
