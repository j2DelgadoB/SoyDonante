<?php
header('Content-Type: text/html; charset=utf-8');
error_reporting(0);

require_once __DIR__ . '/db_connect.php';


$db = new DB_CONNECT();
$response= array();

if (isset($_GET["nombres"]) && isset($_GET["apellidos"]) && isset($_GET["tipoSangre"])
	&& isset($_GET["telefono"])) {
	$tipoSangre = $_GET["tipoSangre"];
	$telefono = $_GET["telefono"];
	$text_default= sprintf("Necesito sangre y plaquetas %s,porfavor los que me pudieran ayudar pongase en contacto conmigo, pueden llamar al numero %s",$tipoSangre,$telefono);
	
	
	$sql = sprintf("create table if not exists post(id int(11) not null AUTO_INCREMENT, msjSolicitud varchar(250) not null, PRIMARY KEY (id))");
	$result = mysql_query($sql) or die(mysql_error());
	$sql = sprintf("INSERT INTO post (msjSolicitud) values ('%s')",$text_default); 
	$result = mysql_query($sql) or die(mysql_error());


	
	$response["success"] = 1;

	echo json_encode($response);
}else{
	echo "No se creo la tabla o no se insertaron los valores correctamente";
}




