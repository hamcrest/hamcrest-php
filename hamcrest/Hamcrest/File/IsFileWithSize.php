<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\Core\DescribedAs;
use Hamcrest\Core\IsNot;
use Hamcrest\Description;
use Hamcrest\Matcher;
use Hamcrest\Util;

class IsFileWithSize extends FileMatcher
{
	/**
	 * Matcher that will match the actual size of the file.
	 *
	 * @var Matcher
	 */
	private $sizeMatcher;

	public function __construct(Matcher $sizeMatcher)
	{
		parent::__construct();
		$this->sizeMatcher = $sizeMatcher;
	}

	final public function describeTo(Description $description)
	{
		$description->appendText('a file with size ')->appendDescriptionOf($this->sizeMatcher);
	}

	protected function matchesFile(\SplFileInfo $file)
	{
		$fileSize = $file->getSize();

		return $this->sizeMatcher->matches($fileSize);
	}

	protected function describeFileMismatch(\SplFileInfo $file, Description $mismatchDescription)
	{
		$fileSize = $file->getSize();
		$mismatchDescription->appendText('size was ')->appendValue($fileSize);
	}


    /**
     * Does file size satisfy a given matcher?
	 * Accepts only <code>\SplFileInfo</code> objects or <code>string</code> paths.
     *
     * @param \Hamcrest\Matcher|int $size as a {@link \Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\File\IsFileWithSize
     * @factory
     */
    public static function aFileWithSize($size)
    {
        return new self(Util::wrapValueWithIsEqual($size));
    }

    /**
     * Matches an empty file.
	 * Accepts only <code>\SplFileInfo</code> objects or <code>string</code> paths.
     *
	 * @return \Hamcrest\Core\DescribedAs
     * @factory
     */
    public static function anEmptyFile()
    {
        return DescribedAs::describedAs(
            'an empty file',
            self::aFileWithSize(0)
        );
    }

    /**
     * Matches a non-empty file.
	 * Accepts only <code>\SplFileInfo</code> objects or <code>string</code> paths.
     *
	 * @return \Hamcrest\Core\DescribedAs
     * @factory
     */
    public static function aNonEmptyFile()
    {
        return DescribedAs::describedAs(
            'a non-empty file',
            self::aFileWithSize(IsNot::not(0))
        );
    }
}
