<?php

include("../Clases/usuario.php");

if (isset($_POST['agregar'])) {
  

  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $contraseña = $_POST['contraseña'];
  $rut = $_POST['rut'];

  $params = array(
    'nombre' => $nombre,
    'apellido' => $apellido,
    'email' => $email,
    'contraseña' => $contraseña,
    'rut' => $rut
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

  header('location:../../src/mantenedorUsuario.php?mensaje=' . $mensaje . '&nombre=' . $respuesta->nombre);
}

// if (isset($_POST['buscador'])) {

//   session_start();

//   $nombre = $_POST['nomUsuario'];
//   $params = array(
//     'nombre' => $nombre
//   );

//   $user = json_decode($usuario->buscar($params));

//   $datos = count($user);


//   if ($datos = 0) {
//     $mensaje = '<p class="alert alert-danger"><b>No existe este usuario </b></p>';
//     header('location:../../src/mantenedorUsuario.php?mensaje=' . $mensaje);
//   } else {
//     $_SESSION['mantenedorUsuario'] = $user;
//     header('location:../../src/mantenedorUsuario.php');
//   }
// }

if (isset($_POST['modificar'])) {

  $id = $_POST['id'];
  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $contraseña = $_POST['contraseña'];
  $rut = $_POST['rut'];

  $params = array(
    'id' => $id,
    'nombre' => $nombre,
    'apellido' => $apellido,
    'email' => $email,
    'contraseña' => $contraseña,
    'rut' => $rut,
  );

  $respuesta = json_decode($usuario->modificar($params));

  if ($respuesta->estado) {
    $params = array(
      'id' => $respuesta->id
    );

    $mensaje = '<p class="alert alert-success"><b>' . $respuesta->mensaje . '</b></p>';
  } else {
    $mensaje = '<p class="alert alert-danger"><b>' . $respuesta->mensaje . '</b></p>';
  }

  header('location:../../src/mantenedorUsuario.php?' . $mensaje);
}

if (isset($_POST['eliminar'])) {

  $id = $_POST['id'];
  $params = array(
    'id' => $id
  );

  $respuesta = json_decode($usuario->eliminar($params));

  if (isset($respuesta)) {
    header('Location:../../src/mantenedorUsuario.php');
  }
}
