<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP MVC</title>
</head>
<body>
  <div style="background-color: darkblue; border: 2px solid blue">
    <a href="/" style="color: white">Home</a>
    <span style="color: white"> | </span>
    <a href="/notes/criar" style="color: white">Criar bloco</a>
  </div>
  <h2>Bloco de anotações</h2>
  <?php require_once '../App/Views/' . $view . '.php' ?>
</body>
</html>