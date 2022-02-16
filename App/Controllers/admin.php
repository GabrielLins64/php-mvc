<?php

use \App\Auth;
use \App\Core\Controller;

class Admin extends Controller
{
  public function index()
  {
    Auth::CheckLevel(1);

    $this->view('admin/index');
  }
}

?>
