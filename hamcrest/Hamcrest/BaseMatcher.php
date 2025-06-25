<?php
namespace Hamcrest;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * BaseClass for all Matcher implementations.
 *
 * @see Hamcrest\Matcher
 */
abstract class BaseMatcher implements Matcher
{
    /**
     * @param mixed $item
     */
    public function describeMismatch($item, Description $description): void
    {
        $description->appendText('was ')->appendValue($item);
    }

    public function __toString(): string
    {
        return StringDescription::toString($this);
    }

    public function __invoke(): bool
    {
        return call_user_func_array(array($this, 'matches'), func_get_args());
    }
}
