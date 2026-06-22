<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\AbstractMatcherTest;

class IsExistingFileOrDirectoryTest extends AbstractMatcherTest
{
	private static $EXISTING_FILE_PATH;
	private static $EXISTING_DIRECTORY_PATH;
	private static $NON_EXISTING_FILE_PATH;

	private static $EXISTING_FILE;
	private static $EXISTING_DIRECTORY;
	private static $NON_EXISTING_FILE;

	/**
	 * @beforeClass
	 */
	public static function initializeFiles()
	{
		self::$EXISTING_FILE_PATH = __FILE__;
		self::$EXISTING_DIRECTORY_PATH = __DIR__;
		self::$NON_EXISTING_FILE_PATH = __DIR__ . '/does-not-exist';

		self::$EXISTING_FILE = new \SplFileInfo(self::$EXISTING_FILE_PATH);
		self::$EXISTING_DIRECTORY = new \SplFileInfo(self::$EXISTING_DIRECTORY_PATH);
		self::$NON_EXISTING_FILE = new \SplFileInfo(self::$NON_EXISTING_FILE_PATH);
	}

	protected function createMatcher()
	{
		return IsExistingFileOrDirectory::anExistingFileOrDirectory();
	}

	public function testMatchesAnExistingFile()
	{
		$this->assertMatches(
			$this->createMatcher(),
			self::$EXISTING_FILE,
			"should match a file that actualy exists"
		);
	}

	public function testMatchesAnExistingFilePath()
	{
		$this->assertMatches(
			$this->createMatcher(),
			self::$EXISTING_FILE_PATH,
			"should match a path to file that actualy exists"
		);
	}

	public function testMatchesAnExistingDirectory()
	{
		$this->assertMatches(
			$this->createMatcher(),
			self::$EXISTING_DIRECTORY,
			"should match an existing directory"
		);
	}

	public function testMatchesAnExistingDirectoryPath()
	{
		$this->assertMatches(
			$this->createMatcher(),
			self::$EXISTING_DIRECTORY_PATH,
			"should match a path to existing directory"
		);
	}

	public function testDoesNotMatchAFileThatDoesNotExist()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			self::$NON_EXISTING_FILE,
			"should not match a file that does not exist"
		);
	}

	public function testDoesNotMatchAFilePathThatDoesNotExist()
	{
		$this->assertDoesNotMatch(
			$this->createMatcher(),
			self::$NON_EXISTING_FILE_PATH,
			"should not match a path to file that does not exist"
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
		$this->assertDescription('an existing file or directory', $this->createMatcher());
	}

	public function testHasAReadableMissmatchDescription()
	{
		$this->assertMismatchDescription(
			'<' . self::$NON_EXISTING_FILE . '> does not exist',
			$this->createMatcher(),
			self::$NON_EXISTING_FILE
		);
	}

	public function testHasAReadableMissmatchDescriptionForPath()
	{
		$this->assertMismatchDescription(
			'<' . self::$NON_EXISTING_FILE_PATH . '> does not exist',
			$this->createMatcher(),
			self::$NON_EXISTING_FILE_PATH
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
