<?php

namespace DpDoctrineExtensions;

use Zend\Mvc\MvcEvent;
use Doctrine\ORM\Events;


/**
 * Class Module
 *
 * @package DpDoctrineExtensions
 */
class Module
{
	public function onBootstrap(MvcEvent $e) {
		$serviceManager = $e->getApplication()->getServiceManager();
		$entityManager = $serviceManager->get('doctrine.entitymanager.orm_default');
		$entityManager->getEventManager()->addEventListener(array(Events::postLoad),
			$serviceManager->get('DpDoctrineExtensions\EventListener\ServiceLocatorInjector'));
	}

	public function getServiceConfig()
	{
		return array(
			'invokables' => array(
				'DpDoctrineExtensions\EventListener\ServiceLocatorInjector' =>
					'DpDoctrineExtensions\EventListener\ServiceLocatorInjector',
			)
		);
	}
	/**
	 * @return array
	 */
	public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
}
