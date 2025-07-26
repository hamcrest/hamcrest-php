<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2010 hamcrest.org
 */
use Hamcrest\BaseMatcher;
use Hamcrest\Description;

/**
 * Tests if a value (class, object, or array) has a named property.
 *
 * For example:
 * <pre>
 * assertThat(array('a', 'b'), set('b'));
 * assertThat($foo, set('bar'));
 * assertThat('Server', notSet('defaultPort'));
 * </pre>
 *
 * @todo Replace $property with a matcher and iterate all property names.
 */
class Set extends BaseMatcher
{

    /**
     * @var mixed $_property
     */
    private $_property;
    private bool $_not;

    /**
     * @param mixed $property
     */
    public function __construct($property, bool $not = false)
    {
        $this->_property = $property;
        $this->_not = $not;
    }

    public function matches($item): bool
    {
        if ($item === null) {
            return false;
        }
        $property = $this->_property;
        if (is_array($item)) {
            $result = isset($item[$property]);
        } elseif (is_object($item)) {
            $result = isset($item->$property);
        } elseif (is_string($item)) {
            $result = isset($item::$$property);
        } else {
            throw new \InvalidArgumentException('Must pass an object, array, or class name');
        }

        return $this->_not ? !$result : $result;
    }

    public function describeTo(Description $description): void
    {
        $description->appendText($this->_not ? 'unset property ' : 'set property ')->appendText($this->_property);
    }

    public function describeMismatch($item, Description $description): void
    {
        $value = '';
        if (!$this->_not) {
            $description->appendText('was not set');
        } else {
            $property = $this->_property;
            if (is_array($item)) {
                $value = $item[$property];
            } elseif (is_object($item)) {
                $value = $item->$property;
            } elseif (is_string($item)) {
                $value = $item::$$property;
            }
            parent::describeMismatch($value, $description);
        }
    }

    /**
     * Matches if value (class, object, or array) has named $property.
     *
     * @factory
     * @param mixed $property
     */
    public static function set($property): self
    {
        return new self($property);
    }

    /**
     * Matches if value (class, object, or array) does not have named $property.
     *
     * @factory
     * @param mixed $property
     */
    public static function notSet($property): self
    {
        return new self($property, true);
    }
}
