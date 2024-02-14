<?php 

   require 'database.php';
   $message = '';

   if (!empty($_POST['email']) && !empty($_POST['password'])) {
      $sql = "INSERT INTO users (email, password, name) VALUES (:email, :password, :name)";
      $stmt = $conn->prepare($sql);
      $stmt->bindParam(':email',$_POST['email']);
      $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
      $stmt->bindParam(':password',$password);
      $stmt->bindParam(':name',$_POST['name']);

    if ($stmt->execute()) {
        $message = 'Nuevo usuario creado correctamente';

      } else {
        $message = 'Error, nuevo usuario no creado ';

      }
    }

?>

<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8">
   <title>Página Registro</title>
   <link rel="stylesheet" href="assets\css\style.css">
</head>

<body>
 <?php require 'partials/header.php'?>

 <?php  if (!empty($message)): ?>
  <p id="signup-successful"><?= $message ?></p>
  <?php  endif; ?>

   <div class="login-box">
      <h1>Regístrate</h1>
      <a href="signup.php"> </a>
      <form class="login-form" action="signup.php" method="post">
         <input type="text" name="email" placeholder="Introduce tu email">
         <input type="text" name="name" placeholder="Introduce tu nombre completo">
         <input type="password" name="password" placeholder="Introduce tu contraseña">
         <input type="password" name="confirm-password" placeholder="Confirma tu contraseña">
         <input type="submit" value="Enviar">
      </form>
   </div>
</body>

</html>