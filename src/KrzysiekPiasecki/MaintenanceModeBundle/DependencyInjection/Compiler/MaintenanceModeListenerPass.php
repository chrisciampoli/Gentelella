<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace KrzysiekPiasecki\MaintenanceModeBundle\DependencyInjection\Compiler;

use KrzysiekPiasecki\MaintenanceModeBundle\EventListener\Request\MaintenanceModeListener;
use KrzysiekPiasecki\MaintenanceModeBundle\Maintenance\ParameterMaintenanceMode;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Definition;

/**
 * MaintenanceModeListenerPass
 */
class MaintenanceModeListenerPass implements CompilerPassInterface
{
    /**
     * @param ContainerBuilder $container
     */
    public function process(ContainerBuilder $container)
    {
        if ('prod' === $container->getParameter('kernel.environment')) {
            $container
                ->register('maintenance_mode.request_listener', MaintenanceModeListener::class)
                ->addArgument($container->getDefinition('twig.controller.exception'))
                ->addTag('kernel.event_listener', array(
                    'event' => 'kernel.request',
                    'method' => 'onKernelRequest'
                ));

        }
    }
}