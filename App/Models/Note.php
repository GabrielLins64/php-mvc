<?php

use \App\Core\Model;

class Note extends Model
{
  public $title;
  public $text;
  public $image;

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

  public function search($searchValue)
  {
    $sql = "SELECT * FROM anotacoes WHERE titulo LIKE ?;";
    $stmt = Model::getConn()->prepare($sql);
    $stmt->execute(array("%$searchValue%"));

    if ($stmt->rowCount() > 0):
      $result = $stmt->fetchAll(\PDO::FETCH_ASSOC);
      return $result;
    else:
      return [];
    endif;
  }

  public function save()
  {
    $sql = "INSERT INTO anotacoes (titulo, texto, imagem) VALUES (?, ?, ?);";
    $stmt = Model::getConn()->prepare($sql);
    $stmt->bindValue(1, $this->title);
    $stmt->bindValue(2, $this->text);
    $stmt->bindValue(3, $this->image ?? null);

    if ($stmt->execute()):
      return "Cadastrado com sucesso!";
    else:
      return "Erro ao cadastrar";
    endif;
  }

  public function update($id)
  {
    $sql = "UPDATE anotacoes SET titulo = ?, texto = ?, imagem = ? WHERE id = ?";
    $stmt = Model::getConn()->prepare($sql);
    $stmt->bindValue(1, $this->title);
    $stmt->bindValue(2, $this->text);
    $stmt->bindValue(3, $this->image ?? null);
    $stmt->bindValue(4, $id);

    if ($stmt->execute()):
      return "Atualizado com sucesso!";
    else:
      return "Erro ao atualizar";
    endif;    
  }

  public function delete($id)
  {
    $sql = "DELETE FROM anotacoes WHERE id = ?";
    $stmt = Model::getConn()->prepare($sql);
    $stmt->bindValue(1, $id);

    if ($stmt->execute()):
      return "Excluído com sucesso!";
    else:
      return "Erro ao excluir";
    endif;
  }
}

?>
