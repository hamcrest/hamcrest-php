<?php
namespace Hamcrest\Text;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Tests if the argument is a string that contains a substring.
 */
class StringContains extends SubstringMatcher
{
    /**
     * @param mixed $substring
     */
    public function __construct($substring)
    {
        parent::__construct($substring);
    }

    public function ignoringCase(): StringContainsIgnoringCase
    {
        return new StringContainsIgnoringCase($this->_substring);
    }

    /**
     * Matches if value is a string that contains $substring.
     *
     * @factory
     * @param mixed $substring
     */
    public static function containsString($substring): self
    {
        return new self($substring);
    }

    // -- Protected Methods

    protected function evalSubstringOf(string $item): bool
    {
        return (false !== strpos((string) $item, $this->_substring));
    }

    protected function relationship(): string
    {
        return 'containing';
    }
}
