<?php

require __DIR__ . '/vendor/autoload.php'; 

use PhpParser\Error;
use PhpParser\NodeDumper;
use PhpParser\ParserFactory;
use PhpParser\PrettyPrinter\Standard;

$code = <<<'CODE'
<?php
namespace NS {
    use function foo\bar as baz;
    class Foo {}

    fn::Foo::bar; // ['NS\Foo', 'bar']
    fn::$foo->bar; // [$foo, 'bar']
    fn::baz; // 'foo\bar'
    fn::self::bar; // 'foo\bar'
    fn::static::bar; // 'foo\bar'
    fn::parent::bar; // 'foo\bar'
}
CODE;

$parser = (new ParserFactory)->create(ParserFactory::PREFER_PHP7);

$ast = $parser->parse($code);

$dumper = new NodeDumper;
echo $dumper->dump($ast) . "\n\n";

$printer = new Standard();
echo $printer->prettyPrint($ast);
