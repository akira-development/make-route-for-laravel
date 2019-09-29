<?php declare(strict_types=1);

namespace Intellow\MakeRouteForLaravel\CaseConverter\Split;

use function array_filter;
use function array_values;
use function mb_split;

/**
 * Class Splitter
 *
 * A Splitter sub-class allows to read the words contained in a string
 *
 * @author  Jawira Portugal <dev@tugal.be>
 * @package Intellow\MakeRouteForLaravel\CaseConverter\Split
 */
abstract class Splitter
{
    /**
     * @var string Words extracted from input string
     */
    protected $inputString;

    public function __construct(string $inputString)
    {
        $this->inputString = $inputString;
    }

    /**
     * Tells how to split a string into valid words.
     *
     * @return string[]
     */
    abstract public function split(): array;

    /**
     * This is an utility method, typically this method is used by to split a string based on pattern.
     *
     * @param string $inputString
     * @param string $pattern
     *
     * @return string[]
     */
    protected function splitUsingPattern(string $inputString, string $pattern): array
    {
        $cleaning = function (string $value): bool {
            if ($value === '0') {
                return true;
            }

            return !empty($value);
        };

        return array_values(array_filter(mb_split($pattern, $inputString), $cleaning));
    }
}
