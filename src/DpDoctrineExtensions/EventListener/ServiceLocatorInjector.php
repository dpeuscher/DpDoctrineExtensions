<?php
/**
 * User: Dominik
 * Date: 18.05.13
 */

namespace DpDoctrineExtensions\EventListener;


use DpZFExtensions\ServiceManager\TServiceLocator;
use Zend\ServiceManager\ServiceLocatorAwareInterface;

class ServiceLocatorInjector implements ServiceLocatorAwareInterface{
	use TServiceLocator;
	public function postLoad($entity) {
		if ($entity instanceof ServiceLocatorAwareInterface) {
			$entity->setServiceLocator($this->getServiceLocator());
		}
    }
}
