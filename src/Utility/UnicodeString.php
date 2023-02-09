<?php

declare(strict_types=1);

namespace DrupalFoundation\DrupalFoundation\Utility;

use function Symfony\Component\String\u;

/**
 * The unicode string class.
 *
 * This class provides common ways to interact with various string encodings.
 * It's meant to provide reusable string implementations, which is heavily based
 * on the Symfony string component.
 *
 * Instead of polluting the Drupal module with the Symfony component syntax
 * we've decided to encapsulate it so that we can maintain this code, if we ever
 * decide to replace the underlying Symfony library.
 */
class UnicodeString {

  /**
   * @param string $string
   *
   * @return string
   */
  public static function toTitle(string $string): string {
    return u($string)->title()->toString();
  }

  /**
   * @param string $string
   *
   * @return string
   */
  public static function toSnake(string $string): string {
    return u($string)->snake()->toString();
  }

  /**
   * @param string $string
   *
   * @return string
   */
  public static function toCamel(string $string): string {
    return u($string)->camel()->toString();
  }
}
