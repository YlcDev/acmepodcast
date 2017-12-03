<?php

namespace App\Command;

use App\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class ShowUserCommand extends Command
{
    protected static $defaultName = 'show:user';

    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription("Shows a user's username and email");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $user = $this->repository->get($io->ask("Please type a username"));

        $io->table(['username', 'email'], [[$user->getUsername(), $user->getEmail()]]);
    }
}
