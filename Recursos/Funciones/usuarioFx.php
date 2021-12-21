<?php

include("../Clases/usuario.php");

if (isset($_POST['agregar'])) {


  $nombre = $_POST['nombre'];
  $apellido = $_POST['apellido'];
  $email = $_POST['email'];
  $contraseña = $_POST['contraseña'];
  $rut = $_POST['rut'];
  $userAdmin = $_POST['userAdmin'];

  $params = array(
    'nombre' => $nombre,
    'apellido' => $apellido,
    'email' => $email,
    'contraseña' => $contraseña,
    'rut' => $rut,
    'userAdmin' => $userAdmin
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

if (isset($_POST['buscador'])) {
  session_start();

  $email = $_POST['email'];
  $contraseña = $_POST['password'];

  $params = array(
    'email' => $email,
    'contraseña' => $contraseña
  );

  $user = json_decode($usuario->buscarLogin($params));

  var_dump($user);

  // if (empty($user[0])) {
  //   $mensaje = '<p class="alert alert-danger"><b>No existe este usuario </b></p>';
  //   header('location:../../src/login.php?mensaje=' . $mensaje);
  // } else {
  //   header('location:../../src/perfilUsuario.php');
  // }
}

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
