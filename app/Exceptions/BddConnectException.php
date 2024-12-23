<?php

namespace Grp2021\app\Exceptions;
class BddConnectException extends \Exception {
  protected string $type;

  public function __construct($message) {
    parent::__construct($message);
    $this->type = "danger";
  }

  public function getType() : string {
    return $this->type;
  }
}