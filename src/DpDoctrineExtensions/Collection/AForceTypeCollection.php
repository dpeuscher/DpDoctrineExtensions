<?php
/**
 * User: dpeuscher
 * Date: 16.04.13
 */

namespace DpDoctrineExtensions\Collection;


use Exception;

abstract class AForceTypeCollection extends DecoratableCollection {
	/**
	 * @var String
	 */
	protected $_entityType;

    protected function _checkType($value) {
        if (class_exists($this->_entityType) || interface_exists($this->_entityType))
            $ok = ($value instanceof $this->_entityType);
        else
            $ok = strtolower(gettype($value)) === strtolower($this->_entityType);
        if (!$ok)
            throw new Exception(var_export($value,true)." is not of type '".$this->_entityType."'");
    }
	/**
	 * @param mixed $offset
	 * @param mixed $value
     * @return bool|void
     */
	public function offsetSet($offset, $value) {
        $this->_checkType($value);
		return parent::offsetSet($offset, $value);
	}

    /**
     * @param mixed $key
     * @param mixed $value
     */
	public function set($key, $value) {
        $this->_checkType($value);
        parent::set($key, $value);
	}

	/**
	 * @param mixed $value
	 * @return bool
     */
	public function add($value) {
        $this->_checkType($value);
		return parent::add($value);
	}
}