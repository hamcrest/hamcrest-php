<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */

abstract class ShortcutCombination extends \Hamcrest\BaseMatcher
{

  private $_matchers;

  public function __construct(array $matchers)
  {
    \Hamcrest\Util::checkAllAreMatchers($matchers);

    $this->_matchers = $matchers;
  }

  protected function matchesWithShortcut($item, $shortcut)
  {
    foreach ($this->_matchers as $matcher) {
      if ($matcher->matches($item) == $shortcut) {
        return $shortcut;
      }
    }

    return !$shortcut;
  }

  public function describeToWithOperator(\Hamcrest\Description $description,
    $operator)
  {
    $description->appendList('(', ' ' . $operator . ' ', ')', $this->_matchers);
  }

}
