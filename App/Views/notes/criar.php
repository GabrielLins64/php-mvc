<h1>Criar bloco de anotação</h1>

<?php
  if(!empty($data['mensagem'])):
    foreach($data['mensagem'] as $m):
      echo $m."<br>";
    endforeach;
  endif;
?>

<form action="/notes/criar" method="POST">
  Título: <input type="text" name="titulo" id=""><br>
  Texto: <textarea name="texto"></textarea><br>
  <button type="submit" name="cadastrar">Cadastrar</button>
</form>