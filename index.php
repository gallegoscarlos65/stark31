<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "stark21";
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $stmt = $conn->prepare("CALL PR_LISTAR_NAVES(1)");
  $stmt->execute();
  $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  $naves = $stmt->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link href="bootstrap.min.css" rel="stylesheet">
</head>
<body class="container">
      <a href="create_nave_form.html">Crear</a>
<!-- <form action="">
  <p>Nave</p>
  <input type="text">
  <input type="submit">
</form> -->

<h1>STARK INDUSTRIES</h1>

<h2>NAVES DISPONIBLES en la empresa de stark</h2>
<hr>
  <table class="table table-striped table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nave</th>
        <th>Modelo</th>
        <th>Capacidad</th>
        <th>Estatus</th>
        <th>Opciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($naves as $nave) { ?>
        
        <tr>
          <td> <?php echo $nave['idnaves']; ?> </td>
          <td> <?php echo $nave['nave']; ?> </td>
          <td> <?php echo $nave['modelo']; ?> </td>
          <td> <?php echo $nave['capacidad']; ?> </td>
          <td> <?php echo $nave['estatus']; ?> </td>
          <td> <a href="#">Editar</a> </td>
        </tr>

        <?php } ?>
    
    </tbody>
  </table>
</body>
</html>
