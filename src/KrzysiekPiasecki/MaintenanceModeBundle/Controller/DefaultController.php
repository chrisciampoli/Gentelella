<?php

namespace KrzysiekPiasecki\MaintenanceModeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('KrzysiekPiaseckiMaintenanceModeBundle:Default:index.html.twig');
    }
}
