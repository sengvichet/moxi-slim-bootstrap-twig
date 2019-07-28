<?php
/**
 * This file contains a listener to a create order event.
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
namespace App\EventListeners\Order;

use League\Event\AbstractListener;
use League\Event\EventInterface;

/**
 * This class is a listener to a create order event.
 *
 * @category Dealers
 * @package  Dealers
 * @author   LAMPDev <oksana@lamp-dev.com>
 * @license  http://www.php.net/license/3_01.txt  PHP License 3.01
 * @link     http://lamp-dev.com
 */
class UpdateOrderListener extends AbstractListener
{
    /**
     * Handles new post event.
     *
     * @param EventInterface $event  reply event
     * @param array          $params parameters
     *
     * @return void
     */
    public function handle(EventInterface $event, array $params = null)
    {
        extract($params);
        $statuses = $container->order_email->sendEmailNotification(
            'update', $user, $order
        );
        $container->logger->addInfo(__CLASS__, [$statuses]);
    }
}
