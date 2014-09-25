<?php
namespace Hamcrest\Type;

/*
 Copyright (c) 2010 hamcrest.org
 */
use Hamcrest\Core\IsTypeOf;

/**
 * Tests whether the value is numeric.
 */
class IsNumeric extends IsTypeOf
{

    public function __construct()
    {
        parent::__construct('number');
    }

    public function matches($item)
    {
        return is_numeric($item);
    }

    /**
     * Is the value a numeric?
     *
     * @factory
     */
    public static function numericValue()
    {
        return new self;
    }
}
