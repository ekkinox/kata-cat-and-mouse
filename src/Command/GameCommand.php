<?php

namespace Ekkinox\KataCatAndMouse\Command;

use Ekkinox\KataCatAndMouse\Game;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

/**
 * @package Ekkinox\KataSpiral\Command
 */
class GameCommand extends Command
{
    const NAME = 'game:run';

    /**
     * @var $game
     */
    private $game;

    /**
     * @param Game $game
     */
    public function __construct(Game $game)
    {
        parent::__construct(static::NAME);

        $this->game = $game;
    }

    /**
     * @inheritdoc
     */
    protected function configure()
    {
        $this
            ->setDescription('Run cat and mouse escape game.')
            ->setHelp('This command allows you to run cat and mouse escape game.')
            ->addArgument('length', InputArgument::REQUIRED, 'Map length')
            ->addArgument('steps', InputArgument::REQUIRED, 'Max allowed steps for the cat')
            ->addArgument('catPosition', InputArgument::OPTIONAL, 'Cat position')
            ->addArgument('mousePosition', InputArgument::OPTIONAL, 'Mouse position');
    }

    /**
     * @inheritdoc
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $length        = $input->getArgument('length');
        $steps         = $input->getArgument('steps');
        $catPosition   = $input->getArgument('catPosition');
        $mousePosition = $input->getArgument('mousePosition');

        $output->writeln(
            [
                sprintf(
                    'Cat and mouse escape game (length: %s, steps: %s, cat on: %s, mouse on: %s)',
                    $length,
                    $steps,
                    $catPosition,
                    $mousePosition
                ),
                ''
            ]
        );

        $output->writeln($this->game->play($length, $steps, $catPosition, $mousePosition));
    }
}