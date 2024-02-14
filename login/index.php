<?php 

session_start();

require 'database.php';

$user = null;


if (isset($_SESSION['user_id'])) {
 $records = $conn->prepare('SELECT id, email, password, name FROM users WHERE id =:id');
 $records->bindParam(':id', $_SESSION['user_id']);
 $records->execute();
 $results = $records->fetch(PDO::FETCH_ASSOC);


if (count($results) > 0) {

 $user = $results;

}


}




?>



<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>Página Login</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="assets\css\style.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,100&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>

<?php require 'partials/header.php' ?>

<?php if (!empty($user)):?>
  <br> Bienvenido.<?= $user['email'] ?>
  <br> Estás logueado en
  <a href="logout.php">salir</a>
  <?php else: ?>
  <br> No estás logueado en
  <?php endif; ?>

  <div class="login-box">
    <h1>Inicia Sesión</h1>
    <a href="login.php"> Inicia Sesión </a> o
    <a href="signup.php"> Regístrate</a>
  </div>

</body>
</html>