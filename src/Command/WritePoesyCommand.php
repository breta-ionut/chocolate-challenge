<?php

declare(strict_types=1);

namespace App\Command;

use App\Poesy\Poesy;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class WritePoesyCommand extends Command
{
    private const CODE_SUCCESS = 0;
    private const CODE_ERROR = 1;

    /**
     * {@inheritDoc}
     */
    protected static $defaultName = 'write-poesy';

    /**
     * {@inheritDoc}
     */
    protected function configure()
    {
        $this->setDescription('Writes the Chocolate Box poesy for a specified box size.')
            ->addArgument('boxSize', InputArgument::OPTIONAL, 'The initial number of chocolates in the box.');
    }

    /**
     * {@inheritDoc}
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        try {
            $poesy = new Poesy((int) $input->getArgument('boxSize'));

            $output->write((string) $poesy);
        } catch (\Throwable $exception) {
            (new SymfonyStyle($input, $output))
                ->error(sprintf('An error occurred while writing the poesy: %s', $exception->getMessage()));

            return self::CODE_ERROR;
        }

        return self::CODE_SUCCESS;
    }
}
