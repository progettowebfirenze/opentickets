<?php

namespace OpenTickets\Tickets\Domain\ReadModel\TicketRecord;

use Doctrine\ORM\Mapping as ORM;
use OpenTickets\Tickets\Domain\ValueObject\Delegate;
use OpenTickets\Tickets\Domain\ValueObject\TicketType;

/**
 * Class TicketCounter
 * @package OpenTickets\Tickets\Domain\ReadModel\TicketCounts
 * @ORM\Entity()
 */
class TicketRecord
{
    /**
     * @var integer
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var TicketType
     * @ORM\Embedded(class="OpenTickets\Tickets\Domain\ValueObject\TicketType")
     */
    private $ticketType;

    /**
     * @var string
     * @ORM\ManyToOne(targetEntity="OpenTickets\Tickets\Domain\ReadModel\TicketRecord\PurchaseRecord", inversedBy="tickets")
     * @ORM\JoinColumn(name="purchase_id", referencedColumnName="id")
     */
    private $purchase;

    /**
     * @var string
     * @ORM\Column(type="string")
     */
    private $ticketId;

    /**
     * @var Delegate
     * @ORM\Embedded(class="OpenTickets\Tickets\Domain\ValueObject\Delegate")
     */
    private $delegate;

    /**
     * TicketRecord constructor.
     * @param TicketType $ticketType
     * @param string $purchaseId
     * @param string $ticketId
     * @param Delegate $delegate
     */
    public function __construct(TicketType $ticketType, PurchaseRecord $purchase, string $ticketId)
    {
        $this->ticketType = $ticketType;
        $this->ticketId = $ticketId;
        $this->delegate = Delegate::emptyObject();
        $this->purchase = $purchase;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return TicketType
     */
    public function getTicketType(): TicketType
    {
        return $this->ticketType;
    }

    /**
     * @return string
     */
    public function getTicketId(): string
    {
        return $this->ticketId;
    }

    /**
     * @return string
     */
    public function getPurchase(): string
    {
        return $this->purchase;
    }

    /**
     * @return Delegate
     */
    public function getDelegate(): Delegate
    {
        return $this->delegate;
    }

    public function updateDelegate(Delegate $delegate)
    {
        $this->delegate = $delegate;
    }
}