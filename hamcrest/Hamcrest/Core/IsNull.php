<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */
use Hamcrest\BaseMatcher;
use Hamcrest\Description;

/**
 * Is the value null?
 */
class IsNull extends BaseMatcher
{

    private static ?self $_INSTANCE = null;
    private static ?IsNot $_NOT_INSTANCE = null;

    public function matches($item): bool
    {
        return is_null($item);
    }

    public function describeTo(Description $description): void
    {
        $description->appendText('null');
    }

    /**
     * Matches if value is null.
     *
     * @factory
     */
    public static function nullValue(): self
    {
        if (!self::$_INSTANCE) {
            self::$_INSTANCE = new self();
        }

        return self::$_INSTANCE;
    }

    /**
     * Matches if value is not null.
     *
     * @factory
     */
    public static function notNullValue(): IsNot
    {
        if (!self::$_NOT_INSTANCE) {
            self::$_NOT_INSTANCE = IsNot::not(self::nullValue());
        }

        return self::$_NOT_INSTANCE;
    }
}
