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

<form action="/notes/editar/<?php echo $data['registro']['id'] ?>" method="POST" enctype="multipart/form-data">
  <input placeholder="Título" type="text" name="titulo" value="<?php print $data['registro']['titulo'] ?>"><br>
  <textarea placeholder="Texto" name="texto"><?php print $data['registro']['texto'] ?></textarea><br>
  <button type="button" onclick="document.getElementById('fileInput').click()">Imagem</button>
  <label for="fileInput" id="file-label"><?php print $data['registro']['imagem'] ?? "Insira uma imagem"; ?></label><br>
  <input id="fileInput" accept="image/png, image/jpeg" type='file' name="noteImage" hidden>
  <button name="removerImagem" value="true">Remover imagem</button><br>
  <button type="submit" name="atualizar">Atualizar</button>
</form>

<script src="/js/init.js"></script>
