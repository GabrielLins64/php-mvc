<?php

use \App\Core\Controller;

class Home extends Controller
{
  public function index()
  {
    $note = $this->model('Note');
    $dados = $note->getAll();

    $this->view('home/index', $dados = ['registros' => $dados]);
  }

  public function search()
  {
    $searchValue = $_GET['search'] ?? $_SESSION['search'];
    $_SESSION['search'] = $searchValue;

    $note = $this->model('Note');
    $data = $note->search($searchValue);
    $this->view('home/index', $data = ['registros' => $data]);
  }
}

?>
