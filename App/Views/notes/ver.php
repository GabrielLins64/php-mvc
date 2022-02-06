<input type="button" onclick="location.href='/'" value="Voltar">
<h1>Ver</h1>

<hr>

<h3>Título: <?php echo $data['titulo']; ?></h3>
<?php
  if ($data['imagem'])
    print "<img src='".URL_BASE."/assets/uploads/".$data['imagem']."' alt='Note Image' width='200'>";
?>
<p>Texto: <?php echo $data['texto']; ?></p><br>
