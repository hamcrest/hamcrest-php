<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\AbstractMatcherTest;

class IsFileNamedTest extends AbstractMatcherTest
{
	private static $FILE_PATH;
	private static $FILE;
	private static $ACTUAL_NAME;
	private static $ACTUAL_NAME_START;

	/**
	 * @beforeClass
	 */
	public static function initializeFiles()
	{
		self::$FILE_PATH = __FILE__;
		self::$FILE = new \SplFileInfo(self::$FILE_PATH);
		self::$ACTUAL_NAME = pathinfo(self::$FILE_PATH, PATHINFO_BASENAME);
		self::$ACTUAL_NAME_START = substr(self::$ACTUAL_NAME, 0, 5);
	}

	protected function createMatcher()
	{
		return IsFileNamed::aFileNamed(not(anything()));
	}

	public function testMatchesAFileWithEqualName()
	{
		$this->assertMatches(
			aFileNamed(self::$ACTUAL_NAME),
			self::$FILE,
			'should match a file that has equal name'
		);
	}

	public function testMatchesAFilePathWithEqualName()
	{
		$this->assertMatches(
			aFileNamed(self::$ACTUAL_NAME),
			self::$FILE_PATH,
			'should match a file path that has equal name'
		);
	}

	public function testDoesNotMatchAFileWithDifferentName()
	{
		$this->assertDoesNotMatch(
			aFileNamed(self::$ACTUAL_NAME . '_suffix'),
			self::$FILE,
			'should not match a file that has a different name'
		);
	}

	public function testDoesNotMatchAFilePathWithDifferentName()
	{
		$this->assertDoesNotMatch(
			aFileNamed(self::$ACTUAL_NAME . '_suffix'),
			self::$FILE_PATH,
			'should not match a file path that has a different file name'
		);
	}

	public function testMatchesAFileWithNameMatchedByAnotherMatcher()
	{
		$this->assertMatches(
			aFileNamed(startsWith(self::$ACTUAL_NAME_START)),
			self::$FILE,
			'should match a file with name that is matched by another matcher'
		);
	}

	public function testMatchesAFilePathWithNameMatchedByAnotherMatcher()
	{
		$this->assertMatches(
			aFileNamed(startsWith(self::$ACTUAL_NAME_START)),
			self::$FILE_PATH,
			'should match a file path with name that is matched by another matcher'
		);
	}

	public function testDoesNotMatchAFileWithNameNotMatchedByAnotherMatcher()
	{
		$this->assertDoesNotMatch(
			aFileNamed(endsWith(self::$ACTUAL_NAME_START)),
			self::$FILE,
			'should not match a file with name that is not matched by another matcher'
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
		$this->assertDescription('a file with name "my-file.txt"', aFileNamed('my-file.txt'));
	}

	public function testHasAReadableDescriptionWithAnotherMatcher()
	{
		$this->assertDescription('a file with name a string starting with "my-file"', aFileNamed(startsWith('my-file')));
	}

	public function testHasAReadableMissmatchDescription()
	{
		$this->assertMismatchDescription(
			'name was "' . self::$ACTUAL_NAME . '"',
			$this->createMatcher(),
			self::$FILE
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
