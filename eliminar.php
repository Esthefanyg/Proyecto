<?php
 $host 	= 'localhost';
 $nom 	= 'root';
 $pass 	= '';
 $db 	= 'proyecto';

 $conn = mysqli_connect(hostname: $host, username: $nom, password: $pass, database: $db);

 if (!$conn) 
 {
 die("Error en la conexión: " . mysqli_connect_error());
 }	

$id = $_GET['id'];

mysqli_query(mysql: $conn, query: "DELETE FROM productos WHERE id='$id'");
header(header: "Location:../../index.php?pagina=articulos");

?>