<?php

declare(strict_types=1);

namespace App\Poesy\Verse;

class ChocolatesAwareBoxVerse implements VerseInterface
{
    private const VERSES_BY_NO_CHOCOLATES = [
        2 => '2 pieces of chocolate bars in the box, 2 chocolate bars.'."\n"
            .'Take one out of the box, pass it around, 1 chocolate bar in the box.'."\n",
        1 => 'One chocolate bar in the box, one chocolate bar.'."\n"
            .'Take one out of the box, pass it around, no more chocolate bar in the box.'."\n",
    ];

    private const VERSE_PATTERN = '%1$d pieces of chocolate bars in the box, %1$d chocolate bars.'."\n"
        .'Take one out of the box, pass it around, %2$d chocolate bars in the box.'."\n";

    /**
     * The number of chocolates in the box.
     *
     * @var int
     */
    private int $noChocolates;

    /**
     * @param int $noChocolates
     */
    public function __construct(int $noChocolates)
    {
        $this->noChocolates = $noChocolates;
    }

    /**
     * {@inheritDoc}
     */
    public function __toString(): string
    {
        return isset(self::VERSES_BY_NO_CHOCOLATES[$this->noChocolates])
            ? self::VERSES_BY_NO_CHOCOLATES[$this->noChocolates]
            : sprintf(self::VERSE_PATTERN, $this->noChocolates, $this->noChocolates - 1);
    }
}
