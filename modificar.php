<?php
   $host 	= 'localhost';
   $nom 	= 'root';
   $pass 	= '';
   $db 	= 'proyecto';

   $conn = mysqli_connect($host, $nom, $pass, $db);

   if (!$conn) 
   {
   die("Error en la conexión: " . mysqli_connect_error());
   }	



$id = $_GET['id'];

$querybuscar = mysqli_query($conn, "SELECT * FROM productos WHERE id = '$id'");

while ($mostrar = mysqli_fetch_array($querybuscar)) {
    $proid         = $mostrar['id'];
    $pronom     = $mostrar['nombre'];
    $prodes     = $mostrar['descripcion'];
    $propre     = $mostrar['precio'];
    $procat     = $mostrar['categoria_id'];
}
?>
<html>
<style>
/*Busca por VaidrollTeam para más proyectos.*/
body 
{ 
background: #f2f2f2;
font-family: Arial, sans-serif;
margin:0;
padding:0;
display: flex;
flex-direction: column;	
}
h1
{
color:#dee2e6;
}

.grupo-entradas{
position: absolute;
display: grid;
width: 100%;
transition: .5s;

}


.CajaTexto{
width: 80%;
padding: 10px;
font-size:1em;
border-radius:5px;
border:1px solid black;
color:black;
}

.BtnRegistrar
{
width: 80%;
text-decoration:none;
padding: 10px 30px;
cursor: pointer;
border: 0;
border-radius: 10px;
border:1px solid black;
font-size:18px;
color:white;
background-color: green;
font-weight: bold;
margin-bottom:5%;
margin-top:7%;
}


	/*Tabla*/
table
{
border-collapse: collapse;
width: 100%; 
margin: 0 auto;
background-color: #fff;
box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
color:#000;
}

th
{
background-color: black;
color: white;
}

th, td 
{
padding: 10px;
text-align: center;
border-bottom: 1px solid #dddddd;
}

	/*CajaPopUp*/
.contenedor_popup 
{
top: 50%;
left: 50%;
position: absolute;
transform: translate(-50%,-50%);
width:400px; 
transition: all 0.2s;
background-color:white;
}

.caja_popup2 
{
display: block;
position: absolute;
padding:0;
background-color:rgba(0, 0, 0, 0.5); 
width:100%;
height:100%;
}
</style>

<body>
    <div class="caja_popup2">
        <form class="contenedor_popup" method="POST">
            <table>
                <tr>
                    <th colspan="2">Modificar producto</th>
                </tr>
                <tr>
                    <td><b>Id: </b></td>
                    <td><input class="CajaTexto" type="number" name="txtid" value="<?php echo $proid; ?>" readonly></td>
                </tr>
                <tr>
                    <td><b>Nombre: </b></td>
                    <td><input class="CajaTexto" type="text" name="txtnom" value="<?php echo $pronom; ?>" required></td>
                </tr>
                <tr>
                    <td><b>Descripción: </b></td>
                    <td><input class="CajaTexto" type="text" name="txtdes" value="<?php echo $prodes; ?>" required></td>
                </tr>
                <tr>
                    <td><b>Precio: </b></td>
                    <td><input class="CajaTexto" type="number" step="any" name="txtpre" value="<?php echo $propre; ?>" required></td>
                </tr>
                <tr>
                    <td><b>Categoría: </b></td>
                    <td>
                        <select name="txtcat" class='CajaTexto'>

                            <?php
                            $qrproductos = mysqli_query($conn, "SELECT * FROM categoria_productos ");
                            while ($mostrarcat = mysqli_fetch_array($qrproductos)) {
                                if ($mostrarcat['id'] == $procat) {
                                    echo '<option selected="selected" value="' . $mostrarcat['id'] . '">' . $mostrarcat['nombre'] . '</option>';
                                } else {
                                    echo '<option value="' . $mostrarcat['id'] . '">' . $mostrarcat['nombre'] . '</option>';
                                }
                            }
                            ?>

                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <?php echo "<a class='BotonesTeam' href=\"../../index.php?pagina=articulos\">Cancelar</a>"; ?>&nbsp;
                        <input class='BotonesTeam' type="submit" name="btnregistrar" value="Modificar" onClick="javascript: return confirm('¿Deseas modificar este producto');">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['btnregistrar'])) {
    $proid1     = $_POST['txtid'];
    $pronom1     = $_POST['txtnom'];
    $prodes1    = $_POST['txtdes'];
    $propre1     = $_POST['txtpre'];
    $procat1     = $_POST['txtcat'];

    $querymodificar = mysqli_query($conn, "UPDATE productos SET nombre='$pronom1',descripcion='$prodes1',precio='$propre1',categoria_id='$procat1' WHERE id = '$proid1'");
    echo "<script>window.location= 'productos_tabla.php?pag=$pagina' </script>";
}
?>