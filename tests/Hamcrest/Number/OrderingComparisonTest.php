<?php
require_once 'Hamcrest/AbstractMatcherTest.php';
require_once 'Hamcrest/Number/OrderingComparison.php';

class Hamcrest_Number_OrderingComparisonTest
  extends Hamcrest_AbstractMatcherTest
{
  
  protected function createMatcher()
  {
    return Hamcrest_Number_OrderingComparison::greaterThan(1);
  }
  
  public function testComparesValuesForGreaterThan()
  {
    assertThat(2, greaterThan(1));
    assertThat(0, not(greaterThan(1)));
  }
  
  public function testComparesValuesForLessThan()
  {
    assertThat(2, lessThan(3));
    assertThat(0, lessThan(1));
  }
  
  public function testComparesValuesForEquality()
  {
    assertThat(3, comparesEqualTo(3));
    assertThat('aa', comparesEqualTo('aa'));
  }
  
  public function testAllowsForInclusiveComparisons()
  {
    assertThat(1, lessThanOrEqualTo(1));
    assertThat(1, greaterThanOrEqualTo(1));
  }
  
  public function testSupportsDifferentTypesOfComparableValues()
  {
    assertThat(1.1, greaterThan(1.0));
    assertThat("cc", greaterThan("bb"));
  }
  
}
