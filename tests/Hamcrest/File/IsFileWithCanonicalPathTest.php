<?php

/**
 * @author Vasek Brychta <vaclav@brychtovi.cz>
 */

namespace Hamcrest\File;

use Hamcrest\AbstractMatcherTest;

class IsFileWithCanonicalPathTest extends AbstractMatcherTest
{
	private static $CANONICAL_PATH;
	private static $FILENAME;
	private static $FILE_PATH;
	private static $FILE;

	private static $DIFFERENT_CANONICAL_PATH;

	/**
	 * @beforeClass
	 */
	public static function initializeFiles()
	{
		self::$CANONICAL_PATH = __FILE__;
		self::$FILENAME = pathinfo(__FILE__, PATHINFO_BASENAME);
		self::$FILE_PATH = __DIR__ . '/./' . self::$FILENAME;
		self::$FILE = new \SplFileInfo(self::$FILE_PATH);

		self::$DIFFERENT_CANONICAL_PATH = __DIR__ . '/different-file.txt';
	}

	protected function createMatcher()
	{
		return IsFileWithCanonicalPath::aFileWithCanonicalPath(not(anything()));
	}

	public function testMatchesAFileWithEqualCanonicalPath()
	{
		$this->assertMatches(
			aFileWithCanonicalPath(self::$CANONICAL_PATH),
			self::$FILE,
			'should match a file that has equal canonical path'
		);
	}

	public function testMatchesAFilePathWithEqualCanonicalPath()
	{
		$this->assertMatches(
			aFileWithCanonicalPath(self::$CANONICAL_PATH),
			self::$FILE_PATH,
			'should match a file path that has equal canonical path'
		);
	}

	public function testDoesNotMatchAFileWithDifferentCanonicalPath()
	{
		$this->assertDoesNotMatch(
			aFileWithCanonicalPath(self::$DIFFERENT_CANONICAL_PATH),
			self::$FILE,
			'should not match a file that has a different canonical path'
		);
	}

	public function testDoesNotMatchAFilePathWithDifferentCanonicalPath()
	{
		$this->assertDoesNotMatch(
			aFileWithCanonicalPath(self::$DIFFERENT_CANONICAL_PATH),
			self::$FILE_PATH,
			'should not match a file path that has a different canonical path'
		);
	}

	public function testMatchesAFileWithCanonicalPathMatchedByAnotherMatcher()
	{
		$this->assertMatches(
			aFileWithCanonicalPath(endsWith(self::$FILENAME)),
			self::$FILE,
			'should match a file with canonical path that is matched by another matcher'
		);
	}

	public function testMatchesAFilePathWithCanonicalPathMatchedByAnotherMatcher()
	{
		$this->assertMatches(
			aFileWithCanonicalPath(endsWith(self::$FILENAME)),
			self::$FILE_PATH,
			'should match a file path with canonical path that is matched by another matcher'
		);
	}

	public function testDoesNotMatchAFileWithCanonicalPathNotMatchedByAnotherMatcher()
	{
		$this->assertDoesNotMatch(
			aFileWithCanonicalPath(startsWith(self::$FILENAME)),
			self::$FILE,
			'should not match a file with canonical path that is not matched by another matcher'
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
		$this->assertDescription('a file with canonical path "/tmp/my-file.txt"', aFileWithCanonicalPath('/tmp/my-file.txt'));
	}

	public function testHasAReadableDescriptionWithAnotherMatcher()
	{
		$this->assertDescription('a file with canonical path a string ending with "my-file"', aFileWithCanonicalPath(endsWith('my-file')));
	}

	public function testHasAReadableMissmatchDescription()
	{
		$this->assertMismatchDescription(
			'canonical path was "' . self::$CANONICAL_PATH . '"',
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
