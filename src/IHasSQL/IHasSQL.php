<?php
/**
* Interface for class that interacts with the database to encapsulates all SQL requests.
*
* @package MaurisCore
*/
interface IHasSQL {
  public static function SQL($key=null);
}