<?php

namespace App\Core;

class Model
{
  private static $instance;

  public static function getConn()
  {
    if (!isset(self::$instance)):
      require_once '../bin/env.php';
      $env = read_env('../.env');
      self::$instance = new \PDO("mysql:host=localhost;dbname=php_mvc;", $env['USER'], $env['PASS']);
    endif;

    return self::$instance;
  }
}

?>
