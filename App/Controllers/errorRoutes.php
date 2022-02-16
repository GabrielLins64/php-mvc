<?php

use App\Core\Controller;

class ErrorRoutes extends Controller
{
  public function notfound()
  {
    $this->view('global/notfound');
  }

  public function unauthorized()
  {
    $this->view('global/unauthorized');
  }
}

?>
