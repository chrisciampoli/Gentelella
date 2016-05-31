<?php

/*
 * For the full copyright and license information, please view the LICENSE file
 * that was distributed with this source code.
 */

namespace KrzysiekPiasecki\MaintenanceModeBundle\Maintenance;

/**
 * MaintenanceModeInterface
 */
interface MaintenanceModeInterface
{
    /**
     * Return true if it is under maintenance mode
     *
     * @return bool
     */
    public function isUnderMaintenance();

    /**
     * Maintenance mode on
     *
     * @return bool
     */
    public function on();

    /**
     * Maintenance mode off
     *
     * @return bool
     */
    public function off();
}