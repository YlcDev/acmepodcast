<?php

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class UpdateUserCommand extends Command
{
    protected static $defaultName = 'update:user';

    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription("Updates a user's username, email and password");
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $user = $this->repository->get($io->ask("Please type a username"));

        $user->setUsername($io->ask("Please type a username"))
             ->setEmail($io->ask("Please type an email"))
             ->setPassword($io->ask("Please type a password"));

        $this->repository->update($user);
    }
}
