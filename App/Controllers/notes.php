<?php

use App\Auth;
use \App\Core\Controller;


class Notes extends Controller
{
  public function ver($id = '')
  {
    $note = $this->model('Note');
    $dados = $note->find($id);

    $this->view('notes/ver', $dados);
  }

  public function criar()
  {
    Auth::CheckLogin();
    
    $mensagem = array();
    
    if (isset($_POST['cadastrar'])):
      if (empty($_POST['titulo']) || empty($_POST['texto'])):
        $mensagem[] = "Todos os campos devem ser preenchidos.";
      else:
        $note = $this->model('Note');
        $note->title = $_POST['titulo'];
        $note->text = $_POST['texto'];
        $mensagem[] = $note->save();
      endif;
    endif;
    
    $this->view('notes/criar', $dados = ['mensagem' => $mensagem]);
  }

  public function editar($id)
  {
    Auth::CheckLogin();

    $mensagem = array();
    $note = $this->model('Note');

    if (isset($_POST['atualizar'])):
      if (empty($_POST['titulo']) || empty($_POST['texto'])):
        $mensagem[] = "Todos os campos devem ser preenchidos.";
      else:
        $note->title = $_POST['titulo'];
        $note->text = $_POST['texto'];
        $mensagem[] = $note->update($id);
      endif;
    endif;

    $dados = $note->find($id);
    $this->view('notes/editar', $dados = ['mensagem' => $mensagem, 'registro' => $dados]);    
  }

  public function excluir($id)
  {
    Auth::CheckLogin();

    $mensagem = array();
    $note = $this->model('Note');

    $mensagem[] = $note->delete($id);
    $dados = $note->getAll();

    $this->view('home/index', $dados = ['registros' => $dados, 'mensagem' => $mensagem]);
  }
}

?>
