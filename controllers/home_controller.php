<?php
require_once('controllers/base_controller.php');

class home_controller extends base_controller
{
  function __construct()
  {
    $this->folder = 'home';
  }
  public function index()
  {
    $this->render('index');
  }
  public function error()
  {
    $this->render('error');
  }
}
