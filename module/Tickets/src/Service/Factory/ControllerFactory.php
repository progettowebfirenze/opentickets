<?php
namespace OpenTickets\Tickets\Service\Factory;

use Carnage\Cqrs\Command\CommandBusInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use ZfrStripe\Client\StripeClient;

class ControllerFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $serviceLocator, $name = null, $requestedName = null)
    {
        $serviceLocator = $serviceLocator->getServiceLocator();
        return new $requestedName(
            $serviceLocator->get(CommandBusInterface::class),
            $serviceLocator->get('doctrine.entitymanager.orm_default'),
            $serviceLocator->get(StripeClient::class)
        );
    }
}