<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */
use Hamcrest\BaseMatcher;
use Hamcrest\Description;

/**
 * A matcher that always returns <code>true</code>.
 */
class IsAnything extends BaseMatcher
{

    private string $_message;

    public function __construct(string $message = 'ANYTHING')
    {
        $this->_message = $message;
    }

    public function matches($item): bool
    {
        return true;
    }

    public function describeTo(Description $description): void
    {
        $description->appendText($this->_message);
    }

    /**
     * This matcher always evaluates to true.
     *
     * @param string $description A meaningful string used when describing itself.
     *
     * @return \Hamcrest\Core\IsAnything
     * @factory
     */
    public static function anything(string $description = 'ANYTHING')
    {
        return new self($description);
    }
}
