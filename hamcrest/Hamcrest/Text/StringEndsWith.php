<?php
namespace Hamcrest\Text;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Tests if the argument is a string that ends with a substring.
 */
class StringEndsWith extends SubstringMatcher
{

    /**
     * @param mixed $substring
     */
    public function __construct($substring)
    {
        parent::__construct($substring);
    }

    /**
     * Matches if value is a string that ends with $substring.
     *
     * @factory
     * @param mixed $substring
     * @return StringEndsWith
     */
    public static function endsWith($substring): self
    {
        return new self($substring);
    }

    // -- Protected Methods

    protected function evalSubstringOf(string $string): bool
    {
        return (substr($string, (-1 * strlen($this->_substring))) === $this->_substring);
    }

    protected function relationship(): string
    {
        return 'ending with';
    }
}
