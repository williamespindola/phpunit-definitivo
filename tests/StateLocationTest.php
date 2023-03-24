<?php

declare(strict_types=1);

namespace PhpunitDefinitivo;

use PHPUnit\Framework\TestCase;

class StateLocationTest extends TestCase
{
    private StateLocation $instance;

    public function setUp(): void
    {
        $this->instance = new StateLocation();
    }

    /**
     * @dataProvider locationsWithSate
     */
    public function testReturnLocationWithStateShouldWork(string $zip, string $expected): void
    {
        $actual = $this->instance->locationWithState($zip);

        $this->assertEquals($expected, $actual);
    }

    public function locationsWithSate(): array
    {
        return [
            ['xxxxx-001', 'São Paulo - SP'],
            ['xxxxx-002', 'Rio de Janeiro - RJ'],
            ['xxxxx-003', 'Paraná - PR'],
            ['xxxxx-004', 'Goiás - GO']
        ];
    }

    /**
     * @dataProvider locationsWithoutSate
     */
    public function testReturnLocationWithoutStateShouldWork(string $zip, string $expected): void
    {
        $actual = $this->instance->locationWithoutState($zip);

        $this->assertEquals($expected, $actual);
    }

    public function locationsWithoutSate(): array
    {
        return [
            ['xxxxx-001', 'São Paulo'],
            ['xxxxx-002', 'Rio de Janeiro'],
            ['xxxxx-003', 'Paraná'],
            ['xxxxx-004', 'Goiás']
        ];
    }
}
