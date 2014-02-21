<?php
/**
 * User: dpeuscher
 * Date: 16.04.13
 */

namespace DpDoctrineExtensions\Collection;


use Exception;

/**
 * Class AForceTypeFreezableCollection
 *
 * @package DpDoctrineExtensions\Collection
 */
abstract class AForceTypeFreezableCollection extends DecoratableCollection implements IFreezableCollection {
	use TFreezableCollection {
        TFreezableCollection::offsetSet as offsetSetFreezable;
        TFreezableCollection::set as setFreezable;
        TFreezableCollection::add as addFreezable;
        TFreezableCollection::__set as __setFreezable;
    }
	/**
	 * @var String
	 */
	protected $_entityType;

	/**
	 * @param $value
	 * @throws \Exception
	 */
	protected function _checkType($value) {
        if (class_exists($this->_entityType) || interface_exists($this->_entityType))
            $ok = ($value instanceof $this->_entityType);
        else
            $ok = strtolower(gettype($value)) === strtolower($this->_entityType);
        if (!$ok) {
	        ob_start();
	        var_dump($value);
	        $val = ob_get_contents();
	        ob_end_clean();
            throw new Exception($val." is not of type '".$this->_entityType."'");
        }
    }
	/**
	 * @param mixed $offset
	 * @param mixed $value
     * @return bool|void
     */
	public function offsetSet($offset, $value) {
        $this->_checkType($value);
		return $this->offsetSetFreezable($offset, $value);
	}

    /**
     * @param mixed $key
     * @param mixed $value
     */
	public function set($key, $value) {
        $this->_checkType($value);
        $this->setFreezable($key, $value);
	}

	/**
	 * @param mixed $value
	 * @return bool
	 */
	public function add($value) {
        $this->_checkType($value);
		return $this->addFreezable($value);
	}

	/**
	 * @param $name
	 * @param $value
	 */
	function __set($name, $value) {
        $this->_checkType($value);
        $this->__setFreezable($name,$value);
	}
}