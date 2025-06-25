<?php
namespace Hamcrest\Text;

/*
 Copyright (c) 2010 hamcrest.org
 */

/**
 * Tests if the argument is a string that matches a regular expression.
 */
class MatchesPattern extends SubstringMatcher
{
    /**
     * @param mixed $pattern
     */
    public function __construct($pattern)
    {
        parent::__construct($pattern);
    }

    /**
     * Matches if value is a string that matches regular expression $pattern.
     *
     * @factory
     * @param mixed $pattern
     */
    public static function matchesPattern($pattern): self
    {
        return new self($pattern);
    }

    // -- Protected Methods

    protected function evalSubstringOf(string $item): bool
    {
        return preg_match($this->_substring, (string) $item) >= 1;
    }

    protected function relationship(): string
    {
        return 'matching';
    }
}
