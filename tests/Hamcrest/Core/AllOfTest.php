<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Core/AllOf.php';
require_once 'Hamcrest/Core/SampleBaseClass.php';
require_once 'Hamcrest/Core/SampleSubClass.php';

class Hamcrest_Core_AllOfTest extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Core_AllOf::allOf('irrelevant');
  }
  
  public function testEvaluatesToTheLogicalConjunctionOfTwoOtherMatchers()
  {
    assertThat('good', allOf('good', 'good'));

    assertThat('good', not(allOf('bad', 'good')));
    assertThat('good', not(allOf('good', 'bad')));
    assertThat('good', not(allOf('bad', 'bad')));
  }
  
  public function testEvaluatesToTheLogicalConjunctionOfManyOtherMatchers()
  {
    assertThat('good', allOf('good', 'good', 'good', 'good', 'good'));
    assertThat('good', not(allOf('good', endsWith('d'), 'bad', 'good', 'good')));
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
      allOf('good', 'bad', 'ugly')
    );
  }
  
  public function testMismatchDescriptionDescribesFirstFailingMatch()
  {
    $this->assertMismatchDescription('"good" was "bad"',
      allOf('bad', 'good'), 'bad'
    );
  }
  
}
