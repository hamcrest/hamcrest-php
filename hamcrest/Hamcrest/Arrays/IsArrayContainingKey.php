<?php
namespace Hamcrest\Arrays;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Matches if an array contains the specified key.
 */
class IsArrayContainingKey extends \Hamcrest\TypeSafeMatcher
{

  private $_keyMatcher;

  public function __construct(\Hamcrest\Matcher $keyMatcher)
  {
    parent::__construct(self::TYPE_ARRAY);

    $this->_keyMatcher = $keyMatcher;
  }

  protected function matchesSafely($array)
  {
    foreach ($array as $key => $element) {
      if ($this->_keyMatcher->matches($key)) {
        return true;
      }
    }

    return false;
  }

  protected function describeMismatchSafely($array,
    \Hamcrest\Description $mismatchDescription)
  {
    //Not using appendValueList() so that keys can be shown
    $mismatchDescription->appendText('array was ')
                        ->appendText('[')
                        ;
    $loop = false;
    foreach ($array as $key => $value) {
      if ($loop) {
        $mismatchDescription->appendText(', ');
      }
      $mismatchDescription->appendValue($key)->appendText(' => ')->appendValue($value);
      $loop = true;
    }
    $mismatchDescription->appendText(']');
  }

  public function describeTo(\Hamcrest\Description $description)
  {
    $description
         ->appendText('array with key ')
         ->appendDescriptionOf($this->_keyMatcher)
         ;
  }

  /**
   * Evaluates to true if any key in an array matches the given matcher.
   *
   * @param mixed $key as a {@link Hamcrest\Matcher} or a value.
   *
   * @factory hasKey
   */
  public static function hasKeyInArray($key)
  {
    return new self(\Hamcrest\Util::wrapValueWithIsEqual($key));
  }

}
