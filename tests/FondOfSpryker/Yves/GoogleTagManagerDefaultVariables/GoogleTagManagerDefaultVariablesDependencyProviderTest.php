<?php

namespace FondOfSpryker\Yves\GoogleTagManagerDefaultVariables;

use Codeception\Test\Unit;
use Spryker\Yves\Kernel\Container;

class GoogleTagManagerDefaultVariablesDependencyProviderTest extends Unit
{
    /**
     * @var \PHPUnit\Framework\MockObject\MockObject|\Spryker\Yves\Kernel\Container
     */
    protected $containerMock;

    /**
     * @var \FondOfSpryker\Yves\GoogleTagManagerDefaultVariables\GoogleTagManagerDefaultVariablesDependencyProvider
     */
    protected $dependencyProvider;

    /**
     * @return void
     */
    protected function _before()
    {
        $this->containerMock = $this->getMockBuilder(Container::class)
            ->disableOriginalConstructor()
            ->getMock();

        $this->dependencyProvider = new GoogleTagManagerDefaultVariablesDependencyProvider();
    }

    /**
     * @retun void
     *
     * @return void
     */
    public function testProvideDependencies(): void
    {
        $this->assertInstanceOf(
            Container::class,
            $this->dependencyProvider->provideDependencies(
                $this->containerMock
            )
        );
    }
}
