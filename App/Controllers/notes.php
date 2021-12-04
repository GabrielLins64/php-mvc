<?php

use \App\Core\Controller;
use App\Core\Model;

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

  public function excluir($id)
  {
    $mensagem = array();
    $note = $this->model('Note');

    $mensagem[] = $note->delete($id);
    $dados = $note->getAll();

    $this->view('home/index', $dados = ['registros' => $dados, 'mensagem' => $mensagem]);
  }
}

?>
