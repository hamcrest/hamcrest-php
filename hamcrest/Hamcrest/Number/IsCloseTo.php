<?php
namespace Hamcrest\Number;

/*
 Copyright (c) 2009 hamcrest.org
 */
use Hamcrest\Description;
use Hamcrest\TypeSafeMatcher;

/**
 * Is the value a number equal to a value within some range of
 * acceptable error?
 */
class IsCloseTo extends TypeSafeMatcher
{

    /**
     * @var mixed
     */
    private $_value;
    /**
     * @var mixed
     */
    private $_delta;

    /**
     * @param mixed $value
     * @param mixed $delta
     */
    public function __construct($value, $delta)
    {
        parent::__construct(self::TYPE_NUMERIC);

        $this->_value = $value;
        $this->_delta = $delta;
    }

    protected function matchesSafely($item): bool
    {
        return $this->_actualDelta($item) <= 0.0;
    }

    protected function describeMismatchSafely($item, Description $mismatchDescription): void
    {
        $mismatchDescription->appendValue($item)
                                                ->appendText(' differed by ')
                                                ->appendValue($this->_actualDelta($item))
                                                ;
    }

    public function describeTo(Description $description): void
    {
        $description->appendText('a numeric value within ')
                                ->appendValue($this->_delta)
                                ->appendText(' of ')
                                ->appendValue($this->_value)
                                ;
    }

    /**
     * Matches if value is a number equal to $value within some range of
     * acceptable error $delta.
     *
     * @factory
     * @param mixed $value
     * @param mixed $delta
     */
    public static function closeTo($value, $delta): self
    {
        return new self($value, $delta);
    }

    // -- Private Methods

    /**
     * @param mixed $item
     * @return int|float
     */
    private function _actualDelta($item)
    {
        return (abs(($item - $this->_value)) - $this->_delta);
    }
}
