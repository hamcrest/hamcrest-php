<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\Description;
use Hamcrest\Matcher;
use Hamcrest\Util;

class IsFileNamed extends FileMatcher
{
	/**
	 * Matcher that will match the actual name of the file.
	 *
	 * @var Matcher
	 */
	private $nameMatcher;

	public function __construct(Matcher $nameMatcher)
	{
		parent::__construct();
		$this->nameMatcher = $nameMatcher;
	}

	final public function describeTo(Description $description)
	{
		$description->appendText('a file with name ')->appendDescriptionOf($this->nameMatcher);
	}

	protected function matchesFile(\SplFileInfo $file)
	{
		$fileName = $file->getFilename();

		return $this->nameMatcher->matches($fileName);
	}

	protected function describeFileMismatch(\SplFileInfo $file, Description $mismatchDescription)
	{
		$fileName = $file->getFilename();
		$mismatchDescription->appendText('name was ')->appendValue($fileName);
	}


    /**
     * Does file name satisfy a given matcher?
	 * Accepts only <code>\SplFileInfo</code> objects or <code>string</code> paths.
     *
     * @param \Hamcrest\Matcher|string $name as a {@link \Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\File\IsFileNamed
     * @factory
     */
    public static function aFileNamed($name)
    {
        return new self(Util::wrapValueWithIsEqual($name));
    }
}
