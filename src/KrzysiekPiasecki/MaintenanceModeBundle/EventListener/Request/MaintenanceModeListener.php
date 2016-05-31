<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace KrzysiekPiasecki\MaintenanceModeBundle\EventListener\Request;

use KrzysiekPiasecki\MaintenanceModeBundle\Maintenance\MaintenanceModeInterface;
use Symfony\Bundle\TwigBundle\Controller\ExceptionController;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Symfony\Component\Debug\Exception\FlattenException;

/**
 * MaintenanceModeListener
 */
class MaintenanceModeListener
{
    /**
     * @var ExceptionController
     */
    protected $controller;

    /**
     * @var MaintenanceModeInterface
     */
    protected $maintenance;

    /**
     * MaintenanceModeListener
     *
     * @param MaintenanceModeInterface $maintenance
     * @param ExceptionController $controller
     */
    public function __construct(ExceptionController $controller, MaintenanceModeInterface $maintenance = null)
    {
        $this->controller = $controller;
        $this->maintenance = $maintenance;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        return;
        if ($this->maintenance->isUnderMaintenance()) {
            $event->setResponse(
                $this->controller->showAction(
                    $event->getRequest(),
                    FlattenException::create(
                        new ServiceUnavailableHttpException(
                            null,
                            'This site is temporary unavailable'
                        )
                    )
                )
            );
        }
    }

}