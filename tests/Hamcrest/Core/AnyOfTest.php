<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/AnyOf.php';
require_once 'Hamcrest/Core/SampleBaseClass.php';
require_once 'Hamcrest/Core/SampleSubClass.php';

class Hamcrest_Core_AnyOfTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Core_AnyOf::anyOf(equalTo('irrelevant'));
  }
  
  public function testEvaluatesToTheTheLogicalDisjunctionOfTwoOtherMatchers()
  {
    assertThat('good', anyOf(equalTo('bad'), equalTo('good')));
    assertThat('good', anyOf(equalTo('good'), equalTo('good')));
    assertThat('good', anyOf(equalTo('good'), equalTo('bad')));
    
    assertThat('good', not(anyOf(equalTo('bad'), equalTo('bad'))));
  }
  
  public function testEvaluatesToTheTheLogicalDisjunctionOfManyOtherMatchers()
  {
    assertThat('good', anyOf(equalTo('bad'), equalTo('good'), equalTo('bad'), equalTo('bad'), equalTo('bad')));
    assertThat('good', not(anyOf(equalTo('bad'), equalTo('bad'), equalTo('bad'), equalTo('bad'), equalTo('bad'))));
  }
  
  public function testSupportsMixedTypes()
  {
    $combined = anyOf(
      equalTo(new Hamcrest_Core_SampleBaseClass('good')),
      equalTo(new Hamcrest_Core_SampleBaseClass('ugly')),
      equalTo(new Hamcrest_Core_SampleSubClass('good'))
    );
    
    assertThat(new Hamcrest_Core_SampleSubClass('good'), $combined);
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('("good" or "bad" or "ugly")',
      anyOf(equalTo('good'), equalTo('bad'), equalTo('ugly'))
    );
  }
  
}
