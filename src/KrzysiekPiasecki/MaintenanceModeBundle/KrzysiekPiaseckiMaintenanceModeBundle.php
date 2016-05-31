<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace KrzysiekPiasecki\MaintenanceModeBundle;

use KrzysiekPiasecki\MaintenanceModeBundle\DependencyInjection\Compiler\MaintenanceModeListenerPass;

use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * KrzysiekPiaseckiMaintenanceModeBundle
 */
class KrzysiekPiaseckiMaintenanceModeBundle extends Bundle
{
    /**
     * @param ContainerBuilder $container
     */
    public function build(ContainerBuilder $container)
    {
        parent::build($container);

        $container->addCompilerPass(new MaintenanceModeListenerPass());
        $container->set('maintenance_mode.parameter_maintenance', new \stdClass());

    }
}
