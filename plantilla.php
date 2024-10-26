<?php
session_start();
 ?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>CRUD</title>

    <!-- Plugins de css 4-->

    <!-- Latest compiled and minified CSS -->
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
   
    <!-- Pliggins de js -->

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!--Font awesome  -->
    <script
      src="https://kit.fontawesome.com/895e73d5cd.js"
      crossorigin="anonymous"
    ></script>
  </head>
  <body>
    <div class="container-fluid">
      <h3 class="text-center py-3">ESTEFANY PELAES  3094-24-26769</h3>
    </div>
    <!-- Navegacion -->
    <div class="container-fluid bg-light">

      <div class="container">

        <ul class="nav nav-justified py-2 nav-pills">
        <?php if(isset($_GET['pagina'])):?>

          <?php if($_GET['pagina']== "registro"):?>
            <li class="nav-item">
                <a class="nav-link active" href="index.php?pagina=registro">Registro</a>
            </li>
          <?php else:?>
            <li class="nav-item">
                <a class="nav-link " href="index.php?pagina=registro">Registro</a>
            </li>
          <?php endif ?>

          <?php if($_GET['pagina']== "ingreso"):?>
            <li class="nav-item">
                <a class="nav-link active" href="index.php?pagina=ingreso">Ingreso</a>
            </li>
          <?php else:?>
            <li class="nav-item">
                <a class="nav-link " href="index.php?pagina=ingreso">Ingreso</a>
            </li>
          <?php endif ?>

          <?php if($_GET['pagina']== "inicio"):?>
            <li class="nav-item">
                <a class="nav-link active" href="index.php?pagina=inicio">Usuarios</a>
            </li>
          <?php else:?>
            <li class="nav-item">
                <a class="nav-link " href="index.php?pagina=inicio">Usuarios</a>
            </li>
          <?php endif ?>


          <?php if($_GET['pagina']== "articulos"):?>
            <li class="nav-item">
                <a class="nav-link active" href="index.php?pagina=articulos">Articulos</a>
            </li>
          <?php else:?>
            <li class="nav-item">
                <a class="nav-link " href="index.php?pagina=articulos">Articulos</a>
            </li>
          <?php endif ?>

          <?php if($_GET['pagina']== "salir"):?>
            <li class="nav-item">
                <a class="nav-link active" href="index.php?pagina=salir">Salir</a>
            </li>
          <?php else:?>
            <li class="nav-item">
                <a class="nav-link " href="index.php?pagina=salir">Salir</a>
            </li>
          <?php endif ?>

        <?php else:?>
          <!-- Variables GET $_GET variables de parametros URL se esparan con ? o & -->
          <li class="nav-item">
            <a class="nav-link active" href="index.php?pagina=registro">Registro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pagina=ingreso">Ingreso</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?pagina=inicio">Usuarios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link " href="index.php?pagina=articulos">Articulos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="index.php?pagina=salir">Salir</a>
          </li>
        <?php endif ?>

        </ul>

      </div>
      
    </div>
    <!-- CONTENIDO -->
    <div class="container-fluid">
        <div class="container py-5">
        <?php
        #ISSET Deternima si una variable esta definida y no es NULL
        if (isset($_GET['pagina'])){
          /* LISTA BLANCA */
          if($_GET['pagina'] == 'registro'||
             $_GET['pagina'] == 'ingreso' ||
              $_GET['pagina'] == 'inicio' ||
              $_GET['pagina'] == 'articulos' ||
              $_GET['pagina'] == 'editar' ||
              $_GET['pagina'] == 'salir'){

                include "paginas/".$_GET['pagina'].".php";

          }else{
            include 'paginas/error404.php'; 
          }

        }else{
          include 'paginas/registro.php'; 
        }

        ?>
        </div>
    </div>
            
  </body>
</html>
