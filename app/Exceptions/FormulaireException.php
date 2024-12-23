<?php
namespace Grp2021\app\Exceptions;
class FormulaireException extends \Exception {
    protected string $type;

    public function __construct($message,$type) {
        parent::__construct($message);
        $this->type = $type;
    }

    public function getType() : string {
        return $this->type;
    }
}