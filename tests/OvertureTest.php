<?php
namespace Overture\Tests;

use Overture\Exception\MissingKeyException;
use Overture\Exception\UnexpectedValueException;
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

    public function testMissingKey()
    {
        /** @var OvertureProviderInterface|PHPUnit_Framework_MockObject_MockObject $providerStub */
        $providerStub = $this->getMock(OvertureProviderInterface::class);
        $providerStub->method('get')
            ->willThrowException(new MissingKeyException("Configuration key is missing"));

        $overture = new Overture($providerStub);
        $this->setExpectedException(MissingKeyException::class);

        $overture->get("nonexistant.key");
    }

    public function testUnexpectedValue()
    {
        /** @var OvertureProviderInterface|PHPUnit_Framework_MockObject_MockObject $providerStub */
        $providerStub = $this->getMock(OvertureProviderInterface::class);
        $providerStub->method('get')
            ->willThrowException(new UnexpectedValueException("Configuration key is missing"));

        $overture = new Overture($providerStub);
        $this->setExpectedException(UnexpectedValueException::class);

        $overture->get("nonscalar.key");
    }
}
