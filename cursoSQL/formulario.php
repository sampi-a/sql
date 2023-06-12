<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<style>.group {
  margin: 20px 40%;
  width: 300px;
  text-align: center;
  background-color: lightblue;
  padding: 20px;
  display: inline-block;
}

h2 {
  font-size: 24px;
  margin-bottom: 10px;
  text-align: center;
  font-family: cursive;
}

em {
  font-style: italic;
}

label {
  display: block;
  margin-bottom: 5px;
}

input[type="text"] {
  width: 80%;
  padding: 10px;
  margin-bottom: 10px;
  background-color: yellow;
  border: none;
}

.form-btn {
display: block;
  width: 125px;
  padding: 10px;
  margin-left:20px;
  margin-top: 10px;
  background-color: darkblue;
  color: #fff;
  border: none;
  cursor: pointer;
}

.form-btn:hover {
  background-color: #1a1a8a;
}

</style>
</head>
<body>
    <div class="group">
<form method="POST" action="a.php">
<h2><em>Formulario de registro</em></h2>
<label for="nombre">Nombre <span><em>(requerido)</em></span></label>
<input type="text" name="nombre" class="fomr-input" required/>
<label for="apellido" >Apellido <span><em>(requerido)</em></span></label>
<input type="text" name="apellido" class="form-input" required/>

<label for="email">Email <span><em>(requerido)</em></span></label>
<input type="text" name="email" class="form-input" />
<input class="form-btn" name="submit" type="submit" value="Suscribirse" />
<?php

if($_POST){
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];

    //conexion con pdo
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "cursosql";

    //create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    //check connection

    if ($conn->connect_error) {
die("connection failed: " . $conn->connect_error);
    }

$sql = "INSERT INTO usuario (nombre, apellido, email)
VALUES ('$nombre', '$apellido', '$email')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

}

?>
</form>


    </div>
</body>
</html>