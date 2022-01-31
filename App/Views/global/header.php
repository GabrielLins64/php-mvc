<!-- Header -->
<div id="main-nav" class="main-header">
  <div id="left-main-nav">
    <img id="main-logo" src="<?php print URL_BASE; ?>/assets/png/logo1.png" alt="aqua logo" width="50">

    <a href="/">Home</a>
    <span> | </span>

    <?php if (!isset($_SESSION['logado'])): ?>
      <a href="/accounts/login">Login</a>
      <span> | </span>
      <a href="/accounts/cadastrar">Cadastro</a>

    <?php else: ?>
      <a href="/notes/criar">Criar bloco</a>
      <span> | </span>

      <a href="/accounts/logout">Logout</a>
    <?php endif; ?>

    <a id="dark_light_lnk">🌛︎ Dark Mode</a>

  </div>

  <div id="right-main-nav">
    <button id="dark_light_btn" class="dark-mode">🌛︎ Dark Mode</button>
    <a id="hamburguer-icon" href="javascript:void(0);" class="icon" onclick="toggleNav()"></a>
  </div>

  <br style="clear: both;">
</div>
