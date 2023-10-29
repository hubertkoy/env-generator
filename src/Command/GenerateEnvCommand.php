<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;

#[AsCommand(
    name: 'generate:env',
    description: 'Generates essential environment variables and displays them in the console',
)]
class GenerateEnvCommand extends Command
{
    public function __construct()
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this->setDescription('Generates essential environment variables and displays them in the console.');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $helper = $this->getHelper('question');

        $envTypeQuestion = new ChoiceQuestion(
            'Please select the type (default: key)',
            ['key', 'iv', 'app_env', 'app_secret'],
            0
        );
        $envType = $helper->ask($input, $output, $envTypeQuestion);

        if ($envType === 'app_env') {
            $appEnvQuestion = new ChoiceQuestion(
                'Please select the app environment (default: dev)',
                ['dev', 'test', 'prod'],
                0
            );
            $appEnvValue = $helper->ask($input, $output, $appEnvQuestion);
            $output->writeln(sprintf('%s=%s', strtoupper($envType), $appEnvValue));
            return Command::SUCCESS;
        }

        if ($envType === 'app_secret' || $envType === 'key') {
            $value = bin2hex(openssl_random_pseudo_bytes(32));
            $output->writeln(sprintf('%s=%s', strtoupper($envType), $value));
            return Command::SUCCESS;
        }

        $value = bin2hex(openssl_random_pseudo_bytes(16));


        $output->writeln(sprintf('%s=%s', strtoupper($envType), $value));

        return Command::SUCCESS;
    }
}
