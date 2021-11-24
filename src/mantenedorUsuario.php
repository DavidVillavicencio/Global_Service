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
      <h4>Pepe</h4>
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
          <div class="formBuscarUsuario" action="post">
            <label for="nomUsuario">
              <span class="spanBuscarUser">Buscar usuario: </span>
            </label>

            <div class="inputBuscar">
              <input class="UsuarioInput" type="text" name="nomUsuario" id="nomUsuario" placeholder="Nombre">
              <button class="buttonBuscar" type="sumbit"> Buscar </button>

            </div>
          </div>

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

            <tr class="tableInfo">
              <td>
                <span>Felipe</span>
              </td>
              <td>
                <span>Di Vanni</span>
              </td>
              <td>
                <span>email@hotmail.com</span>
              </td>
              <td>
                <span>*********</span>
              </td>
              <td>
                <div class="button">
                  <button class="buttonEdit" type="button" data-bs-toggle="modal" data-bs-target="#modalEditar">
                    Editar
                  </button>
                  <button class="buttonDelete" type="submit">
                    <img class="imgDelete" src="../public/img/delete.svg" alt="">
                  </button>
                </div>

              </td>
            </tr>

          </tbody>
        </table>
      </section>
    </div>
    <footer>
    </footer>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="modalAgregar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form>

          <div class="modal-body">
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputNombre" class="form-label-sm">Nombre</label>
              <input class="form-control form-control-sm" type="text" placeholder="Nombre" id="inputNombre">
            </div>
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputApellido">Apellido</label>
              <input class="form-control form-control-sm" type="text" placeholder="Apellido" id="inputApellido">
            </div>

            <div class="form-group mx-sm-5 mb-2">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control form-control-sm" id="inputEmail" aria-describedby="emailHelp" placeholder="Email@email.com">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputPassword">Contraseña</label>
              <input type="password" class="form-control form-control-sm" id="inputPassword" placeholder="Contraseña">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="reset" class="btn btn-secondary">Limpiar</button>
            <button type="submit" class="btn btn-primary">Agregar</button>
          </div>
        </form>

      </div>
    </div>
  </div>


  <!-- Modal 2 -->
  <div class="modal fade" id="modalEditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content bg-dark">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar usuario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form>

          <div class="modal-body">
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputNombre" class="form-label-sm">Nombre</label>
              <input class="form-control form-control-sm" type="text" placeholder="Nombre" id="inputNombre">
            </div>
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputApellido">Apellido</label>
              <input class="form-control form-control-sm" type="text" placeholder="Apellido" id="inputApellido">
            </div>

            <div class="form-group mx-sm-5 mb-2">
              <label for="inputEmail">Email</label>
              <input type="email" class="form-control form-control-sm" id="inputEmail" aria-describedby="emailHelp" placeholder="Email@email.com">
              <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group mx-sm-5 mb-2">
              <label for="inputPassword">Contraseña</label>
              <input type="password" class="form-control form-control-sm" id="inputPassword" placeholder="Contraseña">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="reset" class="btn btn-secondary">Limpiar</button>
            <button type="submit" class="btn btn-primary">Editar</button>
          </div>
        </form>

      </div>
    </div>
  </div>



  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

</body>

</html>