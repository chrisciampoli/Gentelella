<?php

namespace AppBundle\EventListener\Request;

use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;
use Symfony\Component\Debug\Exception\FlattenException;
use Symfony\Component\HttpKernel\KernelInterface;

class MaintanceModeListener
{
    /**
     * @var KernelInterface
     */
    protected $kernel;

    /**
     * MaintanceModeListener constructor.
     *
     * @param KernelInterface $kernel
     */
    public function __construct(KernelInterface $kernel)
    {
        $this->kernel = $kernel;
    }

    /**
     * @param GetResponseEvent $event
     */
    public function onKernelRequest(GetResponseEvent $event)
    {
        if ('prod' === $this->kernel->getEnvironment()) {
            $event->setResponse(
                $this->kernel->getContainer()->get('twig.controller.exception')->showAction(
                    $event->getRequest(),
                    FlattenException::create(
                        new ServiceUnavailableHttpException
                    )
                )
            );
        }
    }

}