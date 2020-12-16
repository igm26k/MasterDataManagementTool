<?php

namespace app\services\interfaces;

/**
 * Interface ServiceInterface
 *
 * @package App\Service\Interfaces
 */
interface ServiceInterface
{
    /**
     * Validate object values
     * Returns true on success or array with errors
     *
     * @param ServiceInterface $object
     *
     * @return true|array
     */
    public function validate(ServiceInterface $object);

    /**
     * Execute service
     *
     * @param ServiceInterface $object
     *
     * @return ServiceInterface
     */
    public function execute(ServiceInterface $object): ServiceInterface;
}
