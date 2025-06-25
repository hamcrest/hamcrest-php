<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */
use Hamcrest\Description;
use Hamcrest\FeatureMatcher;
use Hamcrest\Matcher;
use Hamcrest\Util;

/**
 * A Matcher that checks the output of the <code>toString()</code> or <code>__toString()</code> method.
 */
class HasToString extends FeatureMatcher
{

    public function __construct(Matcher $toStringMatcher)
    {
        parent::__construct(
            self::TYPE_OBJECT,
            null,
            $toStringMatcher,
            'an object with toString()',
            'toString()'
        );
    }

    public function matchesSafelyWithDiagnosticDescription($actual, Description $mismatchDescription)
    {
        if (method_exists($actual, 'toString') || method_exists($actual, '__toString')) {
            return parent::matchesSafelyWithDiagnosticDescription($actual, $mismatchDescription);
        }

        return false;
    }

    protected function featureValueOf($actual)
    {
        if (method_exists($actual, 'toString')) {
            return $actual->toString();
        }

        return (string) $actual;
    }

    /**
     * Creates a matcher that matches any examined object whose <code>toString</code> or
     * <code>__toString()</code> method returns a value equalTo the specified string.
     *
     * @factory
     */
    public static function hasToString($matcher)
    {
        return new self(Util::wrapValueWithIsEqual($matcher));
    }
}
