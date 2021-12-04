<!-- Header -->
<div style="background-color: darkblue; border: 2px solid blue; padding: 5px">
  <div style="width: 80%; float: left;">

    <a href="/" style="color: white">Home</a>
    <span style="color: white"> | </span>

    <a href="/notes/criar" style="color: white">Criar bloco</a>
    <span style="color: white"> | </span>

    <?php if (!isset($_SESSION['logado'])): ?>
      <a href="/home/login" style="color: white">Login</a>
    <?php else: ?>
      <a href="/home/logout" style="color: white">Logout</a>
    <?php endif; ?>

  </div>

  <div style="width: 20%; float: right; text-align: right;">
    <button id="dark_light_btn" class="dark-mode">Dark Mode</button>
  </div>

  <br style="clear: both;">
</div>
