<?php
    require_once 'conexion.php';

    class ModeloFormularios{
        /* REGISTRO */

        static public function mdlRegistro($tabla,$datos){

            #statement declaracion
             /* prepare() prepara una sentencia SQL para ser ejecutada por el metodo PDOStatement::execute() */
            $stmt = Conexion::conectar() -> prepare("INSERT INTO $tabla(nombre, email, password) VALUES
             (:nombre, :email, :password)");

             #bindParan(): para poder hacer aparecer a las variables ocultas(:nombre)
            $stmt -> bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt -> bindParam(":email", $datos["email"],PDO::PARAM_STR);
            $stmt -> bindParam(":password", $datos["password"],PDO::PARAM_STR);

            if($stmt -> execute()){
                return "ok";
            }
             else{
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt -> close();

            $stmt = null;
 
        }
        /* SELECIONAR REGISTROS */
        static public function mdlSeleccionarRegistros($tabla,$item,$valor){

            if($item == null && $valor == null){

                $stmt = Conexion::conectar() -> prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS
                 fecha FROM $tabla ORDER BY id DESC");

                $stmt -> execute();
    
                return $stmt -> fetchAll();

            }else{

                $stmt = Conexion::conectar() -> prepare("SELECT *,DATE_FORMAT(fecha,'%d/%m/%Y') AS
                 fecha FROM $tabla WHERE $item = :$item ORDER BY id DESC");


                $stmt -> bindParam(":".$item, $valor,PDO::PARAM_STR);

                $stmt -> execute();
    
                return $stmt -> fetch();

            }

            $stmt -> close();

            $stmt = null;

        }

         /* ACTRUALIZAR REGISTRO */

         static public function mdlActualizarRegistro($tabla,$datos){

            $stmt = Conexion::conectar() -> prepare("UPDATE $tabla SET nombre=:nombre, email=:email, password=:password WHERE id=:id");

            $stmt -> bindParam(":nombre", $datos["nombre"],PDO::PARAM_STR);
            $stmt -> bindParam(":email", $datos["email"],PDO::PARAM_STR);
            $stmt -> bindParam(":password", $datos["password"],PDO::PARAM_STR);
            $stmt -> bindParam(":id", $datos["id"],PDO::PARAM_INT);

            if($stmt -> execute()){
                return "ok";
            }
             else{
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt -> close();

            $stmt = null;
 
        }

        /* ELIMINAR REGISTRO */

        static public function mdlEliminarRegistro($tabla,$valor){

            $stmt = Conexion::conectar() -> prepare("DELETE FROM $tabla WHERE id=:id");

            $stmt -> bindParam(":id", $valor,PDO::PARAM_INT);

            if($stmt -> execute()){
                return "ok";
            }
             else{
                print_r(Conexion::conectar()->errorInfo());
            }
            $stmt -> close();

            $stmt = null;
 
        }

    }
?>