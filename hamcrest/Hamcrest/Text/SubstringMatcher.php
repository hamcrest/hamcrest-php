<?php
namespace Hamcrest\Text;

/*
 Copyright (c) 2009 hamcrest.org
 */

abstract class SubstringMatcher extends \Hamcrest\TypeSafeMatcher
{

  protected $_substring;

  public function __construct($substring)
  {
    parent::__construct(self::TYPE_STRING);

    $this->_substring = $substring;
  }

  protected function matchesSafely($item)
  {
    return $this->evalSubstringOf($item);
  }

  protected function describeMismatchSafely($item,
    \Hamcrest\Description $mismatchDescription)
  {
    $mismatchDescription->appendText('was "')->appendText($item)->appendText('"');
  }

  public function describeTo(\Hamcrest\Description $description)
  {
    $description->appendText('a string ')
                ->appendText($this->relationship())
                ->appendText(' ')
                ->appendValue($this->_substring)
                ;
  }

  abstract protected function evalSubstringOf($string);

  abstract protected function relationship();

}
