<?php
namespace Hamcrest\Text;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Tests if a string is equal to another string, regardless of the case.
 */
class IsEqualIgnoringCase extends \Hamcrest\TypeSafeMatcher
{

  private $_string;

  public function __construct($string)
  {
    parent::__construct(self::TYPE_STRING);

    $this->_string = $string;
  }

  protected function matchesSafely($item)
  {
    return strtolower($this->_string) === strtolower($item);
  }

  protected function describeMismatchSafely($item,
    \Hamcrest\Description $mismatchDescription)
  {
    $mismatchDescription->appendText('was ')->appendText($item);
  }

  public function describeTo(\Hamcrest\Description $description)
  {
    $description->appendText('equalToIgnoringCase(')
                ->appendValue($this->_string)
                ->appendText(')')
                ;
  }

  /**
   * Matches if value is a string equal to $string, regardless of the case.
   *
   * @factory
   */
  public static function equalToIgnoringCase($string)
  {
    return new self($string);
  }

}
