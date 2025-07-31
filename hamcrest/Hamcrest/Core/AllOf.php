<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */
use Hamcrest\Description;
use Hamcrest\DiagnosingMatcher;
use Hamcrest\Matcher;
use Hamcrest\Util;

/**
 * Calculates the logical conjunction of multiple matchers. Evaluation is
 * shortcut, so subsequent matchers are not called if an earlier matcher
 * returns <code>false</code>.
 */
class AllOf extends DiagnosingMatcher
{

    /**
     * @var array<Matcher>
     */
    private array $_matchers;

    /**
     * @param array<Matcher> $matchers
     */
    public function __construct(array $matchers)
    {
        Util::checkAllAreMatchers($matchers);

        $this->_matchers = $matchers;
    }

    public function matchesWithDiagnosticDescription($item, Description $mismatchDescription): bool
    {
        foreach ($this->_matchers as $matcher) {
            if (!$matcher->matches($item)) {
                $mismatchDescription->appendDescriptionOf($matcher)->appendText(' ');
                $matcher->describeMismatch($item, $mismatchDescription);

                return false;
            }
        }

        return true;
    }

    public function describeTo(Description $description): void
    {
        $description->appendList('(', ' and ', ')', $this->_matchers);
    }

    /**
     * Evaluates to true only if ALL of the passed in matchers evaluate to true.
     *
     * @factory ...
     */
    public static function allOf(/* args... */): self
    {
        $args = func_get_args();

        return new self(Util::createMatcherArray($args));
    }
}
