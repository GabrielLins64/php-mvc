<input type="button" onclick="location.href='/'" value="Voltar">
<h1>Ver</h1>

<hr>

<div class="note-container">
  <?php
    if ($data['imagem']) {
      print "<img src='".URL_BASE."/assets/uploads/".$data['imagem']."' alt='Note Image' class='note-img'>";
    }
  ?>
  <div class="note-content">
    <h3>Título: <?php echo $data['titulo']; ?></h3>
    <p>Texto: <?php echo $data['texto']; ?></p><br>
  </div>
</div>
