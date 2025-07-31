<?php
namespace Hamcrest\Text;

/*
 Copyright (c) 2009 hamcrest.org
 */
use Hamcrest\Description;
use Hamcrest\TypeSafeMatcher;

/**
 * Tests if a string is equal to another string, regardless of the case.
 */
class IsEqualIgnoringCase extends TypeSafeMatcher
{
    /**
     * @var mixed
     */
    private $_string;

    /**
     * @param mixed $string
     */
    public function __construct($string)
    {
        parent::__construct(self::TYPE_STRING);

        $this->_string = $string;
    }

    protected function matchesSafely($item): bool
    {
        return strtolower($this->_string) === strtolower($item);
    }

    protected function describeMismatchSafely($item, Description $mismatchDescription): void
    {
        $mismatchDescription->appendText('was ')->appendText($item);
    }

    public function describeTo(Description $description): void
    {
        $description->appendText('equalToIgnoringCase(')
                                ->appendValue($this->_string)
                                ->appendText(')')
                                ;
    }

    /**
     * Matches if value is a string equal to $string, regardless of the case.
     *
     * @factory
     * @param mixed $string
     */
    public static function equalToIgnoringCase($string): self
    {
        return new self($string);
    }
}
