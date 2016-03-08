<?php
namespace Overture;

use Overture\Exception\MissingKeyException;
use Overture\Exception\UnexpectedValueException;
use Overture\ProviderFoundation\OvertureProviderInterface;

class Overture
{
    /**
     * @var OvertureProviderInterface The configuration provider
     */
    protected $provider;

    /**
     * Overture constructor. Sets the configuration provider
     *
     * @param OvertureProviderInterface $provider Configuration provider
     */
    public function __construct(OvertureProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     * Get a value for a configuration key. Delegates get to a provider
     *
     * @param string $key The configuration key
     *
     * @throws MissingKeyException if the key is missing
     * @throws UnexpectedValueException if the returned value is not scalar
     *
     * @return string
     */
    public function get($key)
    {
        return $this->provider->get($key);
    }
}
