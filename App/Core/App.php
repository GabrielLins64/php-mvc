<?php

namespace App\Core;

/**
 * App Routing system
 */
class App
{
  // Default controller (route)
  protected $controller = 'home';
  // Default controller method
  protected $method = 'index';
  // Default controller method parameters
  protected $params = [];

  public function __construct()
  {
    $url = $this->parseURL();

    // Verify the basic routes
    // If the controller route exists, then set it
    if (file_exists('../App/Controllers/' . $url[1] . '.php')):
      $this->controller = $url[1];
      unset($url[1]);
    // If the url doesn't specify a controller, just keep controller at home.
    // Otherwise, send to "Not Found" page
    elseif ($url[1] != ''):
      $this->controller = 'errorRoutes';
      $this->method = 'notfound';
      unset($url[1]);
    endif;

    // Require the controller (route) class and instantiate it on this controller
    require_once '../App/Controllers/' . $this->controller . '.php';
    $this->controller = new $this->controller;

    // If the url specifies a controller method, and it exists on the controller
    // set this method.
    if (isset($url[2])):
      if (method_exists($this->controller, $url[2])):
        $this->method = $url[2];
        unset($url[2]);
        unset($url[0]);
      endif;
    endif;

    // if $url isn't set, means that a only url[0], url[1] and url[2]
    // was set (and has been unsetted above). Otherwise, there would
    // be an url[3], that is the parameters.
    $this->params = $url ? array_values($url) : [];
    // Calls the controller's method.
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  /**
   * Returns an array with the url routes
   */
  public function parseURL()
  {
    // Removing GET queries from route
    $route = strtok($_SERVER['REQUEST_URI'], "?");
    // Returning array with subroutes
    return explode('/', filter_var($_SERVER['SERVER_NAME'].$route, FILTER_SANITIZE_URL));
  }
}

?>