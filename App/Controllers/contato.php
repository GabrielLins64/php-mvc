<?php

class Contato
{
  public function index()
  {
    echo "Index do contato";
  }
  
  public function email($nome = '', $email = '')
  {
    echo "nome: $nome<br>email: $email<br>";
  }

  public function telefone()
  {
    echo "12345679";
  }
}

?>
