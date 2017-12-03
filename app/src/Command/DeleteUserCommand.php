<?php

namespace App\Command;

use App\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class DeleteUserCommand extends Command
{
    protected static $defaultName = 'delete:user';

    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Deletes user from database');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $user = $this->repository->get($io->ask("Please type a username"));

        $this->repository->delete($user);
    }
}
