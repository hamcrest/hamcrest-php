<?php
namespace Hamcrest\Text;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Tests if the argument is a string that contains a substring.
 */
class StringStartsWith extends SubstringMatcher
{

    /**
     * @param mixed $substring
     */
    public function __construct($substring)
    {
        parent::__construct($substring);
    }

    /**
     * Matches if value is a string that starts with $substring.
     *
     * @factory
     * @param mixed $substring
     */
    public static function startsWith($substring): self
    {
        return new self($substring);
    }

    // -- Protected Methods

    protected function evalSubstringOf(string $string): bool
    {
        return (substr($string, 0, strlen($this->_substring)) === $this->_substring);
    }

    protected function relationship(): string
    {
        return 'starting with';
    }
}
