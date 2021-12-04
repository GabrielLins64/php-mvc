<?php

use App\Core\Controller;

class Accounts extends Controller
{
  public function cadastrar()
  {
    $mensagem = array();

    if (isset($_POST['cadastrar'])):
      if (empty($_POST['nome']) || empty($_POST['email']) || empty($_POST['senha'])):
        $mensagem[] = "Todos os campos devem ser preenchidos!";
      else:
        $account = $this->model('Account');

        $account->name = $_POST['nome'];
        $account->email = $_POST['email'];
        $account->password = password_hash($_POST['senha'], PASSWORD_BCRYPT);

        $mensagem[] = $account->save();
      endif;
    endif;
    
    $this->view('accounts/cadastrar', $dados = ['mensagem' => $mensagem]);
  }
}

?>
