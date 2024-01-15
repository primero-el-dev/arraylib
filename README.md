# Arraylib - PHP array library

## Intro

### What is it?

It's a PHP library for making complex operations on arrays. It was inspired by a data-oriented programming paradigm.

### Why use it?

This library contains methods to do complex operations on old, well-known PHP arrays. It contains a bunch of simple functionalities which in composition are meant to provide full arsenal for doing with arrays whatever you may imagine. Methods are pure and tend to be as most generic, so generally you could use them no matter what type of data your array contains.

### How to get it?

### How to use it?


## Reference

Methods below are sorted by their characteristics.


#### Methods that change associations, preserve length, key names, values, depend on values:

`public static function reassignToKeysSortedValues(array $array, callable $keySortFunction): array`

`public static function reassignToSortedKeysSortedValues(array $array, callable $keySortFunction, callable $valueSortFunction): array`

#### Methods that change values, key names, may change length, depend on key names, values:


#### Methods that change key names, may change length, preserve values, don't depend of values:

`public static function renameKey(array $array, string|int $currentKey, string|int $newKey): array`

`public static function renameKeys(array $array, array $oldNewMapKey): array`
['a' => 'a2', 'b' => 'b2', ...] or [['a', 'a2'], ['b', 'b2'], ...]

`public static function renameKeyFunc(array $array, string|int $key, callable $func): array`


#### Methods that change key names, values, may change length, depend on key names, values:

`public static function mapWithKeys(array $array, callable $mappingFunction, ?array $keys = null): array`
$mappingFunction: (int|string $key, ?mixed $value): (?mixed | [int|string, ?mixed])

`public static function mapWithKeysForKeys(array $array, array $keyFunctionMap): array`
$keyFunctionMap: [int|string => callable(int|string $key, ?mixed $value): (?mixed | [int|string, ?mixed])]

`public static function mapWithKeysForValues(array $array, array $keyFunctionMap): array`
$keyFunctionMap: [int => [?mixed $value, callable(int|string $key, ?mixed $value): (?mixed | [int|string, ?mixed])]]

`public static function mapWithKeysForKeysAndValues(array $array, array $keyFunctionMap): array`
$keyFunctionMap: [int => [[int|string $key, ?mixed $value], callable(int|string $key, ?mixed $value): (?mixed | [int|string, ?mixed])]]

`public static function mapOnlyFiltered(array $array, callable $filterFunction, callable $mappingFunction): array`
$filterFunction: callable(int|string $key, ?mixed $value): bool
$mappingFunction: callable(int|string $key, ?mixed $value): (?mixed | [int|string, ?mixed])



