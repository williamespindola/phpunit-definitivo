<?php

declare(strict_types=1);

namespace PhpunitDefinitivo;

class Street
{
    private array $list = [
        'xxxxx-001' => 'R. Sabados, 2564',
        'xxxxx-002' => 'R. Domingos, 2564',
        'xxxxx-003' => 'R. Segundas, 2564'
    ];

    public function get(string $zip): string
    {
        return $this->list[$zip];
    }
}
