<input type="button" onclick="location.href='/'" value="Voltar">
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
  <input placeholder="Título" type="text" name="titulo" value="<?php print $data['registro']['titulo'] ?>"><br>
  <textarea placeholder="Texto" name="texto"><?php print $data['registro']['texto'] ?></textarea><br>
  <button type="submit" name="atualizar">Atualizar</button>
</form>
