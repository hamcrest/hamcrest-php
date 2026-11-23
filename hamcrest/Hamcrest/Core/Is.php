<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Using "is" as a class name is deprecated since PHP 8.6, so this class
 * emits a deprecation notice when it is loaded on PHP 8.6 or later.
 *
 * @deprecated use {@see IsMatcher} instead
 */
class Is extends IsMatcher
{
}
