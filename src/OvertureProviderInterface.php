<?php
namespace Overture;

interface OvertureProviderInterface
{
    /**
     * Get a value for a configuration key
     *
     * @param string $key The configuration key
     *
     * @return string
     */
    public function get($key);
}
