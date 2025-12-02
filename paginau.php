<?php
session_start();

// Verificar si hay un usuario en sesión
if (!isset($_SESSION['usuario'])) {
    header("Location: index.php"); // Redirige al login si no hay sesión
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Dashboard - P.Los caramelitos</title>
  <link rel="stylesheet" href="hoja.css">
</head>
<body>
  <header>
    <h1>P.Los caramelitos</h1>
  </header>

  <div class="dashboard-container">
    <h2>Bienvenido, <?php echo htmlspecialchars($_SESSION['usuario']); ?></h2>
    <p>Página principal.</p>

    <!-- Botón de cerrar sesión -->
    <form action="logout.php" method="post">
      <button type="submit">Cerrar sesión</button>
    </form>
  </div>

  <footer>
    <p>© Niños En Vietnam</p>
  </footer>
</body>
</html>