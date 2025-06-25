<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2010 hamcrest.org
 */
use Hamcrest\BaseMatcher;
use Hamcrest\Description;

/**
 * Tests whether the value has a built-in type.
 */
class IsTypeOf extends BaseMatcher
{

    private string $_theType;

    /**
     * Creates a new instance of IsTypeOf
     *
     * @param string $theType
     *   The predicate evaluates to true for values with this built-in type.
     */
    public function __construct(string $theType)
    {
        $this->_theType = strtolower($theType);
    }

    public function matches($item): bool
    {
        return strtolower(gettype($item)) == $this->_theType;
    }

    public function describeTo(Description $description): void
    {
        $description->appendText(self::getTypeDescription($this->_theType));
    }

    public function describeMismatch($item, Description $description): void
    {
        if ($item === null) {
            $description->appendText('was null');
        } else {
            $description->appendText('was ')
                                    ->appendText(self::getTypeDescription(strtolower(gettype($item))))
                                    ->appendText(' ')
                                    ->appendValue($item)
                                    ;
        }
    }

    public static function getTypeDescription(string $type): string
    {
        if ($type == 'null') {
            return 'null';
        }

        return (strpos('aeiou', substr($type, 0, 1)) === false ? 'a ' : 'an ')
                . $type;
    }

    /**
     * Is the value a particular built-in type?
     *
     * @factory
     * @param string $theType
     */
    public static function typeOf(string $theType): self
    {
        return new self($theType);
    }
}
