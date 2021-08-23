<?php

declare(strict_types=1);

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\AbstractMatcherTest;

class IsExistingDirectoryTest extends AbstractMatcherTest
{
	private static $EXISTING_DIRECTORY_PATH;
	private static $NON_EXISTING_DIRECTORY_PATH;
	private static $EXISTING_FILE_PATH;

	private static $EXISTING_DIRECTORY;
	private static $NON_EXISTING_DIRECTORY;
	private static $EXISTING_FILE;

	/**
	 * @beforeClass
	 */
	public static function initializeFiles()
	{
		self::$EXISTING_DIRECTORY_PATH = __DIR__;
		self::$NON_EXISTING_DIRECTORY_PATH = __DIR__ . '/does-not-exist';
		self::$EXISTING_FILE_PATH = __FILE__;

		self::$EXISTING_DIRECTORY = new \SplFileInfo(self::$EXISTING_DIRECTORY_PATH);
		self::$NON_EXISTING_DIRECTORY = new \SplFileInfo(self::$NON_EXISTING_DIRECTORY_PATH);
		self::$EXISTING_FILE = new \SplFileInfo(self::$EXISTING_FILE_PATH);
	}

	protected function createMatcher()
	{
		return IsExistingDirectory::anExistingDirectory();
	}

	public function testMatchesAnExistingDirectory()
	{
		$this->assertMatches(
			$this->createMatcher(),
			self::$EXISTING_DIRECTORY,
			"should match a directory that actualy exists"
		);
	}

	public function testMatchesAnExistingDirectoryPath()
	{
		$this->assertMatches(
			$this->createMatcher(),
			self::$EXISTING_DIRECTORY_PATH,
			"should match a path to directory that actualy exists"
		);
	}

	public function testDoesNotMatchADirectoryThatDoesNotExist()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			self::$NON_EXISTING_DIRECTORY,
			"should not match a directory that does not exist"
		);
	}

	public function testDoesNotMatchADirectoryPathThatDoesNotExist()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			self::$NON_EXISTING_DIRECTORY_PATH,
			"should not match a path to directory that does not exist"
		);
	}

	public function testDoesNotMatchAnExistingFileThatIsNotADirectory()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			self::$EXISTING_FILE,
			"should not match an existing file that is not a directory"
		);
	}

	public function testDoesNotMatchAnExistingFilePathThatIsNotADirectory()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			self::$EXISTING_FILE_PATH,
			"should not match a path to existing file that is not a directory"
		);
	}

	public function testDoesNotMatchNull()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			null,
			'should not match null'
		);
	}

	public function testHasAReadableDescription()
	{
		$this->assertDescription('an existing directory', $this->createMatcher());
	}

	public function testHasAReadableMissmatchDescription()
	{
		$this->assertMismatchDescription(
			'<' . self::$NON_EXISTING_DIRECTORY . '> is not a directory',
			$this->createMatcher(),
			self::$NON_EXISTING_DIRECTORY
		);
	}

	public function testHasAReadableMissmatchDescriptionForPath()
	{
		$this->assertMismatchDescription(
			'<' . self::$NON_EXISTING_DIRECTORY_PATH . '> is not a directory',
			$this->createMatcher(),
			self::$NON_EXISTING_DIRECTORY_PATH
		);
	}

	public function testHasAReadableTypeMissmatchDescription()
	{
		$this->assertMismatchDescription(
			'was <stdClass>',
			$this->createMatcher(),
			new \stdClass()
		);
	}
}