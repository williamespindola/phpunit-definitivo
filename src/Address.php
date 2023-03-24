<?php

declare(strict_types=1);

namespace PhpunitDefinitivo;

use RuntimeException;
use Throwable;

class Address
{
    private const TEMPLATE = 'Address: %s - %s';

    private Street $street;

    public function __construct(Street $street, StateLocation $location)
    {
        $this->street = $street;
        $this->location = $location;
    }

    public function showWithLocation(string $zip): string
    {
        $currentLocation = $this->location->locationWithState($zip);

        if ($zip === 'xxxxx-002') {
            $currentLocation = $this->location->locationWithoutState($zip);
        }

        return sprintf(
            self::TEMPLATE,
            $this->searchState($zip),
            $currentLocation
        );
    }

    private function searchState(string $zip): string
    {
        try {
            return $this->street->get($zip);
        } catch (Throwable $e) {
            $this->locationasdfasdfasdf
        }
    }
}
