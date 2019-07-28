<?php
/**
 * This file contains a listener to a new post event.
 *
 * PHP version 7.1
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @version  GIT:
 * @link     http://lamp-dev.com
 */
namespace App\EventListeners\Gmb;

use League\Event\AbstractListener;
use League\Event\EventInterface;

/**
 * This class is a listener to a new post event.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class NewPostListener extends AbstractListener
{
    /**
     * Handles new post event.
     *
     * @param EventInterface $event  new post event
     * @param array          $params parameters
     *
     * @return void
     */
    public function handle(EventInterface $event, array $params = null)
    {
        extract($params);
        $statuses = $container->gmb_email->sendEmailNotification('post', $instance);
        $container->logger->addInfo(__CLASS__, [$statuses]);
    }
}