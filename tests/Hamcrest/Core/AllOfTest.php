<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/AllOf.php';
require_once 'Hamcrest/Core/SampleBaseClass.php';
require_once 'Hamcrest/Core/SampleSubClass.php';

class Hamcrest_Core_AllOfTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Core_AllOf::allOf(equalTo('irrelevant'));
  }
  
  public function testEvaluatesToTheTheLogicalConjunctionOfTwoOtherMatchers()
  {
    assertThat('good', allOf(equalTo('good'), equalTo('good')));

    assertThat('good', not(allOf(equalTo('bad'), equalTo('good'))));
    assertThat('good', not(allOf(equalTo('good'), equalTo('bad'))));
    assertThat('good', not(allOf(equalTo('bad'), equalTo('bad'))));
  }
  
  public function testEvaluatesToTheTheLogicalConjunctionOfManyOtherMatchers()
  {
    assertThat('good', allOf(equalTo('good'), equalTo('good'), equalTo('good'), equalTo('good'), equalTo('good')));
    assertThat('good', not(allOf(equalTo('good'), equalTo('good'), equalTo('bad'), equalTo('good'), equalTo('good'))));
  }
  
  public function testSupportsMixedTypes()
  {
    $all = allOf(
      equalTo(new Hamcrest_Core_SampleBaseClass('good')),
      equalTo(new Hamcrest_Core_SampleBaseClass('good')),
      equalTo(new Hamcrest_Core_SampleSubClass('ugly'))
    );
    
    $negated = not($all);
    
    assertThat(new Hamcrest_Core_SampleSubClass('good'), $negated);
  }
  
  public function testHasAReadableDescription()
  {
    $this->assertDescription('("good" and "bad" and "ugly")',
      allOf(equalTo('good'), equalTo('bad'), equalTo('ugly'))
    );
  }
  
  public function testMismatchDescriptionDescribesFirstFailingMatch()
  {
    $this->assertMismatchDescription('"good" was "bad"',
      allOf(equalTo('bad'), equalTo('good')), 'bad'
    );
  }
  
}
