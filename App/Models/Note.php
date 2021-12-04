<?php

use \App\Core\Model;

class Note extends Model
{
  public $title;
  public $text;
  
  public function getAll()
  {
    $sql = "SELECT * FROM anotacoes;";
    $stmt = Model::getConn()->prepare($sql);
    $stmt->execute();

    if ($stmt->rowCount() > 0):
      $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      return $result;
    else:
      return [];
    endif;
  }

  public function find($id)
  {
    $sql = "SELECT * FROM anotacoes WHERE id = ?;";
    $stmt = Model::getConn()->prepare($sql);
    $stmt->bindValue(1, $id);
    $stmt->execute();

    if ($stmt->rowCount() > 0):
      $result = $stmt->fetch(\PDO::FETCH_ASSOC);
      return $result;
    else:
      return [];
    endif;
  }

  public function save()
  {
    $sql = "INSERT INTO anotacoes (titulo, texto) VALUES (?, ?);";
    $stmt = Model::getConn()->prepare($sql);
    $stmt->bindValue(1, $this->title);
    $stmt->bindValue(2, $this->text);

    if ($stmt->execute()):
      return "Cadastrado com sucesso!";
    else:
      return "Erro ao cadastrar";
    endif;
  }
}

?>
