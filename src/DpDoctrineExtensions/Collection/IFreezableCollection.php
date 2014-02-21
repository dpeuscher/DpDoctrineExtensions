<?php
/**
 * User: dpeuscher
 * Date: 16.04.13
 */

namespace DpDoctrineExtensions\Collection;

use Doctrine\Common\Collections\Collection;
use DpZFExtensions\Validator\IFreezable;

/**
 * Class IFreezableCollection
 *
 * @package DpDoctrineExtensions\Collection
 */
interface IFreezableCollection extends Collection,IFreezable {
}