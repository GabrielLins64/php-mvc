<input type="button" onclick="location.href='/'" value="Voltar">
<h1>Criar bloco de anotação</h1>

<?php
  if(!empty($data['mensagem'])):
    foreach($data['mensagem'] as $m):
      echo $m."<br>";
    endforeach;
  endif;
?>

<hr>

<form action="/notes/criar" method="POST">
  <input placeholder="Título" type="text" name="titulo"><br>
  <textarea placeholder="Texto" name="texto"></textarea><br>
  <button type="submit" name="cadastrar">Cadastrar</button>
</form>
