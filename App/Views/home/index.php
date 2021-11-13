<h1>Index Home</h1>
<?php foreach ($data as $note): ?>
  <h3>Título: <?php echo $note['titulo']; ?></h3>
  <p>Texto: <?php echo $note['texto']; ?></p><br>
<?php endforeach; ?>
