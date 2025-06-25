<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */
use Hamcrest\Description;

/**
 * The same as {@link Hamcrest\Core\IsSame} but with slightly different
 * semantics.
 */
class IsIdentical extends IsSame
{

    /**
     * @var mixed $_value
     */
    private $_value;

    /**
     * @param mixed $value
     */
    public function __construct($value)
    {
        parent::__construct($value);
        $this->_value = $value;
    }

    public function describeTo(Description $description): void
    {
        $description->appendValue($this->_value);
    }

    /**
     * Tests of the value is identical to $value as tested by the "===" operator.
     *
     * @factory
     * @param mixed $value
     */
    public static function identicalTo($value): self
    {
        return new self($value);
    }
}
