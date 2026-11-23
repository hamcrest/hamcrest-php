<?php
namespace Hamcrest\Core;

class IsMatcherTest extends \Hamcrest\AbstractMatcherTest
{

    protected function createMatcher()
    {
        return \Hamcrest\Core\IsMatcher::is('something');
    }

    public function testJustMatchesTheSameWayTheUnderylingMatcherDoes()
    {
        $this->assertMatches(is(equalTo(true)), true, 'should match');
        $this->assertMatches(is(equalTo(false)), false, 'should match');
        $this->assertDoesNotMatch(is(equalTo(true)), false, 'should not match');
        $this->assertDoesNotMatch(is(equalTo(false)), true, 'should not match');
    }

    public function testGeneratesIsPrefixInDescription()
    {
        $this->assertDescription('is <true>', is(equalTo(true)));
    }

    public function testProvidesConvenientShortcutForIsEqualTo()
    {
        $this->assertMatches(is('A'), 'A', 'should match');
        $this->assertMatches(is('B'), 'B', 'should match');
        $this->assertDoesNotMatch(is('A'), 'B', 'should not match');
        $this->assertDoesNotMatch(is('B'), 'A', 'should not match');
        $this->assertDescription('is "A"', is('A'));
    }

    public function testStaticFactoryReturnsIsMatcher()
    {
        $this->assertInstanceOf('Hamcrest\Core\IsMatcher', \Hamcrest\Matchers::is('A'));
    }

    public function testDeprecatedIsClassStillWorks()
    {
        if (PHP_VERSION_ID >= 80600) {
            $this->markTestSkipped('Loading the Is class emits a deprecation notice since PHP 8.6');
        }

        $matcher = new \Hamcrest\Core\Is(equalTo('A'));
        $this->assertInstanceOf('Hamcrest\Core\IsMatcher', $matcher);
        $this->assertMatches($matcher, 'A', 'should match');
        $this->assertDescription('is "A"', $matcher);
    }
}
