<?php declare(strict_types=1);

namespace PhpParser\Node\Expr;

use PhpParser\Node;
use PhpParser\Node\Expr;
use PhpParser\Node\Identifier;

class StaticCallback extends Expr
{
    /** @var Node\Name|Expr Class name */
    public $class;
    /** @var Identifier|Expr Method name */
    public $name;

    /**
     * Constructs a static method callback
     *
     * @param Node\Name|Expr         $class      Class name
     * @param string|Identifier|Expr $name       Method name
     * @param array                  $attributes Additional attributes
     */
    public function __construct($class, $name, array $attributes = []) {
        $this->attributes = $attributes;
        $this->class = $class;
        $this->name = \is_string($name) ? new Identifier($name) : $name;
    }

    public function getSubNodeNames() : array {
        return ['class', 'name'];
    }
    
    public function getType() : string {
        return 'Expr_StaticCallback';
    }
}
