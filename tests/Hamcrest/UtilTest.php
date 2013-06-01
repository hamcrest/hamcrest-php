<?php
require_once 'Hamcrest/Util.php';
require_once 'Hamcrest/Core/IsEqual.php';
require_once 'Hamcrest/Text/MatchesPattern.php';

class Hamcrest_UtilTest extends PHPUnit_Framework_TestCase
{

  public function testWrapValueWithIsEqualLeavesMatchersUntouched()
  {
    $matcher = new Hamcrest_Text_MatchesPattern('/fo+/');
    $newMatcher = Hamcrest_Util::wrapValueWithIsEqual($matcher);
    $this->assertSame($matcher, $newMatcher);
  }

  public function testWrapValueWithIsEqualWrapsPrimitive()
  {
    $matcher = Hamcrest_Util::wrapValueWithIsEqual('foo');
    $this->assertInstanceOf('Hamcrest_Core_IsEqual', $matcher);
    $this->assertTrue($matcher->matches('foo'));
  }


  public function testCheckAllAreMatchersAcceptsMatchers()
  {
    Hamcrest_Util::checkAllAreMatchers(array(
      new Hamcrest_Text_MatchesPattern('/fo+/'),
      new Hamcrest_Core_IsEqual('foo'),
    ));
  }

  /**
   * @expectedException InvalidArgumentException
   */
  public function testCheckAllAreMatchersFailsForPrimitive()
  {
    Hamcrest_Util::checkAllAreMatchers(array(
      new Hamcrest_Text_MatchesPattern('/fo+/'),
      'foo',
    ));
  }


  private function callAndAssertCreateMatcherArray($items)
  {
    $matchers = Hamcrest_Util::createMatcherArray($items);
    $this->assertInternalType('array', $matchers);
    $this->assertSameSize($items, $matchers);
    foreach ($matchers as $matcher)
    {
      $this->assertInstanceOf('Hamcrest_Matcher', $matcher);
    }
    return $matchers;
  }

  public function testCreateMatcherArrayLeavesMatchersUntouched()
  {
    $matcher = new Hamcrest_Text_MatchesPattern('/fo+/');
    $items = array($matcher);
    $matchers = $this->callAndAssertCreateMatcherArray($items);
    $this->assertSame($matcher, $matchers[0]);
  }

  public function testCreateMatcherArrayWrapsPrimitiveWithIsEqualMatcher()
  {
    $matchers = $this->callAndAssertCreateMatcherArray(array('foo'));
    $this->assertInstanceOf('Hamcrest_Core_IsEqual', $matchers[0]);
    $this->assertTrue($matchers[0]->matches('foo'));
  }

  public function testCreateMatcherArrayDoesntModifyOriginalArray()
  {
    $items = array('foo');
    $this->callAndAssertCreateMatcherArray($items);
    $this->assertSame('foo', $items[0]);
  }

  public function testCreateMatcherArrayUnwrapsSingleArrayElement()
  {
    $matchers = $this->callAndAssertCreateMatcherArray(array(array('foo')));
    $this->assertInstanceOf('Hamcrest_Core_IsEqual', $matchers[0]);
    $this->assertTrue($matchers[0]->matches('foo'));
  }

}
