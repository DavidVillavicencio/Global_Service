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
  <link rel="stylesheet" href="../styles/login.css">

  <title>Login</title>
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
      <form action="../Recursos/Funciones/usuarioFx.php" method="post">
        <legend>Iniciar sesión</legend>
        <fieldset>
          <label for="email">
            <input type="email" name="email" id="email" placeholder="Email" required>

          </label>

          <label for="pass">
            <input type="password" name="password" id="password" placeholder="Contraseña" required>
          </label>

          <input type="hidden">

          <button type="submit" name="buscador">Entrar</button>
        </fieldset>
      </form>
    </section>

  </div>


</body>

</html>