<?php
/*PLEASE DO NOT EDIT THIS CODE*/
/*This code was generated using the UMPLE 1.24.0-fcfceb9 modeling language!*/

class Menu
{

  //------------------------
  // MEMBER VARIABLES
  //------------------------

  //Menu Attributes
  private $name;

  //Menu Associations
  private $menuItems;

  //------------------------
  // CONSTRUCTOR
  //------------------------

  public function __construct($aName)
  {
    $this->name = $aName;
    $this->menuItems = array();
  }

  //------------------------
  // INTERFACE
  //------------------------

  public function setName($aName)
  {
    $wasSet = false;
    $this->name = $aName;
    $wasSet = true;
    return $wasSet;
  }

  public function getName()
  {
    return $this->name;
  }

  public function getMenuItem_index($index)
  {
    $aMenuItem = $this->menuItems[$index];
    return $aMenuItem;
  }

  public function getMenuItems()
  {
    $newMenuItems = $this->menuItems;
    return $newMenuItems;
  }

  public function numberOfMenuItems()
  {
    $number = count($this->menuItems);
    return $number;
  }

  public function hasMenuItems()
  {
    $has = $this->numberOfMenuItems() > 0;
    return $has;
  }

  public function indexOfMenuItem($aMenuItem)
  {
    $wasFound = false;
    $index = 0;
    foreach($this->menuItems as $menuItem)
    {
      if ($menuItem->equals($aMenuItem))
      {
        $wasFound = true;
        break;
      }
      $index += 1;
    }
    $index = $wasFound ? $index : -1;
    return $index;
  }

  public static function minimumNumberOfMenuItems()
  {
    return 0;
  }

  public function addMenuItem($aMenuItem)
  {
    $wasAdded = false;
    if ($this->indexOfMenuItem($aMenuItem) !== -1) { return false; }
    $this->menuItems[] = $aMenuItem;
    $wasAdded = true;
    return $wasAdded;
  }

  public function removeMenuItem($aMenuItem)
  {
    $wasRemoved = false;
    if ($this->indexOfMenuItem($aMenuItem) != -1)
    {
      unset($this->menuItems[$this->indexOfMenuItem($aMenuItem)]);
      $this->menuItems = array_values($this->menuItems);
      $wasRemoved = true;
    }
    return $wasRemoved;
  }

  public function addMenuItemAt($aMenuItem, $index)
  {  
    $wasAdded = false;
    if($this->addMenuItem($aMenuItem))
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfMenuItems()) { $index = $this->numberOfMenuItems() - 1; }
      array_splice($this->menuItems, $this->indexOfMenuItem($aMenuItem), 1);
      array_splice($this->menuItems, $index, 0, array($aMenuItem));
      $wasAdded = true;
    }
    return $wasAdded;
  }

  public function addOrMoveMenuItemAt($aMenuItem, $index)
  {
    $wasAdded = false;
    if($this->indexOfMenuItem($aMenuItem) !== -1)
    {
      if($index < 0 ) { $index = 0; }
      if($index > $this->numberOfMenuItems()) { $index = $this->numberOfMenuItems() - 1; }
      array_splice($this->menuItems, $this->indexOfMenuItem($aMenuItem), 1);
      array_splice($this->menuItems, $index, 0, array($aMenuItem));
      $wasAdded = true;
    } 
    else 
    {
      $wasAdded = $this->addMenuItemAt($aMenuItem, $index);
    }
    return $wasAdded;
  }

  public function equals($compareTo)
  {
    return $this == $compareTo;
  }

  public function delete()
  {
    $this->menuItems = array();
  }

}
?>