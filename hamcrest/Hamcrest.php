<?php

/*
 Copyright (c) 2009-2010 hamcrest.org
 */

// Registers all global factory functions.
//
// Naming a function "is" is deprecated since PHP 8.6, so the is() function
// lives in a separate file. To register the global functions without it, call
// \Hamcrest\Util::registerGlobalFunctions(false) or require HamcrestFunctions.php
// directly, and use \Hamcrest\Matchers::is() instead.

require_once __DIR__ . '/HamcrestFunctions.php';
require_once __DIR__ . '/HamcrestIs.php';
