<h1>Editar bloco de anotação</h1>

<?php
  if(!empty($data['mensagem'])):
    foreach($data['mensagem'] as $m):
      echo $m."<br>";
    endforeach;
  endif;
?>

<hr>

<form action="/notes/editar/<?php echo $data['registro']['id'] ?>" method="POST">
  Título: <input type="text" name="titulo" value="<?php print $data['registro']['titulo'] ?>"><br>
  Texto: <textarea name="texto"><?php print $data['registro']['texto'] ?></textarea><br>
  <button type="submit" name="atualizar">Atualizar</button>
</form>
