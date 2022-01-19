<?php

use App\Auth;
use App\Core\Controller;

class Accounts extends Controller
{
  public function index()
  {
    $note = $this->model('Note');
    $dados = $note->getAll();

    $this->view('home/index', $dados = ['registros' => $dados]);
  }

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

  public function login()
  {
    $mensagem = array();

    if(isset($_POST['entrar'])):
      if (empty($_POST['email']) || empty($_POST['senha'])):
        $mensagem[] = "Os campos email e senha são obrigatórios!";
      else:
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $mensagem[] = Auth::Login($email, $senha);
      endif;
    endif;

    $this->view('accounts/login', $dados = ['mensagem' => $mensagem]);
  }

  public function logout()
  {
    Auth::Logout();
  }
}

?>
