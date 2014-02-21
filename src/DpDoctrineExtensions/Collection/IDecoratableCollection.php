<?php
/**
 * User: Dominik
 * Date: 15.05.13
 */

namespace DpDoctrineExtensions\Collection;


use Doctrine\Common\Collections\Collection;

interface IDecoratableCollection extends Collection {
	public function setDecoree(Collection $decoree);
}