<?php

declare(strict_types=1);

namespace PhpunitDefinitivo;

use Exception;
use RuntimeException;
use PHPUnit\Framework\TestCase;

class AddressTest extends TestCase
{
    private Address $instance;
    private Street $streetMock;
    private StateLocation $locationMock;

    public function setUp(): void
    {
        $this->streetMock = $this->createMock(Street::class);
        $this->locationMock = $this->createMock(StateLocation::class);
        $this->instance = new Address($this->streetMock, $this->locationMock);
    }

    public function testShowWithLocationSouldWork(): void
    {
        $zip = 'xxxxx-001';

        //stub
        $this->streetMock->method('get')
                         ->willReturn('R. Domingos, 2564');

        //mock
        $this->locationMock->expects($this->exactly(1))
                           ->method('locationWithState')
                           ->with($zip)
                           ->willReturn('São Paulo - SP');

        $this->locationMock->expects($this->never())
                           ->method('locationWithoutState');

        $actual = $this->instance->showWithLocation($zip);

        $expected = 'Address: R. Domingos, 2564 - São Paulo - SP';

        $this->assertEquals($expected, $actual);
    }

    public function testShowWithWrongLocationShouldException(): void
    {
        $this->expectException(RuntimeException::class);
        $this->expectExceptionMessage('Street not found');

        $this->streetMock->method('get')
                         ->will($this->throwException(new Exception('foo')));

        $actual = $this->instance->showWithLocation('xxxxx-004');
    }









}
