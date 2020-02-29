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
     * @return VerseInterface[]|iterable
     */
    public function getVerses(): iterable
    {
        for ($noChocolates = $this->boxSize; $noChocolates > 0; $noChocolates--) {
            yield new ChocolatesAwareBoxVerse($noChocolates);
        }

        yield new EmptyBoxVerse($this->boxSize);
    }

    /**
     * Returns the text of the poesy.
     *
     * @return string
     */
    public function __toString(): string
    {
        $verses = $this->getVerses();

        return implode("\n", is_array($verses) ? $verses : iterator_to_array($verses));
    }
}
