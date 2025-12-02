<?php
session_start();

// Si ya hay un usuario logueado, redirige al dashboard
if (isset($_SESSION['usuario'])) {
    header("Location: paginau.php");
    exit();
}

// Capturar mensaje de error desde login.php
$error = '';
if (isset($_SESSION['error'])) {
    $error = $_SESSION['error'];
    unset($_SESSION['error']); // Limpiar error después de mostrarlo
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>P.Los caramelitos</title>
  <link rel="stylesheet" href="hoja.css">
</head>
<body>
  <header>
    <center><h1>P.Los caramelitos</h1></center>
  </header>

  <div class="login-container">
    <h2>Iniciar sesión</h2>

    <?php if ($error): ?>
        <p style="color:red;"><?php echo htmlspecialchars($error); ?></p>
    <?php endif; ?>

    <form action="login.php" method="post">
      <p>
        <label for="usuario">Usuario:</label>
        <input type="text" id="usuario" name="usuario" required>
      </p>

      <p>
        <label for="password">Contraseña:</label>
        <input type="password" id="password" name="password" required>
      </p>

      <p>
        <button type="submit">Ingresar</button>
      </p>
    </form>
  </div>

  <footer>
    <p>© Niños En Vietnam</p>
  </footer>
</body>
</html>