<?php

namespace App\Command;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

class CreateUserCommand extends Command
{
    protected static $defaultName = 'create:user';

    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;

        parent::__construct();
    }

    protected function configure()
    {
        $this->setDescription('Creates a user.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);

        $user = (new User())
            ->setUsername($io->ask("Please type a username"))
            ->setEmail($io->ask("Please type an email"))
            ->setPassword($io->ask("Please type a password"));

        $this->repository->create($user);
    }
}
