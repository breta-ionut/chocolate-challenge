<?php

declare(strict_types=1);

namespace App;

use App\Command\WritePoesyCommand;
use Symfony\Component\Console\Application as BaseApplication;

class Application extends BaseApplication
{
    private const NAME = 'Chocolate Box Poesy application.';
    private const VERSION = '1.0.0';

    public function __construct()
    {
        parent::__construct(self::NAME, self::VERSION);

        $writePoesyCommand = new WritePoesyCommand();

        $this->add($writePoesyCommand);
        $this->setDefaultCommand($writePoesyCommand->getName());
    }
}
