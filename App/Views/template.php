<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/css/main.css" type="text/css"/>
  <title>PHP MVC</title>
</head>
<body>
  <?php require_once 'global/header.php' ?>

  <div class="main-content">
    <?php require_once '../App/Views/' . $view . '.php' ?>
  </div>

  <?php require_once 'global/footer.php' ?>
</body>
</html>