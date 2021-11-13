<?php

class Contato
{
  public function index()
  {
    echo "<h1>Contato</h1>";
  }
  
  public function email($nome = '', $email = '')
  {
    $this->index();
    echo "nome: $nome<br>email: $email<br>";
  }
  
  public function telefone()
  {
    $this->index();
    echo "12345679";
  }
}

?>
