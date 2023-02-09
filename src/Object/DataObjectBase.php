<?php

declare(strict_types=1);

namespace DrupalFoundation\DrupalFoundation\Object;

use DrupalFoundation\DrupalFoundation\Utility\UnicodeString;

/**
 * Define a low level data object class.
 */
class DataObjectBase {

  /**
   * The class constructor.
   *
   * @param array $values
   *   An array of data values.
   */
  public function __construct(array $values = []) {
    foreach ($values as $key => $value) {
      $property = UnicodeString::toCamel($key);
      if (!property_exists(static::class, $property)) {
        continue;
      }
      $this->{$property} = $value;
    }
  }

  /**
   * Get the data object values.
   *
   * @return array
   *   An array of the object property values.
   */
  public function toArray(): array {
    $array = [];

    foreach (get_object_vars($this) as $property => $value) {
      $array[UnicodeString::toSnake($property)] = $value;
    }

    return $array;
  }
}
