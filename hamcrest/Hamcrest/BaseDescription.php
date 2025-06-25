<?php
namespace Hamcrest;

/*
 Copyright (c) 2009 hamcrest.org
 */
use Hamcrest\Internal\SelfDescribingValue;

/**
 * A {@link Hamcrest\Description} that is stored as a string.
 */
abstract class BaseDescription implements Description
{

    public function appendText(string $text): self
    {
        $this->append($text);

        return $this;
    }

    public function appendDescriptionOf(SelfDescribing $value): self
    {
        $value->describeTo($this);

        return $this;
    }

    public function appendValue($value): self
    {
        if (is_null($value)) {
            $this->append('null');
        } elseif (is_string($value)) {
            $this->_toPhpSyntax($value);
        } elseif (is_float($value)) {
            $this->append('<');
            $this->append($value);
            $this->append('F>');
        } elseif (is_bool($value)) {
            $this->append('<');
            $this->append($value ? 'true' : 'false');
            $this->append('>');
        } elseif (is_array($value) || $value instanceof \Iterator || $value instanceof \IteratorAggregate) {
            $this->appendValueList('[', ', ', ']', $value);
        } elseif (is_object($value) && !method_exists($value, '__toString')) {
            $this->append('<');
            $this->append(get_class($value));
            $this->append('>');
        } else {
            $this->append('<');
            $this->append($value);
            $this->append('>');
        }

        return $this;
    }

    public function appendValueList(string $start, string $separator, string $end, iterable $values): self
    {
        $list = array();
        foreach ($values as $v) {
            $list[] = new SelfDescribingValue($v);
        }

        $this->appendList($start, $separator, $end, $list);

        return $this;
    }

    public function appendList(string $start, string $separator, string $end, iterable $values): self
    {
        $this->append($start);

        $separate = false;

        foreach ($values as $value) {
            /*if (!($value instanceof Hamcrest\SelfDescribing)) {
                $value = new Hamcrest\Internal\SelfDescribingValue($value);
            }*/

            if ($separate) {
                $this->append($separator);
            }

            $this->appendDescriptionOf($value);

            $separate = true;
        }

        $this->append($end);

        return $this;
    }

    // -- Protected Methods

    /**
     * Append the String <var>$str</var> to the description.
     * @param mixed $str
     */
    abstract protected function append($str): void;

    // -- Private Methods

    private function _toPhpSyntax(string $value): void
    {
        $str = '"';
        for ($i = 0, $len = strlen($value); $i < $len; ++$i) {
            switch ($value[$i]) {
                case '"':
                    $str .= '\\"';
                    break;

                case "\t":
                    $str .= '\\t';
                    break;

                case "\r":
                    $str .= '\\r';
                    break;

                case "\n":
                    $str .= '\\n';
                    break;

                default:
                    $str .= $value[$i];
            }
        }
        $str .= '"';
        $this->append($str);
    }
}
