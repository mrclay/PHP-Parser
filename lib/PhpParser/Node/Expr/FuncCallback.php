<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

use PhpParser\Node\Expr;
use PhpParser\Name;

class FuncCallback extends Expr
{ 
    /** @var Node\Name|Expr Function name */
    public $name;

    /**
     * Constructs a function callback
     *
     * @param Node\Name|Expr $name       Function name
     * @param array          $attributes Additional attributes
     */
    public function __construct($name, array $attributes = []) {
      $this->attributes = $attributes;
      $this->name = $name;
    }

    public function getSubNodeNames() : array {
      return ['name'];
  }
    
    public function getType() : string {
        return 'Expr_FuncCallback';
    }
}
