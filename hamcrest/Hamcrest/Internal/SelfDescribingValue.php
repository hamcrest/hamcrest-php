<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/SelfDescribing.php';
require_once 'Hamcrest/Description.php';

/**
 * A wrapper around any value so that it describes itself.
 */
class Hamcrest_Internal_SelfDescribingValue implements Hamcrest_SelfDescribing
{
  
  private $_value;
  
  public function __construct($value)
  {
    $this->_value = $value;
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendValue($this->_value);
  }
  
}
