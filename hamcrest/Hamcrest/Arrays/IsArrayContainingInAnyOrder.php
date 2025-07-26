<?php
namespace Hamcrest\Arrays;

/*
 Copyright (c) 2009 hamcrest.org
 */
use Hamcrest\Description;
use Hamcrest\Matcher;
use Hamcrest\TypeSafeDiagnosingMatcher;
use Hamcrest\Util;

/**
 * Matches if an array contains a set of items satisfying nested matchers.
 */
class IsArrayContainingInAnyOrder extends TypeSafeDiagnosingMatcher
{

    /**
     * @var array<Matcher>
     */
    private array $_elementMatchers;

    /**
     * @param array<Matcher> $elementMatchers
     */
    public function __construct(array $elementMatchers)
    {
        parent::__construct(self::TYPE_ARRAY);

        Util::checkAllAreMatchers($elementMatchers);

        $this->_elementMatchers = $elementMatchers;
    }

    protected function matchesSafelyWithDiagnosticDescription($array, Description $mismatchDescription): bool
    {
        $matching = new MatchingOnce($this->_elementMatchers, $mismatchDescription);

        foreach ($array as $element) {
            if (!$matching->matches($element)) {
                return false;
            }
        }

        return $matching->isFinished($array);
    }

    public function describeTo(Description $description): void
    {
        $description->appendList('[', ', ', ']', $this->_elementMatchers)
                                ->appendText(' in any order')
                                ;
    }

    /**
     * An array with elements that match the given matchers.
     *
     * @factory containsInAnyOrder ...
     */
    public static function arrayContainingInAnyOrder(/* args... */): self
    {
        $args = func_get_args();

        return new self(Util::createMatcherArray($args));
    }
}
