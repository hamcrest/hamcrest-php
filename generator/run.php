<?php

/*
 Copyright (c) 2009 hamcrest.org
 */
require __DIR__ . '/../vendor/autoload.php';

/*
 * Generates the Hamcrest\Matchers factory class and factory functions
 * from the @factory doctags in the various matchers.
 */

define('GENERATOR_BASE', __DIR__);
define('HAMCREST_BASE', realpath(dirname(GENERATOR_BASE) . DIRECTORY_SEPARATOR . 'hamcrest'));

define('GLOBAL_FUNCTIONS_FILE', HAMCREST_BASE . DIRECTORY_SEPARATOR . 'HamcrestFunctions.php');
define('GLOBAL_IS_FUNCTION_FILE', HAMCREST_BASE . DIRECTORY_SEPARATOR . 'HamcrestIs.php');
define('STATIC_MATCHERS_FILE', HAMCREST_BASE . DIRECTORY_SEPARATOR . 'Hamcrest' . DIRECTORY_SEPARATOR . 'Matchers.php');

set_include_path(
    implode(
        PATH_SEPARATOR,
        array(
            GENERATOR_BASE,
            HAMCREST_BASE,
            get_include_path()
        )
    )
);

@unlink(GLOBAL_FUNCTIONS_FILE);
@unlink(GLOBAL_IS_FUNCTION_FILE);
@unlink(STATIC_MATCHERS_FILE);

$generator = new FactoryGenerator(HAMCREST_BASE . DIRECTORY_SEPARATOR . 'Hamcrest');
$generator->addFactoryFile(new StaticMethodFile(STATIC_MATCHERS_FILE));
// Naming a function "is" is deprecated since PHP 8.6, so it is generated
// into a separate file which can be skipped when registering the functions.
$generator->addFactoryFile(new GlobalFunctionFile(GLOBAL_FUNCTIONS_FILE, null, array('is')));
$generator->addFactoryFile(new GlobalFunctionFile(GLOBAL_IS_FUNCTION_FILE, array('is')));
$generator->generate();
$generator->write();
