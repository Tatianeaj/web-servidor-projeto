<?php

trait ViewTrait
{
  public function render($view, $data = [])
  {
    foreach ($data as $key => $value) {
      ${$key} = $value;
    }
    return require "./views/$view.view.php";
  }
}
