<?php

namespace PrestaShop\CodingStandards\Command;

use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Filesystem\Filesystem;

class InitCommand extends AbstractCommand
{
    protected function configure()
    {
        $this->setName('init')
            ->setDescription('Initialize all available review tools')
            ->addOption(
                'dest',
                null,
                InputOption::VALUE_REQUIRED,
                'Where the configuration will be stored',
                '.' // Current directory
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        (new CsFixerInitCommand())->execute($input, $output);
        (new PhpStanInitCommand())->execute($input, $output);
    }
}
