<?php
namespace Hamcrest;

use PHPUnit\Framework\TestCase;

class UtilTest extends TestCase
{

    public function testWrapValueWithIsEqualLeavesMatchersUntouched()
    {
        $matcher = new \Hamcrest\Text\MatchesPattern('/fo+/');
        $newMatcher = \Hamcrest\Util::wrapValueWithIsEqual($matcher);
        $this->assertSame($matcher, $newMatcher);
    }

    public function testWrapValueWithIsEqualWrapsPrimitive()
    {
        $matcher = \Hamcrest\Util::wrapValueWithIsEqual('foo');
        $this->assertInstanceOf('Hamcrest\Core\IsEqual', $matcher);
        $this->assertTrue($matcher->matches('foo'));
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testCheckAllAreMatchersAcceptsMatchers()
    {
        \Hamcrest\Util::checkAllAreMatchers(array(
            new \Hamcrest\Text\MatchesPattern('/fo+/'),
            new \Hamcrest\Core\IsEqual('foo'),
        ));
    }

    public function testCheckAllAreMatchersFailsForPrimitive()
    {
        $exceptionThrown = false;
        try {
            \Hamcrest\Util::checkAllAreMatchers(array(
                new \Hamcrest\Text\MatchesPattern('/fo+/'),
                'foo',
            ));
        } catch (\InvalidArgumentException $exception) {
            $exceptionThrown = true;
        }

        $this->assertTrue(
            $exceptionThrown,
            'Failed asserting that exception of type "InvalidArgumentException" is thrown.'
        );
    }

    private function callAndAssertCreateMatcherArray($items)
    {
        $matchers = \Hamcrest\Util::createMatcherArray($items);
        $this->assertTrue(is_array($matchers), sprintf('Type "array" expected, but got "%s" instead', gettype($matchers)));
        $this->assertSameSize($items, $matchers);
        foreach ($matchers as $matcher) {
            $this->assertInstanceOf('\Hamcrest\Matcher', $matcher);
        }

        return $matchers;
    }

    public function testCreateMatcherArrayLeavesMatchersUntouched()
    {
        $matcher = new \Hamcrest\Text\MatchesPattern('/fo+/');
        $items = array($matcher);
        $matchers = $this->callAndAssertCreateMatcherArray($items);
        $this->assertSame($matcher, $matchers[0]);
    }

    public function testCreateMatcherArrayWrapsPrimitiveWithIsEqualMatcher()
    {
        $matchers = $this->callAndAssertCreateMatcherArray(array('foo'));
        $this->assertInstanceOf('Hamcrest\Core\IsEqual', $matchers[0]);
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
        $this->assertInstanceOf('Hamcrest\Core\IsEqual', $matchers[0]);
        $this->assertTrue($matchers[0]->matches('foo'));
    }
}
