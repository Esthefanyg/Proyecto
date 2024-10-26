<?php
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
                    <th colspan="2">Agregar producto</th>
                </tr>
                <tr>
                    <td><b>Nombre: </b></td>
                    <td><input type="text" name="txtnom" autocomplete="off" class="CajaTexto"></td>
                </tr>
                <tr>
                    <td><b>Descripción: </b></td>
                    <td><input type="text" name="txtdes" autocomplete="off" class="CajaTexto"></td>
                </tr>
                <tr>
                    <td><b>Precio: </b></td>
                    <td><input type="number" name="txtpre" autocomplete="off" class="CajaTexto" step="any"></td>
                </tr>
                <tr>
                    <td><b>Categoría: </b></td>
                    <td>
                        <select name="txtcat" class='CajaTexto'>
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

                            $qrcategoria = mysqli_query($conn, "SELECT * FROM categoria_productos ");
                            while ($mostrarcat = mysqli_fetch_array($qrcategoria)) {
                                echo '<option value="' . $mostrarcat['id'] . '">' . $mostrarcat['nombre'] . '</option>';
                            }
                            ?>
                        </select>
                    </td>
                </tr>

                <tr>

                    <td colspan="2">
                        <?php echo "<a class='BotonesTeam' href=\"../../index.php?pagina=articulos\">Cancelar</a>"; ?>&nbsp;
                        <input class='BotonesTeam' type="submit" name="btnregistrar" value="Registrar" onClick="javascript: return confirm('¿Deseas registrar este producto');">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>

</html>
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

if (isset($_POST['btnregistrar'])) {
    $pronom     = $_POST['txtnom'];
    $prodes     = $_POST['txtdes'];
    $propre     = $_POST['txtpre'];
    $procat     = $_POST['txtcat'];

    mysqli_query($conn, "INSERT INTO productos(nombre,descripcion,precio,categoria_id) VALUES('$pronom','$prodes','$propre','$procat')");

    echo "<script> alert('Producto registrado con exito: $pronom'); window.location='../../index.php?pagina=articulos' </script>";
}
?>