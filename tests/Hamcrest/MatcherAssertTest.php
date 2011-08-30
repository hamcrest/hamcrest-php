<?php
require_once 'Hamcrest/MatcherAssert.php';
require_once 'Hamcrest/AssertionError.php';

class Hamcrest_MatcherAssertTest extends PHPUnit_Framework_TestCase
{

  protected function setUp()
  {
    Hamcrest_MatcherAssert::resetCount();
  }

  public function testResetCount()
  {
    Hamcrest_MatcherAssert::assertThat(true);
    self::assertEquals(1, Hamcrest_MatcherAssert::getCount(), 'assertion count');
    Hamcrest_MatcherAssert::resetCount();
    self::assertEquals(0, Hamcrest_MatcherAssert::getCount(), 'assertion count');
  }

  public function testAssertThatWithTrueArgPasses()
  {
    Hamcrest_MatcherAssert::assertThat(true);
    Hamcrest_MatcherAssert::assertThat('non-empty');
    Hamcrest_MatcherAssert::assertThat(1);
    Hamcrest_MatcherAssert::assertThat(3.14159);
    Hamcrest_MatcherAssert::assertThat(array(true));
    self::assertEquals(5, Hamcrest_MatcherAssert::getCount(), 'assertion count');
  }

  public function testAssertThatWithFalseArgFails()
  {
    try
    {
      Hamcrest_MatcherAssert::assertThat(false);
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals('', $ex->getMessage());
    }
    try
    {
      Hamcrest_MatcherAssert::assertThat(null);
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals('', $ex->getMessage());
    }
    try
    {
      Hamcrest_MatcherAssert::assertThat('');
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals('', $ex->getMessage());
    }
    try
    {
      Hamcrest_MatcherAssert::assertThat(0);
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals('', $ex->getMessage());
    }
    try
    {
      Hamcrest_MatcherAssert::assertThat(0.0);
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals('', $ex->getMessage());
    }
    try
    {
      Hamcrest_MatcherAssert::assertThat(array());
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals('', $ex->getMessage());
    }
    self::assertEquals(6, Hamcrest_MatcherAssert::getCount(), 'assertion count');
  }

  public function testAssertThatWithIdentifierAndTrueArgPasses()
  {
    Hamcrest_MatcherAssert::assertThat('identifier', true);
    Hamcrest_MatcherAssert::assertThat('identifier', 'non-empty');
    Hamcrest_MatcherAssert::assertThat('identifier', 1);
    Hamcrest_MatcherAssert::assertThat('identifier', 3.14159);
    Hamcrest_MatcherAssert::assertThat('identifier', array(true));
    self::assertEquals(5, Hamcrest_MatcherAssert::getCount(), 'assertion count');
  }

  public function testAssertThatWithIdentifierAndFalseArgFails()
  {
    try
    {
      Hamcrest_MatcherAssert::assertThat('identifier', false);
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals('identifier', $ex->getMessage());
    }
    try
    {
      Hamcrest_MatcherAssert::assertThat('identifier', null);
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals('identifier', $ex->getMessage());
    }
    try
    {
      Hamcrest_MatcherAssert::assertThat('identifier', '');
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals('identifier', $ex->getMessage());
    }
    try
    {
      Hamcrest_MatcherAssert::assertThat('identifier', 0);
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals('identifier', $ex->getMessage());
    }
    try
    {
      Hamcrest_MatcherAssert::assertThat('identifier', 0.0);
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals('identifier', $ex->getMessage());
    }
    try
    {
      Hamcrest_MatcherAssert::assertThat('identifier', array());
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals('identifier', $ex->getMessage());
    }
    self::assertEquals(6, Hamcrest_MatcherAssert::getCount(), 'assertion count');
  }

  public function testAssertThatWithActualValueAndMatcherArgsThatMatchPasses()
  {
    Hamcrest_MatcherAssert::assertThat(true, is(true));
    self::assertEquals(1, Hamcrest_MatcherAssert::getCount(), 'assertion count');
  }

  public function testAssertThatWithActualValueAndMatcherArgsThatDontMatchFails()
  {
    $expected = 'expected';
    $actual = 'actual';

    $expectedMessage =
      'Expected: "expected"' . PHP_EOL .
      '     but: was "actual"';

    try
    {
      Hamcrest_MatcherAssert::assertThat($actual, equalTo($expected));
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals($expectedMessage, $ex->getMessage());
      self::assertEquals(1, Hamcrest_MatcherAssert::getCount(), 'assertion count');
    }
  }

  public function testAssertThatWithIdentifierAndActualValueAndMatcherArgsThatMatchPasses()
  {
    Hamcrest_MatcherAssert::assertThat('identifier', true, is(true));
    self::assertEquals(1, Hamcrest_MatcherAssert::getCount(), 'assertion count');
  }

  public function testAssertThatWithIdentifierAndActualValueAndMatcherArgsThatDontMatchFails()
  {
    $expected = 'expected';
    $actual = 'actual';
    
    $expectedMessage = 
      'identifier' . PHP_EOL .
      'Expected: "expected"' . PHP_EOL .
      '     but: was "actual"';
    
    try
    {
      Hamcrest_MatcherAssert::assertThat('identifier', $actual, equalTo($expected));
      self::fail('expected assertion failure');
    }
    catch (Hamcrest_AssertionError $ex)
    {
      self::assertEquals($expectedMessage, $ex->getMessage());
      self::assertEquals(1, Hamcrest_MatcherAssert::getCount(), 'assertion count');
    }
  }

  public function testAssertThatWithNoArgsThrowsErrorAndDoesntIncrementCount()
  {
    try
    {
      Hamcrest_MatcherAssert::assertThat();
      self::fail('expected invalid argument exception');
    }
    catch (InvalidArgumentException $ex)
    {
      self::assertEquals(0, Hamcrest_MatcherAssert::getCount(), 'assertion count');
    }
  }

  public function testAssertThatWithFourArgsThrowsErrorAndDoesntIncrementCount()
  {
    try
    {
      Hamcrest_MatcherAssert::assertThat(1, 2, 3, 4);
      self::fail('expected invalid argument exception');
    }
    catch (InvalidArgumentException $ex)
    {
      self::assertEquals(0, Hamcrest_MatcherAssert::getCount(), 'assertion count');
    }
  }
  
}
