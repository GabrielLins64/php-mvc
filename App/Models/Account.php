<?php

use \App\Core\Model;

class Account extends Model
{
  public $name;
  public $email;
  public $password;

  public function save()
  {
    $sql = "INSERT INTO contas (nome, email, senha) VALUES (?, ?, ?);";
    $stmt = Model::getConn()->prepare($sql);
    $stmt->bindValue(1, $this->name);
    $stmt->bindValue(2, $this->email);
    $stmt->bindValue(3, $this->password);

    if ($stmt->execute()):
      return "Cadastrado com sucesso!";
    else:
      return "Erro ao cadastrar";
    endif;
  }
}

?>
