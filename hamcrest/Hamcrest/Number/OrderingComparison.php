<?php
namespace Hamcrest\Number;

/*
 Copyright (c) 2009 hamcrest.org
 */

use Hamcrest\Description;
use Hamcrest\TypeSafeMatcher;

class OrderingComparison extends TypeSafeMatcher
{

    /**
     * @var mixed
     */
    private $_value;
    /**
     * @var mixed
     */
    private $_minCompare;
    /**
     * @var mixed
     */
    private $_maxCompare;

    /**
     * @param mixed $value
     * @param mixed $maxCompare
     * @param mixed $minCompare
     */
    public function __construct($value, $minCompare, $maxCompare)
    {
        parent::__construct(self::TYPE_NUMERIC);

        $this->_value = $value;
        $this->_minCompare = $minCompare;
        $this->_maxCompare = $maxCompare;
    }

    protected function matchesSafely($other): bool
    {
        $compare = $this->_compare($this->_value, $other);

        return ($this->_minCompare <= $compare) && ($compare <= $this->_maxCompare);
    }

    protected function describeMismatchSafely($item, Description $mismatchDescription): void
    {
        $mismatchDescription
            ->appendValue($item)->appendText(' was ')
            ->appendText($this->_comparison($this->_compare($this->_value, $item)))
            ->appendText(' ')->appendValue($this->_value)
            ;
    }

    public function describeTo(Description $description): void
    {
        $description->appendText('a value ')
            ->appendText($this->_comparison($this->_minCompare))
            ;
        if ($this->_minCompare != $this->_maxCompare) {
            $description->appendText(' or ')
                ->appendText($this->_comparison($this->_maxCompare))
                ;
        }
        $description->appendText(' ')->appendValue($this->_value);
    }

    /**
     * The value is not > $value, nor < $value.
     *
     * @factory
     * @param mixed $value
     */
    public static function comparesEqualTo($value): self
    {
        return new self($value, 0, 0);
    }

    /**
     * The value is > $value.
     *
     * @factory
     * @param mixed $value
     */
    public static function greaterThan($value): self
    {
        return new self($value, -1, -1);
    }

    /**
     * The value is >= $value.
     *
     * @factory atLeast
     * @param mixed $value
     */
    public static function greaterThanOrEqualTo($value): self
    {
        return new self($value, -1, 0);
    }

    /**
     * The value is < $value.
     *
     * @factory
     * @param mixed $value
     */
    public static function lessThan($value): self
    {
        return new self($value, 1, 1);
    }

    /**
     * The value is <= $value.
     *
     * @factory atMost
     * @param mixed $value
     */
    public static function lessThanOrEqualTo($value): self
    {
        return new self($value, 0, 1);
    }

    // -- Private Methods

    /**
     * @param mixed $left
     * @param mixed $right
     */
    private function _compare($left, $right): int
    {
        $a = $left;
        $b = $right;

        if ($a < $b) {
            return -1;
        } elseif ($a == $b) {
            return 0;
        } else {
            return 1;
        }
    }

    /**
     * @param mixed $compare
     */
    private function _comparison($compare): string
    {
        if ($compare > 0) {
            return 'less than';
        } elseif ($compare == 0) {
            return 'equal to';
        } else {
            return 'greater than';
        }
    }
}
