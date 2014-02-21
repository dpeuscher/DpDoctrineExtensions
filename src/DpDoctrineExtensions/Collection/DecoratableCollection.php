<?php
/**
 * User: Dominik
 * Date: 15.05.13
 */

namespace DpDoctrineExtensions\Collection;


use Closure;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\Common\Collections\Criteria;

class DecoratableCollection extends ArrayCollection implements IDecoratableCollection {
	/**
	 * @var ArrayCollection
	 */
	protected $_decoree;
	public function setDecoree(Collection $decoree) {
		$this->_decoree = $decoree;
	}
	public function toArray() {
		if (is_null($this->_decoree))
			return parent::toArray();
		else
			return $this->_decoree->toArray();
	}

	public function first() {
		if (is_null($this->_decoree))
			return parent::first();
		else
			return $this->_decoree->first();
	}

	public function last() {
		if (is_null($this->_decoree))
			return parent::last();
		else
			return $this->_decoree->last();
	}

	public function key() {
		if (is_null($this->_decoree))
			return parent::key();
		else
			return $this->_decoree->key();
	}

	public function next() {
		if (is_null($this->_decoree))
			return parent::next();
		else
			return $this->_decoree->next();
	}

	public function current() {
		if (is_null($this->_decoree))
			return parent::current();
		else
			return $this->_decoree->current();
	}

	public function remove($key) {
		if (is_null($this->_decoree))
			return parent::remove($key);
		else
			return $this->_decoree->remove($key);
	}

	public function removeElement($element) {
		if (is_null($this->_decoree))
			return parent::removeElement($element);
		else
			return $this->_decoree->removeElement($element);
	}

	public function offsetExists($offset) {
		if (is_null($this->_decoree))
			return parent::offsetExists($offset);
		else
			return $this->_decoree->offsetExists($offset);
	}

	public function offsetGet($offset) {
		if (is_null($this->_decoree))
			return parent::offsetGet($offset);
		else
			return $this->_decoree->offsetGet($offset);
	}

	public function offsetSet($offset, $value) {
		if (is_null($this->_decoree))
			return parent::offsetSet($offset,$value);
		else
			return $this->_decoree->offsetSet($offset, $value);
	}

	public function offsetUnset($offset) {
		if (is_null($this->_decoree))
			return parent::offsetUnset($offset);
		else
			return $this->_decoree->offsetUnset($offset);
	}

	public function containsKey($key) {
		if (is_null($this->_decoree))
			return parent::containsKey($key);
		else
			return $this->_decoree->containsKey($key);
	}

	public function contains($element) {
		if (is_null($this->_decoree))
			return parent::contains($element);
		else
			return $this->_decoree->contains($element);
	}

	public function exists(Closure $p) {
		if (is_null($this->_decoree))
			return parent::exists($p);
		else
			return $this->_decoree->exists($p);
	}

	public function indexOf($element) {
		if (is_null($this->_decoree))
			return parent::indexOf($element);
		else
			return $this->_decoree->indexOf($element);
	}

	public function get($key) {
		if (is_null($this->_decoree))
			return parent::get($key);
		else
			return $this->_decoree->get($key);
	}

	public function getKeys() {
		if (is_null($this->_decoree))
			return parent::getKeys();
		else
			return $this->_decoree->getKeys();
	}

	public function getValues() {
		if (is_null($this->_decoree))
			return parent::getValues();
		else
			return $this->_decoree->getValues();
	}

	public function count() {
		if (is_null($this->_decoree))
			return parent::count();
		else
			return $this->_decoree->count();
	}

	public function set($key, $value) {
		if (is_null($this->_decoree))
			parent::set($key,$value);
		else
			$this->_decoree->set($key, $value);
	}

	public function add($value) {
		if (is_null($this->_decoree))
			return parent::add($value);
		else
			return $this->_decoree->add($value);
	}

	public function isEmpty() {
		if (is_null($this->_decoree))
			return parent::isEmpty();
		else
			return $this->_decoree->isEmpty();
	}

	public function getIterator() {
		if (is_null($this->_decoree))
			return parent::getIterator();
		else
			return $this->_decoree->getIterator();
	}

	public function map(Closure $func) {
		if (is_null($this->_decoree))
			return parent::map($func);
		else
			return $this->_decoree->map($func);
	}

	public function filter(Closure $p) {
		if (is_null($this->_decoree))
			return parent::filter($p);
		else
			return $this->_decoree->filter($p);
	}

	public function forAll(Closure $p) {
		if (is_null($this->_decoree))
			return parent::forAll($p);
		else
			return $this->_decoree->forAll($p);
	}

	public function partition(Closure $p) {
		if (is_null($this->_decoree))
			return parent::partition($p);
		else
			return $this->_decoree->partition($p);
	}

	public function clear() {
		if (is_null($this->_decoree))
			parent::clear();
		else
			$this->_decoree->clear();
	}

	public function slice($offset, $length = null) {
		if (is_null($this->_decoree))
			return parent::slice($offset,$length);
		else
			return $this->_decoree->slice($offset, $length);
	}

	public function matching(Criteria $criteria) {
		if (is_null($this->_decoree))
			return parent::matching($criteria);
		else
			return $this->_decoree->matching($criteria);
	}
}