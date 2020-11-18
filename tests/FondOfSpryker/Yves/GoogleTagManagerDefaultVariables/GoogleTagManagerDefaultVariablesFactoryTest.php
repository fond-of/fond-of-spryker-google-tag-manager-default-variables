<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables;

use Codeception\Test\Unit;
use FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Dependency\GoogleTagManagerDefaultVariablesToCartClientInterface;
use Spryker\Shared\Kernel\Store;
use Spryker\Yves\Kernel\Container;

class GoogleTagManagerDefaultVariablesFactoryTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Yves\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var GoogleTagManagerDefaultVariablesFactory
     */
    protected $factory;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Shared\Kernel\Store
     */
    protected $storeMock;

    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\Dependency\GoogleTagManagerDefaultVariablesToCartClientInterface;
     */
    protected $googleTagManagerDefaultVariablesToCartClientMock;

    /**
     * @return void
     */
    protected function _before(): void
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->storeMock = $this->getMockBuilder(Store::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->googleTagManagerDefaultVariablesToCartClientMock = $this
            ->getMockBuilder(GoogleTagManagerDefaultVariablesToCartClientInterface::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->factory = new GoogleTagManagerDefaultVariablesFactory();
        $this->factory->setContainer($this->containerMock);
    }

    /**
     * @return void
     */
    public function testGetStore(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(GoogleTagManagerDefaultVariablesDependencyProvider::STORE)
            ->willReturn($this->storeMock);

        $this->assertInstanceOf(
            Store::class,
            $this->factory->getStore()
        );
    }

    /**
     * @return void
     */
    public function testGetCartClient(): void
    {
        $this->containerMock->expects($this->atLeastOnce())
            ->method('has')
            ->willReturn(true);

        $this->containerMock->expects($this->atLeastOnce())
            ->method('get')
            ->with(GoogleTagManagerDefaultVariablesDependencyProvider::CART_CLIENT)
            ->willReturn($this->googleTagManagerDefaultVariablesToCartClientMock);

        $this->assertInstanceOf(
            GoogleTagManagerDefaultVariablesToCartClientInterface::class,
            $this->factory->getCartClient()
        );
    }
}
