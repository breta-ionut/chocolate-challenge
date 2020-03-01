<?php

declare(strict_types=1);

namespace App\Tests\Poesy;

use App\Exception\InvalidBoxSizeException;
use App\Poesy\Poesy;
use PHPUnit\Framework\TestCase;

class PoesyTest extends TestCase
{
    /**
     * @dataProvider invalidBoxSizeDataProvider
     *
     * @param int $boxSize
     */
    public function testPoesyInstantiationWithInvalidBoxSize(int $boxSize): void
    {
        $this->expectException(InvalidBoxSizeException::class);

        (new Poesy($boxSize));
    }

    /**
     * @dataProvider poesyTextDataProvider
     *
     * @param int $boxSize
     * @param string $expectedPoesyText
     */
    public function testPoesyText(int $boxSize, string $expectedPoesyText): void
    {
        $this->assertSame($expectedPoesyText, (string) new Poesy($boxSize));
    }

    public function testPoesyWritingWithDefaultBoxSize(): void
    {
        $this->assertNotEmpty((string) new Poesy());
    }

    /**
     * @return array
     */
    public function invalidBoxSizeDataProvider(): array
    {
        return [[-55], [-1], [0]];
    }

    /**
     * @return array
     */
    public function poesyTextDataProvider(): array
    {
        return include __DIR__.'/../Fixtures/poesies.php';
    }
}
