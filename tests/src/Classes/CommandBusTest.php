<?php
namespace Marmot\Framework\Classes;

use PHPUnit\Framework\TestCase;

use Marmot\Core;
use Marmot\Framework\Classes\CommandBus;
use Marmot\Interfaces\ICommandHandlerFactory;
use Marmot\Interfaces\ICommand;
use Marmot\Interfaces\INull;
use Marmot\Interfaces\ICommandHandler;
use Marmot\Framework\Classes\NullCommandHandler;

use Prophecy\Argument;

class CommandBusTest extends TestCase
{
    private $commandBus;
    
    private $command;

    public function setUp()
    {
        $this->commandHandlerFactory = $this->prophesize(ICommandHandlerFactory::class);
        $this->command = $this->prophesize(ICommand::class);
        $this->commandBus= $this->getMockBuilder(CommandBus::class)
                                ->setMethods(['getCommandHandlerFactory'])
                                ->setConstructorArgs([$this->commandHandlerFactory->reveal()])
                                ->getMock();
    }

    public function tearDown()
    {
        unset($this->commandBus);
        unset($this->commandHandlerFactory);
        unset($this->command);
    }

    public function testExtendsBaseCommandBus()
    {
        $this->assertInstanceOf(
            'Marmot\Basecode\Classes\CommandBus',
            $this->commandBus
        );
    }

    /**
     * 1. getTransaction() 需要调用一次
     * 2. getCommandHandlerFactory() 需要调用一次
     * 3. commandHandher->execute() 假设调用失败
     * 4. 期望返回 false
     */
    public function testCommandExcuteFailure()
    {
        $commandHandler = $this->prophesize(ICommandHandler::class);
        $commandHandler->execute(
            Argument::exact($this->command)
        )->shouldBeCalledTimes(1)->willReturn(false);

        $this->commandHandlerFactory->getHandler(
            Argument::exact($this->command)
        )->shouldBeCalledTimes(1)
         ->willReturn($commandHandler->reveal());

        $this->bindCommandHandlerFactory();
        
        $result = $this->commandBus->send($this->command->reveal());

        $this->assertFalse($result);
        $this->assertEquals(ERROR_NOT_DEFINED, Core::getLastError()->getId());
    }

    /**
     * 1. 调用getCommandHandlerFactory()一次
     * 2. 调用commandHander->execute() 一次,返回true
     * 3. 期望结果返回true
     */
    public function testSendSuccess()
    {
        $commandHandler = $this->prophesize(ICommandHandler::class);
        $commandHandler->execute(
            Argument::exact($this->command)
        )->shouldBeCalledTimes(1)->willReturn(true);

        $this->commandHandlerFactory->getHandler(
            Argument::exact($this->command)
        )->shouldBeCalledTimes(1)
         ->willReturn($commandHandler->reveal());

        $this->bindCommandHandlerFactory();
        
        $result = $this->commandBus->send($this->command->reveal());
        
        $this->assertTrue($result);
    }

    private function bindCommandHandlerFactory()
    {
        $this->commandBus->expects($this->once())
                         ->method('getCommandHandlerFactory')
                         ->willReturn($this->commandHandlerFactory->reveal());
    }
}
