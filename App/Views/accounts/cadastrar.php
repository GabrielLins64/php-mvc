<input type="button" onclick="location.href='/'" value="Voltar">
<h1>Cadastro</h1>

<?php
  if(!empty($data['mensagem'])):
    foreach($data['mensagem'] as $m):
      echo $m."<br>";
    endforeach;
  endif;
?>

<hr>

<form action="/accounts/cadastrar" method="POST">
  <input placeholder="Nome" type="text" name="nome"><br>
  <input placeholder="Email" type="email" name="email"><br>
  <input placeholder="Senha" type="password" name="senha"><br>
  <button type="submit" name="cadastrar">Cadastrar</button>
</form>
