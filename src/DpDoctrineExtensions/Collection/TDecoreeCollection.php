<?php
/**
 * User: Dominik
 * Date: 16.05.13
 */

namespace DpDoctrineExtensions\Collection;


use Zend\ServiceManager\ServiceLocatorAwareInterface;

/**
 * Class TDecoreeCollection
 *
 * @package DpDoctrineExtensions\Collection
 */
trait TDecoreeCollection {
	/**
	 * @var array
	 */
	protected $_decoratedCollections = array();

    /**
     * @param string $fieldName
     * @param string $serviceName
     * @param null|string $differentClass
     * @return array|null|object|string
     */
	protected function _getDecoreeCollection($fieldName,$serviceName,$differentClass = null) {
		/** @var ServiceLocatorAwareInterface|self $this */
		if (is_null($this->$fieldName) &&
			$this->getServiceLocator()->has($serviceName))
			$this->$fieldName = clone
				$this->getServiceLocator()->get($serviceName);
		$className = (is_null($differentClass)?$serviceName:$differentClass);
		if ($this->$fieldName instanceof $className)
			return $this->$fieldName;

		if (!isset($this->_decoratedCollections[$fieldName])) {
			if ($this->getServiceLocator()->has($serviceName) &&
				$this->getServiceLocator()->get($serviceName) instanceof IDecoratableCollection) {
				/** @var IDecoratableCollection $decorator */
				$decorator = clone
					$this->getServiceLocator()->get($serviceName);
				$decorator->setDecoree($this->$fieldName);
				$this->_decoratedCollections[$fieldName] = $decorator;
				return $this->_decoratedCollections[$fieldName];
			}
			else
				return $this->$fieldName;
		}
		else return $this->_decoratedCollections[$fieldName];
	}
}