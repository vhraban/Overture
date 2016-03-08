<?php
namespace Overture\ProviderFoundation;

use Overture\Exception\MissingKeyException;
use Overture\Exception\UnexpectedValueException;

interface OvertureProviderInterface
{
    /**
     * Get a value for a configuration key
     *
     * @param string $key The configuration key
     *
     * @throws MissingKeyException if the key is missing
     * @throws UnexpectedValueException if the returned value is not scalar
     *
     * @return string
     */
    public function get($key);
}
