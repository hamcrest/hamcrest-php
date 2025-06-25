<?php
namespace Hamcrest;

/**
 * Convenient base class for Matchers that require a value of a specific type.
 * This simply checks the type.
 *
 * While it may seem a useless exercise to have this in PHP, objects cannot
 * be cast to certain data types such as numerics (or even strings if
 * __toString() has not be defined).
 */

abstract class TypeSafeMatcher extends BaseMatcher
{

    /* Types that PHP can compare against */
    protected const TYPE_ANY = 0;
    protected const TYPE_STRING = 1;
    protected const TYPE_NUMERIC = 2;
    protected const TYPE_ARRAY = 3;
    protected const TYPE_OBJECT = 4;
    protected const TYPE_RESOURCE = 5;
    protected const TYPE_BOOLEAN = 6;

    /**
     * The type that is required for a safe comparison
     *
     * @var int
     */
    private int $_expectedType;

    /**
     * The subtype (e.g. class for objects) that is required
     *
     * @var string
     */
    private ?string $_expectedSubtype;

    /**
     * @param self::TYPE_* $expectedType
     * @param string|null $expectedSubtype
     */
    public function __construct(int $expectedType, ?string $expectedSubtype = null)
    {
        $this->_expectedType = $expectedType;
        $this->_expectedSubtype = $expectedSubtype;
    }

    final public function matches($item): bool
    {
        return $this->_isSafeType($item) && $this->matchesSafely($item);
    }

    final public function describeMismatch($item, Description $mismatchDescription): void
    {
        if (!$this->_isSafeType($item)) {
            parent::describeMismatch($item, $mismatchDescription);
        } else {
            $this->describeMismatchSafely($item, $mismatchDescription);
        }
    }

    // -- Protected Methods

    /**
     * The item will already have been checked for the specific type and subtype.
     * @param mixed $item
     */
    abstract protected function matchesSafely($item): bool;

    /**
     * The item will already have been checked for the specific type and subtype.
     * @param mixed $item
     */
    abstract protected function describeMismatchSafely($item, Description $mismatchDescription): void;

    // -- Private Methods

    /**
     * @param mixed $value
     */
    private function _isSafeType($value): bool
    {
        switch ($this->_expectedType) {

            case self::TYPE_ANY:
                return true;

            case self::TYPE_STRING:
                return is_string($value) || is_numeric($value);

            case self::TYPE_NUMERIC:
                return is_numeric($value) || is_string($value);

            case self::TYPE_ARRAY:
                return is_array($value);

            case self::TYPE_OBJECT:
                return is_object($value)
                        && ($this->_expectedSubtype === null
                                || $value instanceof $this->_expectedSubtype);

            case self::TYPE_RESOURCE:
                return is_resource($value)
                        && ($this->_expectedSubtype === null
                                || get_resource_type($value) == $this->_expectedSubtype);

            case self::TYPE_BOOLEAN:
                return true;

            default:
                return true;

        }
    }
}
