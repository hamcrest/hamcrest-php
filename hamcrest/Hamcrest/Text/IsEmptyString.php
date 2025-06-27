<?php
namespace Hamcrest\Text;

/*
 Copyright (c) 2009 hamcrest.org
 */
use Hamcrest\BaseMatcher;
use Hamcrest\Core\AnyOf;
use Hamcrest\Core\IsNull;
use Hamcrest\Description;

/**
 * Matches empty Strings (and null).
 */
class IsEmptyString extends BaseMatcher
{

    private static ?self $_INSTANCE = null;
    private static ?AnyOf $_NULL_OR_EMPTY_INSTANCE = null;
    private static ?self $_NOT_INSTANCE = null;

    private bool $_empty;

    public function __construct(bool $empty = true)
    {
        $this->_empty = $empty;
    }

    public function matches($item): bool
    {
        return $this->_empty
            ? ($item === '')
            : is_string($item) && $item !== '';
    }

    public function describeTo(Description $description): void
    {
        $description->appendText($this->_empty ? 'an empty string' : 'a non-empty string');
    }

    /**
     * Matches if value is a zero-length string.
     *
     * @factory emptyString
     */
    public static function isEmptyString(): self
    {
        if (!self::$_INSTANCE) {
            self::$_INSTANCE = new self(true);
        }

        return self::$_INSTANCE;
    }

    /**
     * Matches if value is null or a zero-length string.
     *
     * @factory nullOrEmptyString
     */
    public static function isEmptyOrNullString(): AnyOf
    {
        if (!self::$_NULL_OR_EMPTY_INSTANCE) {
            self::$_NULL_OR_EMPTY_INSTANCE = AnyOf::anyOf(
                IsNull::nullvalue(),
                self::isEmptyString()
            );
        }

        return self::$_NULL_OR_EMPTY_INSTANCE;
    }

    /**
     * Matches if value is a non-zero-length string.
     *
     * @factory nonEmptyString
     */
    public static function isNonEmptyString(): self
    {
        if (!self::$_NOT_INSTANCE) {
            self::$_NOT_INSTANCE = new self(false);
        }

        return self::$_NOT_INSTANCE;
    }
}
