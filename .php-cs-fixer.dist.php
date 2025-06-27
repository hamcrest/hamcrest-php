<?php

$finder = PhpCsFixer\Finder::create()
    ->in(__DIR__.'/hamcrest')
    ->in(__DIR__.'/generator')
    ->in(__DIR__.'/tests')
    ->notPath('Matchers.php')
    ->notPath('Hamcrest.php')
    ->name('*.php')
;

return (new PhpCsFixer\Config())
    ->setRules([
        // Use PSR-12 as base but disable the cosmetic rules
        '@PSR12' => true,
        
        // namespace should come directly after the opening tag
        'blank_line_after_opening_tag' => false,
        'linebreak_after_opening_tag' => true,
        'blank_lines_before_namespace' => ['min_line_breaks' => 1, 'max_line_breaks' => 1],

        // add semicolons to the last lines of chained calls
        'multiline_whitespace_before_semicolons' => ['strategy' => 'new_line_for_chained_calls'],
        'method_chaining_indentation' => true,

        // parentheses on new expressions when there are no arguments
        'new_with_parentheses' => ['named_class' => true, 'anonymous_class' => true],

        // use consistent naming for boolean, bool, integer, int, etc
        'phpdoc_scalar' => true,

        // allow a new line after the class opening
        'no_blank_lines_after_class_opening' => false,

    ])
    ->setFinder($finder)
    ->setRiskyAllowed(false)
;
