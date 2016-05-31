<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace KrzysiekPiasecki\MaintenanceModeBundle\Maintenance;

use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * ParameterMaintenanceMode
 */
class ParameterMaintenanceMode implements MaintenanceModeInterface
{
    /**
     * @var bool
     */
    private $underMaintenance;

    /**
     * ParameterMaintenanceMode
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container)
    {
        $this->underMaintenance = $container->hasParameter('maintenance') && true == $container->getParameter('maintenance');
    }

    /**
     * @return bool
     */
    public function isUnderMaintenance()
    {
        return $this->underMaintenance;
    }

    /**
     * @return bool
     */
    public function on()
    {
        $this->underMaintenance = true;
    }

    /**
     * @return bool
     */
    public function off()
    {
        $this->underMaintenance = false;
    }

}