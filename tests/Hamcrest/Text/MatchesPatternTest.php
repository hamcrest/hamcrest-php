<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Text/MatchesPattern.php';

class Hamcrest_Text_MatchesPatternTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return matchesPattern('/o+b/');
  }
  
  public function testEvaluatesToTrueIfArgumentmatchesPattern()
  {
    assertThat('foobar', matchesPattern('/o+b/'));
    assertThat('foobar', matchesPattern('/^foo/'));
    assertThat('foobar', matchesPattern('/ba*r$/'));
    assertThat('foobar', matchesPattern('/^foobar$/'));
  }
  
  public function testEvaluatesToFalseIfArgumentDoesntMatchRegex()
  {
    assertThat('foobar', not(matchesPattern('/^foob$/')));
    assertThat('foobar', not(matchesPattern('/oobe/')));
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('a string matching "pattern"', matchesPattern('pattern'));
  }
  
}
