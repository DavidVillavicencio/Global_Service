<?php

if (!empty($_GET[''])) {
}

if (isset($_GET['mensaje'])) {
  $mensaje = $_GET['mensaje'];
} else {
  $mensaje = '';
}

if (isset($_GET['nombre'])) {
  $nombre = $_GET['nombre'];
} else {
  $nombre = '';
}

// if (!empty($_POST['buscador'])) {
if (isset($_POST['buscador'])) {
  include("../Recursos/Clases/usuario.php");

  $nombre = $_POST['buscador'];


  $params = array(
    'nombre' => $nombre
  );

  $user = json_decode($usuario->buscar($params));
} else if ($nombre != '') {
  include("../Recursos/Clases/usuario.php");

  $nombre = $_GET['nombre'];


  $params = array(
    'nombre' => $nombre
  );

  $usuario = json_decode($usuario->buscar($params));
  $user[] = $usuario[0];
} else {
  $user = [];
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
                <span>Rut</span>
              </th>
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
                <span>Acciones</span>
              </th>
            </tr>
          </thead>

          <tbody>


            <?php

            foreach ($user as $us) {

              if (!($us->email == "")) {

            ?>
                <tr class="tableInfo">
                  <td>
                    <span><?php echo $us->rut ?></span>
                  </td>
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
                    <div class="button">

                      <button class="buttonEdit" type="button" data-bs-toggle="modal" data-bs-target="#modalEditar" onClick='botonEditar("<?php echo $us->rut . "&" . $us->id . "&" . $us->nombre . "&" . $us->apellido . "&" . $us->email . "&" . $us->contraseña  ?>")'>
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
        <form method="post" name="form1" onSubmit="javascript:return Rut(document.form1.rut.value)" action="../Recursos/Funciones/usuarioFx.php">

          <div class="modal-body">
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputRut">Rut (sin guión y sin coma)</label>
              <input type="text" class="form-control form-control-sm" id="inputRut" placeholder="Rut" name="rut" minlength="8" maxlength="9" required>
            </div>

            <div class="form-group mx-sm-5 mb-2">
              <label for="inputNombre" class="form-label-sm">Nombre</label>
              <input class="form-control form-control-sm" type="text" name="nombre" placeholder="Nombre" id="inputNombre" required>
            </div>
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputApellido">Apellido</label>
              <input class="form-control form-control-sm" type="text" name="apellido" placeholder="Apellido" id="inputApellido" required>
            </div>

            <div class="form-group mx-sm-5 mb-2">
              <label for="inputEmail">Email</label>
              <input type="email" name="email" class="form-control form-control-sm" id="inputEmail" aria-describedby="emailHelp" placeholder="Email@email.com" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputPassword">Contraseña</label>
              <input type="password" name="contraseña" class="form-control form-control-sm" id="inputPassword" placeholder="Contraseña" required>
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
              <label for="inputRutEditar">Rut</label>
              <input type="text" class="form-control form-control-sm" id="inputRutEditar" placeholder="Rut" name="rut" minlength="8" maxlength="9" required>
            </div>

            <div class="form-group mx-sm-5 mb-2">
              <label for="inputNombreEditar" class="form-label-sm">Nombre</label>
              <input class="form-control form-control-sm" type="text" placeholder="Nombre" id="inputNombreEditar" name="nombre" required>
            </div>
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputApellidoEditar">Apellido</label>
              <input class="form-control form-control-sm" type="text" placeholder="Apellido" id="inputApellidoEditar" name="apellido" required>
            </div>

            <div class="form-group mx-sm-5 mb-2">
              <label for="inputEmailEditar">Email</label>
              <input type="email" class="form-control form-control-sm" id="inputEmailEditar" aria-describedby="emailHelp" placeholder="Email@email.com" name="email" required>
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputPasswordEditar">Contraseña</label>
              <input type="password" class="form-control form-control-sm" id="inputPasswordEditar" placeholder="Contraseña" name="contraseña" required>
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

      let rutEditar = document.querySelector("#inputRutEditar")
      let idEditar = document.querySelector("#inputIdEditar")
      let nombreEditar = document.querySelector("#inputNombreEditar")
      let apellidoEditar = document.querySelector("#inputApellidoEditar")
      let emailEditar = document.querySelector("#inputEmailEditar")
      let passwEditar = document.querySelector("#inputPasswordEditar")

      let arrayButonEdit = valor.split("&")

      rutEditar.setAttribute("value", arrayButonEdit[0])
      idEditar.setAttribute("value", arrayButonEdit[1])
      nombreEditar.setAttribute("value", arrayButonEdit[2])
      apellidoEditar.setAttribute("value", arrayButonEdit[3])
      emailEditar.setAttribute("value", arrayButonEdit[4])
      passwEditar.setAttribute("value", arrayButonEdit[5])

    }

    // Validador de Rut
    function revisarDigito(dvr) {
      dv = dvr + ""
      if (dv != '0' && dv != '1' && dv != '2' && dv != '3' && dv != '4' && dv != '5' && dv != '6' && dv != '7' && dv != '8' && dv != '9' && dv != 'k' && dv != 'K') {
        alert("Debe ingresar un digito verificador valido");
        window.document.form1.rut.focus();
        window.document.form1.rut.select();
        return false;
      }
      return true;
    }

    function revisarDigito2(crut) {
      largo = crut.length;
      if (largo < 2) {
        alert("Debe ingresar el rut completo")
        window.document.form1.rut.focus();
        window.document.form1.rut.select();
        return false;
      }
      if (largo > 2)
        rut = crut.substring(0, largo - 1);
      else
        rut = crut.charAt(0);
      dv = crut.charAt(largo - 1);
      revisarDigito(dv);

      if (rut == null || dv == null)
        return 0

      var dvr = '0'
      suma = 0
      mul = 2

      for (i = rut.length - 1; i >= 0; i--) {
        suma = suma + rut.charAt(i) * mul
        if (mul == 7)
          mul = 2
        else
          mul++
      }
      res = suma % 11
      if (res == 1)
        dvr = 'k'
      else if (res == 0)
        dvr = '0'
      else {
        dvi = 11 - res
        dvr = dvi + ""
      }
      if (dvr != dv.toLowerCase()) {
        alert("EL rut es incorrecto")
        window.document.form1.rut.focus();
        window.document.form1.rut.select();
        return false
      }

      return true
    }

    function Rut(texto) {
      var tmpstr = "";
      for (i = 0; i < texto.length; i++)
        if (texto.charAt(i) != ' ' && texto.charAt(i) != '.' && texto.charAt(i) != '-')
          tmpstr = tmpstr + texto.charAt(i);
      texto = tmpstr;
      largo = texto.length;

      if (largo < 2) {
        alert("Debe ingresar el rut completo")
        window.document.form1.rut.focus();
        window.document.form1.rut.select();
        return false;
      }

      for (i = 0; i < largo; i++) {
        if (texto.charAt(i) != "0" && texto.charAt(i) != "1" && texto.charAt(i) != "2" && texto.charAt(i) != "3" && texto.charAt(i) != "4" && texto.charAt(i) != "5" && texto.charAt(i) != "6" && texto.charAt(i) != "7" && texto.charAt(i) != "8" && texto.charAt(i) != "9" && texto.charAt(i) != "k" && texto.charAt(i) != "K") {
          alert("El valor ingresado no corresponde a un R.U.T valido");
          window.document.form1.rut.focus();
          window.document.form1.rut.select();
          return false;
        }
      }

      var invertido = "";
      for (i = (largo - 1), j = 0; i >= 0; i--, j++)
        invertido = invertido + texto.charAt(i);
      var dtexto = "";
      dtexto = dtexto + invertido.charAt(0);
      dtexto = dtexto + '-';
      cnt = 0;

      for (i = 1, j = 2; i < largo; i++, j++) {
        //alert("i=[" + i + "] j=[" + j +"]" );		
        if (cnt == 3) {
          dtexto = dtexto + '.';
          j++;
          dtexto = dtexto + invertido.charAt(i);
          cnt = 1;
        } else {
          dtexto = dtexto + invertido.charAt(i);
          cnt++;
        }
      }

      invertido = "";
      for (i = (dtexto.length - 1), j = 0; i >= 0; i--, j++)
        invertido = invertido + dtexto.charAt(i);

      window.document.form1.rut.value = invertido.toUpperCase()

      if (revisarDigito2(texto))
        return true;

      return false;
    }
  </script>


</body>

</html>