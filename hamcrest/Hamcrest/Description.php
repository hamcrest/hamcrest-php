<?php
namespace Hamcrest;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * A description of a Matcher. A Matcher will describe itself to a description
 * which can later be used for reporting.
 *
 * @see Hamcrest\Matcher::describeTo()
 */
interface Description
{

    /**
     * Appends some plain text to the description.
     *
     * @param string $text
     *
     * @return static
     */
    public function appendText(string $text): self;

    /**
     * Appends the description of a {@link Hamcrest\SelfDescribing} value to
     * this description.
     *
     * @param \Hamcrest\SelfDescribing $value
     *
     * @return static
     */
    public function appendDescriptionOf(SelfDescribing $value);

    /**
     * Appends an arbitrary value to the description.
     *
     * @param mixed $value
     *
     * @return static
     */
    public function appendValue($value): self;

    /**
     * Appends a list of values to the description.
     *
     * @param string $start
     * @param string $separator
     * @param string $end
     * @param iterable<mixed> $values
     *
     * @return static
     */
    public function appendValueList(string $start, string $separator, string $end, iterable $values): self;

    /**
     * Appends a list of {@link Hamcrest\SelfDescribing} objects to the
     * description.
     *
     * @param string $start
     * @param string $separator
     * @param string $end
     * @param iterable<SelfDescribing> $values
     *
     * @return static
     */
    public function appendList(string $start, string $separator, string $end, iterable $values): self;
}
