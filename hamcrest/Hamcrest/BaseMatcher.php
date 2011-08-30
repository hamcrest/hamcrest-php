<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/StringDescription.php';

/**
 * BaseClass for all Matcher implementations.
 *
 * @see Hamcrest_Matcher
 */
abstract class Hamcrest_BaseMatcher implements Hamcrest_Matcher
{
  
  public function describeMismatch($item, Hamcrest_Description $description)
  {
    $description->appendText('was ')->appendValue($item);
  }
  
  public function __toString()
  {
    return Hamcrest_StringDescription::toString($this);
  }
  
}
