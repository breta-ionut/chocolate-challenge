<?php

declare(strict_types=1);

namespace App\Poesy\Verse;

/**
 * Contract to be implemented by all verse types.
 */
interface VerseInterface
{
    /**
     * Returns the text of the verse.
     *
     * @return string
     */
    public function __toString(): string;
}
