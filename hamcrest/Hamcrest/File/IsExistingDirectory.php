<?php

declare(strict_types=1);

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

class IsExistingDirectory extends FileMatcher
{
	public function __construct()
	{
		parent::__construct('an existing directory', 'is not a directory');
	}

	protected function matchesFile(\SplFileInfo $file): bool
	{
		return $file->isDir();
	}

	/**
	 * Evaluates to true if the file exists and is a directory.
	 * Accepts only <code>\SplFileInfo</code> objects or <code>string</code> paths.
	 *
	 * @return \Hamcrest\File\IsExistingDirectory
	 * @factory
	 */
	public static function anExistingDirectory()
	{
		return new self();
	}
}