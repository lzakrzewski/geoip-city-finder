<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__ . '/src')
;

return PhpCsFixer\Config::create()
    ->setRules([
        '@Symfony' => true,
        'binary_operator_spaces' => ['align_double_arrow' => true, 'align_equals' => true],
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => true,
    ])
    ->setFinder($finder)
    ->setUsingCache(true)
;