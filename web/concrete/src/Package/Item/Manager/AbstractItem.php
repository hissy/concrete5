<?php
namespace Concrete\Core\Package\Item\Manager;

use Concrete\Controller\Element\Package\ItemList;
use Concrete\Core\Entity\Package;

defined('C5_EXECUTE') or die("Access Denied.");

abstract class AbstractItem implements ItemInterface
{

    protected $items;

    public function hasItems(Package $package)
    {
        return count($this->getItems($package)) > 0;
    }


    public function getItems(Package $package)
    {
        if (!isset($this->items)) {
            $this->items = $this->getPackageItems($package);
        }
        return $this->items;
    }

    public function renderList(Package $package)
    {
        $controller = new ItemList($this, $package);
        $controller->render();
    }

}
