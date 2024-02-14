<?php


session_start();

require 'database.php';


if (!empty($_POST['email']) && !empty($_POST['password'])) {

$records = $conn->prepare('SELECT id, email, password FROM users WHERE email=:email');
$records->bindParam(':email', $_POST['email']);
$records->execute();
$results =$records->fetch(PDO::FETCH_ASSOC);


$message ='';


if(password_verify($_POST['password'], $results['password'])) {
    $_SESSION['usaer_id'] =$results['is'];
    header('Location: /login');


} else {

     $message =  'El usuario no existe';

}


}

?>


<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8">
   <title>Página Login</title>
   <link rel="stylesheet" href="assets\css\style.css">
</head>

<body>
<?php require 'partials/header.php' ?>

<?php  if (!empty($message)): ?>
  <p><?= $message ?></p>
  <?php  endif; ?>



   <div class="login-box">
      <h1>Inicia Sesión</h1>
      <a href="login.php"> </a>
      <a href="signup.php"> </a>
      <form class="login-form" action="login.php" method="post">
         <input type="text" name="email" placeholder="Introduce tu email">
         <input type="password" name="password" placeholder="Introduce tu contraseña">
         <input type="submit" value="Enviar">
      </form>
      <p>¿Aún no tienes cuenta? <a href="signup.php"> Regístrate</a></p>
   </div>
</body>

</html>