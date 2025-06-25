<?php
namespace Hamcrest\Text;

/*
 Copyright (c) 2009 hamcrest.org
 */

use Hamcrest\Description;
use Hamcrest\TypeSafeMatcher;

abstract class SubstringMatcher extends TypeSafeMatcher
{

    /**
     * @var mixed
     */
    protected $_substring;

    /**
     * @param mixed $substring
     */
    public function __construct($substring)
    {
        parent::__construct(self::TYPE_STRING);

        $this->_substring = $substring;
    }

    protected function matchesSafely($item): bool
    {
        return $this->evalSubstringOf($item);
    }

    protected function describeMismatchSafely($item, Description $mismatchDescription): void
    {
        $mismatchDescription->appendText('was "')->appendText($item)->appendText('"');
    }

    public function describeTo(Description $description): void
    {
        $description->appendText('a string ')
                                ->appendText($this->relationship())
                                ->appendText(' ')
                                ->appendValue($this->_substring)
                                ;
    }

    abstract protected function evalSubstringOf(string $string): bool;

    abstract protected function relationship(): string;
}
