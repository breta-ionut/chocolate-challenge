<?php

declare(strict_types=1);

namespace App\Tests\Command;

use App\Application;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Tester\CommandTester;

class WritePoesyCommandTest extends TestCase
{
    /**
     * @var CommandTester
     */
    private $commandTester;

    protected function setUp(): void
    {
        $application = new Application();
        $command = $application->find('write-poesy');

        $this->commandTester = new CommandTester($command);
    }

    /**
     * @param int|null $boxSizeArgument
     * @param int $expectedExitCode
     */
    public function testExecute(?int $boxSizeArgument, int $expectedExitCode): void
    {
        $input = [];
        if (null !== $boxSizeArgument) {
            $input = ['boxSize' => $boxSizeArgument];
        }

        $this->assertSame($expectedExitCode, $this->commandTester->execute($input));
    }

    /**
     * @return array
     */
    public function executeDataProvider(): array
    {
        return [
            [-55, 1],
            [-1, 1],
            [0, 1],
            [1, 0],
            [2, 0],
            [3, 0],
            [5, 0],
            [null, 0],
        ];
    }
}
