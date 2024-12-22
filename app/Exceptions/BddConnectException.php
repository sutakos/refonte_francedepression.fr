<?php

namespace Grp202_1\php;
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