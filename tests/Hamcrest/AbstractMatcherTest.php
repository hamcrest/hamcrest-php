<?php
namespace Hamcrest;

use PHPUnit\Framework\TestCase;

class UnknownType {
}

abstract class AbstractMatcherTest extends TestCase
{

    const ARGUMENT_IGNORED = "ignored";
    const ANY_NON_NULL_ARGUMENT = "notnull";

    /**
     * @before
     */
    protected function setUpTest()
    {
        MatcherAssert::resetCount();
    }

    abstract protected function createMatcher();

    public function assertMatches(\Hamcrest\Matcher $matcher, $arg, $message)
    {
        $this->assertTrue($matcher->matches($arg), $message);
    }

    public function assertDoesNotMatch(\Hamcrest\Matcher $matcher, $arg, $message)
    {
        $this->assertFalse($matcher->matches($arg), $message);
    }

    public function assertDescription($expected, \Hamcrest\Matcher $matcher)
    {
        $description = new \Hamcrest\StringDescription();
        $description->appendDescriptionOf($matcher);
        $this->assertEquals($expected, (string) $description, 'Expected description');
    }

    public function assertMismatchDescription($expected, \Hamcrest\Matcher $matcher, $arg)
    {
        $description = new \Hamcrest\StringDescription();
        $this->assertFalse(
            $matcher->matches($arg),
            'Precondtion: Matcher should not match item'
        );
        $matcher->describeMismatch($arg, $description);
        $this->assertEquals(
            $expected,
            (string) $description,
            'Expected mismatch description'
        );
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testIsNullSafe()
    {
        //Should not generate any notices
        $this->createMatcher()->matches(null);
        $this->createMatcher()->describeMismatch(
            null,
            new \Hamcrest\NullDescription()
        );
    }

    /**
     * @doesNotPerformAssertions
     */
    public function testCopesWithUnknownTypes()
    {
        //Should not generate any notices
        $this->createMatcher()->matches(new UnknownType());
        $this->createMatcher()->describeMismatch(
            new UnknownType(),
            new NullDescription()
        );
    }

    /**
     * @after
     */
    protected function tearDownTest()
    {
        $this->addToAssertionCount(MatcherAssert::getCount());
    }
}
