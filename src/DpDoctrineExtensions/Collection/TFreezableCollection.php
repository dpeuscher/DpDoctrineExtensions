<?php
/**
 * User: dpeuscher
 * Date: 16.04.13
 */

namespace DpDoctrineExtensions\Collection;

/**
 * Class TFreezableCollection
 *
 * @package DpDoctrineExtensions\Collection
 */
trait TFreezableCollection {
	/**
	 * @var bool
	 */
	protected $_frozen = false;

	/**
	 * @return bool
	 */
	public function isFrozen() {
		return $this->_frozen;
	}
	public function freeze() {
		$this->_frozen = true;
	}

	/**
	 * @throws \Exception
	 */
	protected function rejectFrozen() {
		if ($this->_frozen)
			throw new \Exception("Collection is frozen");
	}

	/**
	 * @param mixed $key
	 * @return mixed|void
	 */
	public function remove($key) {
		$this->rejectFrozen();
		parent::remove($key);
	}

	/**
	 * @param mixed $element
	 * @return bool
	 */
	public function removeElement($element) {
		$this->rejectFrozen();
		return parent::removeElement($element);
	}

	/**
	 * @param mixed $offset
	 * @param mixed $value
	 * @return bool
	 */
	public function offsetSet($offset, $value) {
		$this->rejectFrozen();
		return parent::offsetSet($offset, $value);
	}

	/**
	 * @param mixed $offset
	 * @return mixed
	 */
	public function offsetUnset($offset) {
		$this->rejectFrozen();
		return parent::offsetUnset($offset);
	}

	/**
	 * @param mixed $key
	 * @param mixed $value
	 */
	public function set($key, $value) {
		$this->rejectFrozen();
		parent::set($key, $value);
	}

	/**
	 * @param mixed $value
	 * @return bool
	 */
	public function add($value) {
		$this->rejectFrozen();
		return parent::add($value);
	}

	/**
	 *
	 */
	public function clear() {
		$this->rejectFrozen();
		parent::clear();
	}

	/**
	 * @param $name
	 * @param $value
	 */
	function __set($name, $value) {
		$this->rejectFrozen();
	}

	/**
	 * @param $name
	 */
	function __unset($name) {
		$this->rejectFrozen();
	}

}