<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */
use Hamcrest\BaseMatcher;
use Hamcrest\Description;
use Hamcrest\Matcher;
use Hamcrest\Util;

abstract class ShortcutCombination extends BaseMatcher
{

    /**
     * @var array<Matcher>
     */
    private $_matchers;

    /**
     * @param array<Matcher> $matchers
     */
    public function __construct(array $matchers)
    {
        Util::checkAllAreMatchers($matchers);

        $this->_matchers = $matchers;
    }

    /**
     * @param mixed $item
     */
    protected function matchesWithShortcut($item, bool $shortcut): bool
    {
        foreach ($this->_matchers as $matcher) {
            if ($matcher->matches($item) == $shortcut) {
                return $shortcut;
            }
        }

        return !$shortcut;
    }

    public function describeToWithOperator(Description $description, string $operator): void
    {
        $description->appendList('(', ' ' . $operator . ' ', ')', $this->_matchers);
    }
}
