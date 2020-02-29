<?php

declare(strict_types=1);

namespace App\Poesy;

use App\Exception\InvalidBoxSizeException;
use App\Poesy\Verse\ChocolatesAwareBoxVerse;
use App\Poesy\Verse\EmptyBoxVerse;
use App\Poesy\Verse\VerseInterface;

class Poesy
{
    private const DEFAULT_BOX_SIZE = 48;

    /**
     * The initial number of chocolates in the box.
     *
     * @var int|null
     */
    private int $boxSize;

    /**
     * @param int|null $boxSize
     *
     * @throws InvalidBoxSizeException
     */
    public function __construct(int $boxSize = null)
    {
        if (null !== $boxSize && $boxSize < 1) {
            throw new InvalidBoxSizeException();
        }

        $this->boxSize = $boxSize ?? self::DEFAULT_BOX_SIZE;
    }

    /**
     * Returns the text of the poesy.
     *
     * @return string
     */
    public function __toString(): string
    {
        return implode("\n", iterator_to_array($this->getVerses()));
    }

    /**
     * @return VerseInterface[]|\Generator
     */
    private function getVerses(): \Generator
    {
        for ($noChocolates = $this->boxSize; $noChocolates > 0; $noChocolates--) {
            yield new ChocolatesAwareBoxVerse($noChocolates);
        }

        yield new EmptyBoxVerse($this->boxSize);
    }
}
