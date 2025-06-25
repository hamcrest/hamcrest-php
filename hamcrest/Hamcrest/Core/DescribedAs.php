<?php
namespace Hamcrest\Core;

/*
 Copyright (c) 2009 hamcrest.org
 */
use Hamcrest\BaseMatcher;
use Hamcrest\Description;
use Hamcrest\Matcher;

/**
 * Provides a custom description to another matcher.
 */
class DescribedAs extends BaseMatcher
{

    private string $_descriptionTemplate;
    private Matcher $_matcher;
    /**
     * @var array<mixed>
     */
    private array $_values;

    private const ARG_PATTERN = '/%([0-9]+)/';

    /**
     * @param array<mixed> $values
     */
    public function __construct(string $descriptionTemplate, Matcher $matcher, array $values)
    {
        $this->_descriptionTemplate = $descriptionTemplate;
        $this->_matcher = $matcher;
        $this->_values = $values;
    }

    public function matches($item): bool
    {
        return $this->_matcher->matches($item);
    }

    public function describeTo(Description $description): void
    {
        $textStart = 0;
        while (preg_match(self::ARG_PATTERN, $this->_descriptionTemplate, $matches, PREG_OFFSET_CAPTURE, $textStart)) {
            $text = $matches[0][0];
            $index = $matches[1][0];
            $offset = $matches[0][1];

            $description->appendText(substr($this->_descriptionTemplate, $textStart, $offset - $textStart));
            $description->appendValue($this->_values[$index]);

            $textStart = $offset + strlen($text);
        }

        if ($textStart < strlen($this->_descriptionTemplate)) {
            $description->appendText(substr($this->_descriptionTemplate, $textStart));
        }
    }

    /**
     * Wraps an existing matcher and overrides the description when it fails.
     *
     * @factory ...
     */
    public static function describedAs(/* $description, Hamcrest\Matcher $matcher, $values... */): self
    {
        $args = func_get_args();
        $description = array_shift($args);
        $matcher = array_shift($args);
        $values = $args;

        return new self($description, $matcher, $values);
    }
}
