<?php
session_start();

include("../Clases/usuario.php");

if (isset($_POST['agregar'])) {

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $contraseña = $_POST['contraseña'];

  $params = array(
    'nombre' => $nombre,
    'apellido' => $apellido,
    'email' => $email,
    'contraseña' => $contraseña,
  );

  $respuesta = json_decode($usuario->agregar($params));

  if ($respuesta->estado) {
    $params = array(
      'id' => $respuesta->id
    );

    $mensaje = '<p class="alert alert-success"><b>' . $respuesta->mensaje . '</b></p>';

  } else {
    $mensaje = '<p class="alert alert-danger"><b>' . $respuesta->mensaje . '</b></p>';
  }

  header('location:../../src/mantenedorUsuario.php?mensaje='. $mensaje);
}
