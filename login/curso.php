<!doctype html>
<html>
    <head>
    <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f4f4f4;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 10vh;
    }
    
    form {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    
    input[type="text"],
    input[type="email"],
    textarea {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
      box-sizing: border-box;
    }
    
    input[type="submit"] {
      background-color: #4caf50;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    
    input[type="submit"]:hover {
      background-color: #45a049;
    }
  </style>

    </head>


    <body>

<p> prueba </p>
<form action="#">
    <label for="nombre_usuario">Nombre:</label>
    <input type="text" id="nombre_usuario" name="nombre_usuario" required>
    <label for="edad_usuario">Edad:</label>
    <input type="text" id="edad_usuario" name="edad_usuario" required>
    <label for="message">Mensaje:</label>
    <textarea id="message" name="message" rows="4" required></textarea>
    <input type="submit" value="enviar" name="enviar"  id="enviar">
</form>


  <?php

if (isset($_POST["enviar"])) {

$usuario=$_POST["nombre_usuario"];
$edad=$_POST["edad_usuario"];

if ($usuario=="Juan") {
  
    echo "Puedes entrar";


} else {
  
    echo "No puedes entrar";


}


}

?>

</body>

</html>