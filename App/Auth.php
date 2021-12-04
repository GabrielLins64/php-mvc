<?php

namespace App;

use App\Core\Model;

class Auth
{
  public static function Login($email, $senha)
  {
    $sql = "SELECT * FROM contas WHERE email = ?";
    $stmt = Model::getConn()->prepare($sql);
    $stmt->bindValue(1, $email);
    $stmt->execute();

    if($stmt->rowCount() >= 1):
      $res = $stmt->fetch(\PDO::FETCH_ASSOC);

      if(password_verify($senha, $res['senha'])):
        $_SESSION['logado'] = true;
        $_SESSION['userId'] = $res['id'];
        $_SESSION['userName'] = $res['nome'];
        header('Location: /home/index');
      else:
        return "Senha inválida!";
      endif;
    else:
      return "Email inválido!";
    endif;
  }

  public static function Logout()
  {
    session_destroy();
    header('Location: /home/index');
  }

  public static function CheckLogin()
  {
    if (!isset($_SESSION['logado'])):
      header('Location: /home/login');
      die;
    endif;
  }
}

?>
