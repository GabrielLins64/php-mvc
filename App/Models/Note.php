<?php

use \App\Core\Model;

class Note extends Model
{
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
}

?>
