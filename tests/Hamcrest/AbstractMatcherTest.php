<?php
require_once 'Hamcrest/Matcher.php';
require_once 'Hamcrest/StringDescription.php';
require_once 'Hamcrest/NullDescription.php';

class Hamcrest_UnknownType {}

abstract class Hamcrest_AbstractMatcherTest extends PHPUnit_Framework_TestCase
{
  
  const ARGUMENT_IGNORED = "ignored";
  const ANY_NON_NULL_ARGUMENT = "notnull";
  
  abstract protected function createMatcher();
  
  public function assertMatches(Hamcrest_Matcher $matcher, $arg, $message)
  {
    $this->assertTrue($matcher->matches($arg), $message);
  }
  
  public function assertDoesNotMatch(Hamcrest_Matcher $matcher, $arg,
    $message)
  {
    $this->assertFalse($matcher->matches($arg), $message);
  }
  
  public function assertDescription($expected, Hamcrest_Matcher $matcher)
  {
    $description = new Hamcrest_StringDescription();
    $description->appendDescriptionOf($matcher);
    $this->assertEquals($expected, (string) $description, 'Expected description');
  }
  
  public function assertMismatchDescription($expected,
    Hamcrest_Matcher $matcher, $arg)
  {
    $description = new Hamcrest_StringDescription();
    $this->assertFalse($matcher->matches($arg),
      'Precondtion: Matcher should not match item'
    );
    $matcher->describeMismatch($arg, $description);
    $this->assertEquals($expected, (string) $description,
      'Expected mismatch description'
    );
  }
  
  public function testIsNullSafe()
  {
    //Should not generate any notices
    $this->createMatcher()->matches(null);
    $this->createMatcher()->describeMismatch(
      null, new Hamcrest_NullDescription()
    );
  }
  
  public function testCopesWithUnknownTypes()
  {
    //Should not generate any notices
    $this->createMatcher()->matches(new Hamcrest_UnknownType());
    $this->createMatcher()->describeMismatch(
      new Hamcrest_UnknownType(), new Hamcrest_NullDescription()
    );
  }
  
}
