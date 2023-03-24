<?php

declare(strict_types=1);

namespace PhpunitDefinitivo;

class StateLocation
{
    private array $list = [
        'xxxxx-001' => 'São Paulo',
        'xxxxx-002' => 'Rio de Janeiro',
        'xxxxx-003' => 'Paraná',
        'xxxxx-004' => 'Goiás'
    ];

    public function locationWithState(string $zip): string
    {
        return $this->list[$zip] . ' - ' . $this->getState($zip);
    }

    public function locationWithoutState(string $zip): string
    {
        return $this->list[$zip];
    }

    private function getState(string $state): string
    {
        $list = [
            'xxxxx-001' => 'SP',
            'xxxxx-002' => 'RJ',
            'xxxxx-003' => 'PR',
            'xxxxx-004' => 'GO'
        ];

        return $list[$state];
    }
}
