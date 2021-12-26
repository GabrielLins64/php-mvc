<!-- Header -->
<div id="main-nav" class="main-header">
  <div style="width: 70%; float: left;">

    <a href="/">Home</a>
    <span> | </span>

    <?php if (!isset($_SESSION['logado'])): ?>
      <a href="/home/login">Login</a>
      <span> | </span>
      <a href="/accounts/cadastrar">Cadastro</a>

    <?php else: ?>
      <a href="/notes/criar">Criar bloco</a>
      <span> | </span>

      <a href="/home/logout">Logout</a>

    <?php endif; ?>

    <a id="dark_light_lnk">🌛︎ Dark Mode</a>

  </div>

  <div style="width: 30%; float: right; text-align: right;">
    <button id="dark_light_btn" class="dark-mode">🌛︎ Dark Mode</button>

    <a id="hamburguer-icon" href="javascript:void(0);" class="icon" onclick="toggleNav()"></a>
  </div>

  <br style="clear: both;">
</div>
