<?php
namespace Hamcrest\Arrays;

/**
 * Tests for the presence of both a key and value inside an array.
 */
use Hamcrest\Description;
use Hamcrest\Matcher;
use Hamcrest\TypeSafeMatcher;
use Hamcrest\Util;

/**
 * @namespace
 */

class IsArrayContainingKeyValuePair extends TypeSafeMatcher
{
    /**
     * @var mixed $_keyMatcher
     */
    private $_keyMatcher;
    /**
     * @var mixed $_valueMatcher
     */
    private $_valueMatcher;

    public function __construct(Matcher $keyMatcher, Matcher $valueMatcher)
    {
        parent::__construct(self::TYPE_ARRAY);

        $this->_keyMatcher = $keyMatcher;
        $this->_valueMatcher = $valueMatcher;
    }

    protected function matchesSafely($array): bool
    {
        foreach ($array as $key => $value) {
            if ($this->_keyMatcher->matches($key) && $this->_valueMatcher->matches($value)) {
                return true;
            }
        }

        return false;
    }

    protected function describeMismatchSafely($array, Description $mismatchDescription): void
    {
        //Not using appendValueList() so that keys can be shown
        $mismatchDescription->appendText('array was ')
                                                ->appendText('[')
                                                ;
        $loop = false;
        foreach ($array as $key => $value) {
            if ($loop) {
                $mismatchDescription->appendText(', ');
            }
            $mismatchDescription->appendValue($key)->appendText(' => ')->appendValue($value);
            $loop = true;
        }
        $mismatchDescription->appendText(']');
    }

    public function describeTo(Description $description): void
    {
        $description->appendText('array containing [')
                                ->appendDescriptionOf($this->_keyMatcher)
                                ->appendText(' => ')
                                ->appendDescriptionOf($this->_valueMatcher)
                                ->appendText(']')
                                ;
    }

    /**
     * Test if an array has both an key and value in parity with each other.
     *
     * @factory hasEntry
     * @param mixed $key
     * @param mixed $value
     */
    public static function hasKeyValuePair($key, $value): self
    {
        return new self(
            Util::wrapValueWithIsEqual($key),
            Util::wrapValueWithIsEqual($value)
        );
    }
}
