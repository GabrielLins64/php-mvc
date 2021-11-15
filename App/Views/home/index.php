<h1>Index Home</h1>
<?php foreach ($data as $note): ?>
  <h3>
    <a href="/notes/ver/<?php echo $note['id']; ?>">
      <?php echo $note['titulo']; ?>
    </a>
  </h3>

  <p>
    <?php echo $note['texto']; ?>
  </p>
  <br>
<?php endforeach; ?>
