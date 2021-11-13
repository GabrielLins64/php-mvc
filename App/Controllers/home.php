<?php

use \App\Core\Controller;

class Home extends Controller
{
  public function index($nome = '', $email = '')
  {
    $user = $this->model('User');
    $user->nome = $nome;
    $user->email = $email;

    echo "<h1>Index.</h1>";
    echo "$user->nome<br>$user->email<br>";
  }
}

?>
