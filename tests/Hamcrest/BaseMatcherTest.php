<?php
require_once 'Hamcrest/BaseMatcher.php';

/* Test-specific subclass only */
class Hamcrest_SomeMatcher extends Hamcrest_BaseMatcher
{
  
  public function matches($item)
  {
    throw new RuntimeException();
  }
  
  public function describeTo(Hamcrest_Description $description)
  {
    $description->appendText('SOME DESCRIPTION');
  }
  
}

class Hamcrest_BaseMatcherTest extends PHPUnit_Framework_TestCase
{
  
  public function testDescribesItselfWithToStringMethod()
  {
    $someMatcher = new Hamcrest_SomeMatcher();
    $this->assertEquals('SOME DESCRIPTION', (string) $someMatcher);
  }
  
}
