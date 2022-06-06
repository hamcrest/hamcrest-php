<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\Description;
use Hamcrest\Matcher;
use Hamcrest\Util;

class IsFileWithCanonicalPath extends FileMatcher
{
	/**
	 * Matcher that will match the actual canonical path of the file.
	 *
	 * @var Matcher
	 */
	private $pathMatcher;

	public function __construct(Matcher $pathMatcher)
	{
		parent::__construct();
		$this->pathMatcher = $pathMatcher;
	}

	final public function describeTo(Description $description)
	{
		$description->appendText('a file with canonical path ')->appendDescriptionOf($this->pathMatcher);
	}

	protected function matchesFile(\SplFileInfo $file)
	{
		$realPath = $file->getRealPath();

		return $this->pathMatcher->matches($realPath);
	}

	protected function describeFileMismatch(\SplFileInfo $file, Description $mismatchDescription)
	{
		$realPath = $file->getRealPath();
		$mismatchDescription->appendText('canonical path was ')->appendValue($realPath);
	}


    /**
     * Does canonical path satisfy a given matcher?
	 * Accepts only <code>\SplFileInfo</code> objects or <code>string</code> paths.
     *
     * @param \Hamcrest\Matcher|string $path as a {@link \Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\File\IsFileWithCanonicalPath
     * @factory
     */
    public static function aFileWithCanonicalPath($path)
    {
        return new self(Util::wrapValueWithIsEqual($path));
    }
}
