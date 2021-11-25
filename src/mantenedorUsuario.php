<?php

if (isset($_GET['mensaje'])) {
  $mensaje = $_GET['mensaje'];
} else {
  $mensaje = '';
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="../styles/global.css">

  <link rel="stylesheet" href="../styles/mantenedorUsuario.css">


  <title>Mantenedor Usuario</title>
</head>

<body>

  <div class="sidebar">
    <div class="sidebarHeader">
      <img class="fotoPerfil" src="../public/img/perfilUsuario.jpg" alt="">

      <h4>pepe</h4>
    </div>

    <nav class="sidebarOption">
      <a class="sidebarOptions" href="">
        Servicios Contratados
        <img class="imgSideBar" src="../public/img/certificado.svg" alt="">
      </a>
      <a class="sidebarOptions" href="">Servicios Completados
        <img class="imgSideBar" src="../public/img/cheque.svg" alt="">
      </a>
      <a class="sidebarOptions" href="">
        Configuración
        <img class="imgSideBar" src="../public/img/configuraciones.svg" alt="">
      </a>
    </nav>

  </div>

  <div class="container">
    <?php
    echo $mensaje;
    ?>
    <header>
      <nav>
        <a class="navHeader" href="#">Home</a>
        <a class="navHeader" href="#">Mantenedores</a>
        <a class="navHeader" href="#">Servicios</a>
        <a class="navHeader" href="#">Conocenos</a>
        <a class="navHeader" href="#">Contacto</a>
      </nav>



      <img class="logoTipo" src="../public/img/logo.jpg" alt="">
    </header>

    <div class="section">
      <section class="sectionContainer">
        <div class="headerSection">
          <!-- Buscar usuario -->
          <form class="formBuscarUsuario" method="post" action="./mantenedorUsuario.php">
            <label for="buscador">
              <span class="spanBuscarUser">Buscar usuario: </span>
            </label>

            <div class="inputBuscar">
              <input class="UsuarioInput" type="text" id="buscador" placeholder="Nombre" required>
              <button class="buttonBuscar" type="submit" onClick="botonBuscar()"> Buscar </button>

            </div>
          </form>

          <div class="imgAgregar">

            <button class="buttonAdd" data-bs-toggle="modal" data-bs-target="#modalAgregar">
              <img class="svgAgregar" src="../public/img/agregar-usuario.svg" alt="Agregar Usuario">
            </button>

          </div>


        </div>
        <table>
          <thead>
            <tr>
              <th class="theader">
                <span>Nombre </span>
              </th>
              <th class="theader">
                <span>Apellido</span>
              </th>
              <th class="theader">
                <span>Email</span>
              </th>
              <th class="theader">
                <span>Contrasena</span>
              </th>
              <th class="theader">
                <span>Acciones</span>
              </th>
            </tr>
          </thead>

          <tbody>


            <?php


            if (isset($_POST['buscador'])) {
              include("../Recursos/Clases/usuario.php");


              $nombre = $_POST['buscador'];
              $params = array(
                'nombre' => $nombre
              );

              $user = json_decode($usuario->buscar($params));

              foreach ($user as $us) {

                if (!($us->email == "")) {

            ?>
                  <tr class="tableInfo">
                    <td>
                      <span><?php echo $us->nombre ?></span>
                    </td>
                    <td>
                      <span><?php echo $us->apellido ?></span>
                    </td>
                    <td>
                      <span><?php echo $us->email ?></span>
                    </td>
                    <td>
                      <span><?php echo $us->contraseña ?></span>
                    </td>
                    <td>
                      <div class="button">

                        <button class="buttonEdit" type="button" data-bs-toggle="modal" data-bs-target="#modalEditar" onClick='botonEditar("<?php echo $us->id . "&" . $us->nombre . "&" . $us->apellido . "&" . $us->email . "&" . $us->contraseña  ?>")'>
                          Editar
                        </button>

                        <form class="formButtonDelete" method="post" action="../Recursos/Funciones/usuarioFx.php">
                          <input type="hidden" name="id" value="<?php echo $us->id ?>">
                          <button class="buttonDelete" type="submit" name="eliminar">
                            <img class="imgDelete" src="../public/img/delete.svg">
                          </button>
                        </form>
                      </div>

                    </td>
                  </tr>

            <?php
                }
              }
            }

            ?>

          </tbody>
        </table>
      </section>
    </div>
    <footer>
    </footer>
  </div>

  <!-- Modal agregar -->
  <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="modalLabelAgregar" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabelAgregar">Agregar usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="../Recursos/Funciones/usuarioFx.php">

          <div class="modal-body">
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputNombre" class="form-label-sm">Nombre</label>
              <input class="form-control form-control-sm" type="text" name="nombre" placeholder="Nombre" id="inputNombre">
            </div>
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputApellido">Apellido</label>
              <input class="form-control form-control-sm" type="text" name="apellido" placeholder="Apellido" id="inputApellido">
            </div>

            <div class="form-group mx-sm-5 mb-2">
              <label for="inputEmail">Email</label>
              <input type="email" name="email" class="form-control form-control-sm" id="inputEmail" aria-describedby="emailHelp" placeholder="Email@email.com">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputPassword">Contraseña</label>
              <input type="password" name="contraseña" class="form-control form-control-sm" id="inputPassword" placeholder="Contraseña">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="reset" class="btn btn-secondary">Limpiar</button>
            <button type="submit" name="agregar" id="agregar" class="btn btn-primary">Agregar</button>
          </div>
        </form>

      </div>
    </div>
  </div>


  <!-- Modal Editar -->
  <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="modalLabelEditar" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabelEditar">Editar usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form method="post" action="../Recursos/Funciones/usuarioFx.php">

          <div class="modal-body">

            <input type="hidden" name="id" id="inputIdEditar">

            <div class="form-group mx-sm-5 mb-2">
              <label for="inputNombre" class="form-label-sm">Nombre</label>
              <input class="form-control form-control-sm" type="text" placeholder="Nombre" id="inputNombreEditar" name="nombre">
            </div>
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputApellido">Apellido</label>
              <input class="form-control form-control-sm" type="text" placeholder="Apellido" id="inputApellidoEditar" name="apellido">
            </div>

            <div class="form-group mx-sm-5 mb-2">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control form-control-sm" id="inputEmailEditar" aria-describedby="emailHelp" placeholder="Email@email.com" name="email">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputPassword">Contraseña</label>
              <input type="password" class="form-control form-control-sm" id="inputPasswordEditar" placeholder="Contraseña" name="contraseña">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="reset" class="btn btn-secondary">Limpiar</button>
            <button type="submit" name="modificar" class="btn btn-primary">Editar</button>
          </div>
        </form>

      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

  <script>
    function botonBuscar() {
      let buscar = document.querySelector("#buscador")
      buscar.setAttribute("name", "buscador")
    }

    let valor;

    function botonEditar(valor) {
      let idEditar = document.querySelector("#inputIdEditar")
      let nombreEditar = document.querySelector("#inputNombreEditar")
      let apellidoEditar = document.querySelector("#inputApellidoEditar")
      let emailEditar = document.querySelector("#inputEmailEditar")
      let passwEditar = document.querySelector("#inputPasswordEditar")

      let arrayButonEdit = valor.split("&")

      idEditar.setAttribute("value", arrayButonEdit[0])
      nombreEditar.setAttribute("value", arrayButonEdit[1])
      apellidoEditar.setAttribute("value", arrayButonEdit[2])
      emailEditar.setAttribute("value", arrayButonEdit[3])
      passwEditar.setAttribute("value", arrayButonEdit[4])

    }
  </script>


</body>

</html>