<?php
namespace Hamcrest;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * Null implementation of {@link Hamcrest\Description}.
 */
class NullDescription implements Description
{

    public function appendText(string $text): self
    {
        return $this;
    }

    public function appendDescriptionOf(SelfDescribing $value): self
    {
        return $this;
    }

    public function appendValue($value): self
    {
        return $this;
    }

    public function appendValueList(string $start, string $separator, string $end, $values): self
    {
        return $this;
    }

    public function appendList(string $start, string $separator, string $end, $values): self
    {
        return $this;
    }

    public function __toString()
    {
        return '';
    }
}
