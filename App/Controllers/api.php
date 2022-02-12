<?php

use App\Auth;
use \App\Core\Controller;

class Api extends Controller
{
  public function notes()
  {
    $note = $this->model('Note');
    $dados = $note->getAll();

    if (   isset($_POST['email'])
       and isset($_POST['password'])
       and Auth::LoginApi($_POST['email'], $_POST['password']))
    {
      header('Content-Type: application/json; charset:utf-8');
      echo json_encode($dados);
    }
    else {
      header('HTTP/1.1 401 Unauthorized; Content-Type: text/html; charset:utf-8');
      echo "<h1>401 Unauthorized</h1>";
      echo "Invalid credentials!";
    }
  }
}

?>
