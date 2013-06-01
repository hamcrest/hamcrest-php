<?php

// require_once 'Hamcrest/TypeSafeMatcher.php';
// require_once 'Hamcrest/Description.php';
// require_once 'Hamcrest/Util.php';

/**
 * Tests for the presence of both a key and value inside an array.
 */
class Hamcrest_Array_IsArrayContainingKeyValuePair
  extends Hamcrest_TypeSafeMatcher
{
  
  private $_keyMatcher;
  private $_valueMatcher;
  
  public function __construct(Hamcrest_Matcher $keyMatcher,
    Hamcrest_Matcher $valueMatcher)
  {
    parent::__construct(self::TYPE_ARRAY);
    
    $this->_keyMatcher = $keyMatcher;
    $this->_valueMatcher = $valueMatcher;
  }
  
  protected function matchesSafely($array)
  {
    foreach ($array as $key => $value)
    {
      if ($this->_keyMatcher->matches($key)
        && $this->_valueMatcher->matches($value))
      {
        return true;
      }
    }
    
    return false;
  }
  
  protected function describeMismatchSafely($array,
    Hamcrest_Description $mismatchDescription)
  {
    //Not using appendValueList() so that keys can be shown
    $mismatchDescription->appendText('array was ')
                        ->appendText('[')
                        ;
    $loop = false;
    foreach ($array as $key => $value)
    {
      if ($loop)
      {
        $mismatchDescription->appendText(', ');
      }
      $mismatchDescription->appendValue($key)->appendText(' => ')->appendValue($value);
      $loop = true;
    }
    $mismatchDescription->appendText(']');
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('array containing [')
                ->appendDescriptionOf($this->_keyMatcher)
                ->appendText(' => ')
                ->appendDescriptionOf($this->_valueMatcher)
                ->appendText(']')
                ;
  }
  
  /**
   * Test if an array has both an key and value in parity with each other.
   *
   * @factory hasEntry
   */
  public static function hasKeyValuePair($key, $value)
  {
    return new self(
      Hamcrest_Util::wrapValueWithIsEqual($key),
      Hamcrest_Util::wrapValueWithIsEqual($value)
    );
  }
  
}
