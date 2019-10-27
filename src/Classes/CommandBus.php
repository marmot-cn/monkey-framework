<?php
//powered by kevin
namespace Marmot\Framework\Classes;

use Marmot\Basecode\Classes\CommandBus as BaseCommandBus;
use Marmot\Interfaces\ICommandHandlerFactory;
use Marmot\Interfaces\ICommand;
use Marmot\Interfaces\ICommandHandler;
use Marmot\Interfaces\INull;

class CommandBus extends BaseCommandBus
{
    public function __construct(ICommandHandlerFactory $commandHandlerFactory)
    {
        parent::__construct($commandHandlerFactory);
    }

    public function __destruct()
    {
        parent::__destruct();
    }

    protected function sendAction(ICommandHandler $handler, ICommand $command) : bool
    {
        if ($handler->execute($command)) {
            return true;
        }
        return false;
    }
}
