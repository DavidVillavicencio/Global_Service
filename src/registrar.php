<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700;900&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../styles/global.css">
  <link rel="stylesheet" href="../styles/registrar.css">


  <title>Registro</title>
</head>

<body>

  <div class="container">

    <header>
      <a href="./">
        <img src="../public/img/back.png" alt="Volver">
      </a>

      <img class="logoTipo" src="../public/img/logo.jpg" alt="">
    </header>

    <section>
      <form action="post">
        <fieldset>
          <legend>Un Mundo de Conocimiento, registrate para comenzar</legend>
          <label for="nombre">
            <input type="text" name="nombre" id="nombre" placeholder="Nombre" required>
          </label>

          <label for="apellido">
            <input type="text" name="apellido" id="apellido" placeholder="Apellido" required>
          </label>

          <label for="Email">
            <input type="email" name="email" id="email" placeholder="Email" required>
          </label>

          <label for="password">
            <input type="password" name="password" id="password" placeholder="Contraseña" required>
          </label>

          <button type="submit">Registrarse</button>

          <div class="footer">
            <p> Al registrarse acepta los <span>terminos y condiciones del uso</span> de los servicios
              asociados con Goblal Service
            </p>
          </div>
        </fieldset>



      </form>
    </section>

  </div>




</body>

</html>