<?php
namespace Overture\Tests;

use Overture\Overture;
use Overture\OvertureProviderInterface;
use PHPUnit_Framework_MockObject_MockObject;
use PHPUnit_Framework_TestCase;

class OvertureTest extends PHPUnit_Framework_TestCase
{
    public function testDelegatesGet()
    {
        /** @var OvertureProviderInterface|PHPUnit_Framework_MockObject_MockObject $providerStub */
        $providerStub = $this->getMock(OvertureProviderInterface::class);
        $providerStub->method('get')
                    ->willReturn('known.value');

        $overture = new Overture($providerStub);
        $this->assertEquals('known.value', $overture->get('some.key'));
    }
}
