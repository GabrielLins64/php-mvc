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
      $note = $this->model('Note');
      $note->title = $_POST['titulo'];
      $note->text = $_POST['texto'];

      $mensagem[] = $note->save();
    endif;
    
    $this->view('notes/criar', $dados = ['mensagem' => $mensagem]);
  }
}

?>
