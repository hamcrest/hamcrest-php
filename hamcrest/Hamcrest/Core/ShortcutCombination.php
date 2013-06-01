<?php

/*
 Copyright (c) 2009 hamcrest.org
 */

require_once 'Hamcrest/BaseMatcher.php';
require_once 'Hamcrest/Description.php';
require_once 'Hamcrest/Util.php';

abstract class Hamcrest_Core_ShortcutCombination extends Hamcrest_BaseMatcher
{
  
  private $_matchers;
  
  public function __construct(array $matchers)
  {
    Hamcrest_Util::checkAllAreMatchers($matchers);
    
    $this->_matchers = $matchers;
  }
  
  protected function matchesWithShortcut($item, $shortcut)
  {
    foreach ($this->_matchers as $matcher)
    {
      if ($matcher->matches($item) == $shortcut)
      {
        return $shortcut;
      }
    }
    
    return !$shortcut;
  }
  
  public function describeToWithOperator(Hamcrest_Description $description,
    $operator)
  {
    $description->appendList('(', ' ' . $operator . ' ', ')', $this->_matchers);
  }
  
}
