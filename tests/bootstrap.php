<?php
error_reporting(E_ALL | E_STRICT);

if (defined('E_DEPRECATED'))
{
  error_reporting(error_reporting() | E_DEPRECATED);
}

define('HAMCREST_TEST_BASE', realpath(dirname(__FILE__)));
define('HAMCREST_BASE', realpath(dirname(dirname(__FILE__))));

set_include_path(implode(PATH_SEPARATOR, array(
  HAMCREST_TEST_BASE,
  HAMCREST_BASE . '/hamcrest',
  get_include_path()
)));

require_once 'Hamcrest.php';
