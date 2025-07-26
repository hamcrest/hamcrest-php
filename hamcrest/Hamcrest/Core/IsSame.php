<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */
use Hamcrest\BaseMatcher;
use Hamcrest\Description;

/**
 * Is the value the same object as another value?
 * In PHP terms, does $a === $b?
 */
class IsSame extends BaseMatcher
{

    /**
     * @var mixed object
     */
    private $_object;

    /**
     * @param mixed $object
     */
    public function __construct($object)
    {
        $this->_object = $object;
    }

    public function matches($object): bool
    {
        return ($object === $this->_object) && ($this->_object === $object);
    }

    public function describeTo(Description $description): void
    {
        $description->appendText('sameInstance(')
                                ->appendValue($this->_object)
                                ->appendText(')')
                                ;
    }

    /**
     * Creates a new instance of IsSame.
     *
     * @param mixed $object
     *   The predicate evaluates to true only when the argument is
     *   this object.
     *
     * @return \Hamcrest\Core\IsSame
     * @factory
     */
    public static function sameInstance($object): self
    {
        return new self($object);
    }
}
