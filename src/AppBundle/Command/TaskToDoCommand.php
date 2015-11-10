<?php

namespace AppBundle\Command;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Validator\Constraints\DateTime;

class TaskToDoCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName("task:todo")
            ->setDescription("To do")
            ->addArgument(
                'date',
                InputArgument::OPTIONAL,
                'Date'
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $date = new \DateTime();
        //$date = $input->getArgument('date');
        $repo = $this->getContainer()->get('doctrine')->getRepository("AppBundle:Task");
        $tasks = $repo->taskToDo($date);


        foreach ($tasks as $task) {
            $output->writeln($task->getName() . " " . $task->getToBeFinishedAt()->format('Y-m-d'));
        }
    }
}