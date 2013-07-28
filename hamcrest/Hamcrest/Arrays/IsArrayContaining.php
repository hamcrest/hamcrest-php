<?php
namespace Hamcrest\Arrays;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Matches if an array contains an item satisfying a nested matcher.
 */
class IsArrayContaining extends \Hamcrest\TypeSafeMatcher
{

  private $_elementMatcher;

  public function __construct(\Hamcrest\Matcher $elementMatcher)
  {
    parent::__construct(self::TYPE_ARRAY);

    $this->_elementMatcher = $elementMatcher;
  }

  protected function matchesSafely($array)
  {
    foreach ($array as $element) {
      if ($this->_elementMatcher->matches($element)) {
        return true;
      }
    }

    return false;
  }

  protected function describeMismatchSafely($array,
    \Hamcrest\Description $mismatchDescription)
  {
    $mismatchDescription->appendText('was ')->appendValue($array);
  }

  public function describeTo(\Hamcrest\Description $description)
  {
    $description
         ->appendText('an array containing ')
         ->appendDescriptionOf($this->_elementMatcher)
    ;
  }

  /**
   * Evaluates to true if any item in an array satisfies the given matcher.
   *
   * @param mixed $item as a {@link Hamcrest\Matcher} or a value.
   *
   * @return \Hamcrest\Array\IsArrayContaining
   * @factory hasValue
   */
  public static function hasItemInArray($item)
  {
    return new self(\Hamcrest\Util::wrapValueWithIsEqual($item));
  }

}
