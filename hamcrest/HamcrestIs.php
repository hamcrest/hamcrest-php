<?php

/*
 Copyright (c) 2009-2010 hamcrest.org
 */

// This file is generated from the static method @factory doctags.

if (!function_exists('is')) {
    /**
     * Decorates another Matcher, retaining the behavior but allowing tests
     * to be slightly more expressive.
     *
     * For example:  assertThat($cheese, equalTo($smelly))
     *          vs.  assertThat($cheese, is(equalTo($smelly)))
     *
     * @param mixed $value
     */
    function is($value): \Hamcrest\Core\IsMatcher
    {
        return \Hamcrest\Core\IsMatcher::is($value);
    }
}
