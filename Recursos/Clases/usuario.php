<?php
require 'conexion.php'; 
class Usuario extends Conexion{
    function __construct()
    {
        parent::__construct();
        return $this;
    }

    function agregar(){
        $data = (count(func_get_args())>0)?func_get_args()[0]:func_get_args();
        $sql = "SELECT count(id) as cuantos FROM usuarios WHERE id = ?;";   //aqui podria ser en vez de id el email, considerandolo unico, como clave unica.
        $consultaUsuario = $this->prepare($sql);
        $id = intval($data['id']);
        $consultaUsuario->bind_param('i',$id);
        $consultaUsuario->execute();
        $consultaUsuario->bind_result($cuantos);
        $consultaUsuario->fetch();
        $consultaUsuario->close();

        if ($cuantos==0) {
            $sqlGuardar = "INSERT INTO usuarios (nombre,apellido,email,contraseña)
                            VALUES (?,?,?,?);";
            $guardarUsuario = $this->prepare($sqlGuardar);
            $nombre = $data['nombre'];
            $apellido = $data['apellido'];
            $email = $data['email'];
            $contraseña = $data['contraseña'];
            $guardarUsuario->bind_param('ssss',$nombre,$apellido,$email,$contraseña);
            $guardarUsuario->execute();
            $guardarUsuario->close();

            $sqlFinal = "SELECT MAX(id) AS final FROM usuarios;";
            $consultaFinal = $this->prepare($sqlFinal);
            $this->execute($consultaFinal);
            $consultaFinal->bind_result($ultimoUsuario);
            $consultaFinal->fetch();
            $consultaFinal->close();

            $info = array(
                'estado' =>true,
                'mensaje' =>"Usuario agregado correctamente.",
                'id'=>$ultimoUsuario
            );
        }else{
            $info = array(
                'estado'=>false,
                'mensaje'=>"No se pudo agregar al usuario correctamente, intente nuevamente."
            );
        }
        return json_encode($info);
    }

    function buscar(){
        $data = (count(func_get_args())>0)?func_get_args()[0]:func_get_args();
        $sql = "SELECT nombre,apellido,email
                     FROM usuarios WHERE id=?;";
        $consultaUsuario = $this->prepare($sql);
        $id = intval($data['id']);
        $consultaUsuario->bind_param('i',$id);
        $consultaUsuario->execute();
        $consultaUsuario->bind_result($id,$nombre,$apellido,$email,$contraseña);
        $consultaUsuario->fetch();
        $consultaUsuario->close();

        $usuario[] = array(
            'id'=>$id,
            'nombre'=>$nombre,
            'apellido'=>$apellido,
            'email'=>$email,
            'contraseña'=>$contraseña
        );
        if($id!=null){
            $info = array(
                'estado'=>true,
                'encontrado'=>$usuario,
                'id'=>$id,
                'mensaje'=>"Producto encontrado."
            );
        }else{
            $info = array(
                'estado'=>false,
                'mensaje'=>"No se encontro usuario"
            );
        }
        return json_encode($info);
    }
    function modificar(){
        $data = (count(func_get_args())>0)?func_get_args()[0]:func_get_args();
        $sql = "SELECT count(id) as cuantos FROM usuarios WHERE id = ?;";
        $consultaUsuario = $this->prepare($sql);
        $id = intval($data['id']);
        $consultaUsuario->bind_param('i',$id);
        $consultaUsuario->execute();
        $consultaUsuario->bind_result($cuantos);
        $consultaUsuario->fetch();
        $consultaUsuario->close();

        if($cuantos==1){
            $sqlModificar = "UPDATE usuarios SET nombre=?,apellido=?,email=?,contraseña=? WHERE id=?;";
            $modificar = $this->prepare($sqlModificar);
            $nombre = $data['nombre'];
            $apellido = $data['apellido'];
            $email = $data['email'];
            $contraseña = $data['contraseña'];
            $modificar->bind_param('ssss',$nombre,$apellido,$email,$contraseña);
            $modificar->execute();
            $modificar->close();

            $info = array(
                'estado'=>true,
                'mensaje'=>"Usuario modificado correctamente.",
                'id'=>$id
            );
        }else{
            $info = array(
                'estado'=>false,
                'mensaje'=>'No se pudo modificar el usuario, o el usuario no fue encontrado.'
            );
        }
        return json_encode($info);
    }
    function eliminar(){
        $data = (count(func_get_args())>0)?func_get_args()[0]:func_get_args();
        $sql = "SELECT count(id) as cuantos FROM usuarios WHERE id = ?;";
        $consultaUsuario = $this->prepare($sql);
        $id = intval($data['id']);
        $consultaUsuario->bind_param('i',$id);
        $consultaUsuario->execute();
        $consultaUsuario->bind_result($cuantos);
        $consultaUsuario->fetch();
        $consultaUsuario->close();

        if($cuantos==1){
            $sqlEliminar = "DELETE FROM usuarios  WHERE id=?;";
            $eliminar = $this->prepare($sqlEliminar);
            $id = $data['id'];
            $eliminar->bind_param('i',$codigo);
            $eliminar->execute();
            $eliminar->close();

            $info = array(
                'estado'=>true,
                'mensaje'=>'El usuario a sido eliminado correctamente.',
                'id'=>$id
            );
        }else{
            $info = array(
                'estado'=>false,
                'mensaje'=>'No se a podido eliminar el Usuario.'
            );
        }
    }
}
$usuario = new Usuario;