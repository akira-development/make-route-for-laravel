<?php declare(strict_types=1);

namespace Intellow\MakeRouteForLaravel\CaseConverter\Glue;

/**
 * Class AdaCase
 *
 * Outputs string in _Ada case_ format: This_Is_Ada_Case
 *
 * @package Intellow\MakeRouteForLaravel\CaseConverter\Glue
 */
class AdaCase extends UnderscoreGluer
{
    /**
     * Format detected words in _Ada case_
     *
     * @return string
     */
    public function glue(): string
    {
        return $this->glueUsingRules(self::DELIMITER, $this->titleCase);
    }
}