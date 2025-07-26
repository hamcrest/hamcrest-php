<?php
namespace Hamcrest\Arrays;

/*
 Copyright (c) 2009 hamcrest.org
 */

use Hamcrest\Description;
use Hamcrest\Matcher;

class SeriesMatchingOnce
{

    /**
     * @var array<Matcher>
     */
    private array $_elementMatchers;
    /**
     * @var list<int|string>
     */
    private array $_keys;
    private Description $_mismatchDescription;
    /**
     * @var int|string|null
     */
    private $_nextMatchKey;

    /**
     * @param array<Matcher> $elementMatchers
     */
    public function __construct(array $elementMatchers, Description $mismatchDescription)
    {
        $this->_elementMatchers = $elementMatchers;
        $this->_keys = array_keys($elementMatchers);
        $this->_mismatchDescription = $mismatchDescription;
    }

    /**
     * @param mixed $item
     */
    public function matches($item): bool
    {
        return $this->_isNotSurplus($item) && $this->_isMatched($item);
    }

    public function isFinished(): bool
    {
        if (!empty($this->_elementMatchers)) {
            $nextMatcher = current($this->_elementMatchers);
            $this->_mismatchDescription->appendText('No item matched: ')->appendDescriptionOf($nextMatcher);

            return false;
        }

        return true;
    }

    // -- Private Methods

    /**
     * @param mixed $item
     */
    private function _isNotSurplus($item): bool
    {
        if (empty($this->_elementMatchers)) {
            $this->_mismatchDescription->appendText('Not matched: ')->appendValue($item);

            return false;
        }

        return true;
    }

    /**
     * @param mixed $item
     */
    private function _isMatched($item): bool
    {
        $this->_nextMatchKey = array_shift($this->_keys);
        $nextMatcher = array_shift($this->_elementMatchers);

        if (!$nextMatcher->matches($item)) {
            $this->_describeMismatch($nextMatcher, $item);

            return false;
        }

        return true;
    }

    /**
     * @param mixed $item
     */
    private function _describeMismatch(Matcher $matcher, $item): void
    {
        $this->_mismatchDescription->appendText('item with key ' . $this->_nextMatchKey . ': ');
        $matcher->describeMismatch($item, $this->_mismatchDescription);
    }
}
