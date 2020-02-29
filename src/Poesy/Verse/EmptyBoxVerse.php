<?php

declare(strict_types=1);

namespace App\Poesy\Verse;

class EmptyBoxVerse implements VerseInterface
{
    private const ONE_CHOCOLATE_BOX_VERSE = 'No more chocolate bar in the box, no more chocolate bar.'."\n"
        .'Go to the store and buy another box, 1 chocolate bar in the box.'."\n";

    private const MULTIPLE_CHOCOLATES_BOX_VERSE = 'No more chocolate bar in the box, no more chocolate bar.'."\n"
        .'Go to the store and buy another box, %d chocolate bars in the box.'."\n";

    /**
     * The initial number of chocolates in the box.
     *
     * @var int
     */
    private int $boxSize;

    /**
     * @param int $boxSize
     */
    public function __construct(int $boxSize)
    {
        $this->boxSize = $boxSize;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return 1 === $this->boxSize
            ? self::ONE_CHOCOLATE_BOX_VERSE
            : sprintf(self::MULTIPLE_CHOCOLATES_BOX_VERSE, $this->boxSize);
    }
}
