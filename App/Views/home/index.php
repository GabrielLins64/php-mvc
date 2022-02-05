<h1>Home</h1>

<?php
  print("<script>history.replaceState({},'','/');</script>");

  if(!empty($data['mensagem'])):
    foreach($data['mensagem'] as $m):
      echo $m."<br>";
    endforeach;
  endif;
?>

<hr>

<div class="search-container">
  <form action="/home/search" method="get">
    <input type="search" name="search" placeholder="Busque alguma nota..."
    <?php 
      if (isset($_GET['search'])) {
        print "value='".$_GET['search']."'";
      }
    ?>
    >
    <input type="submit" value="Buscar">
    <?php
      if (isset($_GET['search'])) {
        print "<button type='button' onclick='location.reload(true);'>Voltar</button>";
      }
    ?>
  </form>
</div>

<?php 
  $pagination = new App\Pagination($data['registros'], $_GET['page'] ?? 1, 3);

  if (empty($pagination->result())):
    echo "<p>Nenhum registro encontrado!</p>";
  else:
    foreach ($pagination->result() as $note): ?>
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
      <?php endif;
    endforeach;

    ?>
    <div class="generate-pdf-container">
      <input type="button" onClick="window.open('/pdf','_blank')" value="Gerar PDF">
    </div>
    <?php

    $pagination->navigator();
  endif;
?>
