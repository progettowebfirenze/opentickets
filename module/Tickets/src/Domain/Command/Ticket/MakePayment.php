<?php
/**
 * Created by PhpStorm.
 * User: imhotek
 * Date: 29/11/16
 * Time: 12:43
 */

namespace OpenTickets\Tickets\Domain\Command\Ticket;


use Carnage\Cqrs\Command\CommandInterface;

/**
 * Class MakePayment
 * @package OpenTickets\Tickets\Domain\Command\Ticket
 *
 * This class exists mostly for manually marking a purchase as paid eg for free issues or offline payments.
 */
class MakePayment implements CommandInterface
{
    /**
     * @var string
     */
    private $purchaseId;

    /**
     * MakePayment constructor.
     * @param $purchaseId
     */
    public function __construct(string $purchaseId)
    {
        $this->purchaseId = $purchaseId;
    }

    /**
     * @return string
     */
    public function getPurchaseId(): string
    {
        return $this->purchaseId;
    }
}