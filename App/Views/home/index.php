<h1>Home</h1>

<?php
  if(!empty($data['mensagem'])):
    foreach($data['mensagem'] as $m):
      echo $m."<br>";
    endforeach;
  endif;
?>

<hr>

<?php foreach ($data['registros'] as $note): ?>
  <h2>
    <a href="/notes/ver/<?php echo $note['id']; ?>">
      <?php echo $note['titulo']; ?>
    </a>
  </h2>

  <p> <?php echo $note['texto']; ?> </p>

  <?php if(isset($_SESSION['logado'])): ?>
    <a href="/notes/editar/<?php echo $note['id']; ?>">Editar</a>
    <a href="/notes/excluir/<?php echo $note['id']; ?>">Excluir</a>
    <br>
  <?php endif; ?>


<?php endforeach; ?>
