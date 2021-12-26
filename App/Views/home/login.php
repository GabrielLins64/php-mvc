<input type="button" onclick="location.href='/'" value="Voltar">
<h1>Fazer login</h1>

<?php
  if(!empty($data['mensagem'])):
    foreach($data['mensagem'] as $m):
      echo $m."<br>";
    endforeach;
  endif;
?>

<hr>

<form action="" method="post">
  <input type="email" name="email" placeholder="Email"><br>
  <input type="password" name="senha" placeholder="Senha"><br>
  <button type="submit" name="entrar">Entrar</button>
</form>
