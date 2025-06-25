<?php
namespace Hamcrest;

/* Test-specific subclass only */
class BaseMatcherTest extends \Hamcrest\BaseMatcher
{

    public function matches($item): bool
    {
        throw new \RuntimeException();
    }

    public function describeTo(\Hamcrest\Description $description): void
    {
        $description->appendText('SOME DESCRIPTION');
    }

    public function testDescribesItselfWithToStringMethod()
    {
        $someMatcher = new \Hamcrest\SomeMatcher();
        $this->assertEquals('SOME DESCRIPTION', (string) $someMatcher);
    }
}
