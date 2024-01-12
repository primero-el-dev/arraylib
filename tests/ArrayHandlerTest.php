<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use Przemo\Arraylib\ArrayHandler;

class ArrayHandlerTest extends TestCase
{
	public function testCanRenameKey(): void
    {
    	$data = [
    		[
    			['a'],
    			[0, 1],
    			[1 => 'a'],
    		],
    		[
    			['a' => 1],
    			['a', 1],
    			[1 => 1],
    		],
    		[
    			['a' => 1],
    			['b', 1],
    			['a' => 1],
    		],
    		[
    			['a' => 1, 'b' => 2],
    			['a', 'b'],
    			['b' => 1],
    		],
    	];

    	foreach ($data as [$first, $args, $expected]) {
        	$this->assertSame($expected, ArrayHandler::renameKey($first, ...$args));
    	}
    }

	public function testCanRenameKeys(): void
	{
		$data = [
    		[
    			['a'],
    			[0 => 1],
    			[1 => 'a'],
    		],
    		[
    			['a' => 1],
    			['a' => 1],
    			[1 => 1],
    		],
    		[
    			['a' => 1],
    			['b' => 1],
    			['a' => 1],
    		],
    		[
    			['a' => 1, 'b' => 2],
    			['a' => 'b'],
    			['b' => 1],
    		],
    		[
    			['a' => 1, 'b' => 2],
    			['a' => 'b', 'b' => 'c'],
    			['c' => 1],
    		],
    	];

    	foreach ($data as [$first, $args, $expected]) {
        	$this->assertSame($expected, ArrayHandler::renameKeys($first, $args));
    	}
	}

	public function testCanApplyOnAllKeys(): void
	{
		$data = [
    		[
    			['a', 'k' => 'b'],
    			[fn($a) => "new_$a", [0]],
    			['k' => 'b', 'new_0' => 'a'],
    		],
    		[
    			['a', 'k' => 'b'],
    			[fn($a) => "new_$a", [0, 'k', 'a', 'b']],
    			['new_0' => 'a', 'new_k' => 'b'],
    		],
    		[
    			[0 => 'a', 'k' => 'b'],
    			[fn($a) => "new_$a", ['0', 'k']],
    			['new_0' => 'a', 'new_k' => 'b'],
    		],
    		// [
    		// 	['a' => 1],
    		// 	['b' => 1],
    		// 	['a' => 1],
    		// ],
    		// [
    		// 	['a' => 1, 'b' => 2],
    		// 	['a' => 'b'],
    		// 	['b' => 1],
    		// ],
    		// [
    		// 	['a' => 1, 'b' => 2],
    		// 	['a' => 'b', 'b' => 'c'],
    		// 	['c' => 1],
    		// ],
    	];

    	foreach ($data as [$first, $args, $expected]) {
        	$this->assertSame($expected, ArrayHandler::applyFunctionOnKeys($first, ...$args));
    	}
	}
}