<?php
namespace Hamcrest\Arrays;

/*
 Copyright (c) 2009 hamcrest.org
 */

use Hamcrest\Description;
use Hamcrest\Matcher;

class MatchingOnce
{

    /**
     * @var array<Matcher>
     */
    private array $_elementMatchers;
    private Description $_mismatchDescription;

    /**
     * @param array<Matcher> $elementMatchers
     */
    public function __construct(array $elementMatchers, Description $mismatchDescription)
    {
        $this->_elementMatchers = $elementMatchers;
        $this->_mismatchDescription = $mismatchDescription;
    }

    /**
     * @param mixed $item
     */
    public function matches($item): bool
    {
        return $this->_isNotSurplus($item) && $this->_isMatched($item);
    }

    /**
     * @param mixed $items
     */
    public function isFinished($items): bool
    {
        if (empty($this->_elementMatchers)) {
            return true;
        }

        $this->_mismatchDescription
                 ->appendText('No item matches: ')->appendList('', ', ', '', $this->_elementMatchers)
                 ->appendText(' in ')->appendValueList('[', ', ', ']', $items)
                 ;

        return false;
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
        foreach ($this->_elementMatchers as $i => $matcher) {
            if ($matcher->matches($item)) {
                unset($this->_elementMatchers[$i]);

                return true;
            }
        }

        $this->_mismatchDescription->appendText('Not matched: ')->appendValue($item);

        return false;
    }
}
